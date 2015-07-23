<?php

namespace ConoHa\Account;

use ConoHa\Common\BaseService;
use ConoHa\Common\ResourceCollection;
use ConoHa\Account\Resource\OrderItem;
use ConoHa\Account\Resource\ProductItem;
use ConoHa\Account\Resource\PaymentHistory;
use ConoHa\Account\Resource\PaymentSummary;
use ConoHa\Account\Resource\BillingInvoice;
use ConoHa\Account\Resource\Notification;

/**
 * ConoHa Account(Billing) Service.
 *
 * ConoHaのアカウント情報を扱うAPI群です。OpenStackにはこのAPIはありません。　
 */
class Service extends BaseService
{
    /**
     * 購入したアイテムの一覧を取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/account-order-item-list.html
     *
     * @return \ConoHa\Common\ResourceCollection
     */
    public function orderItems()
    {
        $res = $this->getClient()->get($this->getUri('order-items'));

        $item = new OrderItem();
        $col = new ResourceCollection();
        $col->fill($item, $res->getJson()->order_items);
        return $col;
    }

    /**
     * 購入したアイテムの詳細を取得する(UUID指定)
     *
     * @api
     * @link https://www.conoha.jp/docs/account-order-item-detail-specified.html
     *
     * @param string UUID
     * @return \ConoHa\Account\Resource\OrderItem
     */
    public function orderItem($uuid)
    {
        $res = $this->getClient()->get($this->getUri(['order-items', $uuid]), ['debug' => true]);

        $item = new OrderItem();
        $item->populate($res->getJson()->order_item);

        return $item;
    }

    /**
     * VPSやSwift、追加IPなどのサービス毎に商品を一覧で返す
     *
     * @api
     * @link https://www.conoha.jp/docs/account-products.html
     *
     * @param string $service_name (Optional) The service name for filtering.
     *                             It should be one of following.
     *                             VPS, VPSAddDisk, VPSBackup, AddIP, LoadBalancer,
     *                             ImageSave, Mail, MailBackup, StaticIP, MailAddDisk,
     *                             DB, DBBackup, DBAddDisk, ObjectStorage or DNS.
     * @return \ConoHa\Common\ResourceCollection
     */
    public function productItems($service_name = '')
    {
        switch($service_name) {
            case 'VPS':
            case 'VPSAddDisk':
            case 'VPSBackup':
            case 'AddIP':
            case 'LoadBalancer':
            case 'ImageSave':
            case 'Mail':
            case 'MailBackup':
            case 'StaticIP':
            case 'MailAddDisk':
            case 'DB':
            case 'DBBackup':
            case 'DBAddDisk':
            case 'ObjectStorage':
            case 'DNS':
                $query = [
                    'service_name' => $service_name,
                ];
                break;

            case '':
                $query = [];
                break;
            default:
                throw \InvalidArgumentException('Invalid service name.');
        }

        $res = $this->getClient()->get($this->getUri('product-items', $query));

        $item = new ProductItem();
        $col = new ResourceCollection();

        foreach($res->getJson()->product_items as $item) {
            foreach($item->regions as $region) {
                foreach($region->products as $product) {
                    $product_item = new ProductItem();
                    $product_item->setServiceName($item->service_name);
                    $product_item->setRegionName($region->region_name);
                    $product_item->setProductName($product->product_name);
                    $product_item->setUnitPrice($product->unit_price);
                    $col[] = $product_item;
                    $tmp[$item->service_name] = '';
                }
            }
        }
        return $col;
    }

    /**
     * 入金履歴を取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/account-payment-histories.html
     *
     * @return \ConoHa\Common\ResourceCollection
     */
    public function paymentHistory()
    {
        $res = $this->getClient()->get($this->getUri('payment-history'));

        $item = new PaymentHistory();
        $col = new ResourceCollection();

        $col->fill($item, $res->getJson()->payment_history);
        return $col;
    }

    /**
     * 入金のサマリーを取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/account-payment-summary.html
     *
     * @return \ConoHa\Account\Resource\PaymentSummary
     */
    public function paymentSummary()
    {
        $res = $this->getClient()->get($this->getUri('payment-summary'));

        $item = new PaymentSummary();
        $item->populate($res->getJson()->payment_summary);

        return $item;
    }

    /**
     * 課金アイテムへの請求データ一覧を取得する。
     *
     * @api
     * @link https://www.conoha.jp/docs/account-billing-invoices-list.html
     *
     * @param int $offset (Optional)offset of results. Default value is 0.
     * @param int $limit  (Optional)offset of results. Default value is 1000.
     * @return \ConoHa\Common\ResourceCollection
     */
    public function billingInvoices($offset = null, $limit = null)
    {
        $query = [];
        if(is_numeric($offset)) {
            $query['offset'] = $offset;
        }
        if(is_numeric($limit)) {
            $query['limit'] = $limit;
        }

        $res = $this->getClient()->get($this->getUri('billing-invoices', $query));

        $item = new BillingInvoice();
        $col = new ResourceCollection();
        $col->fill($item, $res->getJson()->billing_invoices);

        return $col;
    }

    /**
     * 課金アイテムへの請求データ詳細を取得します。
     *
     * @api
     * @link https://www.conoha.jp/docs/account-billing-invoices-detail-specified.html
     *
     * @param int $invoice_id
     * @return \ConoHa\Account\Resource\BillingInvoice
     */
    public function billingInvoice($invoice_id)
    {
        $res = $this->getClient()->get($this->getUri(['billing-invoices', $invoice_id]));

        $item = new BillingInvoice();
        $item->populate($res->getJson()->billing_invoice);

        return $item;
    }

    /**
     * お知らせ一覧を取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/account-informations-list.html
     *
     * @return \ConoHa\Common\ResourceCollection
     */
    public function notifications()
    {
        $res = $this->getClient()->get($this->getUri('notifications'));

        $item = new Notification($this);
        $col = new ResourceCollection();
        $col->fill($item, $res->getJson()->notifications);

        return $col;
    }

    /**
     * notification_code を指定してお知らせの詳細情報を取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/account-informations-detail-specified.html
     *
     * @param int $notification_code
     * @return \ConoHa\Account\Resource\Notification
     */
    public function notification($notification_code)
    {
        $res = $this->getClient()->get($this->getUri(['notifications', $notification_code]));

        $item = new Notification($this);
        $item->populate($res->getJson()->notification);

        return $item;
    }
}

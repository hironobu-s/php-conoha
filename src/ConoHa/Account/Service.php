<?php

namespace ConoHa\Account;

use ConoHa\Common\BaseService;
use ConoHa\Common\ResourceCollection;
use ConoHa\Account\Resource\OrderItem;
use ConoHa\Account\Resource\ProductItem;
use ConoHa\Account\Resource\PaymentHistory;

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
     * @return \ConoHa\Common\ResourceCollection
     */
    public function productItems()
    {
        // $res = $this->getClient()->get($this->getUri('product-items'));
        // //$res = $this->getClient()->get($this->getUri('payment-history'));

        // $item = new ProductItem();
        // $col = new ResourceCollection();
        // print_r($res->getBody());exit;

        // $col->fill($item, $res->getJson()->product_items);
        // return $col;
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
}

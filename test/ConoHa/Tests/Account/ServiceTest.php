<?php

namespace ConoHa\Test\Account;

use ConoHa\ConoHa;
use ConoHa\Account\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    private static $service;
    public static function setUpBeforeClass()
    {
        $access = __get_test_access();

        $c = new ConoHa();
        $c->setAccess($access);

        self::$service = $c->getAccountService();
    }

    public function testOrderItems()
    {
        $col = self::$service->orderItems();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\OrderItem', $col[0]);
        }

        return $col;
    }

    /**
     * API側に不具合があるため、実装はしたがまだテストはしない
     *
     * @depends testOrderItems
     */
    public function testOrderItem($col)
    {
        if(count($col) == 0) {
            return;
        }
        //$item = $col[0];
        //$detail = self::$service->orderItem($item->getUuId());
        // $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        // if(count($col) > 0) {
        //     $this->assertInstanceOf('ConoHa\Account\Resource\OrderItem', $col[0]);
        // }
    }

    public function testProductItems()
    {
        $col = self::$service->productItems();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\ProductItem', $col[0]);
            $this->assertNotNull($col[0]->getServiceName());
            $this->assertNotNull($col[0]->getRegionName());
            $this->assertNotNull($col[0]->getProductName());
            $this->assertNotNull($col[0]->getUnitPrice());
        }
    }

    public function testPaymentHistory()
    {
        $col = self::$service->paymentHistory();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\PaymentHistory', $col[0]);
            $this->assertNotNull($col[0]->getMoneyType());
            $this->assertInternalType('integer', $col[0]->getDepositAmount());
            $this->assertInstanceOf('\DateTime', $col[0]->getReceivedDate());
        }
    }

    public function testPaymentSummary()
    {
        $item = self::$service->paymentSummary();
        $this->assertInstanceOf('ConoHa\Account\Resource\PaymentSummary', $item);
        $this->assertInternalType('integer', $item->getTotalDepositAmount());
    }

    public function testBillingInvoice()
    {
        $col = self::$service->billingInvoice();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\BillingInvoice', $col[0]);
            $this->assertInternalType('int', $col[0]->getInvoiceId());
            $this->assertInternalType('string', $col[0]->getPaymentMethodType());
            $this->assertInstanceOf('\DateTime', $col[0]->getInvoiceCreatedDate());
            $this->assertInstanceOf('\DateTime', $col[0]->getInvoiceDate());
            $this->assertInternalType('int', $col[0]->getBillPlasTax());
            $this->assertInstanceOf('\DateTime', $col[0]->getDueDate());
        }
    }
}

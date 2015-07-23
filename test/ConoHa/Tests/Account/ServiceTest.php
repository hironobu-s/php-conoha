<?php

namespace ConoHa\Test\Account;

use ConoHa\ConoHa;
use ConoHa\Account\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    private static $service;
    public static function setUpBeforeClass()
    {
        if(API_TEST) {
            $access = __get_test_access();

            $c = new ConoHa();
            $c->setAccess($access);

            self::$service = $c->getAccountService();
        }
    }

    public function setup()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }
    }

    public function testOrderItems()
    {
        $col = self::$service->orderItems();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\OrderItem', $col[0]);
        } else {
            $this->markTestImcomplete('The number of order-items is 0.');
        }
        return $col;
    }

    /**
     * @depends testOrderItems
     */
    public function testOrderItem($col)
    {
        $this->markTestSkipped('API側に不具合があるため、実装はしたがまだテストはしない');
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
        } else {
            $this->markTestImcomplete('The number of product-items is 0.');
        }
    }

    public function testProductItemsWithFilter()
    {
        $service_name = 'VPS';
        $col = self::$service->productItems($service_name);
        $names = [];
        foreach($col as $service) {
            $names[$service->getServiceName()] = null;
        }
        $this->assertEquals([ 'VPS' => null ], $names);

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
        } else {
            $this->markTestIncomplete('The number of payment-history is 0.');
        }
    }

    public function testPaymentSummary()
    {
        $item = self::$service->paymentSummary();
        $this->assertInstanceOf('ConoHa\Account\Resource\PaymentSummary', $item);
        $this->assertInternalType('integer', $item->getTotalDepositAmount());
    }

    public function testBillingInvoices()
    {
        $col = self::$service->billingInvoices();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\BillingInvoice', $col[0]);
            $this->assertInternalType('int', $col[0]->getInvoiceId());
            $this->assertInternalType('string', $col[0]->getPaymentMethodType());
            $this->assertInstanceOf('\DateTime', $col[0]->getInvoiceCreatedDate());
            $this->assertInstanceOf('\DateTime', $col[0]->getInvoiceDate());
            $this->assertInternalType('int', $col[0]->getBillPlasTax());
            $this->assertInstanceOf('\DateTime', $col[0]->getDueDate());
        } else {
            $this->markTestIncomplete('The number of billing-invoice is 0.');
        }

        return $col;
    }

    public function testBillingInvoicesWithOffset()
    {
        $col = self::$service->billingInvoices(1);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
    }

    public function testBillingInvoicesWithLimit()
    {
        $col = self::$service->billingInvoices(0, 1000);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
    }

    /**
     * @depends testBillingInvoices
     */
    public function testBillingInvoice($col)
    {
        if(count($col) > 0) {
            $this->markTestIncomplete('The number of billing-invoice is 0.');
            return;
        }
        $invoice_id = $col[0]->getInvoiceId();

        $item = self::$servie->billingInvoice($invoice_id);
        $this->assertInstanceOf('ConoHa\Account\Resource\BillingInvoice', $item);
        $this->assertInternalType('int', $item->getInvoiceId());
        $this->assertInternalType('string', $item->getPaymentMethodType());
        $this->assertInstanceOf('\DateTime', $item->getInvoiceCreatedDate());
        $this->assertInstanceOf('\DateTime', $item->getInvoiceDate());
        $this->assertInternalType('int', $item->getBillPlasTax());
        $this->assertInstanceOf('\DateTime', $item->getDueDate());
    }

    public function testNotifications()
    {
        $col = self::$service->notifications();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\Notification', $col[0]);
            $this->assertInternalType('int', $col[0]->getNotificationCode());
            $col[0]->getType();
            $this->assertInternalType('string', $col[0]->getTitle());
            $this->assertInternalType('string', $col[0]->getContents());
            $this->assertInternalType('string', $col[0]->getReadStatus());
            $this->assertInstanceOf('\DateTime', $col[0]->getStartDate());
        } else {
            $this->markTestIncomplete('The number of notifications is 0.');
        }
        return $col;
    }

    public function testNotificationsWithOffset()
    {
        $col = self::$service->notifications(0);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
    }

    public function testNotificationsWithLimit()
    {
        $col = self::$service->notifications(0, 5);
        $this->assertCount(5, $col);
    }

    /**
     * @depends testNotifications
     */
    public function testNotification($col)
    {
        if(count($col) > 0) {
            return;
        }
        $invoice_id = $col[0]->getInvoiceId();

        $item = self::$servie->notification($invoice_id);
        $this->assertInstanceOf('ConoHa\Account\Resource\Notification', $item);
        $this->assertInternalType('int', $item->getNotificationCode());
        $item->getType();
        $this->assertInternalType('string', $item->getTitle());
        $this->assertInternalType('string', $item->getContents());
        $this->assertInternalType('string', $item->getReadStatus());
        $this->assertInstanceOf('\DateTime', $item->getStartDate());
    }

    public function testObjectStorageRrdRequest()
    {
        $col = self::$service->objectStorageRrdRequest();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\ObjectStorageRequest', $col[0]);
        } else {
            $this->markTestIncomplete('The number of object-storage-request is 0.');
        }
    }

    public function testObjectStorageRrdRequestWithSpan()
    {
        $start = new \DateTime('2015-07-01 00:00:00');
        $end   = new \DateTime('2015-01-01 00:00:00');

        $col = self::$service->objectStorageRrdRequest($start, $end);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
    }

    public function testObjectStorageRrdRequestWithMode()
    {
        $mode = 'max';
        $col = self::$service->objectStorageRrdRequest(null, null, $mode);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testObjectStorageRrdRequestWithInvalidMode()
    {
        $mode = 'hoge';
        $col = self::$service->objectStorageRrdRequest(null, null, $mode);
    }


    public function testObjectStorageRrdSize()
    {
        $col = self::$service->objectStorageRrdSize();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\ObjectStorageSize', $col[0]);
        } else {
            $this->markTestIncomplete('The number of object-storage-size is 0.');
        }
    }

    public function testObjectStorageRrdSizeWithSpan()
    {
        $start = new \DateTime('2015-07-01 00:00:00');
        $end   = new \DateTime('2015-01-01 00:00:00');

        $col = self::$service->objectStorageRrdSize($start, $end);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
    }

    public function testObjectStorageRrdSizeWithMode()
    {
        $mode = 'max';
        $col = self::$service->objectStorageRrdSize(null, null, $mode);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testObjectStorageRrdSizeWithInvalidMode()
    {
        $mode = 'hoge';
        $col = self::$service->objectStorageRrdSize(null, null, $mode);
    }
}

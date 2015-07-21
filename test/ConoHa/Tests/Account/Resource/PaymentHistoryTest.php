<?php

namespace ConoHa\Test\Account\Resource;

use ConoHa\ConoHa;
use ConoHa\Account\Service;
use ConoHa\Account\Resource\PaymentHistory;

class PaymentHistoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new PaymentHistory();
        $item->setMoneyType('test-paypal');
        $item->setDepositAmount(500);
        $item->setReceivedDate('2015-07-01T19:38:39');

        $this->assertEquals('test-paypal', $item->getMoneyType());
        $this->assertEquals(500, $item->getDepositAmount());
        $this->assertInstanceOf('\DateTime', $item->getReceivedDate());
    }

    public function testPopulate()
    {
        $data = [
            'money_type'     => 'test-paypal',
            'deposit_amount' => 500,
            'received_date'  => '2015-07-01T19:38:39',
        ];

        $item = new PaymentHistory();
        $item->populate(json_decode(json_encode($data)));

        $this->assertEquals('test-paypal', $item->getMoneyType());
        $this->assertEquals(500, $item->getDepositAmount());
        $this->assertInstanceOf('\DateTime', $item->getReceivedDate());
    }
}

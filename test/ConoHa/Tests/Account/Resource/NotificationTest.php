<?php

namespace ConoHa\Test\Account\Resource;

use ConoHa\ConoHa;
use ConoHa\Account\Service;
use ConoHa\Account\Resource\Notification;

class NotificationTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new Notification();
        $item->setNotificationCode("test-notification-code");
        $item->setType("test-type");
        $item->setTitle("test-title");
        $item->setContents("test-contents");
        $item->setReadStatus("Read");
        $item->setStartDate("2015-07-01 12:00:00");

        $this->assertEquals("test-notification-code", $item->getNotificationCode());
        $this->assertEquals("test-type", $item->getType());
        $this->assertEquals("test-title", $item->getTitle());
        $this->assertEquals("test-contents", $item->getContents());
        $this->assertEquals("Read", $item->getReadStatus());
        $this->assertInstanceOf("\Datetime", $item->getStartDate());

        return $item;
    }

    /**
     * @depends testSetterGetter
     */
    public function testReadStatus($item)
    {
        $item->setReadStatus('Read'); // OK
        $item->setReadStatus('Unread'); // OK
        $item->setReadStatus('ReadTitleOnly'); // OK
    }

    /**
     * @depends testSetterGetter
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidReadStatus($item)
    {
        $item->setReadStatus('hoge');
    }

    public function testPopulate()
    {
        $data = [
            'notification_code' => 'test-notification-code',
            'type'       => 'test-type',
            'title' => 'test-title',
            'contents' => 'test-contents',
            'read_status' => 'Read',
            'start_date' => '2015-07-01 12:00:00',
        ];

        $item = new Notification();
        $item->populate(json_decode(json_encode($data)));

        $this->assertEquals("test-notification-code", $item->getNotificationCode());
        $this->assertEquals("test-type", $item->getType());
        $this->assertEquals("test-title", $item->getTitle());
        $this->assertEquals("test-contents", $item->getContents());
        $this->assertEquals("Read", $item->getReadStatus());
        $this->assertInstanceOf("\DateTime", $item->getStartDate());
    }

    public function testStore()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }

        // SKIPPED
        $this->markTestSkipped('API側の不具合のため');


        $conoha = new ConoHa();
        $conoha->setAccess(__get_test_access());

        $s = $conoha->getAccountService();
        $ns = $s->notifications();
        if(count($ns) == 0) {
            $this->markTestSkipped('告知が0件です');
        }

        $item = $ns[0];

        if($item->getReadStatus() == 'Read') {
            $status = 'Unread';
        } else {
            $status = 'ReadTitleOnly';
        }

        $item->setReadStatus($status);
        $item->store();

        // confirm
        $item2 = $s->notification($item->getNotificationCode());
        $this->assertEquals($status, $item2->getReadStatus());
    }
}

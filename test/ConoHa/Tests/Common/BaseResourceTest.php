<?php

namespace ConoHa\Tests\Common;

use ConoHa\Common\BaseResource;

class TestResource extends BaseResource
{
    private $prop1;
    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;
    }

    public function getProp1()
    {
        return $this->prop1;
    }

    public function setUuId($uu_id)
    {
        $this->uu_id = $uu_id;
    }

    /**
     * uu_idの取得
     *
     * @return string
     */
    public function getUuId()
    {
        return $this->uu_id;
    }
}

class BaseResourceTest extends \PHPUnit_Framework_TestCase
{
    public function testPopulate()
    {
        $data = [
            'prop1' => 'test-prop1',
            'uu_id' => 'test-uu-id',
        ];

        $r = new TestResource;
        $r->populate(json_decode(json_encode($data)));
    }

    public function testSnake2Camel()
    {
        $obj = new TestResource;

        $before = 'foo_bar_baz';
        $after  = 'FooBarBaz';
        $result = $obj->snake2Camel($before);
        $this->assertEquals($result, $after);
    }

    public function testCamel2Snake()
    {
        $obj = new TestResource;

        $before  = 'FooBarBaz';
        $after = 'foo_bar_baz';
        $result = $obj->camel2Snake($before);
        $this->assertEquals($result, $after);
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testStore()
    {
        $item = new TestResource;
        $item->store();
    }
}

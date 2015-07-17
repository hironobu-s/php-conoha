<?php

namespace ConoHa\Tests\Common;

use ConoHa\Common\Object;

class TestObject extends Object
{
    protected $properties = [
        'prop1' => null,
        'prop_test2' => null,
        'prop_test_no3' => null,
    ];
}

class ObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testSetter()
    {
        $obj = new TestObject();
        $obj->setProp1("");
        $obj->setPropTest2("");
        $obj->setPropTestNo3("");
    }

    public function testGetter()
    {
        $obj = new TestObject();
        $obj->getProp1();
        $obj->getPropTest2();
        $obj->getPropTestNo3();
    }

    /**
     * @expectedException BadMethodCallException
     */
    public function testUndefinededWrite() {
        $obj = new TestObject();
        $obj->setUndefinedMethod("value");
    }

    /**
     * @expectedException BadMethodCallException
     */
    public function testUndefinededRead() {
        $obj = new TestObject();
        $obj->getUndefinedMethod();
    }

    /**
     * @expectedException BadMethodCallException
     */
    public function testUndefinedMethod() {
        $obj = new TestObject();
        $obj->hoge("fuga");
    }

    public function testSnake2Camel()
    {
        $obj = new TestObject();

        $before = 'foo_bar_baz';
        $after  = 'FooBarBaz';
        $result = $obj->snake2Camel($before);
        $this->assertEquals($result, $after);
    }

    public function testCamel2Snake()
    {
        $obj = new TestObject();

        $before  = 'FooBarBaz';
        $after = 'foo_bar_baz';
        $result = $obj->camel2Snake($before);
        $this->assertEquals($result, $after);
    }
}

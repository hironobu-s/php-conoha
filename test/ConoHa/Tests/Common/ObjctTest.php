<?php

namespace ConoHa\Tests\Common;

use ConoHa\Common\Object;

class TestObject extends Object
{
    private $prop1;
    private $prop_test2;
    private $prop_test_no3;
    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;
    }
    public function getProp1()
    {
        return $this->prop1;
    }
    public function setPropTest2($prop_test2)
    {
        $this->prop_test2 = $prop_test2;
    }
    public function getPropTest2()
    {
        return $this->prop_test2;
    }
    public function setPropTestNo3($prop_test_no3)
    {
        $this->prop_test_no3 = $prop_test_no3;
    }
    public function getPropTestNo3()
    {
        return $this->prop_test_no3;
    }

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
}

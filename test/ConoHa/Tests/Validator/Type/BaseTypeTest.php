<?php

namespace ConoHa\Tests\Validator\Type;

use ConoHa\Validator\Type\BaseType;

class TestObject extends BaseType
{
}

class BaseTypeTest extends \PHPUnit_Framework_TestCase
{
    private $type;
    public function setup()
    {
        $this->type = new TestObject();
    }

    public function testGetName()
    {
        $this->assertEquals('ConoHa\Tests\Validator\Type\TestObject', $this->type->getName());
    }

    public function testNullOk()
    {
        $this->type->setNullOk(true);
        $this->assertTrue($this->type->getNullOk());
        $this->type->setNullOk(false);
        $this->assertFalse($this->type->getNullOk());
    }

    public function testValidateOk()
    {
        $this->type->setNullOk(true);
        $val = $this->type->validate(null);
        $this->assertNull($val);

        $val = $this->type->validate("");
        $this->assertSame("", $val);
        $val = $this->type->validate(0);
        $this->assertSame(0, $val);
        $val = $this->type->validate(0.0);
        $this->assertSame(0.0, $val);
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateNull()
    {
        $this->type->setNullOk(false);
        $this->type->validate(null);
    }
}

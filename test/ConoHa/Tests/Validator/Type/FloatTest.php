<?php

namespace ConoHa\Tests\Validator\Type;

use ConoHa\Validator\Type\Float;

class TestFloat extends Float
{
}

class FloatTest extends \PHPUnit_Framework_TestCase
{
    private $type;
    public function setup()
    {
        $this->type = new TestFloat();
    }

    public function testGetName()
    {
        $this->assertEquals('ConoHa\Tests\Validator\Type\TestFloat', $this->type->getName());
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
        $val = $this->type->validate(0.0);
        $this->assertSame(0.0, $val);
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError1()
    {
        $this->type->validate("");
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError2()
    {
        $this->type->validate(0);
    }
}

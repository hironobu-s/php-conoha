<?php

namespace ConoHa\Tests\Validator\Type;

use ConoHa\Validator\Type\Integer;

class TestInteger extends Integer
{
}

class IntegerTest extends \PHPUnit_Framework_TestCase
{
    private $type;
    public function setup()
    {
        $this->type = new TestInteger();
    }

    public function testGetName()
    {
        $this->assertEquals('ConoHa\Tests\Validator\Type\TestInteger', $this->type->getName());
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
        $val = $this->type->validate(0);
        $this->assertSame(0, $val);
        $val = $this->type->validate(0.0);
        $this->assertSame(0, $val); // intの値が返る
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError()
    {
        $this->type->validate("");
    }

}

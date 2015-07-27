<?php

namespace ConoHa\Tests\Validator\Type;

use ConoHa\Validator\Type\DateTime;

class TestDateTime extends DateTime
{
}

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    private $type;
    public function setup()
    {
        $this->type = new TestDateTime();
    }

    public function testGetName()
    {
        $this->assertEquals('ConoHa\Tests\Validator\Type\TestDateTime', $this->type->getName());
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
        $this->type->validate(new \DateTime());
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError()
    {
        $this->type->validate('2015-07-01T00:00:00');
    }
}

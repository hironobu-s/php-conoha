<?php

namespace ConoHa\Tests\Validator\Type;

use ConoHa\Validator\Type\String;

class TestString extends String
{
}

class StringTest extends \PHPUnit_Framework_TestCase
{
    private $type;
    public function setup()
    {
        $this->type = new TestString();
    }

    public function testGetName()
    {
        $this->assertEquals('ConoHa\Tests\Validator\Type\TestString', $this->type->getName());
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
        $val = $this->type->validate("");
        $this->assertSame("", $val);
        $val = $this->type->validate("hoge");
        $this->assertSame("hoge", $val);
        $val = $this->type->validate(" fuga ");
        $this->assertSame(" fuga ", $val);
        $val = $this->type->validate("日本語");
        $this->assertSame("日本語", $val);
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError()
    {
        $this->type->setNullOk(false);
        $this->type->validate("");
    }
}

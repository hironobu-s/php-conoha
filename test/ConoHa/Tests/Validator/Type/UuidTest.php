<?php

namespace ConoHa\Tests\Validator\Type;

use ConoHa\Validator\Type\Uuid;

class TestUuid extends Uuid
{
}

class UuidTest extends \PHPUnit_Framework_TestCase
{
    private $type;
    public function setup()
    {
        $this->type = new TestUuid();
    }

    public function testGetName()
    {
        $this->assertEquals('ConoHa\Tests\Validator\Type\TestUuid', $this->type->getName());
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
        $val = $this->type->validate("4b65666b-cc54-4b02-a20a-5a4a0f770a89");
        $this->assertEquals("4b65666b-cc54-4b02-a20a-5a4a0f770a89", $val);
        $val = $this->type->validate("C06CC11E-68D7-4072-B577-BB08251703E4");
        $this->assertEquals("C06CC11E-68D7-4072-B577-BB08251703E4", $val);
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError1()
    {
        $this->type->setNullOk(false);
        $this->type->validate("");
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError2()
    {
        // 一桁少ない
        $this->type->validate("4b65666b-cc54-4b02-a20a-5a4a0f770a8");
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError3()
    {
        // 一桁多い
        $this->type->validate("4b65666b-cc54-4b02-a20a-5a4a0f770a811");
    }

    /**
     * @expectedException \ConoHa\Exception\ValidatorException
     */
    public function testValidateError4()
    {
        // 記号
        $this->type->validate("4b65666b-cc54-4b02-a20a-5a4a0f770a81(");
    }
}

<?php

namespace ConoHa\Tests\Validator;

use ConoHa\Validator\Validator;


class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $validator;
    public function setup()
    {
        $this->validator = new Validator();
    }

    public function testAdd()
    {
        $this->validator->add('foo', 'int');
        $this->validator->add('bar', 'string');
        $this->validator->add('baz', 'float');

        $types = $this->validator->all();
        $this->assertCount(3, $types);

        $this->assertArrayHasKey('foo', $types);
        $this->assertArrayHasKey('bar', $types);
        $this->assertArrayHasKey('baz', $types);
    }

    public function testMultipleAdd()
    {
        $types = [
            'foo',
            'bar',
            'baz',
        ];
        $this->validator->add($types, 'int');

        $types = $this->validator->all();
        $this->assertCount(3, $types);

        $this->assertArrayHasKey('foo', $types);
        $this->assertArrayHasKey('bar', $types);
        $this->assertArrayHasKey('baz', $types);

        return $this->validator;
    }

    public function testRemove()
    {
        $this->validator->add('foo', 'int');
        $this->validator->add('bar', 'string');
        $this->validator->add('baz', 'float');

        $this->validator->remove('bar', 'float');

        $types = $this->validator->all();
        $this->assertArrayHasKey('foo', $types);
        $this->assertArrayHasKey('baz', $types);

        $this->assertArrayNotHasKey('bar', $types);

        $this->assertArrayNotHasKey('hoge', $types);
        $this->assertCount(2, $this->validator->all());
    }

    public function testRun()
    {
        $this->validator->add('foo', 'int');
        $this->validator->add('bar', 'string');
        $this->validator->add('baz', 'float');

        $values = [
            'foo' => 100,
            'bar' => 'test',
            'baz' => 1.1,
            'hoge' => 'fuga',  // this will ignores.
        ];
        $ret = $this->validator->run($values);

        $this->assertArrayNotHasKey('hoge', $ret);

        unset($values['hoge']);
        $this->assertEquals($values, $ret);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidType()
    {
        $this->validator->add('name', 'hoge');
    }
}

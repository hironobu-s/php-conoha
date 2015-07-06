<?php

namespace ConoHa\Common;

abstract class ResourceCollection extends \ArrayIterator
{
    private $collection = [];
    private $flags;

    abstract public function populate(\StdClass $res);

    // Implement \ArrayIterator interface
    public function __construct($array = array(), $flags = 0)
    {
        $this->collection = $array;
        $this->flags = $flags;
    }

    public function append($value)
    {
        $this->collection[] = $value;
    }

    public function asort()
    {
        asort($this->collection);
    }

    public function count()
    {
        return count($this->collection);
    }

    public function current()
    {
        return current($this->collection);
    }

    public function getArrayCopy()
    {
        return $this->collection;
    }

    public function getFlags()
    {
        return $this->flags;
    }

    public function key()
    {
        return key($this->collection);
    }

    public function ksort()
    {
        ksort($this->collection);
    }

    public function natcasesort()
    {
        throw new \LogicException('Not implemented yet');
    }

    public function natsort()
    {
        throw new \LogicException('Not implemented yet');
    }

    public function next()
    {
        next($this->collection);
    }

    public function offsetExists($index)
    {
        return isset($this->collection[$index]);
    }

    public function offsetGet($index)
    {
        return $this->collection[$index];
    }

    public function offsetSet($index, $newval)
    {
        $this->$this->collection[$index] = $newval;
    }

    public function offsetUnset($index)
    {
        unset($this->collection[$index]);
    }

    public function rewind()
    {
        rewind($this->collection);
    }

    public function seek($position)
    {
        throw new \LogicException('Not implemented yet');
    }

    public function serialize()
    {
        return serialize($this->collection);
    }

    public function setFlags($flags)
    {
        $this->flags = $flags;
    }

    public function uasort($cmp_function)
    {
        uasort($this->collection);
    }

    public function uksort($cmp_function)
    {
        uksort($this->collection);
    }

    public function unserialize($serialized)
    {
        $this->collection = unserialize($serialized);
    }

    public function valid()
    {
        return next($this->collection);
    }
}

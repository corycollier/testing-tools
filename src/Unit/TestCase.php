<?php

namespace TestingTools\Unit;

use PHPUnit\Framework\TestCase;

class UnitTestCase extends TestCase
{
    /**
     * Gets a protected instance of a class property, for testing.
     *
     * @param  string $class The full class name (including namespace).
     * @param  string $name  The name of the property to get.
     *
     * @return ReflectionProperty
     */
    public function getProperty($class, $name)
    {
        $result = new \ReflectionProperty($class, $name);
        $result->setAccessible(true);
        return $result;
    }

    /**
     * Gets a protected instance of a class method, for testing.
     *
     * @param  string $class The full class name (including namespace).
     * @param  string $name  The name of the method to get.
     *
     * @return ReflectionMethod
     */
    public function getMethod($class, $name)
    {
        $result = new \ReflectionMethod($class, $name);
        $result->setAccessible(true);
        return $result;
    }

    /**
     * Shorthand method to get the property value for a given subject.
     *
     * @param  string $class The full class name (including namespace).
     * @param  string $name  The name of the property to get the value of.
     *
     * @return mixed
     */
    public function getPropertyValue($subject, $name)
    {
        $property = $this->getProperty(get_class($subject), $name);
        return $property->getValue($subject);
    }

    /**
     * Shorthand method to get the property value for a given subject.
     *
     * @param  string $class The full class name (including namespace).
     * @param  string $name  The name of the property to get the value of.
     *
     * @return UnitTestCase Returns UnitTestCase, for object-chaining.
     */
    public function setPropertyValue($subject, $name, $value)
    {
        $property = $this->getProperty(get_class($subject), $name);
        $property->setValue($subject, $value);
        return $this;
    }

}

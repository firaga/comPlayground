<?php
/**
 * Created by IntelliJ IDEA
 * User: jichen.zhou@eeoa.com
 * Date: 2021/7/6
 * Time: 8:17 下午
 */

namespace tests;


use ChildClass;
use PHPUnit\Framework\TestCase;

class InheritTest extends TestCase
{
    public function testInherit()
    {
        $obj = new ChildClass();
        $reflectionClass = new \ReflectionClass($obj);
        do {
            $properties = $reflectionClass->getProperties();
            $methods = $reflectionClass->getMethods();
            echo $reflectionClass->getName() . chr(10);
            foreach ($properties as $property) {
                $property->setAccessible(true);
                $name = $property->getName();
                $value = $property->getValue($obj);
                echo $name . chr(9) . $value . chr(10);
            }
        } while ($reflectionClass = $reflectionClass->getParentClass());
    }

    public function testClass()
    {
        $obj = new ChildClass();
//        var_dump($obj);
//        var_dump($obj->getPri());
        var_dump($obj->getPub());
        $this->assertEquals(1, 1,);
    }
}
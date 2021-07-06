<?php
/**
 * Created by IntelliJ IDEA
 * User: jichen.zhou@eeoa.com
 * Date: 2021/7/6
 * Time: 8:17 下午
 */

namespace tests;


use ParentClass;
use PHPUnit\Framework\TestCase;

class InheritTest extends TestCase
{
    public function testInherit()
    {
        $parent = new ParentClass();
        echo "here";
    }
}
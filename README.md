# go和php继承关系的总结

## php

### 属性

```
在继承的子类对象中可继承属性每一个类都包含(可能是对象变量表中只有一个变量),都可以访问,赋值,对象反射时可以通过break防止重复赋值

不可继承属性(私有属性)属于父类,可以通过继承的父类方法访问父类元素,父类方法属于父类,只是子类可以访问.
父类查找属性先在变量表中本身类的变量范围查找,例如私有属性返回父类的私有属性,可继承时返回共有的公有属性
变量可被子类继承时,变量的父类属性被屏蔽,属性变为全局属性
public时可被继承树中的各类均可访问,protect不可以被父类访问
```

### 方法

```
子类可以访问父类的方法,并不是子类拥有了父类方法
子类可以覆盖父类方法,此时属性访问范围变更为子类的属性范围
```

## go

### 属性

``` 
go的属性是组合/聚合的关系.php的继承时继承关系
子struct可以实现对父struct属性值的屏蔽,可以通过父struct名访问父属性

匿名组合可以直接访问属性,本质是语法糖;命名组合只能通过变量名访问
区别:
* 表现上没有区别,都可以实现对变量的继承和覆盖
```

### 方法

```
子struct可以访问父struct的方法,此时方法的访问范围在方法声明里已经限定为父struct的属性对象了.

区别:
* php的方法可以访问可继承的属性,本质上是可继承的属性值只有一份数据;go父struct不能访问子struct的数据,方法完全是组合进来的.
```

go模拟继承的主要障碍是:因为"继承"时没有实现父子"类"可继承属性值保持一致,所以在使用"继承"的方法时无法获取"子类"的属性.

## 测试代码

子类

```php
<?php
/**
 * Created by IntelliJ IDEA
 * Date: 2021/7/6
 * Time: 8:14 下午
 */

class ChildClass extends ParentClass
{
    private $pri = 2;
    protected $pro = 2;
    public $pub = 2;

    /**
     * @return int
     */
    public function getPri()
    {
//        return parent::getPri();
        return $this->pri;
    }

    /**
     * @param int $pri
     * @return $this|\ChildClass
     */
    public function setPri($pri)
    {
        $this->pri = $pri;
        return $this;
    }

    /**
     * @return int
     */
    public function getPro()
    {
        return $this->pro;
    }

    /**
     * @param int $pro
     * @return $this|\ChildClass
     */
    public function setPro($pro)
    {
        $this->pro = $pro;
        return $this;
    }

    /**
     * @return int
     */
    public function getPub()
    {
        return $this->pub;
    }

    /**
     * @param int $pub
     * @return $this|\ChildClass
     */
    public function setPub($pub)
    {
        $this->pub = $pub;
        return $this;
    }
}
```

父类:

```php
<?php
/**
 * Created by IntelliJ IDEA
 * User: jichen.zhou@eeoa.com
 * Date: 2021/7/6
 * Time: 8:14 下午
 */

class ParentClass
{
    private $pri = 1;
    protected $pro = 1;
    public $pub = 1;

    /**
     * @return int
     */
    public function getPri()
    {
        return $this->pri;
    }

    /**
     * //     * @param int $pri
     * //     * @return ParentClass
     */
    /**
     * @param $pri
     * @return $this
     */
    public function setPri($pri)
    {
        $this->pri = $pri;
        return $this;
    }

    /**
     * @return int
     */
    public function getPro()
    {
        return $this->pro;
    }

    /**
     * @param $pro
     * @return $this
     */
    public function setPro($pro)
    {
        $this->pro = $pro;
        return $this;
    }

    /**
     * @return int
     */
    public function getPub()
    {
        return $this->pub;
    }

    /**
     * @param $pub
     * @return $this
     */
    public function setPub($pub)
    {
        $this->pub = $pub;
        return $this;
    }
}
```

测试用例:

通过反射看对象的内部结构

```php
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
```

go的就不用写了...
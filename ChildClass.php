<?php
/**
 * Created by IntelliJ IDEA
 * User: jichen.zhou@eeoa.com
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
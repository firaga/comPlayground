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
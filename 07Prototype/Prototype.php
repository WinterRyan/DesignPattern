<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/20 12:01
 */
//1.构造函数不会执行
//2.浅拷贝和深拷贝
//3.final和clone
//4.必须是成员变量且是可变的引用对象类型才不会被拷贝,才可验证浅拷贝,所以使用demo类实例化为引用类型
interface IPrototype {
    public function shallowCopy();
    public function deepCopy();
}

class ConcretePrototype implements IPrototype
{
    private $_name;
    public function __construct($name)
    {
        var_dump("111111111111111");
        $this->_name = $name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }
    public function getName()
    {
        return $this->_name;
    }
    /**
     * 浅拷贝
     * */
    public function shallowCopy()
    {
        return clone $this;
    }
    /**
     * 深拷贝
     * */
    public function deepCopy()
    {
        $serialize_obj = serialize($this);
        $clone_obj = unserialize($serialize_obj);
        return $clone_obj;
    }
}

class Demo
{
    public $string;
}

class Client {
    public function shallow()
    {
        $demo = new Demo();
        $demo->string = "susan";
        $object_shallow_first = new ConcretePrototype($demo);
        $object_shallow_second = clone $object_shallow_first;

        var_dump($object_shallow_first->getName());
        var_dump($object_shallow_second->getName());

        $demo->string = "gag";
        var_dump($object_shallow_first->getName());
        var_dump($object_shallow_second->getName());
    }
    public function deep()
    {
        var_dump("this is deep using");
        $demo = new Demo();
        $demo->string = "hhh";
        $ConcretePrototype = new ConcretePrototype($demo);
        $copy = $ConcretePrototype->deepCopy();

        var_dump($ConcretePrototype->getName());
        var_dump($copy->getName());

        $demo->string = "kkk";
        var_dump($ConcretePrototype->getName());
        var_dump($copy->getName());
    }

}

$Client = new Client();
$Client->shallow();
$Client->deep();

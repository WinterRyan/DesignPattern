<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/22 15:47
 */
interface ITarget {
    public function request();
}

class Target implements ITarget {
    public function request()
    {
        var_dump("this is target doing");
    }
}

class Adaptee {
    public function doing()
    {
        var_dump("this is adaptee doing");
    }
}

//适配器肯定要实现ITarget,不一定要继承源目标(类适配器),
//当源目标有多个时,可以将其进行组合(对象适配器),
//只要能给出ITarget需要的东西即可!
class Adapter extends Adaptee implements ITarget {
    public function request()
    {
        $this->doing();
    }
}

class Client {
    public function test()
    {
        $target = new Target();
        $target->request();

        $adapter = new Adapter();
        $adapter->request();
    }
}

$Client = new Client();
$Client->test();
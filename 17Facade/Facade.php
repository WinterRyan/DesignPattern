<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/25 17:52
 */
namespace Facade;

class A {
    public function doA()
    {
        var_dump("this is A talking");
    }
}

class B {
    public function doB()
    {
        var_dump("this is B talking");
    }
}

class C {
    public function doC()
    {
        var_dump("this is C talking");
    }
}

class Facade {
    public function Aecho()
    {
        $a = new A();
        $a->doA();
    }

    public function Becho()
    {
        $b = new B();
        $b->doB();
    }
    
    public function Cecho()
    {
        $c = new C();
        $c->doC();
    }
}

class Client {
    public function test()
    {
        $facade = new Facade();
        $facade->Aecho();
        $facade->Cecho();
        $facade->Becho();
    }
}

$Client = new Client();
$Client->test();
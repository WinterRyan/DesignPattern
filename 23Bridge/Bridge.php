<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/12/10 15:44
 */
namespace Bridge;

interface Implementor {
    public function doSomething();
    public function doAnything();
}

class Implementor1 implements Implementor {
    public function doSomething()
    {
        var_dump("this is imp 1 do something");
    }

    public function doAnything()
    {
        var_dump("this is imp 1 do anything");
    }
}

class Implementor2 implements Implementor {
    public function doSomething()
    {
        var_dump("this is imp 2 do something");
    }

    public function doAnything()
    {
        var_dump("this is imp 2 do anything");
    }
}

abstract class Abstraction {
    private $imp;

    public function __construct(Implementor $implementor)
    {
        $this->imp = $implementor;
    }

    public function req()
    {
        $this->imp->doSomething();
    }

    public function getImp()
    {
        return $this->imp;
    }
}

class RedefineAbstraction extends Abstraction {
    public function __construct(Implementor $implementor)
    {
        parent::__construct($implementor);
    }

    public function req()
    {
        parent::req();
        parent::getImp()->doAnything();
    }
}

class Client {
    public function test()
    {
        $imp = new Implementor1();
        $re = new RedefineAbstraction($imp);
        $re->req();

        $imp2 = new Implementor2();
        $re2 = new RedefineAbstraction($imp2);
        $re2->req();
    }
}

$Client = new Client();
$Client->test();
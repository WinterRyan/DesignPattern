<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/22 11:45
 */

interface IStrategy {
    public function doing();
}

class Strategy1 implements IStrategy {
    public function doing()
    {
        var_dump("this is strategy 1 doing");
    }
}

class Strategy2 implements IStrategy {
    public function doing()
    {
        var_dump("this is strategy 2 doing");
    }
}

class Context {
    private $strategy;

    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function doAnything()
    {
        $this->strategy->doing();
    }
}

class Client {
    public function test()
    {
        $strategy1 = new Strategy1();
        $context = new Context($strategy1);
        $context->doAnything();

        $strategy2 = new Strategy2();
        $context->setStrategy($strategy2);
        $context->doAnything();
    }
}

$Client = new Client();
$Client->test();
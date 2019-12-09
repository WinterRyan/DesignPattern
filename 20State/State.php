<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/12/9 14:32
 */
namespace State;

abstract class State {
    protected $context;

    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    public abstract function handle1();

    public abstract function handle2();
}

class State1 extends State {
    public function handle1()
    {
        var_dump("this is  state 1 running handle1");
    }

    public function handle2()
    {
        $this->context->setCurrentState(new State2());
        $this->context->handle2();
    }
}

class State2 extends State {
    public function handle1()
    {
        $this->context->setCurrentState(new State1());
        $this->context->handle1();
    }

    public function handle2()
    {
        var_dump("this is state 2 running handle2");
    }
}
class Context {
    private $currentState;

    public function getCurrentState()
    {
        return $this->currentState;
    }

    public function setCurrentState(State $state)
    {
        $this->currentState = $state;
        //切换state中的状态
        $this->currentState->setContext($this);
    }

    public function handle1()
    {
        $this->currentState->handle1();
    }

    public function handle2()
    {
        $this->currentState->handle2();
    }
}

class Client {
    public function test()
    {
        $context = new Context();
        $context->setCurrentState(new State1());
        $context->handle1();
        $context->handle2();
        $context->handle1();
    }
}

$Client = new Client();
$Client->test();
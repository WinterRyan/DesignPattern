<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/22 11:07
 */

abstract class Component {
    public abstract function oprate();
}

class ConcreteComponent extends Component {
    public function oprate()
    {
        var_dump("this is concrete component running");
    }
}

abstract class Decorator extends Component {
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }
}

class DecoratorA extends Decorator {
    private function before()
    {
        var_dump("this is decorator A before ");
    }

    public function oprate()
    {
        $this->before();
        $this->component->oprate();
    }
}

class DecoratorB extends Decorator {
    private function after()
    {
        var_dump("this is decorator B after ");
    }

    public function oprate()
    {
        $this->component->oprate();
        $this->after();
    }
}

class Client {
    public function test()
    {
        $ConcreteComponent = new ConcreteComponent();
        $decoratorA = new DecoratorA($ConcreteComponent);
        $decoratorA->oprate();

        $decoratorB = new DecoratorB($ConcreteComponent);
        $decoratorB->oprate();
    }
}

$Client = new Client();
$Client->test();
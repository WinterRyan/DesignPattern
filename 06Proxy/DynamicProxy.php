<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/12 18:20
 */

interface ISubject {
    public function dosomething($string);
}

class RealSubject implements ISubject {
    public function dosomething($string)
    {
        var_dump("this is real subject doing ".$string);
    }

    public function dosomeelse($string)
    {
        var_dump("some else doing ".$string);
    }
}

interface IAdvice {
    public function exec();
}

class BeforeAdvice implements IAdvice {
    public function exec()
    {
        var_dump("this is before advice running");
    }
}

class MyInvocation {
    private $target = null;

    public function __construct(Object $target)
    {
        $this->target = $target;
    }

    public function __call($name, $arguments)
    {
        $class = new ReflectionClass($this->target);
        $method = $class->getMethod($name);
        $method->invoke($this->target, $arguments[0]);
    }
}

//将Advice和invocation结合
class SubjectDynamicProxy {
    public static function newProxyInstance(ISubject $subject)
    {
        $BeforeAdvice = new BeforeAdvice();
        $BeforeAdvice->exec();
        return new MyInvocation($subject);
    }
}

class Client {
    public function test()
    {
        $RealSubject = new RealSubject();
        $proxy = SubjectDynamicProxy::newProxyInstance($RealSubject);
        $proxy->dosomething("wking");
        $proxy->dosomeelse("ggg");
    }
}

$Client = new Client();
$Client->test();

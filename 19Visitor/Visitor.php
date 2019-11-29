<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/28 17:49
 */
namespace Visitor;

abstract class Element {
    public abstract function doSomething();
    public abstract function accept(IVisitor $visitor);
}

class Element1 extends Element {
    public function doSomething()
    {
        var_dump("this is element 1 doing");
    }

    public function accept(IVisitor $visitor)
    {
        $visitor->visit($this);
    }
}

class Element2 extends Element {
    public function doSomething()
    {
        var_dump("this is element 2 doing");
    }

    public function accept(IVisitor $visitor)
    {
        $visitor->visit($this);
    }
}

interface IVisitor {
    public function visit(Element $element);
}

class Visitor implements IVisitor {
    public function visit(Element $element)
    {
        $element->doSomething();
        var_dump("this is visitor doing");
    }
}

class Client {
    public function test()
    {
        $visitor = new Visitor();
        $ele1 = new Element1();
        $ele1->accept($visitor);

        $ele2 = new Element2();
        $ele2->accept($visitor);
    }
}

$Client = new Client();
$Client->test();
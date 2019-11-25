<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/25 16:26
 */
namespace Observer;

abstract class Subject {
    private $observerList;

    public function addObserver(IObserver $observer)
    {
        $this->observerList[get_class($observer)] = $observer;
    }

    public function removeObserver(IObserver $observer)
    {
        unset($this->observerList[get_class($observer)]);
    }

    public function notifyObserver()
    {
        foreach ($this->observerList as $k=>$observer) {
            $observer->update();
        }
    }
}

class ConcreteSuject extends Subject {
    public function doSomething()
    {
        var_dump("this is concrete subject doing");
        $this->notifyObserver();
    }
}

interface IObserver {
    public function update();
}

class Observer1 implements IObserver {
    public function update()
    {
        var_dump("this is observer1 running");
    }
}

class Observer2 implements IObserver {
    public function update()
    {
        var_dump("this is observer2 running");
    }
}

class Client {
    public function test()
    {
        $subject = new ConcreteSuject();
        $observer1 = new Observer1();
        $observer2 = new Observer2();
        $subject->addObserver($observer1);
        $subject->addObserver($observer2);
        $subject->doSomething();

        $subject->removeObserver($observer1);
        $subject->doSomething();
    }
}

$Client = new Client();
$Client->test();
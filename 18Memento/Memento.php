<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/26 14:41
 */
namespace Memento;

class Originator {
    private $status;

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function createMemento()
    {
        return new Memento($this->status);
    }

    public function restoreMemento(Memento $memento)
    {
        $this->setStatus($memento->getStatus());
    }
}

class Memento {
    private $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}

class CareTaker {
    private $memento;

    public function setMemento(Memento $memento)
    {
        $this->memento = $memento;
    }

    public function getMemento()
    {
        return $this->memento;
    }
}

class Client {
    public function test()
    {
        $originator = new Originator();
        $originator->setStatus("wking");
        $caretaker = new CareTaker();
        $caretaker->setMemento($originator->createMemento());
        var_dump($originator->getStatus());
        $originator->setStatus("liutao");
        var_dump($originator->getStatus());
        $originator->restoreMemento($caretaker->getMemento());
        var_dump($originator->getStatus());
    }
}

$Client = new Client();
$Client->test();
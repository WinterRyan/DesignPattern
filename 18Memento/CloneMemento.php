<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/27 18:16
 */

namespace CloneMemento;

class Originator {
    private $back;
    private $status;

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function createMemento($oid)
    {
        $serial_obj = serialize($this);
        $this->back[$oid] = unserialize($serial_obj);
    }

    public function restoreMemento($oid)
    {
        $this->setStatus($this->back[$oid]->getStatus());
    }
}

class Client {
    public function test()
    {
        $ori = new Originator();
        $ori->setStatus("wking");
        var_dump($ori->getStatus());
        $ori->createMemento("001");

        $ori->setStatus("liutao");
        var_dump($ori->getStatus());
        $ori->createMemento("002");

        $ori->setStatus("jjj");
        var_dump($ori->getStatus());

        $ori->restoreMemento("002");
        var_dump("002的状态: ".$ori->getStatus());

        $ori->restoreMemento("001");
        var_dump("001的状态: ".$ori->getStatus());
    }
}

$Client = new Client();
$Client->test();

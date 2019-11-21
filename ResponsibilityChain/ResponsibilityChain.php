<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/21 15:45
 */
abstract class Handler {
    private $nextHandler;

    public final function handleMessage(Request $request)
    {
        if ($request->getLevel() == $this->getHandleLevel()) {
            $this->exec($request);
        } else {
            if ($this->nextHandler) {
                $this->nextHandler->handleMessage($request);
            } else {
                var_dump("no handler to do");
            }
        }
    }

    public function setNext(Handler $handler)
    {
        $this->nextHandler = $handler;
    }

    protected abstract function getHandleLevel();

    protected abstract function exec(Request $request);
}

class Handler1 extends Handler {
    protected function getHandleLevel()
    {
        return 1;
    }

    protected function exec($request)
    {
        $res = $request->getThing();
        var_dump("this is 111 doing ".$res);
    }
}

class Handler2 extends Handler {
    protected function getHandleLevel()
    {
        return 2;
    }

    protected function exec($request)
    {
        $res = $request->getThing();
        var_dump("this is 222 doing ".$res);
    }
}

class Request {
    private $level;
    private $thing;

    public function __construct($thing, $level)
    {
        $this->thing = $thing;
        $this->level = $level;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getThing()
    {
        return $this->thing;
    }
}

class Chain {
    public function exec(Request $request)
    {
        //make chain
        $Handler1 = new Handler1();
        $Handler2 = new Handler2();
        $Handler1->setNext($Handler2);
        return $Handler1->handleMessage($request);
    }
}

class Client {
    public function test()
    {
        $Chain = new Chain();
        $request1 = new Request("wanglihong", 1);
        $Chain->exec($request1);
        $request2 = new Request("hanhong", 2);
        $Chain->exec($request2);
    }
}

$Client = new Client();
$Client->test();


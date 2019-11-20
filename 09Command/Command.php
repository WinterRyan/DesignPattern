<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/11/20 18:15
 */

abstract class Receiver {
    public abstract function dosomething();
}

class Receiver1 extends Receiver {
    public function dosomething()
    {
        var_dump("this is Receiver 1 doing");
    }
}

class Receiver2 extends Receiver {
    public function dosomething()
    {
        var_dump("this is Receiver 2 doing");
    }
}

abstract class Command {
    public abstract function execute();
}

class Command1 extends Command {
    private $reveiver;

    public function __construct()
    {
        $this->reveiver = new Receiver1();
    }

    public function execute()
    {
        $this->reveiver->dosomething();
    }
}

class Command2 extends Command {
    private $reveiver;

    public function __construct()
    {
        $this->reveiver = new Receiver2();
    }

    public function execute()
    {
        $this->reveiver->dosomething();
    }
}

class Invoker {
    private $command;

    public function setCommand(Command $command)
    {
        $this->command = $command;
    }

    public function action()
    {
        $this->command->execute();
    }
}

class Client {
    public function test()
    {
        $command = new Command1();
        $Invoker = new Invoker();
        $Invoker->setCommand($command);
        $Invoker->action();

        $command = new Command2();
        $Invoker = new Invoker();
        $Invoker->setCommand($command);
        $Invoker->action();
    }
}

$client = new Client();
$client->test();

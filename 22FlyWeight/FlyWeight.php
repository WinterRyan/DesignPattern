<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/12/9 16:24
 */
namespace FlyWeight;

abstract class FlyWeight {
    private $intrinsic;
    protected $extrinsic;

    public function __construct($extrinsic)
    {
        $this->extrinsic = $extrinsic;
    }

    public abstract function oprate();

    public function getIntrinsic()
    {
        return $this->intrinsic;
    }

    public function setIntrinsic($intrinsic)
    {
        $this->intrinsic = $intrinsic;
    }
}

class FlyWeight1 extends FlyWeight {
    public function oprate()
    {
        var_dump("this is flyweight 1 running");
    }
}

class FlyWeight2 extends FlyWeight {
    public function oprate()
    {
        var_dump("this is flyweight 2 running");
    }
}

class FlyWeightFactory {
    private $pool;

    public function getFlyWeight($extrinsic)
    {
        $flyweight = null;
        if (isset($this->pool[$extrinsic])) {
            $flyweight = $this->pool[$extrinsic];
            var_dump("existing...");
        } else {
            $flyweight = new FlyWeight1($extrinsic);
            $this->pool[$extrinsic] = $flyweight;
            var_dump("creating...");
        }
        return $flyweight;
    }
}

class Client {
    public function test()
    {
        $factory = new FlyWeightFactory();
        $flyweight = $factory->getFlyWeight('aaa');
        $flyweight->oprate();
        $flyweight = $factory->getFlyWeight('aaa');
        $flyweight->oprate();
    }
}

$Client = new Client();
$Client->test();


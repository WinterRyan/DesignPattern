<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 17:17
 */

namespace A05;


class Director
{
    private $benzBuilder;

    private $bmwBuilder;

    public function __construct()
    {
        $this->benzBuilder = new BenzBuilder();
        $this->bmwBuilder = new BMWBuilder();
    }

    public function getABenzModel()
    {
        $sequence = ['start', 'alarm', 'stop'];
        $this->benzBuilder->setSequence($sequence);
        return $this->benzBuilder->getCarModel();
    }

    public function getBBenzModel()
    {
        $sequence = ['start', 'engine', 'alarm', 'stop'];
        $this->benzBuilder->setSequence($sequence);
        return $this->benzBuilder->getCarModel();
    }

    public function getABMWModel()
    {
        $sequence = ['start', 'stop'];
        $this->bmwBuilder->setSequence($sequence);
        return $this->bmwBuilder->getCarModel();
    }

    public function getBBMWModel()
    {
        $sequence = ['start', 'alarm', 'engine', 'stop'];
        $this->bmwBuilder->setSequence($sequence);
        return $this->bmwBuilder->getCarModel();
    }

}
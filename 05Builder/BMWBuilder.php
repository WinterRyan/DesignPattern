<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 17:14
 */

namespace A05;


class BMWBuilder extends CarBuilder
{
    private $bmwModel;

    public function __construct()
    {
        $this->bmwModel = new BMWModel();
    }

    public function setSequence($sequence)
    {
        $this->bmwModel->setSequence($sequence);
    }

    public function getCarModel()
    {
        return $this->bmwModel;
    }

}
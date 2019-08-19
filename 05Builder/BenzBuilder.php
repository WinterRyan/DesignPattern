<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 17:11
 */

namespace A05;


class BenzBuilder extends CarBuilder
{
    private $benzModel;

    public function __construct()
    {
        $this->benzModel = new BenzModel();
    }

    public function setSequence($sequence)
    {
        $this->benzModel->setSequence($sequence);
    }

    public function getCarModel()
    {
        return $this->benzModel;
    }

}
<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/7/29 18:29
 */
include 'AbstractHumanFactory.php';
include 'WhiteHuman.php';
include 'YellowHuman.php';
include "BlackHuman.php";


class HumanFactory extends AbstractHumanFactory
{
    public function createHuman($className)
    {
        return new $className();
    }

}


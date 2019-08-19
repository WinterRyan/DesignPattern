<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/1 17:33
 */
namespace A03;

abstract class AbstractYellowHuman implements Human
{
    public function getColor()
    {
        var_dump('this is yellow color');
    }

    public function talk()
    {
        var_dump('this is yellow talk');
    }

}
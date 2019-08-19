<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/1 17:30
 */
namespace A03;
abstract class AbstractBlackHuman implements Human
{
    public function getColor()
    {
        var_dump('this is black color');
    }

    public function talk()
    {
        var_dump('this is black talk');
    }

}
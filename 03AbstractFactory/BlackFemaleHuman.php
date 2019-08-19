<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/1 17:35
 */
namespace A03;

class BlackFemaleHuman extends AbstractBlackHuman
{
    public function getColor()
    {
        var_dump('this is black female color');
    }

    public function talk()
    {
        var_dump('this is black female talk');
    }

    public function getSex()
    {
        var_dump('this is black female human');
    }

}
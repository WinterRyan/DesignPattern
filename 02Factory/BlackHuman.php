<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/7/29 18:24
 */


class BlackHuman implements Human
{
    public function getColor()
    {
        var_dump("this is black human color");
    }

    public function talk()
    {
        var_dump("this is black human talk");
    }

}
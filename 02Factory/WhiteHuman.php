<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/7/29 18:25
 */
include 'Human.php';

class WhiteHuman implements Human
{
    public function getColor()
    {
        var_dump("this is white human color");
    }

    public function talk()
    {
        var_dump("this is white human talk");
    }

}
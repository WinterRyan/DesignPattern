<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 10:58
 */

namespace A04;


class H2Hummer extends HummerModel
{
    protected function start()
    {
        var_dump("this is H2 start");
    }

    protected function alarm()
    {
        var_dump("H2 can not alarm");
    }

    protected function silence()
    {
        var_dump("this is H2 silence");
    }

    protected function isAlarm()
    {
        return false;
    }

    protected function stop()
    {
        var_dump("this is H2 stop");
    }

}
<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 10:56
 */

namespace A04;


class H1Hummer extends HummerModel
{
    protected function start()
    {
        var_dump("this is H1 start");
    }

    protected function alarm()
    {
        var_dump("this is H1 alarm");
    }

    protected function silence()
    {
        var_dump("H1 can not silence");
    }

    protected function isAlarm()
    {
        return true;
    }

    protected function stop()
    {
        var_dump("this is H1 stop");
    }



}
<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 17:08
 */

namespace A05;


class BMWModel extends CarModel
{
    protected function start()
    {
        var_dump("this is bmw start");
    }

    protected function stop()
    {
        var_dump("this is bmw stop");
    }

    protected function alarm()
    {
        var_dump("this is bmw alarm");
    }

    protected function engine()
    {
        var_dump("this is bmw engine");
    }

}
<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 17:06
 */

namespace A05;


class BenzModel extends CarModel
{
    protected function start()
    {
        var_dump("this is benz start");
    }

    protected function stop()
    {
        var_dump("this is benz stop");
    }

    protected function alarm()
    {
        var_dump("this is benz alarm");
    }

    protected function engine()
    {
        var_dump("this is benz engine");
    }

}
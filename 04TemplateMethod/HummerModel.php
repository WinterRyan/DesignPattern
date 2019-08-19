<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 10:52
 */

namespace A04;


abstract class HummerModel
{
    protected abstract function start();

    protected abstract function stop();

    protected abstract function alarm();

    protected abstract function silence();

    protected abstract function isAlarm();

    public final function run(){
        $this->start();
        if($this->isAlarm()){
            $this->alarm();
        }else{
            $this->silence();
        }
        $this->stop();
    }

}
<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 16:57
 */

namespace A05;


abstract class CarModel
{
    private $sequence;

    protected abstract function start();

    protected abstract function stop();

    protected abstract function alarm();

    protected abstract function engine();

    public final function run(){
        if($this->sequence){
            foreach ($this->sequence as $actionName){
                switch ($actionName) {
                    case "start":
                        $this->start();
                        break;
                    case "stop":
                        $this->stop();
                        break;
                    case "alarm":
                        $this->alarm();
                        break;
                    case "engine":
                        $this->engine();
                        break;
                    default:
                        var_dump("this is a bug");
                        break;
                }
            }
        }
    }

    public final function setSequence($sequence){
        $this->sequence = $sequence;
    }

}
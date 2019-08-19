<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/1 17:42
 */
namespace A03;

class MaleFactory implements HumanFactory
{
    public function createBlackHuman()
    {
        return new BlackMaleHuman();
    }

    public function createWhiteHuman()
    {
        return new WhiteMaleHuman();
    }

    public function createYellowHuman()
    {
        return new YellowMaleHuman();
    }

}
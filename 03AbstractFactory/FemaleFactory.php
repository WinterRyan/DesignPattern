<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/1 17:41
 */
namespace A03;
class FemaleFactory implements HumanFactory
{
    public function createBlackHuman()
    {
        return new BlackFemaleHuman();
    }

    public function createWhiteHuman()
    {
        return new WhiteFemaleHuman();
    }

    public function createYellowHuman()
    {
        return new YellowFamaleHuman();
    }

}
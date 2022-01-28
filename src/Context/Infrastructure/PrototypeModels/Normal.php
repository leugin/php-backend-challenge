<?php

namespace App\Context\Infrastructure\PrototypeModels;

use App\Context\Domain\Product;

class Normal extends Product
{


    const MIN_QUALITY = 1;
    const REDUCE_QUALITY_IS_DATE_PASS = 2;
    /**
     * @override 
     * */
    public function tick()
    {

        $this->updateSellIn();
        $this->updateQuality();

        return $this;
    }

    /**
     * update the quality
     */
    private function updateQuality()
    {
        if ($this->quality <= self::MIN_QUALITY) {
            $this->quality = 0;
            return;
        }

        if ($this->isDatePass()) {
            $this->quality =  $this->quality - self::REDUCE_QUALITY_IS_DATE_PASS;
            return;
        }

        $this->quality--;
    }

    /**
     * update the sellIn
     */
    private function updateSellIn()
    {
        $this->sellIn--;
    }

    /**
     * check is date pass
     * @return bool
     */
    private function isDatePass(): bool
    {
        return $this->sellIn < 0;
    }
}

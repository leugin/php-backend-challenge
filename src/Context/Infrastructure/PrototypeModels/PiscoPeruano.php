<?php

namespace App\Context\Infrastructure\PrototypeModels;

use App\Context\Domain\Product;


class PiscoPeruano extends Product
{

    const REMAINING_DATYS_FIRST = 10;
    const REMAINING_DATYS_SECOND = 3;
    const MAX_QUALITY = 50;

    public function tick()
    {

        $this->updateQuality();
        $this->updateSellIn();

    }

    private function updateQuality()
    {


        if ($this->sellIn <= self::REMAINING_DATYS_FIRST) {
            $this->quality++;
        }
        if ($this->sellIn <= self::REMAINING_DATYS_SECOND) {
            $this->quality++;
        }

        if ($this->quality >= self::MAX_QUALITY) {
            $this->quality = self::MAX_QUALITY;
        }
    }

    private function updateSellIn()
    {
        $this->sellIn--;
    }
}

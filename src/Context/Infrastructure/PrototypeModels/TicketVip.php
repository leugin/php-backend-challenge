<?php

namespace App\Context\Infrastructure\PrototypeModels;

use App\Context\Domain\Product;

class TicketVip extends Product {

    const IS_PASS = 0;
    const MIN_QUALITY = 0;
    const MAX_QUALITY = 50;

    const REMAINING_DATYS_FIRST = 10;
    const REMAINING_DATYS_SECOND = 5;
    
    public function tick()
    {

        $this->updateQuality();
        $this->updateSellIn();

    }

    private function updateQuality()
    {
        if($this->sellIn <= self::IS_PASS){
            $this->quality = self::MIN_QUALITY;
            return;
        }
        $this->quality++;  

        if($this->sellIn <= self::REMAINING_DATYS_FIRST) {
            $this->quality ++;
        }


        if($this->sellIn <= self::REMAINING_DATYS_SECOND) {
            $this->quality ++;
        }

        if($this->quality >= self::MAX_QUALITY){
            $this->quality = self::MAX_QUALITY;
        }
        
    }

    private function updateSellIn()
    {
        $this->sellIn--;
    }
}
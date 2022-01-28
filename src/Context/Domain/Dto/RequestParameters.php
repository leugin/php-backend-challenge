<?php

namespace App\Context\Domain\Dto;


class RequestParameters {

    private string  $name;

    private int $quality;

    private int $sellIn;


    /**
     * @param string $name the unique name of product
     * @param int $quality the quality of product
     * @param int the remains day of sell 
     */
    private function __construct(
        string $name,
        int $quality, 
        int $sellIn

     )
     {
         $this->name = $name;
         $this->quality = $quality;
         $this->sellIn = $sellIn;
     }

    /**
     * @param string $name the unique name of product
     * @param int $quality the quality of product
     * @param int the remains day of sell 
     * @return self
     */
     public static function makeByParameters(
         string $name, 
         int $quality, 
         int $sellIn
         ){
             return new self(
                 $name, 
                 $quality, 
                 $sellIn
                );
    }

     

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of quality
     */ 
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Get the value of sellIn
     */ 
    public function getSellIn()
    {
        return $this->sellIn;
    }
}
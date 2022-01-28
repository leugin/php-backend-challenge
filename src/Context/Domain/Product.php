<?php

namespace App\Context\Domain;

use App\Context\Domain\Contracts\Tickeable;



abstract class Product implements Tickeable {

    /** Nombre del producto */
    public string $name;

    /**Calidad del producto */
    public  int $quality;

    /** Dias restantes para vender del producto */
    public int $sellIn;

    
    /**
     * @param $name nombre del productos
     * @param $quality calidad del product
     * @param $sellIn dias restantes para la venta
     */
    public function __construct(
        string $name,
        int $quality , 
        int $sellIn
    )
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    

 
 
}
<?php

namespace App;

use App\Context\Domain\Contracts\ProductPrototypeFactory;
use App\Context\App;

/**
 * 
 * Main  class
 * 
 * @param static $instance App instance
 * @param ProductPrototypeFactory $factory the factory
 */
class VillaPeruana
{ 

      /**
     * Factory of productos
     * @param string $name the unique name of product
     * @param int $quality the quality of product
     * @param int $sellIn the remain day of sell
     */
    public static function of($name, $quality, $sellIn) {
      
        return App::instance()->make($name, $quality, $sellIn);
    }
 
}

<?php

namespace App\Context;

use App\Context\Domain\Contracts\ProductPrototypeFactory;
use App\Context\Domain\Dto\RequestParameters;
use App\Context\Infrastructure\PrototypeFactories\SwitchProductFactory;

class App {

    private ProductPrototypeFactory $factory;
    
    private static $instance;

    private function __construct()
    {
        $this->factory = new SwitchProductFactory();
    }

    /** 
     * Singleton method
     * @return self
    */
    public static function instance()
    {
        if (! isset( self::$instance ) ) {
        
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    public function make($name, $quality, $sellIn){
           /**@var  RequestParameters  $params */
           $params = RequestParameters::makeByParameters($name, $quality, $sellIn);
        
           /**@var  ProductPrototypeFactory  $factory */        
           $factory = self::instance()->factory;
   
           /**@var  Product  $model */        
           return $factory->make($params);
    }
}
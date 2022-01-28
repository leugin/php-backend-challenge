<?php

namespace App;

use App\Context\Application\UseCase\CreateProductByNameUseCase;
use App\Context\Domain\Contracts\ProductPrototypeFactory;
use App\Context\Domain\Dto\RequestParameters;
use App\Context\Infrastructure\PrototypeFactories\SwitchProductFactory;


/**
 * 
 * Main  class
 * 
 * @param static $instance App instance
 * @param ProductPrototypeFactory $factory the factory
 */
class VillaPeruana
{ 

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
        if (! isset( VillaPeruana::$instance ) ) {
        
            VillaPeruana::$instance = new self();
        }
        
        return VillaPeruana::$instance;
    }

    /**
     * Factory of productos
     * @param string $name the unique name of product
     * @param int $quality the quality of product
     * @param int $sellIn the remain day of sell
     */
    public static function of($name, $quality, $sellIn) {
    
        /**@var  RequestParameters  $params */
        $params = RequestParameters::makeByParameters($name, $quality, $sellIn);
        
        /**@var  ProductPrototypeFactory  $factory */        
        $factory = VillaPeruana::instance()->factory;

        /**@var  Product  $model */        
        $model = $factory->make($params);
        
        return $model;
    }
 
}

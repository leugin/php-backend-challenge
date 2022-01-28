<?php

namespace App\Context\Infrastructure\PrototypeFactories;

use App\Context\Domain\Contracts\ProductPrototypeFactory;
use App\Context\Domain\Contracts\Tickeable;
use App\Context\Domain\Dto\RequestParameters;
use App\Context\Infrastructure\PrototypeModels\Cafe;
use App\Context\Infrastructure\PrototypeModels\Normal;
use App\Context\Infrastructure\PrototypeModels\PiscoPeruano;
use App\Context\Infrastructure\PrototypeModels\TicketVip;
use App\Context\Infrastructure\PrototypeModels\Tumi;

class SwitchProductFactory implements ProductPrototypeFactory
{


    /**
     * @param RequestParameters $requestParameters the params
     * @return PiscoPeruano|TicketVip|TUMI_ORO_NOCHE|Normal
     */
    public function make(RequestParameters $requestParameters): Tickeable
    {

        $className = $this->selectTheInstanceClassByName($requestParameters->getName());

        return new $className(
            $requestParameters->getName(),
            $requestParameters->getQuality(),
            $requestParameters->getSellIn()
        );
    }

    /**
     * @param string $nameOfProduct the name of product
     * @return string|class
     */
    private function selectTheInstanceClassByName(string $nameOfProduct)
    {

        switch ($nameOfProduct) {
            case self::PISCO_PERUANO:
                return  PiscoPeruano::class;

            case self::VIP_TICKET_PICK_FLOID:
                return TicketVip::class;

            case self::TUMI_ORO_NOCHE:
                return  Tumi::class;

            case self::CAFE:
                return  Cafe::class;

            default:
                return Normal::class;
        }
    }
}

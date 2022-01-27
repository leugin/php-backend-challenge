<?php

namespace App;

class VillaPeruana
{
    public $name;

    public $quality;

    public $sellIn;
    
    const PISCO_PERUANO = 'Pisco Peruano';
    const VIP_TICKET_PICK_FLOID = 'Ticket VIP al concierto de Pick Floid';
    const TUMI_ORO_NOCHE = 'Tumi de Oro Moche';

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name != self::PISCO_PERUANO  and $this->name != self::VIP_TICKET_PICK_FLOID) {
            if ($this->quality > 0) {
                if ($this->name != self::TUMI_ORO_NOCHE) {
                    $this->quality = $this->quality - 1;
                }
            }
        } else {
            if ($this->quality < 50) {
                $this->quality = $this->quality + 1;

                if ($this->name == self::VIP_TICKET_PICK_FLOID) {
                    if ($this->sellIn < 11) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                    if ($this->sellIn < 6) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                }
            }
        }

        if ($this->name != self::TUMI_ORO_NOCHE) {
            $this->sellIn = $this->sellIn - 1;
        }

        if ($this->sellIn < 0) {
            if ($this->name != self::PISCO_PERUANO) {
                if ($this->name != self::VIP_TICKET_PICK_FLOID) {
                    if ($this->quality > 0) {
                        if ($this->name != self::TUMI_ORO_NOCHE) {
                            $this->quality = $this->quality - 1;
                        }
                    }
                } else {
                    $this->quality = $this->quality - $this->quality;
                }
            } else {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
        }
    }
}

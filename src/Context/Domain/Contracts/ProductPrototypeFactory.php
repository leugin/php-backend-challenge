<?php

namespace App\Context\Domain\Contracts;


use App\Context\Domain\Dto\RequestParameters;

interface ProductPrototypeFactory {

        
    const PISCO_PERUANO = 'Pisco Peruano';
    const VIP_TICKET_PICK_FLOID = 'Ticket VIP al concierto de Pick Floid';
    const TUMI_ORO_NOCHE = 'Tumi de Oro Moche';
    const CAFE = 'Café Altocusco';
    
    public function make(RequestParameters $name):Tickeable;

}
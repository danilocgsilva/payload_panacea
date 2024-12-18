<?php

namespace Danilocgsilva\PayloadPanacea;

use Danilocgsilva\PayloadPanacea\Entity\Payload;

class PayloadAsArray
{
    public function __construct(private Payload $payload) {}

    public function getArray(): array
    {
        $returnedArray = [];
        foreach ($this->payload->getFields() as $field) {
            $returnedArray[$field->getName()] = $field->getValue();
        }
        
        return $returnedArray;
    }
}

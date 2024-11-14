<?php

namespace Danilocgsilva\PayloadPanacea\Tests;

use Danilocgsilva\PayloadPanacea\Entity\Field;
use Danilocgsilva\PayloadPanacea\Entity\Payload;
use Danilocgsilva\PayloadPanacea\PayloadAsArray;
use PHPUnit\Framework\TestCase;

class PayloadAsArrayTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public function testArrayConvertion(): void
    {
        $payload = new Payload();
        $payloadAsArray = new PayloadAsArray($payload);
        $this->assertCount(0, $payloadAsArray->getArray());
    }

    public function testArrayConvertionOneField(): void
    {
        $field1 = new Field();
        $field1->setName("address");
        $field1->setValue("Roograts Street");

        $payload = new Payload();
        $payload->addField($field1);

        $payloadAsArray = new PayloadAsArray($payload);
        $this->assertCount(1, $payloadAsArray->getArray());
    }

    public function testArrayConvertionFieldIsKey(): void
    {
        $fieldName = "address";
        $fieldValue = "Roograts Street";
        
        $field1 = new Field();
        $field1->setName($fieldName);
        $field1->setValue($fieldValue);

        $payload = new Payload();
        $payload->addField($field1);

        $payloadAsArray = new PayloadAsArray($payload);
        $fields = $payloadAsArray->getArray();

        $field = $fields[$fieldName];

        $this->assertIsString($field);
    }
}

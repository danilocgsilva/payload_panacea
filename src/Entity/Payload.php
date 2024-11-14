<?php

namespace Danilocgsilva\PayloadPanacea\Entity;

use Danilocgsilva\PayloadPanacea\Repository\PayloadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayloadRepository::class)]
class Payload
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'payloads')]
    private ?Field $fields = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFields(): ?Field
    {
        return $this->fields;
    }

    public function setFields(?Field $fields): static
    {
        $this->fields = $fields;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WaterHeaterRepository")
 */
class WaterHeater
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champs requis")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Consumption", inversedBy="waterHeater")
     * @ORM\JoinColumn(nullable=false)
     */
    private $consumption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getConsumption(): ?Consumption
    {
        return $this->consumption;
    }

    public function setConsumption(?Consumption $consumption): self
    {
        $this->consumption = $consumption;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StillWaterBottleRepository")
 */
class StillWaterBottle
{
    const BRANDWATER = [
        'Evian' => 'evian',
        'Cristaline' => 'cristalline',
        'Volvic' => 'volvic',
        'Vittel' => 'vittel',
        'Hépar' => 'hepar',
        'Coumayeur' => 'courmayeur',
    ];

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
    private $literPerWeek;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $waterBrand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Consumption", inversedBy="stillWaterBottle")
     */
    private $consumption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLiterPerWeek(): ?int
    {
        return $this->literPerWeek;
    }

    public function setLiterPerWeek(int $literPerWeek): self
    {
        $this->literPerWeek = $literPerWeek;

        return $this;
    }

    public function getWaterBrand(): ?string
    {
        return $this->waterBrand;
    }

    public function setWaterBrand(string $waterBrand): self
    {
        $this->waterBrand = $waterBrand;

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

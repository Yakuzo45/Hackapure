<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StillWaterBottleRepository")
 */
class StillWaterBottle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $literPerWeek;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $waterBrand;

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
}

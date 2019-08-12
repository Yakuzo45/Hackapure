<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SparkWaterBottleRepository")
 */
class SparkWaterBottle
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
    private $litrePerWeek;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $waterBrand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLitrePerWeek(): ?int
    {
        return $this->litrePerWeek;
    }

    public function setLitrePerWeek(int $litrePerWeek): self
    {
        $this->litrePerWeek = $litrePerWeek;

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

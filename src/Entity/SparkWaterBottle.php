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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $LPerWeek;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $waterBrand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLPerWeek(): ?int
    {
        return $this->LPerWeek;
    }

    public function setLPerWeek(?int $LPerWeek): self
    {
        $this->LPerWeek = $LPerWeek;

        return $this;
    }

    public function getWaterBrand(): ?string
    {
        return $this->waterBrand;
    }

    public function setWaterBrand(?string $waterBrand): self
    {
        $this->waterBrand = $waterBrand;

        return $this;
    }
}

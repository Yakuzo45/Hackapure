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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $LperWeek;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $waterBrand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLperWeek(): ?int
    {
        return $this->LperWeek;
    }

    public function setLperWeek(?int $LperWeek): self
    {
        $this->LperWeek = $LperWeek;

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

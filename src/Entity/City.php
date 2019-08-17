<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="inseecommune")
     */
    private $inseeNumber;

    /**
     * @ORM\Column(type="string", length=255, name="nomcommune")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="quartier")
     */
    private $district;

    /**
     * @ORM\Column(type="string", length=255, name="nomreseau")
     */
    private $installationName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="debutalim")
     */
    private $startDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="cdreseau")
     */
    private $cdreseau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInseeNumber(): ?int
    {
        return $this->inseeNumber;
    }

    public function setInseeNumber(int $inseeNumber): self
    {
        $this->inseeNumber = $inseeNumber;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(?string $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getInstallationName(): ?string
    {
        return $this->installationName;
    }

    public function setInstallationName(string $installationName): self
    {
        $this->installationName = $installationName;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(?string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getCdreseau(): ?string
    {
        return $this->cdreseau;
    }

    public function setCdreseau(?string $cdreseau): self
    {
        $this->cdreseau = $cdreseau;

        return $this;
    }
}

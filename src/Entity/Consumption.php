<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsumptionRepository")
 */
class Consumption
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $waterConsumption;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Prospect", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Home", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $home;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StillWaterBottle")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $stillWaterBottle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SparkWaterBottle")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $sparkWaterBottle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\WaterHeater")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $waterHeater;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Heater")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $heater;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HomeAppliance")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $homeAppliance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWaterConsumption(): ?string
    {
        return $this->waterConsumption;
    }

    public function setWaterConsumption(string $waterConsumption): self
    {
        $this->waterConsumption = $waterConsumption;

        return $this;
    }

    public function getUser(): ?Prospect
    {
        return $this->user;
    }

    public function setUser(Prospect $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getHome(): ?Home
    {
        return $this->home;
    }

    public function setHome(Home $home): self
    {
        $this->home = $home;

        return $this;
    }

    public function getStillWaterBottle(): ?StillWaterBottle
    {
        return $this->stillWaterBottle;
    }

    public function setStillWaterBottle(?StillWaterBottle $stillWaterBottle): self
    {
        $this->stillWaterBottle = $stillWaterBottle;

        return $this;
    }

    public function getSparkWaterBottle(): ?SparkWaterBottle
    {
        return $this->sparkWaterBottle;
    }

    public function setSparkWaterBottle(?SparkWaterBottle $sparkWaterBottle): self
    {
        $this->sparkWaterBottle = $sparkWaterBottle;

        return $this;
    }

    public function getWaterHeater(): ?WaterHeater
    {
        return $this->waterHeater;
    }

    public function setWaterHeater(?WaterHeater $waterHeater): self
    {
        $this->waterHeater = $waterHeater;

        return $this;
    }

    public function getHeater(): ?Heater
    {
        return $this->heater;
    }

    public function setHeater(?Heater $heater): self
    {
        $this->heater = $heater;

        return $this;
    }

    public function getHomeAppliance(): ?HomeAppliance
    {
        return $this->homeAppliance;
    }

    public function setHomeAppliance(?HomeAppliance $homeAppliance): self
    {
        $this->homeAppliance = $homeAppliance;

        return $this;
    }
}

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
     * @ORM\OneToMany(targetEntity="App\Entity\StillWaterBottle", mappedBy="consumption", cascade={"persist"})
     * @Assert\NotBlank(message="Champs requis")
     */
    private $stillWaterBottle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SparkWaterBottle", mappedBy="consumption", cascade={"persist"})
     * @Assert\NotBlank(message="Champs requis")
     */
    private $sparkWaterBottle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\WaterHeater", mappedBy="consumption", cascade={"persist"})
     * @Assert\NotBlank(message="Champs requis")
     */
    private $waterHeater;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Heater", mappedBy="consumption", orphanRemoval=true, cascade={"persist"})
     * @Assert\NotBlank(message="Champs requis")
     */
    private $heater;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HomeAppliance", mappedBy="consumption", cascade={"persist"})
     * @Assert\NotBlank(message="Champs requis")
     */
    private $homeAppliance;

    public function __construct()
    {
        $this->stillWaterBottle = new ArrayCollection();
        $this->sparkWaterBottle = new ArrayCollection();
        $this->waterHeater = new ArrayCollection();
        $this->heater = new ArrayCollection();
        $this->homeAppliance = new ArrayCollection();
    }

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

    /**
     * @return Collection|StillWaterBottle[]
     */
    public function getStillWaterBottle(): Collection
    {
        return $this->stillWaterBottle;
    }

    public function addStillWaterBottle(StillWaterBottle $stillWaterBottle): self
    {
        if (!$this->stillWaterBottle->contains($stillWaterBottle)) {
            $this->stillWaterBottle[] = $stillWaterBottle;
            $stillWaterBottle->setConsumption($this);
        }

        return $this;
    }

    public function removeStillWaterBottle(StillWaterBottle $stillWaterBottle): self
    {
        if ($this->stillWaterBottle->contains($stillWaterBottle)) {
            $this->stillWaterBottle->removeElement($stillWaterBottle);
            // set the owning side to null (unless already changed)
            if ($stillWaterBottle->getConsumption() === $this) {
                $stillWaterBottle->setConsumption(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SparkWaterBottle[]
     */
    public function getSparkWaterBottle(): Collection
    {
        return $this->sparkWaterBottle;
    }

    public function addSparkWaterBottle(SparkWaterBottle $sparkWaterBottle): self
    {
        if (!$this->sparkWaterBottle->contains($sparkWaterBottle)) {
            $this->sparkWaterBottle[] = $sparkWaterBottle;
            $sparkWaterBottle->setConsumption($this);
        }

        return $this;
    }

    public function removeSparkWaterBottle(SparkWaterBottle $sparkWaterBottle): self
    {
        if ($this->sparkWaterBottle->contains($sparkWaterBottle)) {
            $this->sparkWaterBottle->removeElement($sparkWaterBottle);
            // set the owning side to null (unless already changed)
            if ($sparkWaterBottle->getConsumption() === $this) {
                $sparkWaterBottle->setConsumption(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|WaterHeater[]
     */
    public function getWaterHeater(): Collection
    {
        return $this->waterHeater;
    }

    public function setWaterHeater(WaterHeater $waterHeater): self
    {
        $this->waterHeater = $waterHeater;
        return $this;
    }

    public function addWaterHeater(WaterHeater $waterHeater): self
    {
        if (!$this->waterHeater->contains($waterHeater)) {
            $this->waterHeater[] = $waterHeater;
            $waterHeater->setConsumption($this);
        }

        return $this;
    }

    public function removeWaterHeater(WaterHeater $waterHeater): self
    {
        if ($this->waterHeater->contains($waterHeater)) {
            $this->waterHeater->removeElement($waterHeater);
            // set the owning side to null (unless already changed)
            if ($waterHeater->getConsumption() === $this) {
                $waterHeater->setConsumption(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Heater[]
     */
    public function getHeater(): Collection
    {
        return $this->heater;
    }

    public function addHeater(Heater $heater): self
    {
        if (!$this->heater->contains($heater)) {
            $this->heater[] = $heater;
            $heater->setConsumption($this);
        }

        return $this;
    }

    public function removeHeater(Heater $heater): self
    {
        if ($this->heater->contains($heater)) {
            $this->heater->removeElement($heater);
            // set the owning side to null (unless already changed)
            if ($heater->getConsumption() === $this) {
                $heater->setConsumption(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HomeAppliance[]
     */
    public function getHomeAppliance(): Collection
    {
        return $this->homeAppliance;
    }

    public function addHomeAppliance(HomeAppliance $homeAppliance): self
    {
        if (!$this->homeAppliance->contains($homeAppliance)) {
            $this->homeAppliance[] = $homeAppliance;
            $homeAppliance->setConsumption($this);
        }

        return $this;
    }

    public function removeHomeAppliance(HomeAppliance $homeAppliance): self
    {
        if ($this->homeAppliance->contains($homeAppliance)) {
            $this->homeAppliance->removeElement($homeAppliance);
            // set the owning side to null (unless already changed)
            if ($homeAppliance->getConsumption() === $this) {
                $homeAppliance->setConsumption(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->waterConsumption;
    }
}

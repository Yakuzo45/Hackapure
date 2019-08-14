<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiameterRepository")
 */
class Diameter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diameter;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Material", inversedBy="diameters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $material;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AfterMeter", mappedBy="diameter", orphanRemoval=true)
     */
    private $afterMeters;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UnderSink", mappedBy="diameter")
     */
    private $underSinks;

    public function __construct()
    {
        $this->afterMeters = new ArrayCollection();
        $this->underSinks = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiameter(): ?string
    {
        return $this->diameter;
    }

    public function setDiameter(string $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): self
    {
        $this->material = $material;

        return $this;
    }

    /**
     * @return Collection|AfterMeter[]
     */
    public function getAfterMeters(): Collection
    {
        return $this->afterMeters;
    }

    public function addAfterMeter(AfterMeter $afterMeter): self
    {
        if (!$this->afterMeters->contains($afterMeter)) {
            $this->afterMeters[] = $afterMeter;
            $afterMeter->setDiameter($this);
        }

        return $this;
    }

    public function removeAfterMeter(AfterMeter $afterMeter): self
    {
        if ($this->afterMeters->contains($afterMeter)) {
            $this->afterMeters->removeElement($afterMeter);
            // set the owning side to null (unless already changed)
            if ($afterMeter->getDiameter() === $this) {
                $afterMeter->setDiameter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnderSink[]
     */
    public function getUnderSinks(): Collection
    {
        return $this->underSinks;
    }

    public function addUnderSink(UnderSink $underSink): self
    {
        if (!$this->underSinks->contains($underSink)) {
            $this->underSinks[] = $underSink;
            $underSink->setDiameter($this);
        }

        return $this;
    }

    public function removeUnderSink(UnderSink $underSink): self
    {
        if ($this->underSinks->contains($underSink)) {
            $this->underSinks->removeElement($underSink);
            // set the owning side to null (unless already changed)
            if ($underSink->getDiameter() === $this) {
                $underSink->setDiameter(null);
            }
        }

        return $this;
    }
}

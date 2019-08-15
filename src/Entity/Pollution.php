<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PollutionRepository")
 */
class Pollution
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @ORM\OneToOne(targetEntity="App\Entity\Prospect", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProspect;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="integer",
     *     message="Un nombre est attendu")
     */
    private $TDS;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $userReturn;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $waterTaste;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $waterOdour;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $waterQuality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SpecialAnalyzes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProspect(): ?int
    {
        return $this->idProspect;
    }

    public function setIdProspect(Prospect $idProspect): self
    {
        $this->idProspect = $idProspect;

        return $this;
    }

    public function getTDS(): ?int
    {
        return $this->TDS;
    }

    public function setTDS(int $TDS): self
    {
        $this->TDS = $TDS;

        return $this;
    }

    public function getUserReturn(): ?string
    {
        return $this->userReturn;
    }

    public function setUserReturn(string $userReturn): self
    {
        $this->userReturn = $userReturn;

        return $this;
    }

    public function getWaterTaste(): ?string
    {
        return $this->waterTaste;
    }

    public function setWaterTaste(string $waterTaste): self
    {
        $this->waterTaste = $waterTaste;

        return $this;
    }

    public function getWaterOdour(): ?string
    {
        return $this->waterOdour;
    }

    public function setWaterOdour(string $waterOdour): self
    {
        $this->waterOdour = $waterOdour;

        return $this;
    }

    public function getWaterQuality(): ?string
    {
        return $this->waterQuality;
    }

    public function setWaterQuality(string $waterQuality): self
    {
        $this->waterQuality = $waterQuality;

        return $this;
    }

    public function getSpecialAnalyzes(): ?string
    {
        return $this->SpecialAnalyzes;
    }

    public function setSpecialAnalyzes(?string $SpecialAnalyzes): self
    {
        $this->SpecialAnalyzes = $SpecialAnalyzes;

        return $this;
    }
}

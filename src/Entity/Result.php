<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultRepository")
 */
class Result
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cddept;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cdparametre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cdparametresiseeaux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libmajparametre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libminparametre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libwebparametre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $insituana;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rqana;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cdunitereferencesiseeaux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cdunitereference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qualitparam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $casparam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $limitequal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $refqual;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $referenceprel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCddept(): ?string
    {
        return $this->cddept;
    }

    public function setCddept(?string $cddept): self
    {
        $this->cddept = $cddept;

        return $this;
    }

    public function getCdparametre(): ?string
    {
        return $this->cdparametre;
    }

    public function setCdparametre(?string $cdparametre): self
    {
        $this->cdparametre = $cdparametre;

        return $this;
    }

    public function getCdparametresiseeaux(): ?string
    {
        return $this->cdparametresiseeaux;
    }

    public function setCdparametresiseeaux(?string $cdparametresiseeaux): self
    {
        $this->cdparametresiseeaux = $cdparametresiseeaux;

        return $this;
    }

    public function getlibmajparametre(): ?string
    {
        return $this->libmajparametre;
    }

    public function setLibmajparametre(?string $libmajparametre): self
    {
        $this->libmajparametre = $libmajparametre;

        return $this;
    }

    public function getLibminparametre(): ?string
    {
        return $this->libminparametre;
    }

    public function setLibminparametre(?string $libminparametre): self
    {
        $this->libminparametre = $libminparametre;

        return $this;
    }

    public function getLibwebparametre(): ?string
    {
        return $this->libwebparametre;
    }

    public function setLibwebparametre(?string $libwebparametre): self
    {
        $this->libwebparametre = $libwebparametre;

        return $this;
    }

    public function getInsituana(): ?string
    {
        return $this->insituana;
    }

    public function setInsituana(?string $insituana): self
    {
        $this->insituana = $insituana;

        return $this;
    }

    public function getRqana(): ?string
    {
        return $this->rqana;
    }

    public function setRqana(?string $rqana): self
    {
        $this->rqana = $rqana;

        return $this;
    }

    public function getCdunitereferencesiseeaux(): ?string
    {
        return $this->cdunitereferencesiseeaux;
    }

    public function setCdunitereferencesiseeaux(?string $cdunitereferencesiseeaux): self
    {
        $this->cdunitereferencesiseeaux = $cdunitereferencesiseeaux;

        return $this;
    }

    public function getCdunitereference(): ?string
    {
        return $this->cdunitereference;
    }

    public function setCdunitereference(?string $cdunitereference): self
    {
        $this->cdunitereference = $cdunitereference;

        return $this;
    }

    public function getQualitparam(): ?string
    {
        return $this->qualitparam;
    }

    public function setQualitparam(?string $qualitparam): self
    {
        $this->qualitparam = $qualitparam;

        return $this;
    }

    public function getCasparam(): ?string
    {
        return $this->casparam;
    }

    public function setCasparam(?string $casparam): self
    {
        $this->casparam = $casparam;

        return $this;
    }

    public function getLimitequal(): ?string
    {
        return $this->limitequal;
    }

    public function setLimitequal(?string $limitequal): self
    {
        $this->limitequal = $limitequal;

        return $this;
    }

    public function getRefqual(): ?string
    {
        return $this->refqual;
    }

    public function setRefqual(?string $refqual): self
    {
        $this->refqual = $refqual;

        return $this;
    }

    public function getReferenceprel(): ?Prelevment
    {
        return $this->referenceprel;
    }

    public function setReferenceprel(?Prelevment $referenceprel): self
    {
        $this->referenceprel = $referenceprel;

        return $this;
    }
}

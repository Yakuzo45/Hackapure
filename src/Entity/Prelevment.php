<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrelevmentRepository")
 */
class Prelevment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cddept;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $inseecommuneprinc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomcommuneprinc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cdreseauamont;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomreseauamont;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pourcentdebit;



    /**
     * @ORM\Column(type="date", length=255, nullable=true)
     */
    private $dateprel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $heureprel;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $conclusionprel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ugelib;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $distrlib;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moalib;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plvconformitebacterio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plvconformitechimique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plvconformitereferencebact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plvconformitereferencechim;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $referenceprel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cdreseau;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getInseecommuneprinc(): ?string
    {
        return $this->inseecommuneprinc;
    }

    public function setInseecommuneprinc(?string $inseecommuneprinc): self
    {
        $this->inseecommuneprinc = $inseecommuneprinc;

        return $this;
    }

    public function getNomcommuneprinc(): ?string
    {
        return $this->nomcommuneprinc;
    }

    public function setNomcommuneprinc(string $nomcommuneprinc): self
    {
        $this->nomcommuneprinc = $nomcommuneprinc;

        return $this;
    }

    public function getCdreseauamont(): ?string
    {
        return $this->cdreseauamont;
    }

    public function setCdreseauamont(?string $cdreseauamont): self
    {
        $this->cdreseauamont = $cdreseauamont;

        return $this;
    }

    public function getNomreseauamont(): ?string
    {
        return $this->nomreseauamont;
    }

    public function setNomreseauamont(?string $nomreseauamont): self
    {
        $this->nomreseauamont = $nomreseauamont;

        return $this;
    }

    public function getPourcentdebit(): ?string
    {
        return $this->pourcentdebit;
    }

    public function setPourcentdebit(?string $pourcentdebit): self
    {
        $this->pourcentdebit = $pourcentdebit;

        return $this;
    }

    public function getDateprel(): ?\dateTime
    {
        return $this->dateprel;
    }

    public function setDateprel(?\dateTime $dateprel): self
    {
        $this->dateprel = $dateprel;

        return $this;
    }

    public function getHeureprel(): ?string
    {
        return $this->heureprel;
    }

    public function setHeureprel(?string $heureprel): self
    {
        $this->heureprel = $heureprel;

        return $this;
    }

    public function getConclusionprel(): ?string
    {
        return $this->conclusionprel;
    }

    public function setConclusionprel(?string $conclusionprel): self
    {
        $this->conclusionprel = $conclusionprel;

        return $this;
    }

    public function getUgelib(): ?string
    {
        return $this->ugelib;
    }

    public function setUgelib(?string $ugelib): self
    {
        $this->ugelib = $ugelib;

        return $this;
    }

    public function getDistrlib(): ?string
    {
        return $this->distrlib;
    }

    public function setDistrlib(?string $distrlib): self
    {
        $this->distrlib = $distrlib;

        return $this;
    }

    public function getMoalib(): ?string
    {
        return $this->moalib;
    }

    public function setMoalib(?string $moalib): self
    {
        $this->moalib = $moalib;

        return $this;
    }

    public function getPlvconformitebacterio(): ?string
    {
        return $this->plvconformitebacterio;
    }

    public function setPlvconformitebacterio(?string $plvconformitebacterio): self
    {
        $this->plvconformitebacterio = $plvconformitebacterio;

        return $this;
    }

    public function getPlvconformitechimique(): ?string
    {
        return $this->plvconformitechimique;
    }

    public function setPlvconformitechimique(?string $plvconformitechimique): self
    {
        $this->plvconformitechimique = $plvconformitechimique;

        return $this;
    }

    public function getPlvconformitereferencebact(): ?string
    {
        return $this->plvconformitereferencebact;
    }

    public function setPlvconformitereferencebact(?string $plvconformitereferencebact): self
    {
        $this->plvconformitereferencebact = $plvconformitereferencebact;

        return $this;
    }

    public function getPlvconformitereferencechim(): ?string
    {
        return $this->plvconformitereferencechim;
    }

    public function setPlvconformitereferencechim(?string $plvconformitereferencechim): self
    {
        $this->plvconformitereferencechim = $plvconformitereferencechim;

        return $this;
    }

    public function getCddept(): ?string
    {
        return $this->cddept;
    }

    public function setCddept(string $cddept): self
    {
        $this->cddept = $cddept;

        return $this;
    }

    public function getReferenceprel(): ?string
    {
        return $this->referenceprel;
    }

    public function setReferenceprel(?string $referenceprel): self
    {
        $this->referenceprel = $referenceprel;

        return $this;
    }

    public function getCdreseau(): ?City
    {
        return $this->cdreseau;
    }

    public function setCdreseau(?City $cdreseau): self
    {
        $this->cdreseau = $cdreseau;

        return $this;
    }
}

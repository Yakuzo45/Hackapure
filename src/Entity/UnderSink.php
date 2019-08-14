<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnderSinkRepository")
 */
class UnderSink
{
    const MATERIALS_UNDERSINK = [
        'Cuivre',
        'Galva',
        'Multicouche',
        'PolyEthylène Réticulé',
    ];

    const DIAMETER_UNDERSINK = [
        'ø10',
        'ø12',
        'ø14',
        'ø16',
        '3/8"',
        '1/2',
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $material;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diameter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $screwthread;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $thread;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $accuracy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function setDiameter(int $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getScrewthread(): ?string
    {
        return $this->screwthread;
    }

    public function setScrewthread(string $screwthread): self
    {
        $this->screwthread = $screwthread;

        return $this;
    }

    public function getThread(): ?string
    {
        return $this->thread;
    }

    public function setThread(string $thread): self
    {
        $this->thread = $thread;

        return $this;
    }

    public function getAccuracy(): ?string
    {
        return $this->accuracy;
    }

    public function setAccuracy(?string $accuracy): self
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}

<?php

namespace App\Entity;

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
    private $diameters;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Material", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $materials;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiameters(): ?string
    {
        return $this->diameters;
    }

    public function setDiameters(string $diameters): self
    {
        $this->diameters = $diameters;

        return $this;
    }

    public function getMaterials(): ?Material
    {
        return $this->materials;
    }

    public function setMaterials(Material $materials): self
    {
        $this->materials = $materials;

        return $this;
    }
}

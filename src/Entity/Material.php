<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterialRepository")
 */
class Material
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
    private $materials;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Diameter", mappedBy="materials", cascade={"persist", "remove"})
     */
    private $diameter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterials(): ?string
    {
        return $this->materials;
    }

    public function setMaterials(string $materials): self
    {
        $this->materials = $materials;

        return $this;
    }

    public function getDiameter(): ?Diameter
    {
        return $this->diameter;
    }

    public function setDiameter(Diameter $diameter): self
    {
        $this->diameter = $diameter;

        // set the owning side of the relation if necessary
        if ($this !== $diameter->getMaterials()) {
            $diameter->setMaterials($this);
        }

        return $this;
    }
}

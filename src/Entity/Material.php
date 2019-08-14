<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="App\Entity\Diameter", mappedBy="material", orphanRemoval=true)
     */
    private $diameters;

    public function __construct()
    {
        $this->diameters = new ArrayCollection();
    }

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

    /**
     * @return Collection|Diameter[]
     */
    public function getDiameters(): Collection
    {
        return $this->diameters;
    }

    public function addDiameter(Diameter $diameter): self
    {
        if (!$this->diameters->contains($diameter)) {
            $this->diameters[] = $diameter;
            $diameter->setMaterial($this);
        }

        return $this;
    }

    public function removeDiameter(Diameter $diameter): self
    {
        if ($this->diameters->contains($diameter)) {
            $this->diameters->removeElement($diameter);
            // set the owning side to null (unless already changed)
            if ($diameter->getMaterial() === $this) {
                $diameter->setMaterial(null);
            }
        }

        return $this;
    }
}

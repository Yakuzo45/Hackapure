<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomeCompositionRepository")
 */
class HomeComposition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $adults;

    /**
     * @ORM\Column(type="integer")
     */
    private $teenagers;

    /**
     * @ORM\Column(type="integer")
     */
    private $kids;

    /**
     * @ORM\Column(type="integer")
     */
    private $children;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdults(): ?int
    {
        return $this->adults;
    }

    public function setAdults(int $adults): self
    {
        $this->adults = $adults;

        return $this;
    }

    public function getTeenagers(): ?int
    {
        return $this->teenagers;
    }

    public function setTeenagers(int $teenagers): self
    {
        $this->teenagers = $teenagers;

        return $this;
    }

    public function getKids(): ?int
    {
        return $this->kids;
    }

    public function setKids(int $kids): self
    {
        $this->kids = $kids;

        return $this;
    }

    public function getChildren(): ?int
    {
        return $this->children;
    }

    public function setChildren(int $children): self
    {
        $this->children = $children;

        return $this;
    }
}

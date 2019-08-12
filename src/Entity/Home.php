<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomeRepository")
 */
class Home
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champs requis")
     */
    private $adult;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champs requis")
     */
    private $teenager;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champs requis")
     */
    private $kid;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champs requis")
     */
    private $child;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdult(): ?int
    {
        return $this->adult;
    }

    public function setAdult(int $adult): self
    {
        $this->adult = $adult;

        return $this;
    }

    public function getTeenager(): ?int
    {
        return $this->teenager;
    }

    public function setTeenager(int $teenager): self
    {
        $this->teenager = $teenager;

        return $this;
    }

    public function getKid(): ?int
    {
        return $this->kid;
    }

    public function setKid(int $kid): self
    {
        $this->kid = $kid;

        return $this;
    }

    public function getChild(): ?int
    {
        return $this->child;
    }

    public function setChild(int $child): self
    {
        $this->child = $child;

        return $this;
    }
}

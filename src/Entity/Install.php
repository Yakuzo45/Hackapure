<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstallRepository")
 */
class Install
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Prospect", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $prospect;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bath", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $bath;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sink", mappedBy="id_install", cascade={"persist"})
     */
    private $sink;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Shower", mappedBy="id_install", cascade={"persist"})
     */
    private $shower;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Privy", mappedBy="id_install", cascade={"persist"})
     */
    private $privy;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UnderSink", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $undersink;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AfterMeter", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $aftermeter;

    public function __construct()
    {
        $this->sink = new ArrayCollection();
        $this->shower = new ArrayCollection();
        $this->privy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProspect(): ?Prospect
    {
        return $this->prospect;
    }

    public function setProspect(Prospect $prospect): self
    {
        $this->prospect = $prospect;

        return $this;
    }

    public function getBath(): ?Bath
    {
        return $this->bath;
    }

    public function setBath(Bath $bath): self
    {
        $this->bath = $bath;

        return $this;
    }

    /**
     * @return Collection|Sink[]
     */
    public function getSink(): Collection
    {
        return $this->sink;
    }

    public function addSink(Sink $sink): self
    {
        if (!$this->sink->contains($sink)) {
            $this->sink[] = $sink;
            $sink->setInstall($this);
        }

        return $this;
    }

    public function removeSink(Sink $sink): self
    {
        if ($this->sink->contains($sink)) {
            $this->sink->removeElement($sink);
            // set the owning side to null (unless already changed)
            if ($sink->getInstall() === $this) {
                $sink->setInstall(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Shower[]
     */
    public function getShower(): Collection
    {
        return $this->shower;
    }

    public function addShower(Shower $shower): self
    {
        if (!$this->shower->contains($shower)) {
            $this->shower[] = $shower;
            $shower->setInstall($this);
        }

        return $this;
    }

    public function removeShower(Shower $shower): self
    {
        if ($this->shower->contains($shower)) {
            $this->shower->removeElement($shower);
            // set the owning side to null (unless already changed)
            if ($shower->getInstall() === $this) {
                $shower->setInstall(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Privy[]
     */
    public function getPrivy(): Collection
    {
        return $this->privy;
    }

    public function addPrivy(Privy $privy): self
    {
        if (!$this->privy->contains($privy)) {
            $this->privy[] = $privy;
            $privy->setInstall($this);
        }

        return $this;
    }



    public function removePrivy(Privy $privy): self
    {
        if ($this->privy->contains($privy)) {
            $this->privy->removeElement($privy);
            // set the owning side to null (unless already changed)
            if ($privy->getInstall() === $this) {
                $privy->setInstall(null);
            }
        }

        return $this;
    }

    public function getUndersink(): ?UnderSink
    {
        return $this->undersink;
    }

    public function setUndersink(UnderSink $undersink): self
    {
        $this->undersink = $undersink;

        return $this;
    }

    public function getAftermeter(): ?AfterMeter
    {
        return $this->aftermeter;
    }

    public function setAftermeter(AfterMeter $aftermeter): self
    {
        $this->aftermeter = $aftermeter;

        return $this;
    }
}

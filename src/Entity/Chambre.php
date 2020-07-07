<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
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
    private $numeroChambre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroBatiment;

    /**
     * @ORM\ManyToOne(targetEntity=TypeChambre::class, inversedBy="chambres")
     */
    private $typechambre;

    /**
     * @ORM\OneToMany(targetEntity=Boursier::class, mappedBy="chambre")
     */
    private $boursiers;

    public function __construct()
    {
        $this->boursiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroChambre(): ?string
    {
        return $this->numeroChambre;
    }

    public function setNumeroChambre(string $numeroChambre): self
    {
        $this->numeroChambre = $numeroChambre;

        return $this;
    }

    public function getNumeroBatiment(): ?string
    {
        return $this->numeroBatiment;
    }

    public function setNumeroBatiment(string $numeroBatiment): self
    {
        $this->numeroBatiment = $numeroBatiment;

        return $this;
    }

    public function getTypechambre(): ?TypeChambre
    {
        return $this->typechambre;
    }

    public function setTypechambre(?TypeChambre $typechambre): self
    {
        $this->typechambre = $typechambre;

        return $this;
    }

    /**
     * @return Collection|Boursier[]
     */
    public function getBoursiers(): Collection
    {
        return $this->boursiers;
    }

    public function addBoursier(Boursier $boursier): self
    {
        if (!$this->boursiers->contains($boursier)) {
            $this->boursiers[] = $boursier;
            $boursier->setChambre($this);
        }

        return $this;
    }

    public function removeBoursier(Boursier $boursier): self
    {
        if ($this->boursiers->contains($boursier)) {
            $this->boursiers->removeElement($boursier);
            // set the owning side to null (unless already changed)
            if ($boursier->getChambre() === $this) {
                $boursier->setChambre(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\BoursierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoursierRepository::class)
 */
class Boursier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ishoused;

    /**
     * @ORM\OneToOne(targetEntity=Etudiant::class, cascade={"persist", "remove"})
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=TypeBourse::class, inversedBy="chambre")
     */
    private $typeBourse;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="boursiers")
     */
    private $chambre;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIshoused(): ?bool
    {
        return $this->ishoused;
    }

    public function setIshoused(bool $ishoused): self
    {
        $this->ishoused = $ishoused;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getTypeBourse(): ?TypeBourse
    {
        return $this->typeBourse;
    }

    public function setTypeBourse(?TypeBourse $typeBourse): self
    {
        $this->typeBourse = $typeBourse;

        return $this;
    }

    public function getChambre(): ?Chambre
    {
        return $this->chambre;
    }

    public function setChambre(?Chambre $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }


}

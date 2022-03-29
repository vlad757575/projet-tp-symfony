<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Prof::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $prof;

    /**
     * @ORM\OneToMany(targetEntity=Eleve::class, mappedBy="classe")
     */
    private $eleve;

    public function __construct()
    {
        $this->eleve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getProf(): ?prof
    {
        return $this->prof;
    }

    public function setProf(?prof $prof): self
    {
        $this->prof = $prof;

        return $this;
    }

    /**
     * @return Collection<int, eleve>
     */
    public function getEleve(): Collection
    {
        return $this->eleve;
    }

    public function addEleve(eleve $eleve): self
    {
        if (!$this->eleve->contains($eleve)) {
            $this->eleve[] = $eleve;
            $eleve->setClasse($this);
        }

        return $this;
    }

    public function removeEleve(eleve $eleve): self
    {
        if ($this->eleve->removeElement($eleve)) {
            // set the owning side to null (unless already changed)
            if ($eleve->getClasse() === $this) {
                $eleve->setClasse(null);
            }
        }

        return $this;
    }
}

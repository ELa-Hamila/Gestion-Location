<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbMois = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datloc = null;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    private ?Appartement $numApp = null;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    private ?Locataire $idLoc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbMois(): ?int
    {
        return $this->nbMois;
    }

    public function setNbMois(int $nbMois): static
    {
        $this->nbMois = $nbMois;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDatloc(): ?\DateTimeInterface
    {
        return $this->datloc;
    }

    public function setDatloc(\DateTimeInterface $datloc): static
    {
        $this->datloc = $datloc;

        return $this;
    }

    public function getNumApp(): ?Appartement
    {
        return $this->numApp;
    }

    public function setNumApp(?Appartement $numApp): static
    {
        $this->numApp = $numApp;

        return $this;
    }

    public function getIdLoc(): ?Locataire
    {
        return $this->idLoc;
    }

    public function setIdLoc(?Locataire $idLoc): static
    {
        $this->idLoc = $idLoc;

        return $this;
    }
}

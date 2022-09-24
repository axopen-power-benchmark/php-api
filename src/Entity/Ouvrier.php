<?php

namespace App\Entity;

use App\Repository\OuvrierRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

#[ORM\Entity(repositoryClass: OuvrierRepository::class)]
#[ORM\Table(name: 'ouvrier_chantier')]
class Ouvrier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero_chantier = null;

    #[ORM\Column(nullable: true)]
    private ?int $matricule_user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $matricule = null;

    #[ORM\Column(nullable: true)]
    private ?bool $unbind = null;

    #[ORM\ManyToOne(fetch: 'LAZY', inversedBy: 'ouvriers')]
    #[ORM\JoinColumn(name: 'numero_chantier', referencedColumnName: 'numero')]
    #[Exclude]
    private ?Chantier $chantier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroChantier(): ?int
    {
        return $this->numero_chantier;
    }

    public function setNumeroChantier(?int $numero_chantier): self
    {
        $this->numero_chantier = $numero_chantier;

        return $this;
    }

    public function getMatriculeUser(): ?int
    {
        return $this->matricule_user;
    }

    public function setMatriculeUser(?int $matricule_user): self
    {
        $this->matricule_user = $matricule_user;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function isUnbind(): ?bool
    {
        return $this->unbind;
    }

    public function setUnbind(?bool $unbind): self
    {
        $this->unbind = $unbind;

        return $this;
    }

    public function getChantier(): ?Chantier
    {
        return $this->chantier;
    }

    public function setChantier(?Chantier $chantier): self
    {
        $this->chantier = $chantier;

        return $this;
    }
}

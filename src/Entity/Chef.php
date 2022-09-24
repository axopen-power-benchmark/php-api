<?php

namespace App\Entity;

use App\Repository\ChefRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

#[ORM\Entity(repositoryClass: ChefRepository::class)]
#[ORM\Table(name: 'chef_chantier_user')]
class Chef
{

    #[ORM\Id]
    #[ORM\Column(nullable: true)]
    private ?int $numero_chantier = null;

    #[ORM\Id]
    #[ORM\Column(nullable: true)]
    private ?int $matricule_user = null;

    #[ORM\ManyToOne(fetch: 'LAZY', inversedBy: 'chefs')]
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

<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'canopee_user')]
class User
{

    #[ORM\Id]
    #[ORM\Column]
    private ?int $matricule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $societe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $job_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resource_group_no = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $travel_code = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero_latest_chantier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $journal_pointage_erp = null;

    #[ORM\ManyToOne(fetch: 'LAZY', inversedBy: 'users')]
    #[ORM\JoinColumn(name: 'numero_latest_chantier', referencedColumnName: 'numero')]
    #[Exclude]
    private ?Chantier $chantier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(?string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(?string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->job_title;
    }

    public function setJobTitle(?string $job_title): self
    {
        $this->job_title = $job_title;

        return $this;
    }

    public function getResourceGroupNo(): ?string
    {
        return $this->resource_group_no;
    }

    public function setResourceGroupNo(?string $resource_group_no): self
    {
        $this->resource_group_no = $resource_group_no;

        return $this;
    }

    public function getTravelCode(): ?string
    {
        return $this->travel_code;
    }

    public function setTravelCode(?string $travel_code): self
    {
        $this->travel_code = $travel_code;

        return $this;
    }

    public function getNumeroLatestChantier(): ?int
    {
        return $this->numero_latest_chantier;
    }

    public function setNumeroLatestChantier(?int $numero_latest_chantier): self
    {
        $this->numero_latest_chantier = $numero_latest_chantier;

        return $this;
    }

    public function getJournalPointageErp(): ?string
    {
        return $this->journal_pointage_erp;
    }

    public function setJournalPointageErp(?string $journal_pointage_erp): self
    {
        $this->journal_pointage_erp = $journal_pointage_erp;

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

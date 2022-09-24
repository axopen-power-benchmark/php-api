<?php

namespace App\Entity;

use App\Repository\DepenseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

#[ORM\Entity(repositoryClass: DepenseRepository::class)]
#[ORM\Table(name: 'depense_main_doeuvre')]
class Depense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_journal_chantier = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_ouvrier_chantier = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $quart_dheures_jour = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $quart_dheures_nuit = null;

    #[ORM\Column(nullable: true)]
    private ?bool $voiture = null;

    #[ORM\Column(nullable: true)]
    private ?bool $sent = null;

    #[ORM\ManyToOne(fetch: 'LAZY', inversedBy: 'depenses')]
    #[ORM\JoinColumn(name: 'id_journal_chantier', referencedColumnName: 'id')]
    #[Exclude]
    private ?Journal $journal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJournalChantier(): ?int
    {
        return $this->id_journal_chantier;
    }

    public function setIdJournalChantier(?int $id_journal_chantier): self
    {
        $this->id_journal_chantier = $id_journal_chantier;

        return $this;
    }

    public function getIdOuvrierChantier(): ?int
    {
        return $this->id_ouvrier_chantier;
    }

    public function setIdOuvrierChantier(?int $id_ouvrier_chantier): self
    {
        $this->id_ouvrier_chantier = $id_ouvrier_chantier;

        return $this;
    }

    public function getQuartDheuresJour(): ?int
    {
        return $this->quart_dheures_jour;
    }

    public function setQuartDheuresJour(?int $quart_dheures_jour): self
    {
        $this->quart_dheures_jour = $quart_dheures_jour;

        return $this;
    }

    public function getQuartDheuresNuit(): ?int
    {
        return $this->quart_dheures_nuit;
    }

    public function setQuartDheuresNuit(?int $quart_dheures_nuit): self
    {
        $this->quart_dheures_nuit = $quart_dheures_nuit;

        return $this;
    }

    public function isVoiture(): ?bool
    {
        return $this->voiture;
    }

    public function setVoiture(?bool $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

    public function isSent(): ?bool
    {
        return $this->sent;
    }

    public function setSent(?bool $sent): self
    {
        $this->sent = $sent;

        return $this;
    }

    public function getJournal(): ?Journal
    {
        return $this->journal;
    }

    public function setJournal(?Journal $journal): self
    {
        $this->journal = $journal;

        return $this;
    }
}

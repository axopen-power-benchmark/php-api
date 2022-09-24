<?php

namespace App\Entity;

use App\Repository\JournalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

#[ORM\Entity(repositoryClass: JournalRepository::class)]
#[ORM\Table(name: 'journal_chantier')]
class Journal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero_chantier = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $temperature_matin = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $temperature_soir = null;

    #[ORM\Column(nullable: true)]
    private ?bool $moe_generated = null;

    #[ORM\Column(nullable: true)]
    private ?bool $materiel_generated = null;

    #[ORM\Column(length: 10000, nullable: true)]
    private ?string $note = null;

    #[ORM\ManyToOne(fetch: 'LAZY', inversedBy: 'journaux')]
    #[ORM\JoinColumn(name: 'numero_chantier', referencedColumnName: 'numero')]
    #[Exclude]
    private ?Chantier $chantier = null;

    #[ORM\OneToMany(mappedBy: 'journal', targetEntity: Depense::class)]
    private Collection $depenses;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
    }

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTemperatureMatin(): ?int
    {
        return $this->temperature_matin;
    }

    public function setTemperatureMatin(?int $temperature_matin): self
    {
        $this->temperature_matin = $temperature_matin;

        return $this;
    }

    public function getTemperatureSoir(): ?int
    {
        return $this->temperature_soir;
    }

    public function setTemperatureSoir(?int $temperature_soir): self
    {
        $this->temperature_soir = $temperature_soir;

        return $this;
    }

    public function isMoeGenerated(): ?bool
    {
        return $this->moe_generated;
    }

    public function setMoeGenerated(?bool $moe_generated): self
    {
        $this->moe_generated = $moe_generated;

        return $this;
    }

    public function isMaterielGenerated(): ?bool
    {
        return $this->materiel_generated;
    }

    public function setMaterielGenerated(?bool $materiel_generated): self
    {
        $this->materiel_generated = $materiel_generated;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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

    /**
     * @return Collection<int, Depense>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depense $depense): self
    {
        if (!$this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setJournal($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): self
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getJournal() === $this) {
                $depense->setJournal(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

#[ORM\Entity(repositoryClass: ChantierRepository::class)]
class Chantier
{

    #[ORM\Id]
    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $city_cp = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_sharepoint = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_files = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_gearth = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2, nullable: true)]
    private ?string $prix_moyen_moe_jour = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2, nullable: true)]
    private ?string $prix_moyen_moe_nuit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2, nullable: true)]
    private ?string $prix_moyen_materiel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $journal_pointage_erp = null;

    #[ORM\OneToMany(mappedBy: 'chantier', targetEntity: Ouvrier::class, fetch: 'EAGER')]
    private Collection $ouvriers;

    #[ORM\OneToMany(mappedBy: 'chantier', targetEntity: Chef::class, fetch: 'EAGER')]
    private Collection $chefs;

    #[ORM\OneToMany(mappedBy: 'chantier', targetEntity: Journal::class, fetch: 'EAGER')]
    private Collection $journaux;

    #[ORM\OneToMany(mappedBy: 'chantier', targetEntity: User::class, fetch: 'EAGER')]
    private Collection $users;

    public function __construct()
    {
        $this->ouvriers = new ArrayCollection();
        $this->chefs = new ArrayCollection();
        $this->journaux = new ArrayCollection();
        $this->users = new ArrayCollection();
    }


    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCityCp(): ?int
    {
        return $this->city_cp;
    }

    public function setCityCp(?int $city_cp): self
    {
        $this->city_cp = $city_cp;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLienSharepoint(): ?string
    {
        return $this->lien_sharepoint;
    }

    public function setLienSharepoint(?string $lien_sharepoint): self
    {
        $this->lien_sharepoint = $lien_sharepoint;

        return $this;
    }

    public function getLienFiles(): ?string
    {
        return $this->lien_files;
    }

    public function setLienFiles(?string $lien_files): self
    {
        $this->lien_files = $lien_files;

        return $this;
    }

    public function getLienGearth(): ?string
    {
        return $this->lien_gearth;
    }

    public function setLienGearth(?string $lien_gearth): self
    {
        $this->lien_gearth = $lien_gearth;

        return $this;
    }

    public function getPrixMoyenMoeJour(): ?string
    {
        return $this->prix_moyen_moe_jour;
    }

    public function setPrixMoyenMoeJour(?string $prix_moyen_moe_jour): self
    {
        $this->prix_moyen_moe_jour = $prix_moyen_moe_jour;

        return $this;
    }

    public function getPrixMoyenMoeNuit(): ?string
    {
        return $this->prix_moyen_moe_nuit;
    }

    public function setPrixMoyenMoeNuit(?string $prix_moyen_moe_nuit): self
    {
        $this->prix_moyen_moe_nuit = $prix_moyen_moe_nuit;

        return $this;
    }

    public function getPrixMoyenMateriel(): ?string
    {
        return $this->prix_moyen_materiel;
    }

    public function setPrixMoyenMateriel(?string $prix_moyen_materiel): self
    {
        $this->prix_moyen_materiel = $prix_moyen_materiel;

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

    /**
     * @return Collection<int, Ouvrier>
     */
    public function getOuvriers(): Collection
    {
        return $this->ouvriers;
    }

    public function addOuvrier(Ouvrier $ouvrier): self
    {
        if (!$this->ouvriers->contains($ouvrier)) {
            $this->ouvriers->add($ouvrier);
            $ouvrier->setChantier($this);
        }

        return $this;
    }

    public function removeOuvrier(Ouvrier $ouvrier): self
    {
        if ($this->ouvriers->removeElement($ouvrier)) {
            // set the owning side to null (unless already changed)
            if ($ouvrier->getChantier() === $this) {
                $ouvrier->setChantier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Chef>
     */
    public function getChefs(): Collection
    {
        return $this->chefs;
    }

    public function addChef(Chef $chef): self
    {
        if (!$this->chefs->contains($chef)) {
            $this->chefs->add($chef);
            $chef->setChantier($this);
        }

        return $this;
    }

    public function removeChef(Chef $chef): self
    {
        if ($this->chefs->removeElement($chef)) {
            // set the owning side to null (unless already changed)
            if ($chef->getChantier() === $this) {
                $chef->setChantier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Journal>
     */
    public function getJournaux(): Collection
    {
        return $this->journaux;
    }

    public function addJournaux(Journal $journaux): self
    {
        if (!$this->journaux->contains($journaux)) {
            $this->journaux->add($journaux);
            $journaux->setChantier($this);
        }

        return $this;
    }

    public function removeJournaux(Journal $journaux): self
    {
        if ($this->journaux->removeElement($journaux)) {
            // set the owning side to null (unless already changed)
            if ($journaux->getChantier() === $this) {
                $journaux->setChantier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setChantier($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getChantier() === $this) {
                $user->setChantier(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Service;

use App\Entity\Chantier;
use App\Repository\ChantierRepository;
use Cassandra\Date;

/**
 * Class ChantierService
 * @package App\Service
 */
class ChantierService
{

    /**
     * @var ChantierRepository $chantierRepository
     */
    private readonly ChantierRepository $chantierRepository;

    /**
     * @var RandomService $randomService
     */
    private readonly RandomService $randomService;

    public function __construct(ChantierRepository $chantierRepository, RandomService $randomService)
    {
        $this->chantierRepository = $chantierRepository;
        $this->randomService = $randomService;
    }

    /**
     * @return Chantier
     */
    public function getRandomChantier(): Chantier
    {
        return $this->chantierRepository->find($this->randomService->getRandomInteger(0, 999));
    }

    /**
     * @return Chantier
     * @throws \Exception
     */
    public function updateRandomChantier(): int
    {
        $chantier = new Chantier();
        $chantier->setNumero($this->randomService->getRandomInteger(0, 999));
        $chantier->setDescription($this->randomService->getRandomString(12));
        $chantier->setCity($this->randomService->getRandomString(12));
        $chantier->setCityCp($this->randomService->getRandomInteger(0, 99999));
        $chantier->setDateDebut($this->randomService->getRandomDate());
        $chantier->setDateFin($this->randomService->getRandomDate());
        $chantier->setStatus($this->randomService->getRandomString(12));
        $chantier->setLienSharepoint($this->randomService->getRandomString(12));
        $chantier->setLienFiles($this->randomService->getRandomString(12));
        $chantier->setLienGearth($this->randomService->getRandomString(12));
        $chantier->setPrixMoyenMoeJour($this->randomService->getRandomInteger(0, 100));
        $chantier->setPrixMoyenMoeNuit($this->randomService->getRandomInteger(0, 100));
        $chantier->setPrixMoyenMateriel($this->randomService->getRandomInteger(0, 100));
        $chantier->setJournalPointageErp($this->randomService->getRandomString(12));
        $this->chantierRepository->update($chantier);
        return $chantier->getNumero();
    }

}
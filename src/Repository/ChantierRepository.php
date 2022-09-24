<?php

namespace App\Repository;

use App\Entity\Chantier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Chantier>
 *
 * @method Chantier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chantier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chantier[]    findAll()
 * @method Chantier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChantierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chantier::class);
    }

    public function update(Chantier $entity): void {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder->update(Chantier::class, 'c')
            ->set('c.description', ':description')
            ->set('c.city', ':city')
            ->set('c.city_cp', ':city_cp')
            ->set('c.date_debut', ':date_debut')
            ->set('c.date_fin', ':date_fin')
            ->set('c.status', ':status')
            ->set('c.lien_sharepoint', ':lien_sharepoint')
            ->set('c.lien_files', ':lien_files')
            ->set('c.lien_gearth', ':lien_gearth')
            ->set('c.prix_moyen_moe_jour', ':prix_moyen_moe_jour')
            ->set('c.prix_moyen_moe_nuit', ':prix_moyen_moe_nuit')
            ->set('c.prix_moyen_materiel', ':prix_moyen_materiel')
            ->set('c.journal_pointage_erp', ':journal_pointage_erp')
            ->where('c.numero = :numero')
            ->setParameter('numero', $entity->getNumero())
            ->setParameter('description', $entity->getDescription())
            ->setParameter('city', $entity->getCity())
            ->setParameter('city_cp', $entity->getCityCp())
            ->setParameter('date_debut', $entity->getDateDebut())
            ->setParameter('date_fin', $entity->getDateFin())
            ->setParameter('status', $entity->getStatus())
            ->setParameter('lien_sharepoint', $entity->getLienSharepoint())
            ->setParameter('lien_files', $entity->getLienFiles())
            ->setParameter('lien_gearth', $entity->getLienGearth())
            ->setParameter('prix_moyen_moe_jour', $entity->getPrixMoyenMoeJour())
            ->setParameter('prix_moyen_moe_nuit', $entity->getPrixMoyenMoeNuit())
            ->setParameter('prix_moyen_materiel', $entity->getPrixMoyenMateriel())
            ->setParameter('journal_pointage_erp', $entity->getJournalPointageErp())
            ->getQuery()
            ->execute();
    }

    public function save(Chantier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Chantier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}

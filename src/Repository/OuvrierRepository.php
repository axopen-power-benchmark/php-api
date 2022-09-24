<?php

namespace App\Repository;

use App\Entity\Ouvrier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ouvrier>
 *
 * @method Ouvrier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ouvrier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ouvrier[]    findAll()
 * @method Ouvrier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OuvrierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ouvrier::class);
    }

    public function save(Ouvrier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Ouvrier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}

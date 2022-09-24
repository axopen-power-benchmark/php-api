<?php

namespace App\Repository;

use App\Entity\Chef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Chef>
 *
 * @method Chef|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chef|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chef[]    findAll()
 * @method Chef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chef::class);
    }

    public function save(Chef $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Chef $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}

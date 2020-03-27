<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Job;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    /**
     * Return all the active jobs
     * @return mixed
     * @throws \Exception
     */
    public function findActive(){
        return $this->createQueryBuilder('j')
            ->andWhere('j.expiresAt > :date')
            ->setParameter('date',new \DateTime())
            ->getQuery()
            ->getResult();
    }

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findOneBySomeField($value): ?Category
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findCategoryWithJobs()
    {
        return $this->createQueryBuilder('c')
            ->join('c.jobs', 'j')
            ->where('j.expiresAt > :date')
            ->setParameter('date', new DateTime())
            ->getQuery()
            ->getResult();
    }
}

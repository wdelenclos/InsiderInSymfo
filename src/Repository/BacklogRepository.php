<?php

namespace App\Repository;

use App\Entity\Backlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Backlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method Backlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method Backlog[]    findAll()
 * @method Backlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BacklogRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Backlog::class);
    }

    public function search($title){
    	$qb = $this->createQueryBuilder('c')
		    ->where('c.title LIKE :title')
		    ->setParameter('title','%'. $title .'%')
		    ->getQuery();

    	return $qb->getResult();
    }
}

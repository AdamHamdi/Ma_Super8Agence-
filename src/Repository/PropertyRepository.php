<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }
    /**
     * cette methode permet de retourne les biens qui ne sont pas vendus 
     */
    // public function findAllVisisble():array
    // {
    //     return $this->createQueryBuilder('p')
    //     ->Where('p.sold = false') 
    //     ->getQuery()
    //     ->getResult();
    
    // } 

    /**
     * @return Query
     */
    public function findAllVisisbleQuery()
    {
        return $this->createQueryBuilder('p')
        ->getQuery()
        ;
        
    
    }
    public function findAllQuery()
    {
        return $this->createQueryBuilder('p')
        ->getQuery()
        ;
        
    
    }
     /**
     * cette methode permet de retourne les qutres derniers biens qui ne sont pas vendus 
     */
    public function findLatest():array
    {
       
        return $this->createQueryBuilder('p')
        ->Where('p.sold = false') 
        ->setMaxResults( 4)
        ->getQuery()
        ->getResult();
    
    }


    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Property
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    // private function findVisibleQuery():QueryBuilder
    // {
    //     return $this->createQueryBuilder('p')
    //     ->Where('p.sold = false') ;
    // }
}

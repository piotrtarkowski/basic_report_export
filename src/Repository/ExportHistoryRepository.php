<?php

namespace App\Repository;

use App\Entity\ExportHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExportHistory>
 *
 * @method ExportHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExportHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExportHistory[]    findAll()
 * @method ExportHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExportHistoryRepository extends ServiceEntityRepository
{

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExportHistory::class);
    }

    /**
     * @param ExportHistory $entity
     * @param bool $flush
     * @return void
     */
    public function add(ExportHistory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param ExportHistory $entity
     * @param bool $flush
     * @return void
     */
    public function remove(ExportHistory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param array $options
     * @return array
     */
    public function getList(array $options = []): array
    {
        $qb = $this->createQueryBuilder('eh');

        if (array_key_exists('place', $options) && $options['place']) {
            $qb->andWhere('eh.place like :place');
            $qb->setParameter('place', '%' . $options['place'] . '%');
        }

        if (array_key_exists('exportAt', $options)) {
            $exportAt = $options['exportAt'];
            if (array_key_exists('start', $exportAt) && $exportAt['start']) {
                $qb->andWhere('eh.exportAt >= :exportAtStart');
                $qb->setParameter('exportAtStart', $exportAt['start']);
            }
            if (array_key_exists('end', $exportAt) && $exportAt['end']) {
                $qb->andWhere('eh.exportAt <= :exportAtEnd');
                $qb->setParameter('exportAtEnd', $exportAt['end']);
            }
        }

        return $qb->getQuery()->getResult();
    }

}

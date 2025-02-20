<?php

namespace App\Repository;

use App\Entity\ChatChannel;
use App\Entity\User;
use App\Enum\ChannelVisibility;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChatChannel>
 */
class ChatChannelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChatChannel::class);
    }

    public function userChannels(User $user): \Generator
    {
        yield from $this->findBy(['owner' => $user, 'visibility' => ChannelVisibility::PRIVATE]);
        yield from $this->findBy(['visibility' => ChannelVisibility::PUBLIC]);
    }

    //    /**
    //     * @return ChatChannel[] Returns an array of ChatChannel objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ChatChannel
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

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
}

<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ChatMessage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

readonly class ChatMessageRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    /**
     * @return array<ChatMessage>
     */
    public function all(): array
    {
        return $this->repository()->findAll();
    }

    public function allChannels(): array
    {
        return $this->repository()->createQueryBuilder('c')
            ->select('c.channel')
            ->distinct()
            ->getQuery()
            ->getResult();
    }

    /**
     * @return EntityRepository<ChatMessage>
     */
    private function repository(): EntityRepository
    {
        return $this->entityManager->getRepository(ChatMessage::class);
    }
}
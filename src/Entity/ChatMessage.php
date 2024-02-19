<?php

declare(strict_types=1);

namespace App\Entity;


use Carbon\CarbonImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
class ChatMessage
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    public Uuid $id;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    public \DateTimeImmutable $sentAt;

    #[ORM\Column(type: Types::STRING)]
    public string $message;

    public function __construct(string $message)
    {
        $this->id = Uuid::v7();
        $this->message = $message;
        $this->sentAt = CarbonImmutable::now();
    }
}

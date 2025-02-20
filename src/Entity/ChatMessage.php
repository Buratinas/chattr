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

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    public \DateTimeImmutable $sentAt;

    #[ORM\Column(type: Types::STRING)]
    public string $message;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?User $author = null;

    #[ORM\ManyToOne(inversedBy: 'chatMessages')]
    private ?ChatChannel $channel = null;

    public function __construct()
    {
        $this->id = Uuid::v7();
        $this->sentAt = CarbonImmutable::now();
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getChannel(): ?ChatChannel
    {
        return $this->channel;
    }

    public function setChannel(?ChatChannel $channel): static
    {
        $this->channel = $channel;

        return $this;
    }
}

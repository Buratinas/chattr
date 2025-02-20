<?php

namespace App\Entity;

use App\Enum\ChannelVisibility;
use App\Repository\ChatChannelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ChatChannelRepository::class)]
#[Broadcast]
class ChatChannel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(enumType: ChannelVisibility::class)]
    private ?ChannelVisibility $visibility = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getVisibility(): ?ChannelVisibility
    {
        return $this->visibility;
    }

    public function setVisibility(ChannelVisibility $visibility): static
    {
        $this->visibility = $visibility;

        return $this;
    }
}

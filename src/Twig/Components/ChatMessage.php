<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\ChatMessage as ChatMessageEntity;
use Symfony\Component\Uid\Uuid;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class ChatMessage
{
    public ChatMessageEntity $message;
}

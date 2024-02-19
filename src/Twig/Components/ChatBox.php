<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Repository\ChatMessageRepository;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use App\Entity\ChatMessage as ChatMessageEntity;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
class ChatBox
{
    public function __construct(
        private readonly ChatMessageRepository $chatMessageRepository
    )
    {
    }

    /**
     * @return \Generator<ChatMessageEntity>
     */
    public function messages(): \Generator
    {
        yield from $this->chatMessageRepository->all();
    }
}

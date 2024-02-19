<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Repository\ChatMessageRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use App\Entity\ChatMessage as ChatMessageEntity;

#[AsLiveComponent()]
class ChatBox
{
    use DefaultActionTrait;

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

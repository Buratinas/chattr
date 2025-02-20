<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Repository\ChatChannelRepository;
use App\Repository\ChatMessageRepository;
use App\Entity\ChatMessage as ChatMessageEntity;
use App\Entity\ChatChannel as ChatChannelEntity;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
class ChatBox
{
    public function __construct(
        private readonly ChatMessageRepository $chatMessageRepository,
        private readonly ChatChannelRepository $chatChannelRepository,
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

    /**
     * @return \Generator<ChatChannelEntity>
     */
    public function channels(): \Generator
    {
        yield from $this->chatChannelRepository->findAll();
    }
}

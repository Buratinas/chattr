<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\User;
use App\Repository\ChatChannelRepository;
use App\Repository\ChatMessageRepository;
use App\Entity\ChatMessage as ChatMessageEntity;
use App\Entity\ChatChannel as ChatChannelEntity;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
class ChatChannel
{
    public function __construct(
        private readonly ChatMessageRepository $chatMessageRepository,
        private readonly ChatChannelRepository $chatChannelRepository,
        private readonly Security $security,
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

    public function userChannels(User $user): \Generator
    {
        yield from $this->chatChannelRepository->userChannels($user);
    }

    public function selectedChannel(): ChatChannelEntity
    {
        return $this->chatChannelRepository->findOneBy(['id' => 1]);
    }

    public function user(): UserInterface
    {
        return $this->security->getUser();
    }
}

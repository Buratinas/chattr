<?php

namespace App\Controller;

use App\Entity\ChatChannel;
use App\Enum\ChannelVisibility;
use App\Form\ChannelFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ChannelController extends AbstractController
{
    #[Route('/channel', name: 'app_channel')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Fetch all existing channels
        $channels = $entityManager->getRepository(ChatChannel::class)->findAll();

        // Create new channel form
        $channel = new ChatChannel();
        $form = $this->createForm(ChannelFormType::class, $channel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $channel->setOwner($this->getUser());
            $entityManager->persist($channel);
            $entityManager->flush();

            return $this->redirectToRoute('app_channel'); // Reload page after adding channel
        }

        return $this->render('channel/index.html.twig', [
            'channels' => $channels,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/channel/{id}', name: 'app_add_channel')]
    public function channelSelected(ChatChannel $channel, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (
            !$channel->getUsers()->contains($this->getUser()) &&
            $channel->getOwner() !== $this->getUser() &&
            $channel->getVisibility() !== ChannelVisibility::PUBLIC
        ) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('home.html.twig', ['selectedChannel' => $channel->getId()]);
    }
}
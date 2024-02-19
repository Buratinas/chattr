<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/send-message', name: 'send_message', methods: ['POST'])]
class SendMessage extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('send_message.html.twig');
    }
}
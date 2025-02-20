<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\ChatMessage as ChatMessageEntity;
use App\Form\NewChatMessageFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class NewChatMessageForm extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    public ?ChatMessageEntity $initialFormData = null;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(NewChatMessageFormType::class, $this->initialFormData, [
            'user' => $this->getUser(),
        ]);
    }

    #[LiveAction]
    public function save(EntityManagerInterface $entityManager): Response
    {
        $this->submitForm();

        /** @var \App\Entity\ChatMessage $message */
        $message = $this->getForm()->getdata();
        $user = $this->getUser();
        $message->setAuthor($user);
        $entityManager->persist($message);
        $entityManager->flush();

        return $this->redirectToRoute('home');
    }
}
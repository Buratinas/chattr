<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\ChatMessage;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @extends AbstractType<ChatMessage>
 */
class NewChatMessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'message',
                TextareaType::class,
                [
                    'attr' => [
                        'rows' => 3,
                    ]
                ]
            )
            ->add('author', HiddenType::class, [
                // Only use this if you really need the ID in the form.
                'data' => null,
            ])
            ->add('channel', HiddenType::class, [
                'data' => $options['selectedChannel'] ?? 1,
                'mapped' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefaults([
                'data_class' => ChatMessage::class,
                'user' => null,
                'selectedChannel' => null,
            ]);

        $resolver->setAllowedTypes('user', ['null', User::class]);
        $resolver->setAllowedTypes('selectedChannel', ['null', 'int']);
    }
}
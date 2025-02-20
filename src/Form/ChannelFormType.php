<?php

namespace App\Form;

use App\Entity\ChatChannel;
use App\Enum\ChannelVisibility;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChannelFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('visibility', ChoiceType::class, [
                'choices' => [
                    'Public' => ChannelVisibility::PUBLIC,
                    'Private' => ChannelVisibility::PRIVATE,
                    'Protected' => ChannelVisibility::PROTECTED,
                ],
                'expanded' => false, // Set to true for radio buttons
                'multiple' => false, // Dropdown (single select)
                'label' => 'Visibility',
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChatChannel::class,
        ]);
    }
}
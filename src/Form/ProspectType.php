<?php

namespace App\Form;

use App\Entity\Civility;
use App\Entity\Prospect;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProspectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'civility',
                EntityType::class,
                ['class' => Civility::class,
                    'choice_label' => 'shortName',
                    'expanded' => false,
                    'multiple' => false,
                    'by_reference' => true,
                    'placeholder' => '',
                ]
            )
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('email')
            ->add('fullAddress')
            ->add('street', HiddenType::class)
            ->add('zipCode', HiddenType::class)
            ->add('city', HiddenType::class)
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prospect::class,
        ]);
    }
}

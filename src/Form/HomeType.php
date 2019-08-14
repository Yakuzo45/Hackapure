<?php

namespace App\Form;

use App\Entity\Home;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adult', IntegerType::class, [
                'label' =>'Adult(s)',
                'required' => true
            ])
            ->add('teenager', IntegerType::class, [
                'label' => 'Adolescent(s) (12-18 ans)'
            ])
            ->add('kid', IntegerType::class, [
                'label' => 'Enfant(s) (5-12 ans)'
            ])
            ->add('child', IntegerType::class, [
                'label' => 'Enfant(s) (0-5 ans)'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}

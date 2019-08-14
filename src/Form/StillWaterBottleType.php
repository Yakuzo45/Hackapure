<?php

namespace App\Form;

use App\Entity\StillWaterBottle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StillWaterBottleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('literPerWeek', IntegerType::class, [
                'attr' => ['class' => ''], 'label' => false])
            ->add('waterBrand', ChoiceType::class, [
                'label' => false, 'attr' => ['class' => ''], 'choices' => StillWaterBottle::BRANDWATER]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StillWaterBottle::class,
        ]);
    }
}

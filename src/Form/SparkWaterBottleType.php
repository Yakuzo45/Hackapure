<?php

namespace App\Form;

use App\Entity\Consumption;
use App\Entity\SparkWaterBottle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SparkWaterBottleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('literPerWeek', IntegerType::class, [
                'attr' => ['class' => ''], 'label' => false])
            ->add('waterBrand', ChoiceType::class, [
                'label' => false, 'attr' => ['class' => ''], 'choices' => SparkWaterBottle::BRANDSPARKWATER])
            ->add('consumption', EntityType::class, ['class' => Consumption::class]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SparkWaterBottle::class,
        ]);
    }
}

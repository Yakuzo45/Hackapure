<?php

namespace App\Form;

use App\Entity\Consumption;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsumptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('waterConsumption', IntegerType::class, ['label' => 'Litre/an'])
            ->add('stillWater', ChoiceType::class, [
                'label' => 'Eau Plate', 'mapped' => false, 'choices' => ['Oui' => 'yes', 'Non' => 'no']])
            ->add('stillWaterBottle', CollectionType::class, [
                'label' => false, 'entry_type' => StillWaterBottleType::class, 'allow_add' => true])
            ->add('sparkWater', ChoiceType::class, [
                'label' => 'Eau Pétillante', 'mapped' => false, 'choices' => ['Oui' => 'yes', 'Non' => 'no']])
            ->add('sparkWaterBottle', CollectionType::class, [
                'label' => false, 'entry_type' => SparkWaterBottleType::class, 'allow_add' => true])
            ->add('home', HomeType::class, ['label' => false])
            ->add('waterHeater', CollectionType::class, [
                'label' => false, 'entry_type' => WaterHeaterType::class, 'allow_add' => true])
            ->add('heater', CollectionType::class, [
                'label' => false, 'entry_type' => HeaterType::class, 'allow_add' => true])
            ->add('homeAppliance', CollectionType::class, [
                'label' => false, 'entry_type' => HomeApplianceType::class, 'allow_add' => true]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consumption::class,
        ]);
    }
}

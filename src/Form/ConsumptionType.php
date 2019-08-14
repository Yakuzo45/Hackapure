<?php

namespace App\Form;

use App\Entity\Consumption;
use App\Entity\Heater;
use App\Entity\Home;
use App\Entity\HomeAppliance;
use App\Entity\SparkWaterBottle;
use App\Entity\StillWaterBottle;
use App\Entity\WaterHeater;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsumptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('waterConsumption', IntegerType::class, [
                'label' => 'Litre/an'
            ])
            ->add(
                $builder->create('stillWaterBottle', FormType::class, [
                    'by_reference' => StillWaterBottle::class,
                    'label' => false,
                    'mapped' => false,
                    'required' => false,
                    'attr' => ['class' => 'd-none']
                ])
                    ->add('water', ChoiceType::class, [
                        'label' => 'Eau Plate',
                        'mapped' => false,
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => [
                            'Oui' => 'yes',
                            'Non' => 'no'
                        ],
                    ])
                    ->add('literPerWeek', IntegerType::class, [
                        'attr' => ['class' => 'd-none'],
                        'label' => false
                    ])
                    ->add('waterBrand', ChoiceType::class, [
                        'label' => false,
                        'attr' => ['class' => 'd-none'],
                        'choices' => StillWaterBottle::BRANDWATER
                    ])
            )
//            ->add(
//                $builder->create('sparkWaterBottle', FormType::class, [
//                    'by_reference' => SparkWaterBottle::class,
//                    'label' => false,
//                    'mapped' => false,
//                    'required' => false
//                ])
//                    ->add('sparkWater', ChoiceType::class, [
//                        'label' => 'Eau Pétillante',
//                        'mapped' => false,
//                        'expanded' => true,
//                        'multiple' => false,
//                        'choices' => [
//                            'Oui' => 'yes',
//                            'Non' => 'no'
//                        ],
//                    ])
//                    ->add('literPerWeek', IntegerType::class)
//                    ->add('waterSparkBrand', ChoiceType::class, [
//                        'label' => false,
//                        'choices' => SparkWaterBottle::BRANDSPARKWATER
//                    ])
//            )
//            ->add('home', HomeType::class)
//            ->add(
//                $builder->create('waterHeater', FormType::class, [
//                    'by_reference' => WaterHeater::class,
//                    'label' => 'Chauffe-eau',
//                ])
//                    ->add('number', IntegerType::class, [
//                        'label' => false
//                    ])
//                    ->add('type', ChoiceType::class, [
//                        'label' => false, 'choices' => WaterHeater::WATERHEATER_TYPES
//                    ])
//            )
//            ->add(
//                $builder->create('heater', FormType::class, [
//                    'by_reference' => Heater::class, 'label' => 'Chauffage'
//                ])
//                    ->add('number', IntegerType::class, [
//                        'label' => false
//                    ])
//                    ->add('type', ChoiceType::class, [
//                        'label' => false, 'choices' => Heater::HEATER_TYPES
//                    ])
//            )
//            ->add(
//                $builder->create('homeAppliance', FormType::class, [
//                    'by_reference' => HomeAppliance::class,
//                    'label' => 'Électromenager'
//                ])
//                    ->add('number', IntegerType::class, [
//                        'label' => false
//                    ])
//                    ->add('type', ChoiceType::class, [
//                        'label' => false, 'choices' => HomeAppliance::HOMEAPPLIANCE_TYPES,
//                    ])
//            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consumption::class,
        ]);
    }
}

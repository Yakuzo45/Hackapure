<?php

namespace App\Form;

use App\Entity\AfterMeter;
use App\Entity\Install;
use App\Entity\UnderSink;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class InstallFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                $builder->create('aftermeter', FormType::class, [
                    'by_reference' => AfterMeter::class,
                    'label' => false,
                ])
                    ->add('material', ChoiceType::class, [
                        'choices' => [
                            'cuivre' => 'Cuivre',
                            'galva' => 'Galva',
                            'multicouche' => 'Multicouche',
                            'polyéthylène' => 'Polyéthylène',
                            'polyéthylène réticulé' => 'Polyéthylène Réticulé',
                            'pvc pression' => 'PVC Pression'
                        ],
                        'label' => 'Matériel',
                    ])
                    ->add('diameter', TextType::class, [
                        'label' => 'Diamètre',
                    ])
                    ->add('screwthread', ChoiceType::class, [
                        'choices' => [
                            'mâle' => 'Mâle',
                            'femelle' => 'Femelle'
                        ],
                        'label' => 'Pas de vis',
                    ])
                    ->add('thread', ChoiceType::class, [
                        'choices' => [
                            '1/2"' => '1/2"',
                            '3/4"' => '3/4"',
                            '1"' => '1"',
                            '1 1/4"' => '1 1/4"',
                            '1 1/2"' => '1 1/2"'
                        ],
                        'label' => 'Filetage',
                    ])
                    ->add('accuracy', TextareaType::class, [
                        'label' => 'Précision',
                    ])
//                    ->add('picture', VichImageType::class, [
//                        'label' => 'Photo',
//                    ])
            );

        $builder
            ->add(
                $builder->create('undersink', FormType::class, [
                    'by_reference' => UnderSink::class,
                    'label' => false
                ])
                    ->add('material', ChoiceType::class, [
                        'choices' => [
                            'cuivre' => 'Cuivre',
                            'galva' => 'Galva',
                            'multicouche' => 'Multicouche',
                            'polyéthylène réticulé' => 'Polyéthylène Réticulé',
                        ],
                        'label' => 'Matériel',
                    ])
                    ->add('diameter', TextType::class, [
                        'label' => 'Diamètre',
                    ])
                    ->add('screwthread', ChoiceType::class, [
                        'choices' => [
                            'mâle' => 'Mâle',
                            'femelle' => 'Femelle'
                        ],
                        'label' => 'Pas de vis',
                    ])
                    ->add('thread', ChoiceType::class, [
                        'choices' => [
                            '3/8"' => '3/8"',
                            '1/2"' => '1/2"'
                        ],
                        'label' => 'Filetage',
                    ])
                    ->add('accuracy', TextareaType::class, [
                        'label' => 'Précision',
                    ])
//                    ->add('picture', VichImageType::class, [
//                        'label' => 'Photo',
//                    ])
            );

        $builder
            ->add(
                $builder->create('bath', FormType::class, [
                    'by_reference' => UnderSink::class,
                    'label' => false
                ])
                    ->add('privy', IntegerType::class, [
                        'label' => 'WC',
                    ])
                    ->add('privy', ChoiceType::class, [
                        'choices' => [
                            'posé' => 'WC posé',
                            'suspendu' => 'WC suspendu'
                        ],
                        'label' => 'WC',
                    ])
//                    ->add('privy', VichImageType::class, [
//                        'label' => 'Photo'
//                    ])
                    ->add('sink', IntegerType::class, [
                        'label' => 'Lavabo',
                    ])
                    ->add('sink', ChoiceType::class, [
                        'choices' => [
                            'mitigeurs' => 'Mitigeurs',
                            'robinet' => 'Robinet eau froide/chaude'
                        ],
                        'label' => 'Lavabos',
                    ])
//                    ->add('sink', VichImageType::class, [
//                        'label' => 'Photo'
//                    ])
                    ->add('bath', IntegerType::class, [
                        'label' => 'Baignoire',
                    ])
//                    ->add('bath', VichImageType::class, [
//                        'label' => 'Photo'
//                    ])
                    ->add('shower', IntegerType::class, [
                        'label' => 'Douche',
                    ])
                    ->add('shower', ChoiceType::class, [
                        'choices' => [
                            'mobile' => 'Douche à pommeau mobile',
                            'encastre' => 'Douche à pommeau encastré'
                        ],
                        'label' => 'Douche',
                    ])
//                    ->add('shower', VichImageType::class, [
//                        'label' => 'Photo'
//                    ])
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Install::class,
        ]);
    }
}

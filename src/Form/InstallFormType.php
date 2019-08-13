<?php

namespace App\Form;

use App\Entity\AfterMeter;
use App\Entity\Install;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstallFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                $builder->create('aftermeter', FormType::class, [
                'by_reference' => AfterMeter::class,
                'label' => 'false',
                            ])
                ->add('material', TextType::class, [
                    'label' => 'Matériel',
                    'required' => true
                ])

                ->add('diameter', IntegerType::class, [
                    'label' => 'Diamètre',
                    'required' => true
                ])

                ->add('screwthread', TextType::class, [
                    'label' => 'Pas de vis',
                    'required' => true
                ])

                ->add('thread', TextType::class, [
                    'label' => 'Filetage',
                    'required' => true
                ])

                ->add('accuracy', TextareaType::class, [
                    'label' => 'Précision',
                    'required' => false
                ])

                ->add('picture', TextType::class, [
                    'label' => 'Photo',
                    'required' => false
                ])
            );

        $builder
        ->add()




    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Install::class,
        ]);
    }
}

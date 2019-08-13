<?php

namespace App\Form;

use App\Entity\Pollution;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PollutionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('TDS', TextType::class, [
                'attr' => [
                    'placeholder' => 'PPM',
                ]
            ])

            ->add('userReturn', ChoiceType::class, [
                'choices'  => [
                    'Dureté ressentie'=>'Dureté ressentie',
                    'Très dure' => 'Très dure',
                    'Dure' => 'Dure',
                    'Moyennement dure' => 'Moyennement dure',
                    'Douce' => 'Douce',
                    'Très douce' => 'Très douce',

                ],])

            ->add('waterTaste', ChoiceType::class, [
                'choices'  => [
                    'Avis sur le goût'=>'Avis sur le goût',
                    'Irratrapable' => 'Irratrapable',
                    'Mauvais' => 'Mauvais',
                    'Moyen' => 'Moyen',
                    'Bon' => 'Bon',
                    'Excellent' => 'Excellent',

                ],])

            ->add('waterOdour', ChoiceType::class, [
                'choices'  => [
                    "Avis sur l'odeur" => "Avis sur l'odeur",
                    'Insupportable' => 'Insupportable',
                    'Mauvaise' => 'Mauvaise',
                    'Passable' => 'Passable',
                    'Bonne' => 'Bonne',
                    'Excellente' => 'Excellente',

                ],])

            ->add('waterQuality', ChoiceType::class, [
                'choices'  => [
                    'Avis sur la qualité générale'=>'Avis sur la qualité générale',
                    'Terrible' => 'Terrible',
                    'Douteuse' => 'Douteuse',
                    'Moyenne' => 'Moyenne',
                    'Satisfaisante' => 'Satisfaisante',
                    'Irréprochable' => 'Irréprochable',

                ],])
            ->add('SpecialAnalyzes', TextareaType::class, ['required'=>false],[
                'attr' => [
                    'placeholder' => 'analyses particulières',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pollution::class,
        ]);
    }
}

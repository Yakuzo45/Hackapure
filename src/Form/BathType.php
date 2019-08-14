<?php


namespace App\Form;


use App\Entity\Bath;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use \Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BathType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', IntegerType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'baignoire italienne' => '1',
                    'baignoire suspendue' => "2"
                ]
            ])

        ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bath::class,
        ]);
    }
}

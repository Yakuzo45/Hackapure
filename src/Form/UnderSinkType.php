<?php


namespace App\Form;


use App\Entity\Diameter;
use App\Entity\Material;
use App\Entity\UnderSink;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UnderSinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('material', EntityType::class, [
            'class' => Material::class,
            'choice_label' => 'materials',
            'label' => 'Matériel',
        ])
            ->add('diameter', EntityType::class, [
                'class' => Diameter::class,
                'label' => 'Diamètre',
                'choice_label' => 'diameter',
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
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UnderSink::class,
        ]);
    }
}

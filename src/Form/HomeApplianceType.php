<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\HomeAppliance;

class HomeApplianceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', IntegerType::class, [
                'attr' => ['class' => ''], 'label' => false])
            ->add('type', ChoiceType::class, [
                'label' => false, 'attr' => ['class' => ''], 'choices' => HomeAppliance::HOMEAPPLIANCE_TYPES]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HomeAppliance::class,
        ]);
    }
}
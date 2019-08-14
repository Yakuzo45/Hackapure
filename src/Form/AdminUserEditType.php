<?php

namespace App\Form;

use App\Entity\AdminUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminUserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre Email :',
                'attr' => ['placeholder' => 'Email', 'class' => 'form-control']
            ])
            ->add('userRole', ChoiceType::class, [
                'choices'  => [
                    "Commercial" => 'ROLE_USER',
                    "Admin" => 'ROLE_ADMIN'
                ],
                'multiple' => false,
                'expanded'=>true,
                'label' => 'Attribuez un rôle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AdminUser::class,
        ]);
    }
}

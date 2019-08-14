<?php

namespace App\Form;

use App\Entity\AfterMeter;
use App\Entity\Diameter;
use App\Entity\Install;
use App\Entity\Material;
use App\Entity\UnderSink;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class InstallFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('aftermeter', AfterMeterType::class);

        $builder->add('undersink', UnderSinkType::class);

        $builder->add('privy', CollectionType::class, [
            'entry_type' => PrivyType::class,
            'label' => "WC",
            'allow_add' => true,
        ]);

        $builder->add('sink', CollectionType::class, [
            'label' => "Lavabo",
            'entry_type' => SinkType::class,
            'allow_add' => true,
        ]);

        $builder->add('bath', BathType::class, [
            'label' => "Baignoire",
        ]);

        $builder->add('shower', CollectionType::class, [
            'label' => "Douche",
            'entry_type' => ShowerType::class,
            'allow_add' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Install::class,
        ]);
    }
}

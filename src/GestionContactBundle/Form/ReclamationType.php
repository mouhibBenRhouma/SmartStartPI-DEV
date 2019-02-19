<?php

namespace GestionContactBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('description')->add('idfreelancer',EntityType::class,array(
            'class'=>'MyBundle\Entity\User',
            'choice_label'=>'nom',
            'multiple'=>false
        ))->add('idfreelancer',EntityType::class,array(
            'class'=>'MyBundle\Entity\User',
            'choice_label'=>'nom',
            'multiple'=>false
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionContactBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestioncontactbundle_reclamation';
    }


}

<?php

namespace AgendaBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AgendaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Nom',TextType::class)
            ->add('Date_debut',\Symfony\Component\Form\Extension\Core\Type\DateType::class)
            ->add('Date_fin',\Symfony\Component\Form\Extension\Core\Type\DateType::class)
            ->add('Type',TextType::class)
            ->add('idProjet',EntityType::class,array(
                'class' =>'AgendaBundle\Entity\Projet',
                'choice_label' =>'nom',
                'multiple' => false
            ))
            ->add('idfonctionnalite',EntityType::class,array(
                'class' =>'AgendaBundle\Entity\Fonctionnalites',
                'choice_label' =>'nom',
                'multiple' => false))
            ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AgendaBundle\Entity\Agenda'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'agendabundle_agenda';
    }


}

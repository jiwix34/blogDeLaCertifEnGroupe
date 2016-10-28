<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         
        $d = date('Y-m-d');
        
        $builder
                ->add('photo', FileType::class,array('data_class' => null))
                ->add('titre')
                ->add('lieuxExposition')
                ->add('ville')
                ->add('commentaire')
                ->add('date', DateType::class, array(
                   'widget' => 'single_text',
                   'attr' => ['max' => '','min' => $d]))
                ->add('auteur')
                ->add('publier')
                ->add ('envoyer', SubmitType::class)
                ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evenements'
        ));
    }


}
<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('photo', FileType::class, array('data_class'=> null))
                ->add('titre')
                ->add('appareilPhotoUtilise', ChoiceType::class, array(
                    'choices'  => array(
                        'reflex' => 'reflex',
                        'numerique' => 'numerique',
                        'portable' => 'portable',
                    ),
                    ))
                ->add('commentaire', TextareaType::class)
                ->add('date', DateType::class)
                ->add('ville')
                ->add('auteur')
                ->add('publier') 
                ->add('envoyer', SubmitType::class)
                
                ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Photos'
        ));
    }



}

<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('email')
            ->add('tel')
            ->add('matricule')
            ->add('dateNaissance')
            ;
           $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
                $data = $event->getData();
                $form = $event->getForm();

               $etudiant = $data->getPrenom();
               $bourse = null === $etudiant ? [] : $etudiant->getLibele();

               $form->add('Bourse', EntityType::class, array(
                   'class'=>'App\Entity\TypeBourse',
                   'placeholder'=>'Choisir',
                   'choice_label'=>function($bourse){
                     return $bourse->getLibele();
                   },
                   'mapped'=>false,
               ));
            });

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}

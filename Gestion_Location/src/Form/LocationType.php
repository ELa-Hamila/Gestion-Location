<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use App\Entity\Appartement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbMois')
            ->add('datloc')
            ->add('numApp', EntityType::class, [
                'class' => Appartement::class,
                'choice_label' => 'id', // Utilisez la propriété 'id' de l'appartement comme libellé
                'placeholder' => 'Sélectionnez un appartement', // optionnel : affiche un libellé par défaut
                'mapped' => false, // Ne mappez pas cette propriété à l'entité Location
                'required' => true, // Rendre ce champ obligatoire
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
                $form = $event->getForm();
                $location = $event->getData();
                $appartement = $location->getNumApp();
    
                // Si un appartement est sélectionné, définissez le montant sur l'ID de l'appartement
                if ($appartement instanceof Appartement) {
                    $location->setMontant($appartement->getId());
                }
            });
    }
    
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}

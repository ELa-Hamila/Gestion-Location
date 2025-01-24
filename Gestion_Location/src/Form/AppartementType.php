<?php

namespace App\Form;
use App\Entity\Proprietaire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Appartement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppartementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('localite')
            ->add('nbPiece')
            ->add('valeur')
            ->add('description')
            ->add('image1')
            ->add('image2')
            ->add('idProp', EntityType::class, [
                'class' => Proprietaire::class, // Entité associée au champ
                'choice_label' => 'nom', // Propriété à afficher dans la liste déroulante
                'placeholder' => 'Choose an owner', // Optionnel : libellé par défaut
                // Vous pouvez également ajouter d'autres options de champ selon vos besoins
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appartement::class,
        ]);
    }
}

<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Site;
use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('lien')
            ->add('version')
            ->add('clientConcerne', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nomContact',
                'required' => true,
            ])

            ->add('version', ChoiceType::class, [
                'choices' => [
                    'PHP 7.0' => '7.0',
                    'PHP 7.1' => '7.1',
                    'PHP 7.2' => '7.2',
                    'PHP 7.3' => '7.3',
                    'PHP 7.4' => '7.4',
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Site::class,
        ]);
    }
}

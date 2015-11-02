<?php

namespace AdvertBundle\Form;

use CatalogBundle\Document\ModelRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class AdvertType extends AbstractType
{
    public function __construct()
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('year', 'integer')
            ->add('price', 'integer')
            ->add('is_new', 'checkbox')
            ->add('make', 'document', [
                'class' => 'CatalogBundle\Document\Make',
            ])
            ->add('model', 'document', [
                'class' => 'CatalogBundle\Document\Model',
                'query_builder' => function (ModelRepository $repo) {
                    return $repo->createQueryBuilder()->field('id')->equals(false);
                },
            ])
            ->add('description', 'textarea');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AdvertBundle\Document\Advert',
        ]);
    }

    public function getName()
    {
        return 'advert_bundle_advert_type';
    }
}

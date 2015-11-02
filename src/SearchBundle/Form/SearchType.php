<?php

namespace SearchBundle\Form;

use CatalogBundle\Document\ModelRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('year_from', 'choice', [
                'choices' => range(Date('Y') - 70, date('Y')),
                'empty_value' => 'All',
            ])
            ->add('year_to', 'choice', [
                'choices' => range(Date('Y') - 70, date('Y')),
                'empty_value' => 'All',
            ])
            ->add('price_from', 'integer')
            ->add('price_to', 'integer')
            ->add('make', 'document', [
                'class' => 'CatalogBundle\Document\Make',
                'empty_value' => 'All',
            ])
            ->add('model', 'document', [
                'class' => 'CatalogBundle\Document\Model',
                'empty_value' => 'All',
                'query_builder' => function (ModelRepository $repo) {
                    // Hack for get empty Builder
                    return $repo->createModelsByMakeQuery(false);
                },
            ]);
    }

    public function getName()
    {
        return 'search_bundle_search';
    }
}

<?php

namespace SearchBundle\Form;

use AdvertBundle\Document\ModelRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $years = $this->buildYearChoices();

        $builder
            ->add('year_from', 'choice', [
                'choices' => $years,
                'empty_value' => 'All',
            ])
            ->add('year_to', 'choice', [
                'choices' => $years,
                'empty_value' => 'All',
            ])
            ->add('price_from', 'integer')
            ->add('price_to', 'integer')
            ->add('make', 'document', [
                'class' => 'AdvertBundle\Document\Make',
                'empty_value' => 'All',
            ])
            ->add('model', 'document', [
                'class' => 'AdvertBundle\Document\Model',
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

    private function buildYearChoices() {
        $distance = 20;
        $yearsBefore = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") - $distance));
        $yearsAfter = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") + $distance));
        return array_combine(range($yearsBefore, $yearsAfter), range($yearsBefore, $yearsAfter));
    }
}

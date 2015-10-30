<?php

namespace AdvertBundle\Form;

use AdvertBundle\Document\ModelRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType
{
    protected $makeID;

    public function __construct($makeID)
    {
        $this->makeID = $makeID;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $makeID = $this->makeID;

        $builder
            ->add('year', 'integer')
            ->add('price', 'integer')
            ->add('is_new', 'checkbox')
            ->add('make', 'document', [
                'class' => 'AdvertBundle\Document\Make',
            ])
            ->add('model', 'document', [
                'class' => 'AdvertBundle\Document\Model',
                'query_builder' => function (ModelRepository $repo) use ($makeID) {
                    return $repo->createModelsByMakeQuery($makeID);
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

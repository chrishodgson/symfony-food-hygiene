<?php
namespace AppBundle\Form\LocalAuthority;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalAuthoritySearchForm extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('local_authority_id', ChoiceType::class, [
                'label' => 'Local Authority:',
                'required' => true,
                'empty_data'  => null,
                'placeholder'=>'-- Select a Local Authority --',
                'choices' => $options['localAuthorityChoices'],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Search'
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_local_authority_search';
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'localAuthorityChoices' => null,
        ));
    }
}

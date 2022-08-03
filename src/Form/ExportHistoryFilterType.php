<?php

namespace App\Form;

use App\Form\Type\DateRangeType;
use App\Service\ExportHistoryPlaceEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExportHistoryFilterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('place', ChoiceType::class, [
                'required' => false,
                'choices' => ExportHistoryPlaceEnum::getChoiceList(),
                'placeholder' => 'Lokal:'
            ])
            ->add('exportAt', DateRangeType::class, [
                'label' => false,
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'translation_alias' => 'label.form.exportHistory.',
            'csrf_protection' => false,
        ]);
    }
}
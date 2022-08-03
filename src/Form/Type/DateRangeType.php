<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class DateRangeType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'start',
                DateType::class,
                [
                    'required' => false,
                    'label' => 'Od: ',
                    'widget' => 'single_text',
//                    'date_label' => 'Starts On',
                    'placeholder' => 'Od:',
                    "format" => 'yyyy-MM-dd',
                ]
            )
            ->add(
                'end',
                DateType::class,
                [
                    'required' => false,
                    'label' => 'Do: ',
                    'widget' => 'single_text',
                    'placeholder' => 'Do:',
                ]
            );
    }

}
<?php

declare(strict_types=1);

namespace App\Form;

use App\Service\Delivery\TransportService\PackGroupTransport;
use App\Service\Delivery\TransportService\TransCompanyTransport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TextRegexForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'text',
                TextareaType::class,
                [
                    'required' => true,
                ]
            )->add('getTags', SubmitType::class,['label' => 'getTags','attr' => ['class' => 'btn btn-primary']])
            ->add('getKeys', SubmitType::class, ['label' => 'getKeys','attr' => ['class' => 'btn btn-success']]);
    }


}

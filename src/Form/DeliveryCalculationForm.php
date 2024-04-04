<?php
declare(strict_types=1);

namespace App\Form;

use App\Service\Delivery\Calculation\DeliveryCalculatorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Positive;

class DeliveryCalculationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //TODO: would be nice to have separate DeliveryType entity in DB and parse all of them here ^^
        $builder
            ->add(
                'slug',
                ChoiceType::class,
                [
                    'choices' => [
                        'PackGroup' => DeliveryCalculatorInterface::SLUG_PACK_GROUP,
                        'Trans Company' => DeliveryCalculatorInterface::SLUG_TRANS_COMPANY,
                    ]
                ]
            )->add('weight', NumberType::class, [
                'required' => true,
                'constraints' => [new GreaterThan(0), new Positive()],
                ])
            ->add('submit', SubmitType::class);
    }
}
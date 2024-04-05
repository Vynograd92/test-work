<?php
declare(strict_types=1);

namespace App\Form;

use App\Service\Delivery\TransportService\PackGroupTransport;
use App\Service\Delivery\TransportService\TransCompanyTransport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\GreaterThan;

class DeliveryCalculationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'slug',
                ChoiceType::class,
                [
                    'choices' => [
                        'PackGroup' => PackGroupTransport::SLUG,
                        'Trans Company' => TransCompanyTransport::SLUG,
                    ]
                ]
            )->add('weight', NumberType::class, [
                'required' => true,

                'constraints' => [new GreaterThan(0)]
            ])
            ->add('submit', SubmitType::class);
    }
}
<?php
declare(strict_types=1);

namespace App\Service\Delivery;

use App\Service\Delivery\Calculation\DeliveryCalculatorInterface;

class DeliveryManager
{
    /**
     * @param iterable|DeliveryCalculatorInterface[] $deliveryCalculators
     */
    public function __construct(private iterable $deliveryCalculators)
    {
    }

    public function getDeliveryCalculator(string $slug): DeliveryCalculatorInterface
    {
        foreach ($this->deliveryCalculators as $deliveryCalculator) {
            if ($deliveryCalculator->getSlug() === $slug) {
                return $deliveryCalculator;
            }
        }

        throw new \RuntimeException('unknown slug');
    }
}
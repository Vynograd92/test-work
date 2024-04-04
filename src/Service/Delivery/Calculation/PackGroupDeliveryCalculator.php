<?php

namespace App\Service\Delivery\Calculation;

class PackGroupDeliveryCalculator implements DeliveryCalculatorInterface
{
    public function calculatePrice(float $weight): float
    {
        return ceil($weight);
    }

    public function getSlug(): string
    {
        return self::SLUG_PACK_GROUP;
    }
}
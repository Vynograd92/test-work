<?php

namespace App\Service\Delivery\Calculation;


class TransCompanyDeliveryCalculator implements DeliveryCalculatorInterface
{
    public function calculatePrice(float $weight): float
    {
        return $weight < 10.0 ? 20.0 : 100;
    }

    public function getSlug(): string
    {
        return self::SLUG_TRANS_COMPANY;
    }
}
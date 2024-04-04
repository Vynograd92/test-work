<?php
declare(strict_types=1);

namespace App\Service\Delivery\Calculation;

interface DeliveryCalculatorInterface
{
    public const SLUG_PACK_GROUP = 'packGroup';
    public const SLUG_TRANS_COMPANY = 'transCompany';

    public function calculatePrice(float $weight): float;
    public function getSlug(): string;
}
<?php
declare(strict_types=1);

namespace App\Service\Delivery\TransportService;

class TransCompanyTransport extends AbstractTransportService
{
    public const SLUG = 'transCompany';

    public function calculatePrice(float $weight): float
    {
        return $weight < 10.0 ? 20.0 : 100;
    }
}
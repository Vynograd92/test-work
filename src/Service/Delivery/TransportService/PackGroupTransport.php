<?php
declare(strict_types=1);

namespace App\Service\Delivery\TransportService;

class PackGroupTransport extends AbstractTransportService
{
    public const SLUG = 'packGroup';

    public function calculatePrice(float $weight): float
    {
        return ceil($weight);
    }
}
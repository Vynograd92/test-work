<?php
declare(strict_types=1);

namespace App\Service\Delivery\TransportService;

interface TransportInterface
{
    public function calculatePrice(float $weight): float;

    public function getSlug(): string;
}
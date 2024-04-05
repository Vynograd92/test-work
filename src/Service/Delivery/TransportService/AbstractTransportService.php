<?php
declare(strict_types=1);

namespace App\Service\Delivery\TransportService;

abstract class AbstractTransportService implements TransportInterface
{
    public function getSlug(): string
    {
        return static::SLUG;
    }
}
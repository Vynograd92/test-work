<?php
declare(strict_types=1);

namespace App\Service\Delivery;

use App\Service\Delivery\TransportService\TransportInterface;

class DeliveryManager
{
    /**
     * @param iterable|TransportInterface[] $transportServices
     */
    public function __construct(private iterable $transportServices)
    {
    }

    public function getTransportService(string $slug): TransportInterface
    {
        foreach ($this->transportServices as $transportService) {
            if ($transportService->getSlug() === $slug) {
                return $transportService;
            }
        }

        throw new \RuntimeException('unknown slug');
    }
}
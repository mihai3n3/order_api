<?php
declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Exception;
use RuntimeException;

final class OrderProductsProvider implements ProviderInterface
{

    public function provide(Operation $operation, array $uriVariables = [], array $context = [])
    {
        try {
            $collection = $this->repository->getProductsOrder();
        } catch (Exception $exception) {
            throw new RuntimeException(sprintf('Unable to retrieve products order : %s', $exception->getMessage()));
        }
    }
}
<?php

namespace App\Repository;

interface OrderLineInterface
{
    public function getProductsOrder(int $orderId): array;
}
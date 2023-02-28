<?php
declare(strict_types=1);

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Order;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;

class OrderTest extends ApiTestCase
{
    use RefreshDatabaseTrait;

    public function testGetCollection(): void
    {
        $response = static::createClient()->request('GET', '/orders');
        $this->assertResponseIsSuccessful();
        $this->assertMatchesResourceCollectionJsonSchema(Order::class);
    }

    public function testCreateOrder(): void
    {

    }

    public function testCreateInvalidOrder(): void
    {

    }

    public function testDeleteOrder(): void
    {
        $client = static::createClient();
        $iri = $this->findIriBy(Order::class, ['id' => '100']);

        $client->request('DELETE', $iri);

        $this->assertResponseStatusCodeSame(204);
        $this->assertNull(
            static::getContainer()->get('doctrine')->getRepository(Order::class)->find('100')
        );
    }

    public function testAddProductToOrder(): void
    {

    }

    public function testRemoveProductToOrder(): void
    {

    }

}
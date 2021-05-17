<?php

namespace Tests;

use App\Cart\Cart;
use PHPUnit\Framework\TestCase;
use Tests\Factory\ProductFactory;

class CartTest extends TestCase
{
    public Cart $cart;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cart = new Cart();
    }

    public function testItAddsProductToACart(): void
    {
        $product = ProductFactory::create();

        $this->cart->addProduct($product);

        $this->assertCount(1, $this->cart->getContent());
        $this->assertSame($product, $this->cart->getContent()[0]);
    }

    public function testAddingProductToACartIncreasesQuantity(): void
    {
        $product = ProductFactory::create();

        $this->cart->addProduct($product)
            ->addProduct($product);

        $this->assertCount(1, $this->cart->getContent());
        $this->assertEquals(2, $this->cart->totalItems());
    }


    public function testItRemovesProductFromCart(): void
    {
        $product1 = ProductFactory::create(['id' => 1, 'name' => 'Product 1']);
        $product2 = ProductFactory::create(['id' => 2, 'name' => 'Product 2']);

        $this->cart->addProduct($product1)
            ->addProduct($product2);

        $this->assertCount(2, $this->cart->getContent());
        $this->assertEquals(2, $this->cart->totalItems());

        $this->cart->removeProduct($product2);

        $this->assertCount(1, $this->cart->getContent());
        $this->assertEquals(1, $this->cart->totalItems());
    }


    public function testItComputesCartSum(): void
    {
        $product1 = ProductFactory::create(['id' => 1, 'price' => 130]);
        $product2 = ProductFactory::create(['id' => 2, 'price' => 150]);

        $this->cart->addProduct($product1)
            ->addProduct($product2);

        $this->assertEquals(280, $this->cart->total());
    }
}

<?php

namespace Tests\Factory;

use App\Entities\Product;

class ProductFactory
{

    public static function create(array $attributes = []): Product
    {
        $default = [
            'id' => 1,
            'name' => 'Product 1',
            'price' => 100,
        ];
        return new Product(...array_merge($default, $attributes));
    }
}

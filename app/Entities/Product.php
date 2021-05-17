<?php

namespace App\Entities;

class Product
{
    private $id;
    private $name;
    private $price;

    /**
     * Product constructor.
     * @param  int  $id
     * @param  string  $name
     * @param  int  $price
     */
    public function __construct(int $id, string $name, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}

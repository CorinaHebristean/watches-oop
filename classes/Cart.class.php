<?php

class Cart extends Database
{
    protected $products = [];


    public function addProduct($product)
    {
        $this->products[$product['id']] = $product;
    }

    public function removeProduct($productId)
    {
        unset($this->products[$productId]);
    }

    public function updateProductQuantity($productId)
    {

    }

    public function emptyCart()
    {
        $this->products = [];
    }

    public function calculateTotal()
    {

    }
    public function countProducts()
    {
        return count($this->products);
    }

    public function getAllProducts()
    {
        
    }


}

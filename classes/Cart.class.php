<?php

class Cart extends Database
{
    protected $products = [];


    public function __construct() 
    {
        // If there are products in session 
        // Load products from session 
        $this->products = $this->loadFromSession();
    }

    public function addProduct($product)
    {
        $this->products[$product['id']] = $product;

        // Save in session to make it available anytime anywhere
        $this->saveInSession();
    }


    // Handle cart update 
    public function handleUpdate() 
    {
        // Read quantities from form 
        $quantities = $_POST["q"];

        // Process every product / quantity value from form 
        //foreach ($quantities as $key => $value )
        foreach ($quantities as $productId => $q ) {

            // Update quantities  for all products and save in session 
            $this->updateProductQuantity($productId, $q);
        }
    }

    public function removeProduct($productId)
    {
        unset($this->products[$productId]);

        $this->saveInSession();
    }

    public function updateProductQuantity($productId, $q)
    {   
        $this->products[$productId]["q"] = $q;     
        
        // save in session!!!!
        $this->saveInSession();
    }

    public function emptyCart()
    {
        $this->products = [];
        $this->saveInSession();
    }

    public function calculateTotal()
    {
        $total = 0;

        foreach($this->products as $product) {
            $subtotal = $product["price"] * $product["q"];
            $total = $total + $subtotal;
        }

        return $total;
    }
    
    public function countProducts()
    {
        return count($this->products);
    }

    // Load products from session
    public function loadFromSession() 
    {
        if(isset($_SESSION["cart"])) {
            return $_SESSION['cart'];
        } else {
            return [];
        }
    }

    // Save products in session
    public function saveInSession() 
    {
        $_SESSION['cart'] = $this->products;
    }

    // Return all products from cart
    public function getProducts() 
    {
        return $this->products;
    }

}

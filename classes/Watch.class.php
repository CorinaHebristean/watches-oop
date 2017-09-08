<?php

class Watch extends Database

{
    protected $brand;
    protected $id;
    protected $title;
    protected $description;
    protected $price;
    protected $currency;
    protected $stock;

    public function setBrand($_brand)
    {
        $this->brand = $_brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($_title)
    {
        $this->title = $_title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($_description)
    {
        $this->description = $_description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice($_price)
    {
        $this->price = $_price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setCurrency($_currency)
    {
        $this->currency = $_currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setStock($_stock)
    {
        $this->stock = $_stock;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function insert()
    {
        $sql = "INSERT INTO watches(brand, title, description, price, currency, stock)
                VALUES('$this->brand', '$this->title', '$this->description', '$this->price', '$this->currency', '$this->stock')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit()
    {
        $sql = "UPDATE watches
                SET brand = '$this->brand',
                    title = '$this->title',
                    description = '$this->description',
                    price = '$this->price',
                    currency = '$this->currency',
                    stock = '$this->stock'
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function delete()
    {
        $sql = "SELECT * FROM watches
                WHERE id = '$this->id'";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $this->items = $stmt->fetch();

        $sql = "DELETE FROM watches
                WHERE id = '$this->id'";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM watches";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function isInStock($id)
    {
        $stock = $this->getStockProduct($id);
        
        if ($stock > 0){
            return true;
        } else {
            return false;
        }
    }

    
    public function getStockProduct($id)
    {
        $sql = "SELECT * FROM watches
                WHERE id = $id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $watches = $stmt->fetch();

        $stock = $watches["stock"];

        return $stock;
    }

    public function countProducts()
    {
        $sql = "SELECT * FROM watches
                WHERE brand = '$this->brand'";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $allWatches = $stmt->fetchAll();

        return count($allWatches);
    }

    public function getById()
    {
        $sql = "SELECT * FROM watches
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function selectQuantity($id)
    {
        $stock = $this->getStockProduct($id);

        for($i=1; $i<=$stock; $i++) {
            echo "<option value='$i'>$i</option>";
        }
    }
}

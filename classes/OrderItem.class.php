<?php

class OrderItem extends Database
{
    protected $id;
    protected $orderId;
    protected $productName;
    protected $price;
    protected $q;

    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOrderId($_orderId)
    {
        $this->orderId = $_orderId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setProductName($_productName)
    {
        $this->productName = $_productName;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setPrice($_price)
    {
        $this->price = $_price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setQ($_q)
    {
        $this->q = $_q;
    }

    public function getQ()
    {
        return $this->q;
    }

    public function insert()
    {
        $sql = "INSERT INTO order_items(order_id, product_name, price, q)
                VALUES('$this->orderId', '$this->productName', '$this->price', '$this->q')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit()
    {
        $sql = "UPDATE order_items
                SET order_id = '$this->orderId',
                    product_name = '$this->productName',
                    price = '$this->price',
                    q = '$this->q'
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function delete()
    {
        $sql = "DELETE * FROM order_items
                WHERE id = $this->id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM order_items
                WHERE order_id = $this->orderId";

        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();

        $orderItems = $stmt->fetchAll();

        return $orderItems;
    }
}

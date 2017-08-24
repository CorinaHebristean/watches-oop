<?php

class OrderItem extends Database
{
    protected $id;
    protected $order_id;
    protected $product_name;
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
        $this->order_id = $_orderId;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setProductName($_productName)
    {
        $this->product_name = $_productName;
    }

    public function getProductName()
    {
        return $this->product_name;
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
                VALUES('$this->order_id', '$this->product_name', '$this->price', '$this->q')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit()
    {
        $sql = "UPDATE order_items
                SET order_id = '$this->order_id',
                    product_name = '$this->product_name',
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
}

<?php

class Order extends Database
{
    protected $id;
    protected $total;
    protected $status;
    protected $user_id;
    protected $created_at;

    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTotal($_total)
    {
        $this->total = $_total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setStatus($_status)
    {
        $this->status = $_status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setUserId($_userId)
    {
        $this->user_id = $_userId;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setCreatedAt($_createdAt)
    {
        $this->created_at = $_createdAt;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function insert()
    {
        $sql = "INSERT INTO orders( total, status, user_id, created_at)
                VALUES( '$this->total', '$this->status', '$this->user_id', '$this->created_at')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE orders
                SET total = '$this->total',
                    status = '$this->status',
                    user_id = '$this->user_id',
                    created_at = '$this->created_at'
                WHERE id = $this->id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function delete()
    {
        $sql = "SELECT * FROM orders
                WHERE id = $this->id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $this->items = $stmt->fetch();

        $sql = "DELETE FROM orders
                WHERE id = $this->id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}

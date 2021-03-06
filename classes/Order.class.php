<?php

class Order extends Database
{
    protected $id;
    protected $total;
    protected $status;
    protected $userId;
    protected $createdAt;

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
        $this->userId = $_userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setCreatedAt($_createdAt)
    {
        $this->createdAt = $_createdAt;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function insert()
    {
        $sql = "INSERT INTO orders( total, status, user_id, created_at)
                VALUES( '$this->total', '$this->status', '$this->userId', '$this->createdAt')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE orders
                SET total = '$this->total',
                    status = '$this->status',
                    user_id = '$this->userId',
                    created_at = '$this->createdAt'
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

    public function getAll()
    {
        $sql = "SELECT * FROM orders
                ORDER by id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $orders = $stmt->fetchAll();

        return $orders;
    }

    public function getByOrderId()
    {
        $sql = "SELECT * FROM orders
                WHERE id =  $this->id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $order = $stmt->fetch();

        return $order;
    }

    public function getLastId()
    {
        $sql = "SELECT * FROM orders
                ORDER by id DESC
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $order = $stmt->fetch();

        return $order["id"];
    }

    public function getAllByUserId()
    {
        $sql = "SELECT * FROM orders
                WHERE user_id = $this->userId
                ORDER by id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $orders = $stmt->fetchAll();

        return $orders;
    }

    public function updateStatus()
    {
        $sql = "UPDATE orders
                SET status = '$this->status'
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function getAvailableStatuses()
    {
        return [
            "inregistrat" => "Inregistrat",
            "in drum spre curier" => "In drum spre curier",
            "livrat" => "Livrat",
            "anulat" => "Anulat",
        ];
    }

    public function getAllByStatusAndUser($status = "inregistrat", $userId = 1)
    {
        $sql = "SELECT * FROM orders
                WHERE 1"; 
            
        if ($status == true) {
            $sql .= " AND status = '$status'";
        }
        
        if ($userId > 0) {
            $sql .= " AND user_id = $userId";
        }
        
        $sql .= " ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $orders = $stmt->fetchAll();

        return $orders;
    }

    /*
    SELECT * FROM orders WHERE id > 0 
    AND user_id = 2  
    AND status = 'inregistrat'
    AND total  > 500
    AND total < 1000
    ORDER BY id DESC
    */
}

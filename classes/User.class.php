<?php

class User extends Database
{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $city;
    protected $role;

    public function setUsername($_username)
    {
        $this->username = $_username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setEmail($_email)
    {
        $this->email = $_email;
    }

    public function getEmail()
    {
        return $this->username;
    }

    public function setPassword($_password)
    {
        $this->password = $_password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setCity($_city)
    {
        $this->city = $_city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setRole($_role)
    {
        $this->role = $_role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function insert()
    {
        $sql = "INSERT INTO users(username, email, password, city, role)
                VALUES ('$this->username','$this->email', '$this->password', '$this->city', '$this->role')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit()
    {
        $sql = "UPDATE users
                SET username = '$this->username',
                    email = '$this->email',
                    password = '$this->password',
                    city = '$this->city',
                    role = '$this->role'
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function delete()
    {
        $sql = "SELECT * FROM users
                WHERE id = $this->id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $this->items = $stmt->fetch();

        $sql = "DELETE FROM users
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
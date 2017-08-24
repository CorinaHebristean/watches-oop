<?php

class WatchBrand extends Database
{
    protected $id;
    protected $name;

    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($_name)
    {
        $this->name = $_name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function insert()
    {
        $sql = "INSERT INTO watches_brand(name)
                VALUES('$this->name')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit()
    {
        $sql = "UPDATE watches_brand
                SET name = '$this->name'
                WHERE id = $this->id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function delete()
    {
        $sql = "SELECT * FROM watches_brand
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $this->items = $stmt->fetch();

        $sql = "DELETE FROM watches_brand
                WHERE id = $this->id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function selectBrand($watchBrand='')
    {
        $sql = "SELECT * FROM watches_brand
                ORDER BY name ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        $watches_brand = $stmt->fetchAll();
    
        foreach($watches_brand as $brand){
            //var_dump($brand);
            //exit;
    
            if($brand["name"] == $watchBrand){ //avem optiunea selectata
                echo "<option value='" . $brand["name"] . "' selected>" . $brand["name"] . "</option>";
            } else {
                echo "<option value='" . $brand["name"] . "'>" . $brand["name"] . "</option>";
            }
        }
    }
}

<?php

class TravelModel
{

  public function listAll(){

    $database = new Database;

    $sql = 'SELECT * FROM travels';
    return $database->query($sql);
  }


  public function findPrice($name)
  {
      $database = new Database();

      $sql = 'SELECT *
              FROM travels
              WHERE Name = ?';
  return $database->queryOne($sql, [$name]);
  }



  public function find($destid){
    $database = new Database;

    $sql = 'SELECT *
    FROM travels
    WHERE Id=?' ;
    return $database->queryOne($sql, [$destid]);
  }


  public function create($name, $image, $description, $descriptionPlus, $price)
    {
        $sql = 'INSERT INTO travels
        (
            Name,
            Image,
            Description,
            DescriptionPlus,
            Price
        ) VALUES (?, ?, ?, ?, ?)';

        $database = new Database();
        $database->executeSql($sql,
        [
            $name,
            $image,
            $description,
            $descriptionPlus,
            $price
        ]);
    }



}

 ?>

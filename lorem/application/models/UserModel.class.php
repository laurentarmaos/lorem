<?php


class UserModel{


  public function listAll(){
    $database = new Database;
    $sql = 'SELECT * FROM users';
    return $database->query($sql);
  }


  public function saveUser($firstname, $lastname, $email, $password, $address, $zipcode, $city, $country){

    $database = new Database();




    $user = $database->queryOne
        (
            "SELECT Id FROM users WHERE Mail = ?", [ $email ]
        );

        if(empty($user) == false)
        {
          $http = new Http();
          $http->redirectTo('/user');
        }





    $sql = 'INSERT INTO users
    (FirstName, LastName, Mail, Password, Adress, ZipCode, City, Country)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

    $values = [$firstname, $lastname, $email, $password, $address, $zipcode, $city, $country];

    $database->executeSql($sql, $values);

  }




}


?>

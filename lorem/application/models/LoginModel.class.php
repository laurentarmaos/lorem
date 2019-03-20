<?php


  class LoginModel{

    public function verifyPassword($password, $hashedPassword){

      return crypt($password, $hashedPassword) == $hashedPassword;
    }

    public function loginUser($email, $password){


      $database = new Database();

      $sql = 'SELECT *
              FROM users
              WHERE Mail = ?';

      $user = $database->queryOne($sql, [ $email ]);


       if($this->verifyPassword($password, $user['Password']) == true && $user != false)
       {
         return $user;

       }

    }


    public function create($userId, $firstName, $lastName, $email)
      {
      	$_SESSION['user'] =
          [
              'Id'    => $userId,
              'FirstName' => $firstName,
              'LastName'  => $lastName,
              'Mail'     => $email
          ];

      }




  }













 ?>

<?php

class UserController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $checkMail = new UserModel();
    $mail = $checkMail->listAll();
    return['mail' => $mail];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {


    function hashPassword($password){

      $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

      return crypt($password, $salt);
    }


    if(empty($_POST) == false) {

      $hashPassword = hashPassword($_POST['password']);

      $checkMail = new UserModel();
      $mail = $checkMail->listAll();

      foreach ($mail as $key => $email) {

        if ($_POST['mail'] != $email['Mail']) {
          $user = new UserModel();
          $user->saveUser($_POST['nom'], $_POST['prénom'], $_POST['mail'], $hashPassword, $_POST['adresse'],$_POST['codePostal'], $_POST['ville'], $_POST['pays']);

          $http->redirectTo('/confirmuser');
        }else{
          echo 'mail déjà utilisé';
        }
      }

    }
  }
}

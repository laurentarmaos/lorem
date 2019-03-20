<?php

class LoginController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    if (empty($_POST) == false) {

      $userModel = new LoginModel();

      $user = $userModel->loginUser($_POST['Mail'], $_POST['Password']);

      if(empty($user) == false) {
        $userModel->create($user['Id'], $user['FirstName'], $user['LastName'], $user['Mail']);
      }
    }
  }
}

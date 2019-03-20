<?php

class ConfirmController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $bookingModel = new BookingModel;
      $booking = $bookingModel->listAll();
      return ['booking' => $booking];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      $deleteModel = new DeleteModel();
      $delete = $deleteModel->find($_POST['reservation']);
      $http->redirectTo('/');
    }
}

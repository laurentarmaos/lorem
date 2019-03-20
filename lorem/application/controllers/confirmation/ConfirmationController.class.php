<?php

class ConfirmationController
{


    public function httpGetMethod(Http $http, array $queryFields)
    {

      $bookingModel = new BookingModel;
      $booking = $bookingModel->listAll();

      return ['booking' => $booking];


    $reservModel = new BookingModel();
    $reserv = $reservModel->find($_GET['reservation']);

    if($reserv['Statut'] == 'payed') {
      $http->redirectTo('/');
    }

    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    if(empty($_POST) == false) {

      $bookingModel = new BookingModel();
      $booking = $bookingModel->find($_GET['reservation']);

      $userSession = new UserSession();
      $userMail = $userSession->getEmail();

      $stripeAmount = $booking['Price'];
      $Amount = $stripeAmount*100;

      if($booking['Statut'] != 'payed') {

        \Stripe\Stripe::setApiKey('sk_test_AR80gKmRvgNc7maI05eZXvdd');

        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

        $token = $_POST['stripeToken'];

        $customer = \Stripe\Customer::create(array(
          "email" => $userMail,
          "source" => $token
        ));

        $charge = \Stripe\Charge::create(array(
          "amount" => $Amount,
          "currency" => "eur",
          "description"=>"commande ok",
          "customer" => $customer->id
        ));

        $bookingModel->payed($_GET['reservation']);

        $http->redirectTo('/success?reservation='.$_GET['reservation']);

      } else {
      $http->redirectTo('/bookingtravel');
    }

  }

}
}

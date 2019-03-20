<?php

class BookingtravelController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $travelModel = new TravelModel;
    $travels = $travelModel->listAll();
    return['travels' => $travels];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $getPrice = new TravelModel();
    $price = $getPrice->findPrice($_POST['destination']);



    $userSession = new UserSession();
    if($userSession->isAuthenticated() == false)
    {
      $http->redirectTo('/user/login');
    }

    $userId = $userSession->getUserId();


    function codeReservation($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
      $chaine = '';
      $max = mb_strlen($listeCar, '8bit') - 1;
      for ($i = 0; $i < $longueur; ++$i) {
        $chaine .= $listeCar[random_int(0, $max)];
      }
      return $chaine;
    }
    $reservation =  codeReservation(20, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $statut = 'not payed';

    if(empty($_POST) == false) {

      $user = new BookingTravelModel();

      $bookingDate=$formFields['bookingYear'].'-'.
      $formFields['bookingMonth'].'-'.
      $formFields['bookingDay'];

      $backDate=$formFields['backYear'].'-'.
      $formFields['backMonth'].'-'.
      $formFields['backDay'];

      if (strtotime($bookingDate)>strtotime($backDate)) {
        $http->redirectTo('/booking/bookingtravel');
      }else{

        $user->create($bookingDate, $backDate, $_POST['destination'], $userId, $reservation, $statut, $price['Price']);


        $http->redirectTo('/confirmation?reservation='.$reservation);
      }
    }


  }
}

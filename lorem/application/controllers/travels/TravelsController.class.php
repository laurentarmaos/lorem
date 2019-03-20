<?php

class TravelsController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $destModel = new TravelModel;
      $dests = $destModel->listAll();


      return['dests' => $dests];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}

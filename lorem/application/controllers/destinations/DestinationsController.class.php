<?php

class DestinationsController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $destModel = new PlanetModel;
      $dests = $destModel->listAll();

  
      return['dests' => $dests];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}

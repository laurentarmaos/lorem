<?php

class DestController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {



    if(array_key_exists('id', $queryFields) == true)
        {
            if(ctype_digit($queryFields['id']) == true)
            {

        $destModel = new PlanetModel;
				$dest      = $destModel->find($queryFields['id']);


				$http->sendJsonResponse($dest);
            }
        }
}




    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}

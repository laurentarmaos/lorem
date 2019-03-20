<?php

class TravController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {


    if(array_key_exists('id', $queryFields) == true)
        {
            if(ctype_digit($queryFields['id']) == true)
            {
				
        $travModel = new TravelModel;
				$trav      = $travModel->find($queryFields['id']);

				$http->sendJsonResponse($trav);
            }
        }
}




    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}

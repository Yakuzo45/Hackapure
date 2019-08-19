<?php


namespace App\Service;


use App\Repository\ProspectRepository;
use Symfony\Component\HttpClient\HttpClient;

class InseeNumberFinder
{
    public function findInseeNumber(string $lat, string $lng)
    {
        $httpClient = HttpClient::create();
        $response = $httpClient->request(
            'GET',
            'https://geo.api.gouv.fr/communes?lat=' . $lat . '&lon=' . $lng . '&fields=code&format=json&geometry=centre'
        );
        $data = $response->getContent('code');
        $inseeNumber = json_decode($data, true);
        return ($inseeNumber[0]['code']);
    }
}
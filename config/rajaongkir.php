<?php

// use GuzzleHttp\Client;

// return [
//     'base_url' => env('RAJAONGKIR_BASE_URL', 'https://api.rajaongkir.com/starter/'),
//     'api_key' => env('RAJAONGKIR_API_KEY', ''),

//     'service' => new class {
//         protected $client;

//         public function __construct()
//         {
//             $this->client = new Client([
//                 'base_uri' => config('rajaongkir.base_url'),
//                 'headers' => [
//                     'key' => config('rajaongkir.api_key'),
//                 ],
//             ]);
//         }

//         public function getProvinces()
//         {
//             $response = $this->client->get('province');
//             return json_decode($response->getBody(), true);
//         }

//         public function getCities($provinceId)
//         {
//             $response = $this->client->get('city', [
//                 'query' => ['province' => $provinceId],
//             ]);
//             return json_decode($response->getBody(), true);
//         }

//         public function calculateShippingCost($origin, $destination, $weight, $courier)
//         {
//             $response = $this->client->post('cost', [
//                 'form_params' => [
//                     'origin' => $origin,
//                     'destination' => $destination,
//                     'weight' => $weight,
//                     'courier' => $courier,
//                 ],
//             ]);
//             return json_decode($response->getBody(), true);
//         }
//     }
// ];

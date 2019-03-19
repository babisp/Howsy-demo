<?php

namespace App\Http\Controllers;

use App\Property;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
  public function index()
  {
    return Property::all();
  }

  public function show($id)
  {
    return Property::find($id);
  }

  public function store(Request $request)
  {
    $coordinates = [];

    $key = env('GOOGLE_API_KEY');
    if ($key) {
      $full_address = implode(', ', array_filter($request->all()));
      $encoded_address = urlencode($full_address);

      $client = new Client([
        'base_uri' => 'https://maps.googleapis.com/',
        'timeout'  => 10.0,
      ]);

      $response = $client->request('GET', 'maps/api/geocode/json', [
        'query' => [
          'address' => $encoded_address,
          'key' => $key,
        ]
      ]);

      $result = json_decode($response->getBody());
      if ($result->status === "OK") {
        $coordinates['latitude'] = $result->results[0]->geometry->location->lat;
        $coordinates['longitude'] = $result->results[0]->geometry->location->lng;
      }
    }
    return Property::create($request->all() + $coordinates);
  }
}

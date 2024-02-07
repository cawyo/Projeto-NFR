<?php
session_start();
header('Content-Type: application/json');

class Aircraft{
  public $callsign;
  public $country;
  public $altitude;
  public $latitude;
  public $longitude;
  public $true_track;
  public $velocity;
  

    public function __construct($callsign,$country,$altitude,$latitude,$longitude,$true_track,$velocity)
    {
      $this->callsign = $callsign;
      $this->country = $country;
      $this->altitude = $altitude;
      $this->latitude = $latitude;
      $this->longitude = $longitude;
      $this->true_track = $true_track;
      $this->velocity = $velocity;
    }
}

$json = file_get_contents('flights1.json');

$openSkyData = json_decode($json,true);

$aircraftList = [];

foreach ($openSkyData['states'] as $aircraftData) {
  $callsign = $aircraftData[0];
  $country = $aircraftData[2];
  $altitude = $aircraftData[13];
  $latitude = $aircraftData[6];
  $longitude = $aircraftData[5];
  $velocity = $aircraftData[9];
  $true_track = $aircraftData[10];

  $aircraft = new Aircraft($callsign,$country, $altitude, $latitude, $longitude,$true_track,$velocity);
  array_push($aircraftList, $aircraft);
}

$json = json_encode($aircraftList);
echo $json;
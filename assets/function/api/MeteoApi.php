<?php
function getDataMeteo($city)
{
  $url = "https://www.prevision-meteo.ch/services/xml/" . $city;
  $xml = file_get_contents($url);
  $data = simplexml_load_string($xml);

  return $data->channel;
}

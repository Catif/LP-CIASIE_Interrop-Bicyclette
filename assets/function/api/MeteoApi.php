<?php
function getDataMeteo($city)
{
  $url = "https://www.prevision-meteo.ch/services/xml/" . $city;

  // Options pour le proxy Webetu
  // $opts = ['http' => ['proxy' => 'www-cache:3128', 'request_fulluri' => true], 'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]];
  // $context = stream_context_create($opts);
  // $xml = file_get_contents($url, false, $context);

  $xml = file_get_contents($url, false);
  $data = simplexml_load_string($xml);

  return $data->channel;
}

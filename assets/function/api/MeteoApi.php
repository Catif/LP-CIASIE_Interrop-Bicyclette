<?php
function getDataMeteo($city)
{
  // Options pour le proxy Webetu
  // $opts = ['http' => ['proxy' => 'www-cache:3128', 'request_fulluri' => true], 'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]];
  // $context = stream_context_create($opts);

  $url = "https://www.prevision-meteo.ch/services/xml/" . $city;
  $xml = file_get_contents($url, false, $context);
  $data = simplexml_load_string($xml);

  return $data->channel;
}

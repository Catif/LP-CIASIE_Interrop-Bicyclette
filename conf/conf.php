<?php
// Options pour le proxy Webetu

$options = [
  'http' => ['proxy' => 'tcp://127.0.0.1:8080', 'request_fulluri' => true],
  'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
];

stream_context_set_default($options);

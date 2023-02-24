<?php
// require 'conf/conf.php'; // Décommenter pour utiliser le proxy Webetu

require 'assets/function/api/MeteoApi.php';
require 'assets/widget/MeteoWidget.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</head>

<body>
  <h2>Partie 1 - Afficher la météo récupéré d'une API XML</h2>
  <?= widgetMeteo(getDataMeteo('Nancy')->item[0]); ?>

  <h2>Partie 2 - Afficher une carte avec les Vélo disponibles</h2>
  <div id="mapid"></div>


  <!-- Own Script -->
  <script src="js/app.js" type="module"></script>
</body>

</html>
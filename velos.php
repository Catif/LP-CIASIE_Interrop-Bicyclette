<?php
require 'assets/function/api/MeteoApi.php';
require 'assets/widget/MeteoWidget.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intéropérabilité - Projet n°1</title>
  <link rel="stylesheet" href="style.css">

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</head>

<body>
  <h1>♬ À bicyclette ♪.. Une page php croisant des API</h1>

  <h2>Partie 1 - Afficher la météo récupéré d'une API XML</h2>
  <?= widgetMeteo(getDataMeteo('Nancy')->item[0]); ?>

  <h2>Partie 2 - Afficher une carte avec les Vélo disponibles</h2>
  <div id="mapid"></div>

  <h1>SOURCE :</h1>

  <h2>Liste des sources API</h2>
  <ul>
    <li><b>La météo de Nancy: </b><a href="https://www.prevision-meteo.ch/services/xml/Nancy" target="_blank">Prevision-Meteo</a></li>
    <li><b>IP de l'utilisateur : </b><a href="https://ipapi.co/xml/" target="_blank">ipapi</a></li>
    <li><b>Vélo de Nancy : </b><a href="https://api.jcdecaux.com/vls/v1/stations?contract=Nancy&apiKey=f4084b85c3bb949e1d9feaba810dabc4f10b88e4" target="_blank">JCDecaux</a> (Le seul qui n'est pas en XML)</li>
    <li><b>Localisation de l'IUT Charlemagne : </b><a href="https://api.geoapify.com/v1/geocode/search?text=IUT%20Nancy-Charlemagne,%20Nancy,%20France&format=xml&apiKey=cccb99b51ef64365a4e70e1c13e9fb00" target="_blank">Geoapify</a></li>
  </ul>

  <h2>Outil utilisé</h2>
  <ul>
    <li><b>Gestion de la carte : </b><a href="https://leafletjs.com/" target="_blank">Leaflet</a></li>
  </ul>

  <!-- Own Script -->
  <script src="js/app.js" type="module"></script>
</body>

</html>
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
</head>

<body>
  <h2>Partie 1 - Afficher la météo récupéré d'une API XML</h2>
  <?= widgetMeteo(getDataMeteo('Nancy')->item[0]); ?>
</body>

</html>
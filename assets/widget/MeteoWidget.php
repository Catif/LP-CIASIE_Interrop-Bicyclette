<?php
function widgetMeteo($meteo)
{
  $widget = <<<HTML
  <div class="meteo">
    <p class="title">Météo de Nancy à {$meteo->hour}</p>
    <div class="temperature">
      <img src="{$meteo->icon}">
      <p>{$meteo->tmp}°C</p>
    </div>
    <p>{$meteo->condition}</p>
    <div>
      <a href="{$meteo->link}" target="_blank" >Plus d'infos</a>
    </div>
  </div>
  HTML;

  return $widget;
}

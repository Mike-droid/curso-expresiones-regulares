<?php

$file = fopen("./results.csv", "r");

$match = 0;
$nomatch = 0;

$t = time();

while(!feof($file)) {
  /**
    date,home_team,away_team,home_score,away_score,tournament,city,country,neutral
    1872-11-30,Scotland,England,0,0,Friendly,Glasgow,Scotland,FALSE
   */
  $line = fgets($file);
  if(preg_match(
    '/^(\d{4}\-\d\d\-\d\d),(.+),(.+),(\d+),(\d+),.*$/i', //La bandera 'i' es para case insensitive
    $line,
    $m
  )) {
    if($m[4] == $m[5]) {
      printf("empate: ");
    } elseif($m[4] > m[5]) {
      echo "local: ";
    } else {
      echo "visitante: ";
    }
    printf("\t%s, %s => [%d-%d]\n", $m[2], $m[3], $m[4], $m[5]);
    $match++;
  } else {
    $nomatch++;
  }
}

fclose($file);

printf("\n\nmatch: %d\nno match: %d\n", $match, $nomatch);

printf("Tiempo: %d\n", time() - $t);
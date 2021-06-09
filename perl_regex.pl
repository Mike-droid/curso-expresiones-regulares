#!/usr/bin/perl

use strict;
use warnings;

my $t = time;

open(my $f, "<./results.csv") or die("no hay archivo");

my $match = 0;
my $nomatch = 0;

while(<$f>) {
  chomp;
  # date,home_team,away_team,home_score,away_score,tournament,city,country,neutral
  # 1876-03-25,Scotland,Wales,4,0,Friendly,Glasgow,Scotland,FALSE
  if(m/^([\d]{4,4})\-.*?,(.*?),(.*?),(\d+),(\d+),.*$/) {
    if ($5 > $4) {
      printf("%s: %s (%d) - (%d) %s\n", $1, $2, $4, $5, $3);
      # $1 es la fecha
      # $2 es el equipo local
      # $3 es el equipo visitante
      # $4 es el marcador del equipo local
      # $5 es el marcador del equipo visitante
    }
    $match++;
  } else {
    $nomatch++;
  }
}

close($f);

printf("Se encontraron: \n - %d matches\n - %d no matches\ntardó %d segundos\n", $match, $nomatch, time() - $t);
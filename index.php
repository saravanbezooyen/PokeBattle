<?php 

require 'Pokemon.php';
require 'Charmeleon.php';
require 'Pikachu.php';
require 'Resistance.php';
require 'Weakness.php';
require 'Attack.php';

$pikachu =  new Pikachu('pika');
$charmeleon =  new Charmeleon('charmie');

//echo "<pre>";
//print_r($pikachu);

$pikachu->echoPokemon();
$charmeleon->echoPokemon();

echo '<p>Pikachu valt Charmeleon aan met een Electric Ring attack</p>';
$pikachu->attack($charmeleon , "Electric Ring");

$charmeleon->echoPokemon();
echo '<p>Charmeleon valt Pikachu aan met een Flare attack</p>';

$charmeleon->attack($pikachu , "Flare");
$pikachu->echoPokemon();

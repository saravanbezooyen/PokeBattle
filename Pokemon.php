<?php

class Pokemon {
    public $name;
    public $energyType;
    public $hitpoints;
    public $health;
    public $attacks;
    public $weakness;
    public $resistance;

    public function __construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance) {
        $this->name = $name;
        $this->energyType = $energyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
    }

    public function attack($pokemon, $att) {
        foreach ($this->attacks as $attack) {
            if ($attack->name == $att) {
               // de schade van een Attack wordt verminderd met de waarde van de Resistance indien de EnergyType van de Resistance gelijk is aan de EnergyType van de aanvallende Pokemon 
                $damage = $attack->damage;
                
                if ($this->energyType == $pokemon->resistance->energyType) {
                    $damage = $damage - $pokemon->resistance->value;
                }
                //kan schade krijgen van een andere Pokemon als resultaat van een Attack
                if ($this->energyType == $pokemon->weakness->energyType) {
                    $damage = $damage * $pokemon->weakness->multiplier;
                }
                // de totale schade van een Attack wordt verminderd op de health van de Pokemon die wordt aangevallen
                $newHealth = $pokemon->health - $damage;
                $pokemon->health = $newHealth;
            }
        }
    }

    public function __toString() {
        return json_encode($this);
    }

    public function echoPokemon() {
        echo '<p>' .$this->name . ' ' . $this->health . '</p>';
    }
}
<?php

include_once('Hero.php');

class Warrior extends Hero
{

    public function __construct(string $name)
    {
        parent::__construct(26, 12, 12, $name);
        $this->updateAttributesFromCarac($this->strength);
        $this->ability = new Ability('Skullsplitter', 150, $this->strength * 1.8);
        $this->setImage('images/warrior.png');
    }

    function levelUp(): void
    {
        $this->updateMainAttributes(5, 2, 2);
        $this->updateAttributesFromCarac(5);
        $this->ability->setDamage($this->strength * 1.8);
    }
}

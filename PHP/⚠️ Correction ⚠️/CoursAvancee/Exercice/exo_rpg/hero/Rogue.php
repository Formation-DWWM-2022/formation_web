<?php

include_once('Hero.php');

class Rogue extends Hero
{

    /**
     * Rogue constructor.
     */
    public function __construct(string $name)
    {
        parent::__construct(14, 30, 11, $name);
        $this->updateAttributesFromCarac($this->agility);
        $this->criticalDamage = 1.75;
        $this->ability = new Ability('Ambush', 160, $this->agility * 2.1);
        $this->setImage('images/rogue.png');
    }

    function levelUp(): void
    {
        $this->updateMainAttributes(2, 5, 1);
        if ($this->level % 3 === 0) {
            $this->setStrength(1);
        }
        $this->updateAttributesFromCarac(5);
        $this->ability->setDamage($this->agility * 2.1);
    }
}

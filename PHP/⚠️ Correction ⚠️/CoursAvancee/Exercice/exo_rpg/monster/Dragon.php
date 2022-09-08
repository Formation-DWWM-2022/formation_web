<?php

include_once('Monster.php');

/**
 * Class Dragon.php
 *
 * @author Kevin Tourret
 */
class Dragon extends Monster
{

    /**
     * Dragon constructor.
     * @param int $level
     */
    public function __construct(int $level)
    {
        parent::__construct($level, 'images/dragon.png');
        $this->hp = 120 + 90 * $level;
        $this->hpMax = $this->hp;
        $this->mana = 50 + 70 * $level;
        $this->manaMax = $this->mana;
        $this->defense = 4 + 0.66 * $level;
        $this->damageMin = 24 + 7.89 * $level;
        $this->damageMax = 24 + 7.90 * $level;
        $this->scoreCriticalStrike = 1 + 0.5 * $level;
        $this->criticalDamage = 1.7;
        $this->ability = new Ability('Fire Breathe', 160, 48 + 10 * $level);
    }
}

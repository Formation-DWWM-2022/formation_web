<?php

include_once('Monster.php');

/**
 * Class Gobelin.php
 *
 * @author Kevin Tourret
 */
class Gobelin extends Monster
{

    /**
     * Gobelin constructor.
     * @param int $level
     */
    public function __construct(int $level)
    {
        parent::__construct($level, 'images/gobelin.png');
        $this->hp = 38 + 50 * $level;
        $this->hpMax = $this->hp;
        $this->mana = 30 + 50 * $level;
        $this->manaMax = $this->mana;
        $this->defense = 1 + 0.33 * $level;
        $this->damageMin = 12 + 1.75 * $level;
        $this->damageMax = 12 + 2 * $level;
        $this->scoreCriticalStrike = 1 + 0.25 * $level;
    }
}

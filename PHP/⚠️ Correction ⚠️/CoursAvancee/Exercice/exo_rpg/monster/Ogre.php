<?php

include_once('Monster.php');

/**
 * Class Ogre.php
 *
 * @author Kevin Tourret
 */
class Ogre extends Monster
{

    /**
     * Ogre constructor.
     * @param int $level
     */
    public function __construct(int $level)
    {
        parent::__construct($level, 'images/ogre.png');
        $this->hp = 70 + 79 * $level;
        $this->hpMax = $this->hp;
        $this->mana = 30 + 50 * $level;
        $this->manaMax = $this->mana;
        $this->defense = 2 + 0.48 * $level;
        $this->damageMin = 18 + 4.66 * $level;
        $this->damageMax = 18 + 4.76 * $level;
        $this->scoreCriticalStrike = 1 + 0.39 * $level;
    }
}

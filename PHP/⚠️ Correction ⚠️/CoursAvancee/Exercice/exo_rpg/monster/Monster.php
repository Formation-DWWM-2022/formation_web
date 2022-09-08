<?php

include_once('RpgEntity.php');


/**
 * Class Monster.php
 *
 * @author Kevin Tourret
 */
abstract class Monster extends RpgEntity
{

    /**
     * Monster constructor.
     * @param int $level
     * @param string $image
     */
    public function __construct(
        int $level,
        string $image
    ) {
        $this->level = $level;
        $this->criticalDamage = 1.5;
        $this->image = $image;
    }
}

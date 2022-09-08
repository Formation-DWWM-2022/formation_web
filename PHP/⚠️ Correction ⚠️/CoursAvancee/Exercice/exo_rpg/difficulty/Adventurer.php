<?php


class Adventurer extends Explorateur
{

    /**
     * Adventurer constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->monsters = array_merge($this->monsters, ['Ogre', 'Ogre', 'Ogre']);
        $this->maxIndex = count($this->monsters);
    }
}
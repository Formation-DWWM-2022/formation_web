<?php


class Veteran extends Adventurer
{

    /**
     * Veteran constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->monsters = array_merge($this->monsters, ['Dragon', 'Dragon']);
        $this->maxIndex = count($this->monsters);
    }
}
<?php


class Explorateur extends Difficulty
{

    /**
     * Explorateur constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->monsters = ['Gobelin', 'Gobelin', 'Gobelin', 'Gobelin', 'Gobelin'];
        $this->maxIndex = count($this->monsters);
    }
}
<?php


abstract class Difficulty
{
    /**
     * @var String[]
     */
    protected array $monsters;

    protected int $currentIndex;

    protected int $maxIndex;

    /**
     * Difficulty constructor.
     */
    public function __construct()
    {
        $this->currentIndex = 0;
    }

    public function hasMonstersLeft(): bool {
        return $this->currentIndex < $this->maxIndex;
    }

    public function getMonsterByLevel(int $level): Monster {
        $monster = new $this->monsters[$this->currentIndex]($level);
        $this->currentIndex++;
        return $monster;
    }
}
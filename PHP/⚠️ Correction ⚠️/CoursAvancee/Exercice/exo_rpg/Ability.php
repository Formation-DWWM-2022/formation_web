<?php


/**
 * Class Ability.php
 *
 * @author Kevin Tourret
 */
class Ability
{

    private string $name;

    private int $manaCost;

    private int $damage;

    private int $turn;

    /**
     * Ability constructor.
     * @param string $name
     * @param int $manaCost
     * @param int $damage
     */
    public function __construct(string $name, int $manaCost, int $damage)
    {
        $this->name = $name;
        $this->manaCost = $manaCost;
        $this->damage = $damage;
        $this->turn = 0;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getManaCost(): int
    {
        return $this->manaCost;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     */
    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    /**
     * @return int
     */
    public function getTurn(): int
    {
        return $this->turn;
    }

    /**
     * @param int $turn
     */
    public function setTurn(int $turn): void
    {
        $this->turn = $turn;
    }

}

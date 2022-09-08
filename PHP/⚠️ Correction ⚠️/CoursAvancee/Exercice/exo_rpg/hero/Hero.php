<?php

include_once('RpgEntity.php');
include_once('Race.php');

abstract class Hero extends RpgEntity
{

    protected int $intelligence = 0;

    protected int $agility = 0;

    protected int $strength = 0;

    protected string $name;

    protected Race $race;

    /**
     * Hero constructor.
     * @param int $strength
     * @param int $agility
     * @param int $intelligence
     * @param string $name
     */
    public function __construct(
        int $strength, int $agility, int $intelligence, string $name
    ) {
        $this->scoreCriticalStrike = 12;
        $this->criticalDamage = 1.5;
        $this->name = $name;
        $this->updateMainAttributes($strength, $agility, $intelligence);
    }

    protected function updateMainAttributes(
        int $strength, int $agility, int $intelligence
    ): void
    {
        $this->level++;
        $this->setStrength($strength);
        $this->setAgility($agility);
        $this->setIntelligence($intelligence);
    }

    protected function updateAttributesFromCarac(int $carac) {
        $this->damageMin += $carac * 1.2;
        $this->damageMax += $carac * 1.4;
        $this->scoreCriticalStrike += ($carac * 0.08);
    }

    protected function setStrength(int $strength)
    {
        $this->strength += $strength;
        $this->hp += $strength * 19;
        $this->hpMax += $strength * 19;
    }

    protected function setIntelligence(int $intelligence)
    {
        $this->intelligence += $intelligence;
        $this->mana += $intelligence * 19;
        $this->manaMax += $intelligence * 19;
    }

    protected function setAgility(int $agility)
    {
        $this->agility += $agility;
        $this->defense += round($agility / 6, 2);
    }

    /**
     * @return int
     */
    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    /**
     * @return int
     */
    public function getAgility(): int
    {
        return $this->agility;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return Race
     */
    public function getRace(): Race
    {
        return $this->race;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * Set un level à un héro, le héro arrive directement à ce niveau
     * Cependant, le niveau passé en paramètre doit être forcément supérieur au niveau actuel, sinon il ne se passera rien
     *
     * @param int $newLevel
     */
    public function setLevel(int $newLevel):void {
        if ($newLevel > $this->level) {
            for ($i=$this->level; $i < $newLevel; $i++){
                $this->levelUp();
            }
        }
    }

    abstract function levelUp(): void;

    public function regen() {
        $this->levelUp();
        if ($this->hp < $this->hpMax) {
            $this->hp += ($this->hpMax - $this->hp) / 2;
        }
        if ($this->mana < $this->manaMax) {
            $this->mana += ($this->manaMax - $this->mana) / 2;
        }
    }

}

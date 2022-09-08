<?php

include_once('Ability.php');

/**
 * Class RpgEntity.php
 *
 * @author Kevin Tourret
 */
abstract class RpgEntity
{

    protected int $hp = 0;

    protected int $hpMax = 0;

    protected int $mana = 0;

    protected int $manaMax = 0;

    protected float $defense = 0.0;

    protected int $level = 0;

    protected float $scoreCriticalStrike = 0.0;

    protected float $criticalDamage = 0.0;

    protected int $damageMin = 0;

    protected int $damageMax = 0;

    protected Ability $ability;

    protected string $image;

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return RpgEntity
     */
    public function setImage(string $image): RpgEntity
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return float
     */
    public function getScoreCriticalStrike(): float
    {
        return $this->scoreCriticalStrike;
    }

    /**
     * @param int $hp
     * @return RpgEntity
     */
    public function setHp(int $hp): RpgEntity
    {
        $this->hp = $hp;
        return $this;
    }

    /**
     * @return float
     */
    public function getCriticalDamage(): float
    {
        return $this->criticalDamage;
    }

    /**
     * @return int
     */
    public function getDamageMin(): int
    {
        return $this->damageMin;
    }

    /**
     * @return int
     */
    public function getDamageMax(): int
    {
        return $this->damageMax;
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @return int
     */
    public function getHpMax(): int
    {
        return $this->hpMax;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @return int
     */
    public function getManaMax(): int
    {
        return $this->manaMax;
    }

    /**
     * @return Ability
     */
    public function getAbility(): Ability
    {
        return $this->ability;
    }

    /**
     * @return float
     */
    public function getDefense(): float
    {
        return $this->defense;
    }

    public function isDead(): bool
    {
        return $this->getHp() <= 0;
    }

    /**
     * @return int
     */
    public function getDamages(): int
    {
        return rand($this->damageMin, $this->damageMax);
    }

    /**
     * @return float
     */
    public function getCoefficientDefense(): float
    {
        return ((100 - $this->defense) / 100);
    }

    /**
     * Une RpgEntity attaque une autre RpgEntity
     *
     * @param RpgEntity $rpgEntityTarget
     * @return bool
     */
    public function attack(RpgEntity $rpgEntityTarget): bool
    {
        // On vérifit si les points de vie de la cible ou de mon $this sont inférieur ou égale à 0
        // Si oui, on arrête de suite la fonction
        if ($rpgEntityTarget->isDead() || $this->isDead()) {
            return false;
        }
        // get_class : renvoie le nom de la classe en paramètre sous forme de chaine de caractères
        $name = get_class($this);
        // instanceof permet de connaître le type de l'objet qui le suit
        if ($this instanceof Hero) {
            $name = $this->getName();
        }
        $nameTarget = get_class($rpgEntityTarget);
        if ($rpgEntityTarget instanceof Hero) {
            $nameTarget = $rpgEntityTarget->getName();
        }
        if (isset($this->ability)) { // ability non null
            if ($this->useAbility($rpgEntityTarget, $name, $nameTarget)) {
                return true;
            }
            $this->ability->setTurn($this->ability->getTurn() - 1);
        }
        // Déterminer les dégâts du héro courant (à partir de ses damagesMin et Max)
        $damage = $this->getDamages();
        $isCritical = false;

        // Déterminer si le héro courant critique ou non (à partir de l'attribut scoreCriticalStrike)
        // mt_rand : permet d'avoir un nombre aléatoire compris entre les 2 nombres, mais il inclue les float
        if (mt_rand(1, 100) <= $this->scoreCriticalStrike) {
            $damage *= $this->criticalDamage;
            $isCritical = true;
        }

        // Déterminer la réduction de la défense de $rpgEntity (défense est en % !!!)
        // Déterminer les dégâts infligé après réduction de la défense
        $damage *= $rpgEntityTarget->getCoefficientDefense();
        $damage = round($damage);

        // Réduire les points de vie de $rpgEntity du montant de dégât infligés
        $rpgEntityTarget->hp -= $damage;
        if ($rpgEntityTarget->hp < 0) {
            $rpgEntityTarget->hp = 0;
        }

        // Affichage de l'information des dégâts
        $string = $name . ' a attaqué ' . $nameTarget . ' pour ' . $damage . ' dégâts (Il reste ' . $rpgEntityTarget->hp . ' à ' . $nameTarget . ')';
        if ($isCritical) {
            $string .= '(Coup critique !)';
        }
        echo $string . '<br>';
        return true;
    }

    /**
     * @param RpgEntity $rpgEntityTarget
     * @param string $name
     * @param string $nameTarget
     * @return bool
     */
    private function useAbility(RpgEntity $rpgEntityTarget, string $name, string $nameTarget): bool
    {
        if ($this->ability->getTurn() === 0 && $this->ability->getManaCost() <= $this->mana) {
            $this->ability->setTurn(3);
            $rpgEntityTarget->hp -= $this->ability->getDamage();
            $this->mana -= $this->ability->getManaCost();
            $string = '[ABILITY] ' . $name . ' a attaqué ' . $nameTarget . ' pour ' . $this->ability->getDamage() . ' dégâts (Il reste ' . $rpgEntityTarget->hp . ' à ' . $nameTarget . ')<br>';
            echo $string;
            return true;
        }
        if ($this instanceof Mage) {
            echo 'JE LANCE UNE TONGUE <br>';
        }
        return false;
    }

    public function __toString(): string
    {
        // get_class vous donne le nom de la classe en string
        $string = 'Classe : ' . get_class($this) . '<br>';
        $string .= 'Level : ' . $this->level . '<br>';
        if ($this instanceof Hero) {
            $string .= 'Nom : ' . $this->name . '<br>';
            $string .= 'Force : ' . $this->strength . '<br>';
            $string .= 'Agilité : ' . $this->agility . '<br>';
            $string .= 'Intelligence : ' . $this->intelligence . '<br>';
        }
        $string .= 'HP : ' . $this->hp . '/' . $this->hpMax . '<br>';
        $string .= 'Mana : ' . $this->mana . '/' . $this->manaMax . '<br>';
        $string .= 'Defense : ' . $this->defense . '<br>';
        $string .= 'Degats min : ' . $this->damageMin . '<br>';
        $string .= 'Degats max : ' . $this->damageMax . '<br>';
        $string .= 'Score crit : ' . $this->scoreCriticalStrike . '<br>';
        $string .= 'Crit damage : x' . $this->criticalDamage . '<br>';
        if (isset($this->ability)) {
            $string .= 'Abilité  : <br>';
            $string .= 'Nom : ' . $this->ability->getName() . '<br>';
            $string .= 'Dégâts  : ' . $this->ability->getDamage() . '<br>';
            $string .= 'Coût en mana : ' . $this->ability->getManaCost(). '<br>';
        }
        return $string;
    }

    public function toHtml(): string {
        $name = '';
        if ($this instanceof Hero) {
            $name = $this->getName();
        }
        $string = '<h2 class="card-header">'.get_class($this).' <i> '. $name .' ('. $this->level .')</i></h2>';
        $string .= '
            <table class="table table-striped w-100 table-entity">
                <tbody>';
        $string .= '<tr>
                        <th class="hp-pool">'
                            .$this->hp . '/' . $this->hpMax.'
                        </th>
                        <td class="mana-pool">'
                            .$this->mana . '/' . $this->manaMax.'
                        </td>
                    </tr>';
        $string .= $this->addThTd(
            $this->getHtmlImgFromImage('images/sword.png'),
            $this->damageMin . ' - ' . $this->damageMax
        );
        $string .= $this->addThTd(
            $this->getHtmlImgFromImage('images/cs.png'),
            $this->scoreCriticalStrike . '% (x' . $this->criticalDamage . ')'
        );
        $string .= $this->addThTd(
            $this->getHtmlImgFromImage('images/defense.png'),
            round($this->defense, 2)
        );
        if ($this instanceof Hero) {
            $string .= $this->addThTd(
                $this->getHtmlImgFromImage('images/strength.png'),
                $this->getStrength()
            );
            $string .= $this->addThTd(
                $this->getHtmlImgFromImage('images/agility.png'),
                $this->getAgility()
            );
            $string .= $this->addThTd(
                $this->getHtmlImgFromImage('images/intelligence.png'),
                $this->getIntelligence()
            );
        }
        if (isset($this->ability)) {
            $string .= $this->addThTd('Ability Name', $this->ability->getName());
            $string .= $this->addThTd('Ability Damage', $this->ability->getDamage());
            $string .= $this->addThTd('Ability Mana cost', $this->ability->getManaCost());
        }
        $string .= '</table></tbody>';
        return $string;
    }

    private function addThTd($thValue, $tdValue): string {
        return '<tr><th>'.$thValue.'</th><td class="align-middle">'.$tdValue.'</td></tr>';
    }

    private function getHtmlImgFromImage(string $image): string {
        return '<img class="icon" src="'.$image.'" alt="'.$image.'" title="'.$image.'">';
    }

}

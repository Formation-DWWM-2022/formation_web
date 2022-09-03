<?php

/**
 * Classe abstraite: ne peut pas être instanciée (généralement ne sert qu'à faire de l'héritage)
 */
abstract class Personnage {
    protected $force; // protected: cet attribut est accessible à Personnage elle-même et à ses enfants
    protected $defense;
    private $hello; // private: accessible à Personnage  elle-même uniquement
    public $foobar; // public: accessible à Personnage elle-même, à l'extérieur ($p = new Personnage; $p->foobar) et aux enfants
}

/**
 * Traits
 * Répertoire de méthodes réutilisables dans des classes sans avoir besoin de faire d'héritage.
 * Par exemple, si j'ai desfonctions communes à Magicien et Guerrier uniquement, je peux les mettre dans Personnage (leur parent)
 *
 * Mais si j'ai des fonctions communes à Magicien, Guerrier et Combat (cette dernière n'étant pas enfant de Personnage),
 * je ne peux pas les mettre dans Personnage.
 *
 * Les traits servent à cela: partager des méthodes dans des classes sans utiliser l'héritage, quand elles n'ont rien en commun par exemple.
 */
trait Mailer {
    public function send(string $content) {
        echo "un mail a été envoyé avec le contenu suivant: " . $content ;
    }
}

/**
 * Interface: contrat à respecter pour une classe de sorte à s'assurer que toutes les classes implémentant cette
 * interface possèdent au minimum les méthodes définies dans l'interface
 */
interface CombattantInterface {
    public function attack(CombattantInterface $combattant) : int;
    public function heal();
    public function getDefense();
}

/**
 * Extends: la classe Magicien hérite de Personnage
 * elle a accès à toutes ses méthodes et attributs publics et protected, mais pas ses attributs/méthodes private
 *
 * Implements: la classe Magicien implémente CombattantInterface
 * Ce qui l'oblige à forcément avoir les méthodes définies dans l'interface (elles peuvent contenir n'importe quoi, mais elles doivent exister et respecter
 * la signature de méthode définie dans l'interface)
 */
class Magicien extends Personnage implements CombattantInterface {

    use Mailer; // import du Trait "Mailer"

    public function envoyerSort() : int {
        return 10;
    }

    public function invoquerSoin() {
        // Utilisation du trait Mailer (méthode send())
        $this->send("Le magicien a invoqué des soins.");

    }

    public function getDefense()
    {
    }
    public function attack(CombattantInterface $combattant) : int {
        return $this->envoyerSort();
    }

    public function heal() {
        return $this->invoquerSoin();
    }
}

/**
 * Final: inverse de abstract, une classe finale ne peut pas faire d'héritage (mais peut hériter)
 */
final class MageBlanc extends Magicien {
    public function soigneToutLeMonde() {}
}

final class MageNoir extends Magicien {
    public function tueToutLeMonde() {}
}

class Guerrier extends Personnage implements CombattantInterface {

    use Mailer; // import du Trait "Mailer"

    public function coupEpee() {

    }

    public function boirePotion() {
        // Utilisation du trait Mailer (méthode send())
        $this->send("Le guerrier a bu une potion");
    }

    public function getDefense() {

    }

    public function attack()
    {
        return $this->coupEpee();
    }

    public function heal()
    {
        return $this->boirePotion();
    }
}


class Combat {

    use Mailer; // import du Trait "Mailer"

    public function startCombat(CombattantInterface $personnage1, CombattantInterface $personnage2) {

        while($personnage1->getDefense() > 0 && $personnage2->getDefense() > 0) {

            $personnage1->attack($personnage2);
            $personnage2->attack($personnage1);

            // Utilisation du trait Mailer (méthode send())
            $this->send("Le combat a commencé.");

        }

    }
}
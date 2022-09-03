# Hydrater

-  Hydrater les entités : https://youtu.be/aYBBWC9Gv7s

Hydrater ? Un terme précis pour dire que le formulaire va remplir les attributs de l'objet avec les valeurs entrées par le visiteur. Faire <?php setPseudo('winzou') ?> et <?php setDate(new \Datetime()) ?>, etc., c'est hydrater l'objet Article.

Le formulaire en lui-même n'a donc comme seul objectif que d'hydrater un objet. Ce n'est qu'une fois l'objet hydraté que vous pourrez en faire ce que vous voudrez : faire une recherche dans le cas d'un objet Recherche, enregistrer en base de données dans le cas de notre objet Article, envoyer un mail dans le cas d'un objet Contact, etc. Le système de formulaire ne s'occupe pas de ce que vous faites de votre objet, il ne fait que l'hydrater.

Une fois que vous avez compris ça, vous avez compris l'essentiel. Le reste n'est que de la syntaxe à connaître.

Une méthode hydratant un objet consistera à assigner des valeurs aux attributs souhaités. Pour cela, on lui fournit un tableau associatif : la clé est l'attribut et la valeur est celle de l'attribut. Il faut bien penser à contrôler ces valeurs afin que l'utilisateur ne mette pas n'importe quoi : les setters sont là pour nous !

```php
<?php
class Test
{
    protected string $titre;
    protected int $score;
     
    public function __construct(array $valeurs = [])
    {
        if(!empty($valeurs))
            $this->hydrate($valeurs);
    }
 
    public function hydrate($donnees)
        {
            foreach ($donnees as $key => $value)
            {
                $methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
                    
                if (is_callable(array($this, $methode)))
                {
                    $this->$methode($valeur);
                }
            }
        }
 
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getScore(){
        return $this->score;
    }

}
 
$test = new Test(['titre' => 'Un titre', 'score' => '1');
$test->getScore();
?>
```
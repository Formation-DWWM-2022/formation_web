# L’évolution d’un objet PHP au fil des années

C’est juste un petit post amusant que j’ai écrit parce que je voulais visualiser comment mes objets de transfert de données ont évolué au fil des ans.

# Août 2014 : PHP 5.6

Commençons par PHP 5.6, c’est ce que la plupart des gens sans connaissance moderne de PHP pensent probablement que le code PHP ressemble toujours. Je vais vous donner le code, et je vais mentionner les changements dans les versions futures.

```php
class BlogData
{
    /** @var string */
    private $title;
    
    /** @var State */
    private $state;
    
    /** @var \DateTimeImmutable|null */
    private $publishedAt;
   
   /**
    * @param string $title 
    * @param State $state 
    * @param \DateTimeImmutable|null $publishedAt 
    */
    public function __construct(
        $title,
        $state,
        $publishedAt = null
    ) {
        $this->title = $title;
        $this->state = $state;
        $this->publishedAt = $publishedAt;
    }
    
    /**
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;    
    }
    
    /**
     * @return State 
     */
    public function getState() 
    {
        return $this->state;    
    }
    
    /**
     * @return \DateTimeImmutable|null 
     */
    public function getPublishedAt() 
    {
        return $this->publishedAt;    
    }
}
```

# Décembre 2015 : PHP 7.0

PHP 7.0 a introduit de nouvelles fonctionnalités de syntaxe : les types scalaires et les types de retour étant les plus notables ici. Les types nullables ne sont pas encore chose faite, donc nous avons toujours besoin d’utiliser les types de blocs doc pour notre $publishedAt :

```php
class BlogData
{
    /** @var string */
    private $title;
    
    /** @var State */
    private $state;
    
    /** @var \DateTimeImmutable|null */
    private $publishedAt;
   
   /**
    * @param \DateTimeImmutable|null $publishedAt 
    */
    public function __construct(
        string $title,
        State $state,
        $publishedAt = null
    ) {
        $this->title = $title;
        $this->state = $state;
        $this->publishedAt = $publishedAt;
    }
    
    public function getTitle(): string
    {
        return $this->title;    
    }
    
    public function getState(): State 
    {
        return $this->state;    
    }
    
    /**
     * @return \DateTimeImmutable|null 
     */
    public function getPublishedAt() 
    {
        return $this->publishedAt;    
    }
}
```

# Décembre 2016 : PHP 7.1

Avec PHP 7.1 est finalement venu des types nullables, donc nous avons pu supprimer quelques blocs de doc supplémentaires :

```php
class BlogData
{
    /** @var string */
    private $title;
    
    /** @var State */
    private $state;
    
    /** @var \DateTimeImmutable|null */
    private $publishedAt;
   
    public function __construct(
        string $title,
        State $state,
        ?DateTimeImmutable $publishedAt = null
    ) {
        $this->title = $title;
        $this->state = $state;
        $this->publishedAt = $publishedAt;
    }
    
    public function getTitle(): string
    {
        return $this->title;    
    }
    
    public function getState(): State 
    {
        return $this->state;    
    }
    
    public function getPublishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;    
    }
}
```

# Novembre 2017 : PHP 7.2

Alors qu’il y avait quelques fonctionnalités intéressantes dans 7.2 comme l’élargissement de type de paramètre et le type d’objet, il n’y a rien que nous puissions faire pour nettoyer notre DTO spécifique dans cette version.

# Décembre 2018 : PHP 7.3

Il en va de même pour PHP 7.3, rien à voir ici.

# Novembre 2019 : PHP 7.4

PHP 7.4 est une autre histoire cependant! Il y a maintenant des propriétés tapées — enfin!

```php
class BlogData
{
    private string $title;
    
    private State $state;
    
    private ?DateTimeImmutable $publishedAt;
   
    public function __construct(
        string $title,
        State $state,
        ?DateTimeImmutable $publishedAt = null
    ) {
        $this->title = $title;
        $this->state = $state;
        $this->publishedAt = $publishedAt;
    }
    
    public function getTitle(): string
    {
        return $this->title;    
    }
    
    public function getState(): State 
    {
        return $this->state;    
    }
    
    public function getPublishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;    
    }
}
```

# Novembre 2020 : PHP 8.0

Un autre changement : PHP 8 ajoute des propriétés promues; aussi, les virgules dans les listes de paramètres sont maintenant une chose!

```php
class BlogData
{
    public function __construct(
        private string $title,
        private State $state,
        private ?DateTimeImmutable $publishedAt = null,
    ) {}
    
    public function getTitle(): string
    {
        return $this->title;    
    }
    
    public function getState(): State 
    {
        return $this->state;    
    }
    
    public function getPublishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;    
    }
}
```

# Novembre 2021 : PHP 8.1

Ensuite, nous arrivons à PHP 8.1. Les propriétés readonly sont une chose, et nous permettent d’écrire notre DTO comme ceci :

```php
class BlogData
{
    public function __construct(
        public readonly string $title,
        public readonly State $state,
        public readonly ?DateTimeImmutable $publishedAt = null,
    ) {}
}
```

# Novembre 2022 : PHP 8.2

Et enfin, nous arrivons à PHP 8.2 - pas encore sorti. Chaque fois qu’une classe n’a que des propriétés readonly, la classe elle-même peut être marquée comme readonly, au lieu de chaque propriété individuelle:

```php
readonly class BlogData
{
    public function __construct(
        public string $title,
        public State $state,
        public ?DateTimeImmutable $publishedAt = null,
    ) {}
}
```

# C’est la différence, non ?

Il est intéressant de voir comment la langue a évolué au cours de près d’une décennie. Si vous aviez proposé la syntaxe 8.2 il y a 10 ans, on vous aurait probablement traité de fou. La même chose est vraie aujourd’hui, et je suis sûr que nous allons regarder en arrière à ce point, dans dix ans et se demander "comment avons-nous jamais toléré cela?".

> " Symfony sur PHP 8.1 peut gérer 20,65 % de requêtes par seconde de plus que PHP 7.4 "

> " Sur Wordpress, PHP 8.1 est le vainqueur incontesté, avec une vitesse de 47.10 % supérieure à celle de PHP 8.0. C’est un résultat surprenant, compte tenu de la proximité des autres résultats. Et si vous le comparez à PHP 7.2, il peut gérer plus de 50 % de requêtes (ou transactions) par seconde. "

# Statistiques de version PHP : Juillet 2022

Ces graphiques ne sont pas une représentation 100% précise de la communauté PHP dans son ensemble, mais ils sont une représentation exacte de l’une des parties les plus importantes de PHP : l’écosystème packagist.

Statistiques d’utilisation

Commençons par le pourcentage de versions de PHP utilisées aujourd’hui, et comparons-le aux deux éditions précédentes :

| Version | juillet 2021 (%) |  janvier 2022 (%) |  juillet 2022 (%)
| --- | --- | --- | ---
| 8,1 | 0,1 | 9,1 | 24,5
| 8,0 | 14,7 | 23,9 | 20,6
| 7,4 | 46,8 | 43,9 | 38,4
| 7,3 | 19,2 | 12,0 | 8,0
| 7,2 | 10,4 | 6,6 | 5,1
| 7,1 | 3,8 | 2,4 | 1,9

Comme prévu au cours d’une année avec une version mineure au lieu d’une version majeure : PHP 8.1 est en croissance, et l’utilisation de PHP 8.0 est déjà en baisse. Un bon signe que les développeurs sont mise à jour! Gardez à l’esprit que PHP 8.0 est toujours activement pris en charge pour quatre autres mois. Donc, si vous n’avez pas mis à jour vers PHP 8.1, c’est le bon moment.

Moins de bonnes nouvelles - mais pas inattendues : plus de 50 % des développeurs utilisent toujours PHP 7.4 ou une version inférieure. Ce n’est pas un chiffre insignifiant, étant donné que PHP 7.4 ne reçoit que des mises à jour de sécurité pour 5 mois de plus, et toutes les anciennes versions ne sont tout simplement plus supportées.

La peur de la mise à niveau ne devrait pas être un bloqueur de nos jours par rapport à il y a huit ans : nous avons maintenant des outils matures comme Rector et PHP CS qui prennent soin de presque tout le chemin de mise à niveau pour vous.

Nous ne parlons pas seulement de nouvelles fonctionnalités PHP brillantes ici : nous parlons de performance, de sécurité logicielle pour le langage de programmation le plus populaire sur le web, et même de l’impact des anciennes versions de PHP sur l’utilisation de l’électricité et les exigences du serveur, dans les mots de Rasmus, nous pouvons aider à sauver la planète.

# versions prises en charge
- https://www.php.net/supported-versions.php 
- https://wordpress.org/about/stats/

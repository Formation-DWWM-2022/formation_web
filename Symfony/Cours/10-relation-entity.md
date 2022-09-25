# Relations entre entités

## Introduction

Il est fréquent que les entités soient liées entre-elles. Et nous avons la notion de clé étrangère qui peut apparaître dans nos tables. Il est possible (voire nécessaire) de gérer cela avec Doctrine.

Pour ce faire, il va falloir expliquer à Doctrine, les liens qui existent entre nos entités. Et Doctrine, se chargera de créer les clés étrangères où cela est nécessaire.

[La documentation officielle de Symfony sur les relations/associations](https://symfony.com/doc/current/doctrine/associations.html)

## Relations

Il existe les relations suivantes dans doctrine :

* OneToMany (et son inverse ManyToOne)
* ManyToMany
* OneToOne

Il existe également une notion très importante dans ces relations : **propriétaire** et **inverse**.

### Propriétaire et inverse

Dans une relation entre deux entités, il y a toujours une entité dite propriétaire, et une dite inverse. L'entité propriétaire est celle qui contient la référence à l'autre entité.

Prenons un exemple simple, les commentaires de nos annonces. En SQL pur, vous disposez de la _tablecomment_ et de la _tableadvert_. Pour créer une relation entre ces deux tables, vous allez mettre naturellement une colonne _advert_id_ dans la _tablecomment_. La _tablecomment_ est donc propriétaire de la relation, car c'est elle qui contient la colonne de liaison _advert_id_.

### Unidirectionnelle ou bidirectionnelle

Enfin, une relation peut être unidirectionnelle ou bidirectionnelle. Les relations bidirectionnelles peuvent être gérées automatiquement par Symfony modifiant un peu les entités inverses avec _inversedBy_ et _mappedBy_.

Dans le cas d'une relation bidirectionnelle, il faut aussi explicité la relation dans l'entité inverse. La relation bidirectionnelle permet de faciliter la recherche d'élement en partant de l'inverse (Article vers Commentaires).

## RELATION 1..N (ONETOMANY) ET N..1 (MANYTOONE)

La relation 1..n définit une dépendance multiple entre 2 entités de sorte que la première peut être liée à plusieurs entités

Prenons l'exemple des étudiants et des absences. Un étudiant peut avoir plusieurs (many) absences, mais une absence n'est associée qu'a un (one) seul étudiant.

Cette relation peut donc se résumer à : plusieurs (many) absences pour un (one) étudiant, ou de manière équivalent un (one) étudiant pour plusieurs (many) absences.

On se place prioritairement du coté du Many, et on doit écrire la relation ManyToOne. Elle est obligatoire pour définir la relation précédente.

```php
class Absence
{
// ...

/**
* @ORM\ManyToOne(targetEntity="App\Entity\Etudiant")
* @ORM\JoinColumn(nullable=true)
*/
private $etudiant;
...
}
```

Le code précédent est le minimum pour définir une relation.

On dit dans ce cas que Absence est propriétaire de la relation (toujours du coté du Many).

La relation décrite précédemment est unidirectionnelle. Pour la rendre bidirectionnelle il faut décrire la relation dans l'entité etudiant (avec la relation inverse OneToMany).

Le code de Absence devient

```php
class Absence
{
// ...

/**
* @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="absences")
* @ORM\JoinColumn(nullable=true)
*/
private $etudiant;
...
}
```

Le code de Etudiant sera :

```php
class Etudiant
{
    // ...

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Absence", mappedBy="etudiant")
     */
    private $absences;
    ...

    public function __construct()
    {
        $this->absences = new ArrayCollection();
    }

    /**
     * @return Collection|Absence[]
     */
    public function getAbsences()
    {
        return $this->absences;
    }
}
```

La relation OneToMany n'est pas obligatoire. Elle permet juste d'inverser la relation, et de rendre la manipulation plus simple.

Dans ce cas, on fait apparaître un tableau (`$this->absences`), de type `ArrayCollection` contenant tous les objets associés à cette relation (many).

## Relation 1..1 (OneToOne)

La relation 1..1 est peu utilisée mais permet une flexibilité en terme relationnelle très importante. Elle définit une dépendance unique entre 2 entités :

Utilisateur -> Adresse Produit -> Image Commande -> Facture

```php
/**
 * @ORM\OneToOne(targetEntity="Address")
 */
private $address;
```

## Relation N..N (ManyToMany)

Le fonctionnement est assez similaire à une relation ManyToOne/OneToMany, sauf que cette relation est forcément bidirectionnelle. Il faut décrire le comportement dans les deux entités et choisir, selon la logique désirée, qui sera la relation propriétaire (inversedBy) de la relation inverse (mappedBy).

Cette relation va créer une nouvelle table, contenant les deux clés étrangères.

## Manipulation de la console

La console (`make:entity`), nous facilite la création des relations. En créant ou en modifiant l'entité, il est possible d'ajouter le champs contenant la relation. Pour cela le type sera **"relation"**. La console vous demandera de préciser l'entité liée, ainsi que le type de relation. Vous pourrez ensuite selon la relation choisie, préciser la relation inverse, de manière optionnelle ou obligatoire.

**Attention, il est d'usage de lancer la console dans l'entité qui porte la relation (propriétaire), ou l'entité qui recevra la clé étrangère.**

```bash
php bin/console make:entity

Class name of the entity to create or update (e.g. BraveChef):
> Product

 to stop adding fields):
> category

Field type (enter ? to see all types) [string]:
> relation

What class should this entity be related to?:
> Category

Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
> ManyToOne

Is the Product.category property allowed to be null (nullable)? (yes/no) [yes]:
> no

Do you want to add a new property to Category so that you can access/update
getProducts()? (yes/no) [yes]:
> yes

New field name inside Category [products]:
> products

Do you want to automatically delete orphaned App\Entity\Product objects
(orphanRemoval)? (yes/no) [no]:
> no

 to stop adding fields):
>
(press enter again to finish)
```

Comme après chaque modification, il faudra générer le fichier de migration, et appliquer les modifications sur la base de données.

## Exercice

* Créer la liaison entre Post et Catégorie.
* Modifier la page de génération de Post pour créer un article "Post 3" avec la relation vers "Catégorie 1"
  * La catégorie de Post 3 sera Catégorie 1.
* Modifier la page avec tous les posts pour afficher la catégorie liée à l'article.
* Créer une page qui supprime "Post 1"

**En plus : Flash Messages** [https://symfony.com/doc/current/controller.html#flash-messages](https://symfony.com/doc/current/controller.html#flash-messages)

* Essayer d'utiliser les flash messages.

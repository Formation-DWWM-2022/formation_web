# TP-03 : Créer un CRUD


## Exercices

### 1. Créer un CRUD avec la commande

1. Créer une entité `Category` :

```
Category
---
name    VARCHAR 150 NN
```

2. Créer un CRUD : `php bin/console make:crud Category`


Les formulaires autogénérés peuvent prendre le style Boostrap en modifiant config/packages/twig.yaml et en ajoutant l'attribut suivant :

twig:
    form_themes: ['bootstrap_4_layout.html.twig']
Attention, ce sont bien 4 espaces et non pas une tabulation !

3. Étudiez les fichiers créés et testez sur `localhost:8000/category`.

4. Comment `index()` réussit à récupérer tous les éléments ? Comprennez bien le fonctionnement de cette méthode.

### 2. Ajout d'un message Flash

1. Ajoutez un message Flash de type `info` avec le message `La catégorie a bien été créée.`, à la création d'une catégorie, qui s'affichera dans `base.html.twig`.

### 3. Création d'une route pour trier les catégories

> Le but est de créer une route `/category/by/{name}` de sorte à pouvoir retrouver des catégories filtrées par nom. Par exemple, `/category/by/jardi` nous retournerait "jardinières", "jardinage", "jardin" (si ces catégories existent bien sûr !)

1. Créez une nouvelle route `/category/by/{name}`, avec un paramètre `string $name` dans la méthode.
2. Pour le moment, la méthode doit retourner la vue `category/index`, avec tous les éléments, comme le fait la méthode `index()` du controller.


### 4. Création d'une méthode dans le Repository

1. Ouvrez `CategoryRepository.php` et ajoutez la méthode suivante :

```php
    /**
     * @return Category[] Returns an array of Category objects
     */
    public function findByName(string $name) {

        return $this->createQueryBuilder('c')
            ->andWhere('c.name LIKE :name')
            ->setParameter('name', '%'.$name.'%')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }
```

2. Dans la méthode du controller créée dans l'exercice 3, remplacez `findAll()` par `findByName($name)`.

3. Testez votre route en allant sur `/category/by/UN_NOM_DE_VOTRE_CHOIX`
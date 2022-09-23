# TP-04 : Créer un CRUD pour Product et une relation dans le CRUD en ManyToOne

## Exercices

### 1. Création de l'entity

Créez une Entity `Product` :

```
Product
name        VARCHAR 255 NN
description TEXT        NN
photo       VARCHAR 255 NN
price       FLOAT       NN
stock       INT         NN
created_at  DATETIME    NN
category    ManyToOne   Entity:Category
```

### 2. Entity : valeurs par défaut

Créez un constructeur dans l'entité `Product` (avec `public function __construct() {}`), et utilisez les setters pour appliquer une valeur par défaut sur `createdAt` (voir le TP 1 et 2).

Effectuez les migrations.

### 3. Créer un CRUD

Créez un CRUD pour l'entity `Product`.

### 4. Mettre à jour la classe `ProductType`

> Les classes `*Type` sont des créateurs de formulaire, contenant plusieurs paramètres pour chaque champs. Ces formulaires sont ensuite appelés dans le controller, puis envoyés à la vue.

> Pour le moment, la route `/product/new` génère un bug à propos de la relation avec `Category`.

> Vous allez modifier la classe `ProductType` de sorte à ce que nous ayons un `select` en HTML qui nous permette de choisir une catégorie.

1. Modifier la ligne `->add('category')` en vous inspirant de la documentation : https://symfony.com/doc/current/reference/forms/types/entity.html#basic-usage

> **Attention** Pensez bien à importer correctement les classes avec l'autocomplétion

2. Testez votre formulaire de produit !
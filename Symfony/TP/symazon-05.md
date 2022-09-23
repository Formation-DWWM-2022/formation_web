# TP-05 : Mise en pratique

> Vous allez créer un site complet en vous inspirant des TP précédents.
> Vous pourrez utiliser du code autogénéré avec `make:crud` par exemple, mais dans tous les cas il y aura un effort de mise en page à faire !

> L'objet de ce site sera de publier vos souvenirs de vacances dans un mini réseau social.


## Modèle de données

```
Post
---
username    VARCHAR 255 NN
message     TEXT        NULLABLE
photo       VARCHAR 255 NULLABLE
likes       INT         NULLABLE
created_at  DATETIME    NN
```

Pensez bien à mettre une valeur par défaut pour `created_at` !

## Projet

### Header
- Vous créérez un header que vous importerez dans `base.html.twig` : (https://getbootstrap.com/docs/4.0/components/navbar/).
- Pour importer un fichier, utilisez `{% include 'nom/du/fichier.html.twig %}` (documentation : https://twig.symfony.com/doc/2.x/tags/include.html)
### Page d'accueil

- Vous ferez une page d'accueil qui affichera la liste des élements `Post`, chaque post sera affiché dans un élément `card` de Bootstrap (https://getbootstrap.com/docs/4.0/components/card/)

### Page d'ajout d'un Post

- Vous ferez un formulaire qui permette d'ajouter un nouveau Post. Pour le moment, vous laisserez le champ "photo" en un input text classique.
- Après avoir posté un Post, vous redirigerez vers la page d'accueil.

## Améliorations à voir en cours
- Upload de fichiers
- Authentification
- Espace administrateur et modération des posts
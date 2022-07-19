### Exo 13

- Demander à l’utilisateur les coordonnées de deux points : $x1, $x2, $y1 et $y2.
- Calculer et afficher la distance d entre les deux points X1 et X2, avec la formule :
- Formule : ![image](https://user-images.githubusercontent.com/46321539/156747841-bbc92b58-a592-4c32-80cc-798ade6eb208.png)

```php
```

### Exo 14

Créer un document form.php form.php qui permettra à l'utilisateur d'encoder :

    son nom,
    son prénom,
    son adresse (n°, rue, CP, Localité),
    son pays (utiliser un datalistdatalist pour les pays d'Europe)
    un mot de passe,
    un message de signature,
    son genre (homme ou femme).

- Le formulaire soumettra ses données à un document traitement.php (POST ). Dans traitement.php , afficher chaque donnée reçue.
- Idem en utilisant GET au lieu de POST .
- Vérifier l'existence des données avant de tenter de les utiliser.
- Rédigez un script qui permet de tester si une chaîne ne contient que de lettres .
- Ecrire un script qui teste si une chaîne de caractères contient le caractère '@' (le cas d'une adresse e-mail).
- Utiliser les expressions régulières pour vérifier si une chaîne de caractères correspond à :
  - Un numéro de téléphone sous la  forme : 00 00 00 00 00 ou 00-00-00-00-00
  - Un matricule qui commence par 3 lettres et se termine par 2 chiffres (exemple "abc12").

```php
```

### Exo 15

Les données encodées par l’utilisateur dans les différents formulaires doivent d’abord être contrôlées côté serveur et validées. Si une ou plusieurs données reçues ne correspondent pas à leur domaine de validité, l’utilisateur est redirigé vers le formulaire, dans lequel les champs erronés ont été marqués, un message explicatif accompagnant le champ, et les données correctes ont été recopiées telles quelles.

- Une fois l’entièreté des données soumises valides, celles-ci sont réaffichées à l’utilisateur ainsi que son Indice de Masse Corporelle (calculé : poids en kg / taille en cm au carré).
- Les données valides et confirmées par l’utilisateur seront stockées/traitées par le site.
- Créer un document form.php qui permettra à l'utilisateur d'encoder :

        nom,
        prénom,
        adresse (n°, rue
        code postal,
        localité,
        pays (datalist des pays d'Europe),
        mot de passe,
        message de signature,
        genre (homme ou femme).
        taille en centimètres,
        poids en kilogrammes. Implanter un bouton permettant de réinitialiser les champs.

- Le formulaire soumettra ses données via la méthode POST.
- Toute la logique est implémentée dans le même script : form.php.
- Si un ou plusieurs champs sont invalides, le formulaire sera rechargé.
- Les champs incriminés seront marqués et assortis d’un message d’erreur (attention à l’ergonomie).
- Les valeurs des champs correctement encodés seront pré-remplies.
- Implémenter la vérification des données pour votre formulaire :

        nom doit contenir uniquement des lettres ou le signe tiret (-),
        prénom doit contenir uniquement des lettres ou le signe tiret (-),
        adresse doit contenir uniquement des chiffres, des lettres ou un des signes suivants : (/,-),
        code postal doit contenir uniquement des chiffres,
        localité doit contenir uniquement des lettres ou le signe tiret (-),
        mot de passe est une suite de caractères imprimables,
        message de signature ne doit pas contenir de balise (tout terme entouré de ‘<…>’),
        taille doit être un nombre entier,
        poids doit être un nombre entier ou réel.

- L’ensemble des contenus générés seront mis en forme et positionnés de la manière la plus ergonomique possible ; les messages d’erreur seront aussi explicatifs que possible et placés à l’endroit le plus adéquat. Les codes couleurs retenus permettront à l’utilisateur d’identifier au premier coup d’œil les champs valides et les champs à corriger.

```php
```
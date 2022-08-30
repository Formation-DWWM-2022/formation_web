# Découvrir Stripe
Dans cet cours nous allons traiter d'une façon simple d'insérer un formulaire de paiement sur votre site avec le service Stripe, qui est similaire à Paypal.

Dans de nombreux sites, il est nécessaire de procéder à la mise en place d'un paiement en ligne. De nombreuses solutions existent, parmi lesquelles :
- Paypal, très utilisé à l'heure actuelle, assez complexe à implémenter pour des petits sites
- Les services des banques, assez coûteux
- Stripe, moins coûteux que les précédents et simple à implémenter

Stripe est une plateforme de paiement reconnue sur le marché, qui répond aux besoins e-commerce des entreprises. Elles peuvent utiliser cette solution et ses API pour : accepter des paiements, effectuer des virements et gérer toutes leurs activités en ligne. Stripe est en mesure de gérer les paiements dans le monde entier.

Le service dispose de différentes options d’intégrations flexibles, qui vous permettent de vous conformer aux normes PCI, sans compromettre l’expérience client. La plateforme est conçue pour aider les développeurs à concevoir des intégrations prêtes à être mises en production, à l’aide de bibliothèques disponibles pour les langages et frameworks de programmation les plus courants.

Vous pouvez vous appuyer sur ces 2 services :
- une page de paiement hébergée : l’option Stripe Checkout s’adapte de façon dynamique à l’appareil utilisé par le client et à sa localisation. Il prend également en charge les bons de réduction et la personnalisation des taux de taxe.
- des flux entièrement personnalisables : vous pouvez concevoir un formulaire de paiement personnalisé grâce à Stripe Elements, une suite complète de composants préconfigurés. Il est aussi possible de demander la création d’une intégration reposant entièrement sur les API de Stripe.

D’autres options d’intégrations sont à votre disposition. Vous pouvez :
- créer une page de paiement complète et la partager à vos clients via un simple lien de partage,
- créer des factures personnalisables pour des paiements récurrents ou ponctuels,
- accepter des paiements sur iOS ou Android grâce aux SDK mobiles,
- connecter des intégrations préconfigurées avec des plateformes et plugins tierces.

Côté international, la solution prend en charge plus de 135 devises et dispose d’une API unifiée pour les cartes bancaires, les portefeuilles électroniques et les prélèvements bancaires.

En supplément, la plateforme de paiement vous aide à lutter contre la fraude via son service Stripe Radar, et mène une analyse approfondie des données pour éviter les échecs de paiement.

La tarification est proportionnelle à votre utilisation du service :
- pour les cartes européennes : 1,4 % + 0,25 €
- pour les cartes non européennes : 2,9 % + 0,25 €

À savoir : il n’y a pas de frais d’installation, ni de frais mensuels ou cachés.

Les entreprises ayant un volume important de paiement, peuvent aussi demander une solution sur-mesure : remise sur volume, remises sur la vente de produits groupés, taux spécifique par pays, taux d’interchange…

C'est ce dernier que nous allons voir aujourd'hui, dans sa version simple, intégrée en javascript à notre site.

# Créer son compte

Nous devons commencer par créer notre compte, sur [stripe.com](https://stripe.com/fr).

Dans la procédure d'inscription, il sera nécessaire de donner quelques informations, et surtout, des coordonnées bancaires, utiles pour recevoir les paiements.

Une fois l'inscription terminée, vous accéderez à un tableau de bord et à un environnement de test.

Cet environnement de test vous permettra de vous assurer du bon fonctionnement de votre code avant mise en production.

Vous aurez également accès à des clés d'API, l'une publique, qui pourra être intégrée à votre javascript, l'autre privée, que personne ne devra connaître mis à part les développeurs.

# Mettre en place le projet, installer Stripe

Pour commencer, nous allons mettre en place notre projet et y installer Stripe.

Il vous faudra, dans cette étape, installer Composer sur votre ordinateur.
Les fichiers du projet

Nous allons créer des pages simples qui ne contiendront que le minimum vital pour faire fonctionner Stripe.

La page d'accueil "index.php" contiendra un petit formulaire permettant d'entrer un montant et de valider

```html
<form action="paiement.php" method="post">
    <label for="prix">Prix</label>
    <input type="text" name="prix" id="prix">
    <button>Procéder au paiement</button>
</form>
```

Comme vous pouvez le constater, ce formulaire chargera "paiement.php" qui servira à la gestion du paiement lui même, détaillé un peu plus bas.

Nous aurons également un fichier javascript "scripts.js" qui se chargera de la gestion du formulaire de paiement.

# Installer Stripe

La dernière chose à faire maintenant est d'installer Stripe lui même au moyen de Composer.

La ligne de commande, à exécuter dans un terminal, est la suivante

```
composer require stripe/stripe-php
```

Voilà, tout est prêt, nous pouvons maintenant utiliser Stripe.
Le paiement

Dans la procédure de paiement, nous allons devoir séparer 3 étapes :
- L'intention de paiement : nous informons Stripe qu'un paiement va arriver avec un certain montant
- L'affichage du formulaire de paiement
- La gestion du paiement

# L'intention de paiement

Dans un premier temps, nous allons informer Stripe qu'un paiement va arriver.

Pour ce faire, nous allons ouvrir notre fichier "paiement.php" et y insérer un peu de code.

Le fichier de base sera un simple code HTML classique

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Paiement</title>

    </head>
    <body>

        <script src="js/scripts.js"></script>
    </body>
</html>
```

Nous allons y insérer, au début du fichier, le code permettant d'informer Stripe du paiement à venir.

Nous avons son montant en euros qui nous a été envoyé en méthode POST depuis la page d'accueil. Nous commençons par vérifier que nous avons bien reçu ce montant

```php
if(isset($_POST['prix']) && !empty($_POST['prix'])){

}
```

A l'intérieur de cette condition nous savons que nous avons reçu un prix.

Attention, je ne mets pas tous les contrôles mais il est également nécessaire de s'assurer qu'il s'agit bien d'un nombre décimal, par exemple.

Une fois assurés que nous avons un prix, nous pouvons appeler Stripe et lui transmettre notre intention de paiement.

Vous aurez besoin de votre clé d'API privée à cette étape

```php
if(isset($_POST['prix']) && !empty($_POST['prix'])){
    // Nous appelons l'autoloader pour avoir accès à Stripe
    require_once('vendor/autoload.php');

    // Nous instancions Stripe en indiquand la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
    \Stripe\Stripe::setApiKey('VOTRE_CLE_PRIVEE_STRIPE');

    // Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
    $intent = \Stripe\PaymentIntent::create([
        'amount' => $_POST['prix']*100, // Le prix doit être transmis en centimes
        'currency' => 'eur',
    ]);
}
```

C'est terminé, nous avons informé Stripe de notre intention d'encaisser un paiement et avons reçu une réponse en retour, qui nous servira par la suite.

# Le formulaire de paiement

Pour procéder au paiement, nous devons afficher un formulaire de saisie de numéro de carte bancaire et gérer son fonctionnement.

Nous allons décomposer tout ceci, qui sera fourni par Stripe en javascript.

Pour commencer, toujours dans notre fichier "paiement.php" nous allons insérer le fichier javascript de Stripe, avant le notre.

```html
<script src="https://js.stripe.com/v3/"></script>
<script src="js/scripts_paiement.js"></script>
```

Ensuite, dans la partie `<body>`, nous allons ajouter un formulaire

```html
<form method="post">
</form>
```

Ce formulaire se découpera en plusieurs partie.

Tout d'abord, une zone d'affichage des erreurs de paiement

```html
<div id="errors"></div>
```

Puis une zone de saisie de l'identité de la personne

```html
<input id="cardholder-name" type="text" placeholder="Titulaire de la carte">
```

Vient ensuite le formulaire de saisie du numéro de carte, date d'expiration, code de validation et code postal

```html
<div id="card-element">
</div>
```

Ensuite l'affichage des erreurs relatives au numéro de carte

```html
<div id="card-errors" role="alert"></div>
```

Et enfin,le bouton de validation

```html
<button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>
```

Vous pouvez constater que nous avons injecté un code secret dans l'attribut "data-secret" du bouton. Il s'agit de l'élément qui fera le lien entre le paiement et l'intention de paiement précédemment générée.

Ce qui nous donne un formulaire complet comme ceci

```html
<form method="post">
    <div id="errors"></div>
    <input id="cardholder-name" type="text" placeholder="Titulaire de la carte">
    <div id="card-element">
    </div>
    <div id="card-errors" role="alert"></div>
    <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>
</form>
```

Il est maintenant nécessaire d'utiliser l'API Stripe pour générer le contenu et les contrôles de ce formulaire.

Le asuite du code sera écrite dans le fichier "scripts.js".

On commence par s'assurer du bon chargement du document avant de le manipuler

```js
window.onload = () => {

}
```

Puis on instancie Stripe et on crée les variables qui nous serviront plus tard

```js
// On instancie Stripe et on lui passe notre clé publique
let stripe = Stripe('VOTRE_CLE_PUBLIQUE');

// Initialise les éléments du formulaire
let elements = stripe.elements();

// Définit la redirection en cas de succès du paiement
let redirect = "/index.php";

// Récupère l'élément qui contiendra le nom du titulaire de la carte
let cardholderName = document.getElementById('cardholder-name');

// Récupère l'élement button
let cardButton = document.getElementById('card-button');

// Récupère l'attribut data-secret du bouton
let clientSecret = cardButton.dataset.secret;

// Crée les éléments de carte et les stocke dans la variable card
let card = elements.create("card");
```

Vient ensuite le moment d'injecter le formulaire dans notre page

```js
card.mount("#card-element");
```

Nous allons maintenant mettre en place l'écouteur d'évènements "change" qui se chargera de surveiller que le formulaire est rempli correctement

```js
card.addEventListener('change', function(event) {
    // On récupère l'élément qui permet d'afficher les erreurs de saisie
    let displayError = document.getElementById('card-errors');

    // Si il y a une erreur
    if (event.error) {
        // On l'affiche
        displayError.textContent = event.error.message;
    } else {
        // Sinon on l'efface
        displayError.textContent = '';
    }
});
```

Cette partie est terminée, notre formulaire de paiement est fonctionnel. Reste à gérer le paiement en lui même.

# Gérer le paiement

Pour terminer, nous allons devoir gérer le paiement lui-même et le transmettre à Stripe.

Le paiement sera transmis au moment où l'utilisateur cliquera sur le bouton de validation. Nous allons donc ajouter un écouteur d'évènements sur ce bouton, pour l'évènement "click".

Cet évènement déclenchera une promesse javascript sur l'objet Stripe, dont on va gérer la réponse.

```js
cardButton.addEventListener('click', () => {
    // On envoie la promesse contenant le code de l'intention, l'objet "card" contenant les informations de carte et le nom du client
    stripe.handleCardPayment(
        clientSecret, card, {
            payment_method_data: {
                billing_details: {name: cardholderName.value}
            }
        }
    ).then(function(result) {
        // Quand on reçoit une réponse
        if (result.error) {
            // Si on a une erreur, on l'affiche
            document.getElementById("errors").innerText = result.error.message;
        } else {
            // Sinon on redirige l'utilisateur
            document.location.href = redirect;
        }
    });
});
```

Voilà, nous avons terminé.

Il ne reste plus qu'à tester. Stripe fournit des numéros de carte de test
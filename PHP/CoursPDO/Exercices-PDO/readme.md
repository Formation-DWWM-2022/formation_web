# PDO - Partie 2 : Écrire des données
<!-- https://github.com/tomsihap/Exercices-PDO-partie-2 -->

**Attention : Exécuter patients.sql avant de commencer les exercices.**

> Cette fois, vous allez envoyer un formulaire d'une page à une autre (action). Dans la page d'action, vous allez traiter les données dans la variable `$_POST`, contenant donc les données du formulaire, et les insérer avec un `INSERT INTO table (champ1, champ2) VALUES (val1, val2)`.


Modèle de requête :

```php

// 1. On se connecte à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8;port=3306', 'root', '');

// 2. On prépare la requête avec des marqueurs à la place des variables (ce sont les "fausses" variables commençant par ":")
$request = $bdd->prepare('  INSERT INTO articles(title, content)
                            VALUES(:title, :content)
                        ');

// 3. On exécute la requête avec un tableau de marqueur => variable
$request->execute(array(
	'title'     => $title,
	'content'   => $content,
));

echo 'L\'article a bien été ajouté !';
?>

```

Bien sûr, `$title` et `$content` sont à créer, par exemple comme cela :

```php
$title = ''; // Par défaut, la variable titre existe et est vide

// Si $_POST['title'] existe, alors $title est égal à $_POST['title'].
if ( isset( $_POST['title']) ){
    $title = $_POST['title'];
}
```

## Exercice 1

Créer une page ajout-patient.php et y créer un formulaire permettant de créer un patient. Elle doit être accessible depuis la page index.php ( = faire un lien dans index.php qui pointe vers ajout-patient.php donc).

## Exercice 2

Créer une page liste-patients.php et y afficher la liste des patients. Inclure dans la page, un lien vers la création de patients.

## Exercice 3

Créer une page profil-patient.php. Elle doit permettre d'afficher toutes les informations d'un patient. Elle doit être accessible depuis la page liste-patients.php et afficher les informations du patient sélectionné.

## Exercice 4

Depuis la page de profil d'un patient, permettre la modification de ce patient.

## Exercice 5

Créer une page ajout-rendezvous.php et y créer un formulaire permettant de créer un rendez-vous. Elle doit être accessible depuis la page index.php.

## Exercice 6

Dans la page liste-rendezvous.php, afficher la liste des rendez-vous. Inclure dans la page, un lien vers la création de rendez-vous.

## Exercice 7

Créer la page rendezvous.php. Elle doit permettre d'afficher toutes les informations d'un rendez-vous. Elle doit être accessible depuis la page liste-rendezvous.php et afficher les informations du rendez-vous sélectionné.

## Exercice 8

Depuis la page d'un rendez-vous, permettre la modification de ce rendez-vous.

## Exercice 9

Sur la page profil du patient, afficher sous ses informations la liste de ses rendez-vous.

## Exercice 10

Depuis la page liste-rendezvous.php permettre la suppression d'un rendez-vous.

## Exercice 11

Depuis la page liste-patients.php, permettre de supprimer un patient et ses rendez-vous.

## Exercice 12

Ajouter dans la page liste-patients.php, un champs de recherche.

## Exercice 13

Dans la page liste-patients.php, créer une pagination.

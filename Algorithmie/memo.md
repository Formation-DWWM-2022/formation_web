## Pour écrire un algorithme, une feuille de papier et un crayon suffisent.
    
# Définition d’un algorithme

Avant de commencer, un petit rappel de la définition d’un algorithme.

    Un algorithme est une description complète et détaillée des actions à effectuer et de leur séquencement pour arriver à un résultat donné.

    Un algorithme permet d’exprimer comment résoudre les problèmes sans se soucier d’un langage de programmation spécifique. 

Définition du pseudo code

    Le pseudo code est une représentation textuelle avec une série de conventions ressemblant à un langage de programmation (sans les problèmes de syntaxe liée à un langage de programmation spécifique). 

Notes :

Le pseudo code présenté ci-dessous peut être légèrement différent de ce que vous connaissez déjà ou de ce que vous pourrez voir par ailleurs.

Cela reste du pseudo code. Ce qui est important c’est que vous soyez à la fois cohérent dans l’écriture de vos algorithmes et que ceux-ci soient lisibles et compréhensibles.

Pour une meilleure lisibilité, ici, j’ai mis le pseudo code en majuscule (ce qui ne change pas). Et en minuscule, tout ce qui change selon votre algorithme.

### La structure de base d’un algorithme

```
  ALGO nom_de_votre_algorithme
  VARIABLES ...
  DEBUT
  ...
  FIN
```

### Déclarer une variable

Une variable sert à stocker la valeur d’une donnée.

Une variable possède un nom (identificateur) unique et un type primitif (entier, réel, caractère, chaîne de caractères, booléen…).

```
VARIABLE nom : type
```

### Affecter une variable

L’affectation consiste à attribuer une valeur à une variable.

En général, une variable commence par une lettre alphabétique suivi de lettres, chiffres, underscore _ (c’est le tiret de soulignement). Elle ne doit pas utiliser de mots réservés au langage de programmation (par exemple : int, float, if, for, return, number…).

```
maVariable <- "sa valeur"
unNombre <- 8
```

### Opérateurs
```
// Opérateurs arithmétiques
+, -, *, /, % (modulo), ^ (puissance)
// Opérateurs logiques
NON, OU, ET
// Opérateurs relationnels
=, ≠, <, >, <=, >=
// Opérateurs sur les chaînes
& (concaténation)
```

### Instruction entrée

Pour récupérer des données entrées par l’utilisateur.

```
LIRE(maVariable)
```

### Instruction sortie

Ecrire/Afficher des résultats à l’utilisateur. C’est ce que l’on voit à l’écran.

```
ECRIRE(maVariable)
```

ou aussi (les deux notations sont acceptées) :

```
AFFICHER(maVariable)
```

### Instruction conditionnelle
```
SI condition ALORS
  instruction ou suite d'instructions
SINON
  instruction ou suite d'instructions
FINSI
```

### Conditions composées

Une condition composée est une condition formée de plusieurs conditions simples reliées par des opérateurs logiques :
```
ET
OU
 // Pour 'XOR' : soit l'un soit l'autre mais pas les deux, qu'une possible.
XOR
NON
```

L’évaluation d’une condition composée se fait selon des règles présentées généralement dans ce qu’on appelle tables de vérité :
A1 	A2 	A1 ET A2
VRAI 	VRAI 	VRAI
VRAI 	FAUX 	FAUX
FAUX 	VRAI 	FAUX
FAUX 	FAUX 	FAUX
A1 	A2 	A1 OU A2
VRAI 	VRAI 	VRAI
VRAI 	FAUX 	VRAI
FAUX 	VRAI 	VRAI
FAUX 	FAUX 	FAUX
A1 	A2 	A1 XOR A2
VRAI 	VRAI 	FAUX
VRAI 	FAUX 	VRAI
FAUX 	VRAI 	VRAI
FAUX 	FAUX 	FAUX
A1 	NON A1
VRAI 	FAUX
FAUX 	VRAI

### Boucle pour

Les boucles pour ou avec compteur : on répète des instructions en faisant évoluer un compteur (variable particulière) entre une valeur initiale et une valeur finale.

Le nombre d’itérations dans une boucle pour est connu avant le début de la boucle.

Ce qui est entre crochet est optionnel. En effet par défaut, un pas est incrémenté de 1 à 1 dans la plupart des langages de programmation.

Pour incrémenter :

```
POUR compteur ALLANT DE initial A final [PAR PAS DE valeur]
FINPOUR
```

Et pour décrémenter :

```
POUR compteur ALLANT DE final A initial PAR PAS DE - 1
FINPOUR
```

### Boucle tant que

Les boucles tant que : on répète des instructions tant qu’une certaine condition est réalisée.

Le nombre d’itérations dans une boucle tant que n’est pas connu au moment d’entrée dans la boucle. Il dépend de l’évolution de la valeur de condition.

Une des instructions du corps de la boucle doit absolument changer la valeur de condition de vrai à faux (après un certain nombre d’itérations), sinon le programme tourne indéfiniment (ce que l’on appelle une boucle infinie !).

```
TANTQUE (condition)
  instructions
FINTANTQUE
```

### Boucle répéter jusqu’à

Les boucles jusqu'à : on répète des instructions jusqu’à ce qu’une certaine condition soit réalisée.

On exécute la boucle au moins 1 fois.

```
REPETER
  instructions
JUSQU'A (condition)
```

### Fonction

Une fonction retourne un résultat. Elle peut ne pas avoir de paramètre.

```
FONCTION nom_fonction (paramètre : type) : type_de_retour_fonction
  instructions constituant la fonction
  RETOURNE ...
FINFONCTION
```

### Procédure

Une procédure est une fonction qui ne retourne pas de résultat. Elle peut, aussi, ne pas avoir de paramètre.

```
PROCEDURE nom_procedure (paramètre : type)
  instructions constituant le corps de la procédure
FINPROCEDURE
```

### Transmission des paramètres

Les paramètres peuvent se transmettre :

    par valeur
    par adresse (ou par référence)

Il suffit d’ajouter après le type soit par valeur soit par adresse.
Par défaut, un paramètre est transmis par valeur.

### Tableau à une dimension
```
// La dimension correspond au nombre d'éléments, au nombre total d'indices attendues.
VARIABLE TABLEAU identificateur/nom_tableau [dimension] : type
```

### Tableau à deux dimensions
```
VARIABLE TABLEAU identificateur/nom_tableau [dimension1][dimension2] : type
```

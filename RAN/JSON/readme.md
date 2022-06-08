# Qu’est-ce que JSON ?

JSON (JavaScript Object Notation) est un format d’échange de données léger et donc performant. C’est un format de texte indépendant de tout langage mais utilisant des conventions familières aux programmeurs de la famille de langages C (incluant JavaScript et Python notamment).

JSON est une syntaxe pour sérialiser* des objets, tableaux, nombres, chaînes de caractères, booléens et valeurs null. Elle est basée sur la syntaxe de JavaScript mais en est distincte : du code JavaScript n’est pas nécessairement du JSON, et du JSON n’est pas nécessairement du JavaScript.

*Sérialiser = mettre des données en série après les avoir converti dans un format donné. Par extension, la sérialisation est en informatique l’action de mettre des données sous forme binaire et de les écrire dans un fichier.

JSON peut représenter des nombres, des booléens, des chaînes, la valeur null, des tableaux (séquences de valeurs ordonnées) et des objets constitués de ces valeurs (ou d’autres tableaux et objets). JSON ne représente pas nativement des types de données plus complexes tels que des fonctions, des expressions régulières, des dates, etc.

Tout comme XML, JSON a la capacité de stocker des données hiérarchiques contrairement au format CSV plus traditionnel.

# Les structures de données et leur représentation JSON

JSON est construit par rapport à deux structures :

- Une collection de paires nom / valeur. Dans les différentes langages, ce type de structure peut s’appeler objet, enregistrement, dictionnaire, table de hachage, liste à clé ou tableau associatif.
- Une liste ordonnée de valeurs. Dans la plupart des langages, c’est ce qu’on va appeler tableau, liste, vecteur ou séquence.

Ces deux structures sont des structures de données universelles. Pratiquement tous les langages de programmation modernes les prennent en charge sous une forme ou une autre. Il est logique qu’un format de données interchangeable avec les langages de programmation soit également basé sur ces structures.

En JSON, ces deux structures se retrouvent sous les formes suivantes :

- Un objet est un ensemble non ordonnées de paires nom : valeur. Un objet commence avec { et se termine avec }. Les noms sont suivis de : et les paires nom : valeur sont séparées par des ,
- Un tableau est une collection ordonnée de valeurs. Un tableau commence avec [ et se termine avec ]. Les valeurs sont séparées par des ,

Une valeur peut être une chaine de caractères entourées par des guillemets doubles, un nombre, un booléen, la valeur null, un objet ou un tableau.

Exemple de données au format JSON :

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/06/javascript-donnees-json.png)
![image](https://help.apple.com/assets/6233B96927E1F50AD244BB36/6233B96C27E1F50AD244BB45/fr_FR/04df820ee4c091a186bb54d27a0d2f52.png)
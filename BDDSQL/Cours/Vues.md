Une vue peut se définir comme une table virtuelle, construite à partir d'une requête qui peut être arbitrairement complexe. Formellement, une vue est une façon de stocker une requête afin de pouvoir s'y référer simplement à tout moment. Un utilisateur qui aurait besoin de ces résultats peut donc lancer une requête directement sur la vue, comme s’il s’agissait d’une table. Lorsqu’une table sur laquelle une vue est construite est modifiée, alors la vue "prend en compte" cette modification pour les requêtes suivantes qui seraient faites sur elle.

Les vues sont un moyen commode de présenter les données de façon simple, en ne montrant que ce que l’utilisateur a besoin de voir, par des requêtes simples pour lui. La véritable structure des données est masquée, et les requêtes parfois complexes pour y accéder également. Au delà de cette façon commode de faire, comme il a déjà été dit, cela permet aussi de contrôler les données du point de vue de la sécurité et des droits d’accès.
6.1. Création d'une vue

La syntaxe pour la création d’une vue est la suivante.

Création d'une vue

```
CREATE VIEW nom_de_la_vue [(liste_de_colonnes)] AS expression_select
```

L'expression select est en fait une sélection classique, comme nous en avons déjà écrite.

La liste des colonnes prend les colonnes du résultat de la requête et leur attribue les noms de la liste. Cette liste doit donc comporter autant d’éléments qu’il y a de colonnes dans le résultat de requête.

D’une façon générale, une vue est une table qui ne peut qu’être lue. Il existe en fait quelques cas dans lesquels on peut insérer ou modifier les éléments d’une vue. Ces cas sont définis très précisément dans les documentations du serveur que l’on utilise.

Une vue s'utilise ensuite exactement comme une table. Elle peut être utilisée comme argument d'un select. À chaque fois qu'une requête est faite sur une vue, les requêtes qui ont servi à créer la vue sont exécutées.

La commande qui permet d'effacer une vue est la suivante.

Effacement d'une vue
```
DROP VIEW nom_de_la_vue ;
```

Aucune donnée n'est effacée lors de l'effacement d'une vue, à la différence de l'effacement d'une table.

Il y a six types de vue :

- Les projections d’une table unique dans une vue. Ce système est pratique pour restreindre l’accès à certaines lignes ou colonnes : il est effectivement possible d'interdire la lecture d'une table à un utilisateur, et de l'autoriser à lire une vue définie sur une partie de cette table.
- Les colonnes calculées : la vue comporte une colonne qui est la somme d’autres. Ce type de vue est utile pour créer des rapports ou résumés, et mettre en évidence certaines choses.
- Les colonnes traduites : la vue comporte une jointure qui permet de changer une référence numérique en un nom lisible. Dans l’exemple de notre table Marins, une telle vue présenterait le nom du marin et sa commune de naissance. Dans ce cas l’identificateur de commune de la table Marins sert de jointure, et est masqué à l'utilisateur.
- Les vues groupées : la vue comporte une colonne qui contient une opération sur plusieurs lignes de la table originale. Il y a donc une clause group by et une fonction d'agrégation dans le critère de sélection.
- Les vues réunissant plusieurs tables : utilisent une union dans la clause de sélection.
- Les vues qui s’appuient sur d’autres vues. Il est parfaitement possible de créer une vue à partir d’une ou plusieurs autres vues. Il faut juste prendre garde à ne pas créer de référence circulaire lorsque l’on crée de telles choses.

# Exemples de vues
## Vue jointe

Créons une vue v_Marins qui nous donne le nom de la commune de naissance de nos marins directement.

Vue jointe
```
create view v_Marins (nom, prenom, ddnaissance, ddmort, commune)
    as 
       select Marins.nom, prenom, ddnaissance, ddmort, Communes.nom
       from Marins
       join Communes  on Marins.id_commune = Communes.id ;
```

Cette vue s'utilise exactement comme une table, en exécutant par exemple :

Sélection sur une vue
```
select *  from v_Marins ;
```

On remarquera que pour un utilisateur débutant en SQL, il est nettement plus aisé d'interroger une vue que deux tables en jointure.

Toute modification faite au niveau de l’une des tables Marins ou Communes est bien sûr propagée automatiquement dans la vue.

## Vue groupée

Nous pouvons également créer une vue à partir de la requête qui nous a permis d’obtenir le tonnage livré par chaque bateau.

Vue groupée - 1
```
create view v_tonnage
    as
       select nom_bateau, sum(tonnage)  as tonnage
       from Bateaux  left  outer  join Livraisons
       on (Bateaux.id = Livraisons.id_bateau)
       group  by Bateaux.nom_bateau ;
```

Nous avions vu que pour l’Améthyste, le tonnage était nul, ce qui peut poser problème. On peut aussi écrire une autre vue, qui se fonde sur celle-ci et qui gère le cas où le tonnage est nul.

Vue groupée - 2
```
create view v_tonnage2 (nom_bateau, tonnage)
    as
       select nom_bateau, tonnage  from v_tonnage  where tonnage  is  not  null
       union
       select nom_bateau, 0  from v_tonnage  where tonnage  is  null ;
```

On constate que la valeur nulle pour le tonnage transporté par l'Améthyste vaut maintenant 0, ce qui est une meilleure façon de présenter les choses.

On aurait bien sûr pu mêler les définitions des deux vues en une seule.

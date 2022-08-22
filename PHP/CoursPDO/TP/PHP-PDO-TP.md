# PDO - TP
Pour tous les TP, il faudra respecter ces règles :
<!-- Respecter le modèle MVC -->
- Nommer ses variables, fonctions, bases, tables et champs en anglais
- Soigner son CSS
- Avoir un HTML valide
<!-- Utiliser des classes serait un plus -->
- Mettre des commentaires utiles

## TP 1
Créer un base avec une table permettant d'enregistrer un utilisateur. Un utilisateur est défini comme tel :
- Nom - 50 caractères max
- Prénom - 50 caractères max
- Date de naissance - Date
- Adresse - Texte
- Code Postal - 5 caractères max
- Numéro de téléphone - 10 caractères max
- Service - entier

Créer une table Service :
- Nom du service - 50 caractères max
- Description - 100 caractères max

Remplir la table Service avec ces informations :

Nom du service   |   Description
------           |    ---
Maintenance      |   Les spécialistes du Hardware
Web Developer    |   Pour eux tout est code
Web Designer     |   Y a que le CSS dans la vie
Reférenceur      |   Regarde les Serps Google du matin au soir et du soir au matin

Faire une page index permettant de lister les utilisateurs en affichant ces données :
- Son nom et son prénom
- Son âge
- Son adresse complète
- Son numéro de téléphone
- Son service

Sur cette page on doit pouvoir filtrer les services via une liste déroulante et donc n'afficher que ceux choisi.
On doit aussi pourvoir supprimer un utilisateur via un bouton.

Faire une autre page permettant d'ajouter un utilisateur. On doit s'assurer que les données saisies par l'utilisateur sont celle attendues.
**Attention au piratage !!**


## TP2
Créer une base de données comportant 3 tables.
Table **client** :
- Nom - 50 caractères max
- Prénom - 50 caractères max
- Date de naissance - Date
- Adresse - Texte
- Code Postal - 5 caractères max
- Numéro de téléphone - 10 caractères max
- Statut marital - entier

Table **statut marital** :
- Statut - 50 caractères max

Remplir la table Statut marital avec ces informations :

**Statut :**
Célibataire
Concubinage
Divorcé
Marié
Veuf

Table **crédit** :
- Organisme - 50 caractères max
- Montant - decimal
- Ref client - entier

Créer 4 pages :
- Creation client : permettant de créer un client
- Ajout credit : permettant d'ajouter un crédit
- Liste client : permettant de lister les clients
- Détail client : permettant d'afficher les infos clients (info perso, crédits)

**Un client peut avoir plusieurs crédits.**
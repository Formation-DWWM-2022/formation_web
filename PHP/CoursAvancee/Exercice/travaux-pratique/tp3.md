# TP n ̊ 3. Commerce en ligne
Ce troisième thème a pour but de vous placer dans une situation professionnelle.
Vous y jouez le rôle d’un concepteur indépendant vis-à-vis d’un client qui n’est pas un
professionnel du Web mais un commerçant. Il ne peut donc exprimer ses besoins dans
un langage technique propre à Internet et à la programmation PHP, dont il ignore tout.

# Les besoins du client
Le client dirige une PME qui vend des produits informatiques et vidéo. Vous devez lui
créer un site de commerce en ligne pour vendre ses produits par correspondance. Son
budget ne lui permettant pas de vous rémunérer en permanence pour maintenir le site,
vous lui créez une interface Internet à accès privé lui permettant d’ajouter ou d’enlever
des produits dans la base de données sans avoir à passer par un logiciel FTP.

# Votre travail
Comme vous n’allez pas réinventer le concept de commerce en ligne et partir de zéro,
vous vous inspirerez de ce qui existe déjà. Vous consulterez pour cela des sites de vente
en ligne tels que amazon.com pour en étudier le fonctionnement.

Il vous faudra en dégager les points essentiels et n’en retenir que ce qui correspond au cas
relativement simple de votre client.

En particulier, le nombre d’articles vendus par cette PME est relativement limité compara-
tivement à ceux du site d’Amazon. Cela peut entraîner des simplifications dans la structure
de la base, comme le fait de ne pas créer de table spéciale pour enregistrer le nom des
marques des produits en magasin.

# Fonctionnement du site
Le site répond aux conditions suivantes :
- Dans la page d’accueil, le client recherche un type de produit dans une des catégories
informatique, vidéo et divers (pour les accessoires et consommables). Un tri par
marque et par prix est proposé pour l’affichage des résultats.
- Les résultats de la recherche sont affichés en respectant le critère de tri. Chaque
produit est suivi d’un lien permettant sa sélection.
- La sélection d’un produit entraîne sa mise en panier.
- Après chaque sélection, le client peut soit rechercher un autre produit, soit terminer sa
commande.
- Dans ce dernier cas, l’ensemble de sa commande est affichée, et vous lui demandez
ses coordonnées.
- Si le client n’est pas encore enregistré, il saisit ses coordonnées complètes. Son
adresse e-mail et un mot de passe lui serviront à s’identifier par la suite. Il saisit égale-
ment le cas échéant l’adresse de livraison, qui peut être différente de l’adresse du
client. Ces informations sont stockées à l’aide de sessions pour être transmises aux
pages suivantes de la procédure d’achat.
- Si le visiteur est déjà client, il ne saisit que son e-mail et son mot de passe. L’authenti-
cité de ces informations est vérifiée dans la base, et les coordonnées complètes du
client sont récupérées. Ces coordonnées sont utilisées pour remplir automatiquement
un formulaire identique à celui du visiteur non enregistré. Ces informations sont égale-
ment stockées à l’aide de sessions.
- La phase de paiement par carte bancaire n’étant pas réalisable sans une convention
bancaire, vous vous contentez de demander la saisie d’un numéro de carte et d’utiliser un algorithme de vérification du numéro. Vous trouverez cet algorithme sur Internet en
faisant une recherche à partir du mot-clé clé de Luhn.
- Si le paiement est bien réalisé, vous finalisez la transaction en enregistrant l’ensemble
des informations dans les tables client, commande et ligne puis affichez le numéro de
commande à destination du client.
- Pour finir, vous envoyez un e-mail de confirmation au client et au dépôt du magasin
chargé de la livraison.

# La base de données MySQL
La base de données étant susceptible d’être soumise à de nombreux accès concurrents, le
choix de MySQL s’impose.

Table Client :
- id_client
- nom
- prenom
- age
- adresse
- ville
- mail

Table Commande :
- id_comm
- id_client
- date

Table Ligne :
- id_comm
- id_article
- quantite
- prix_unit

Table Article
- id_article
- design
- prix
- categorie

Ce modèle est imposé afin que chaque lecteur travaille sur la même base. N’ajoutez
aucun attribut aux entités représentées dans le modèle.

# Conseils
> Établissez le schéma de fonctionnement du site avant de commencer le moindre codage.

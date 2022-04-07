# An' Flore
# 1 Présentation d’ensemble du projet
## 1.1 Présentation de l’entreprise :

« An' Flore » est une entreprise de vente de bouquet de fleurs en ligne, actuellement en cours de création à Clermont-Ferrand. L’enregistrement des statuts pour la création d’une SAS est prévu pour début avril.

## 1.2 Les objectifs du site :
Le site de « An' Flore » sera la seule plateforme de vente de l’entreprise, et doit être en mesure de proposer une expérience de qualité aux visiteurs du site. Le back-office du site doit également permettre une gestion quotidienne des activités e-commerce (suivi des commandes, mise à jour du catalogue produit) sans avoir besoin de l’intervention de l’agence.

## 1.3 La cible adressée par le site :
« An' Flore » cible les particuliers, consommateurs réguliers de bouquet de fleurs de qualité ou simples amateurs souhaitant développer leur culture. Le discours marketing, les modes de tarification pratiqués ou l’image de marque qui sera développée ciblera principalement une clientèle relativement jeune (25-35 ans) utilisant les supports digitaux de manière intensive.

## 1.4 Objectifs quantitatifs après 1 an :
    Nombre de bouquet de fleurs vendues : 3 000
    Visiteurs par jour : 1 500, dont plus de 30% en référencement naturel
    Taux de conversion : supérieur à 1,2%
    Nombre de comptes clients : 1 000

## 1.5 Périmètre du projet :
    L’activité vise uniquement la France métropolitaine.
    Le site sera disponible en français uniquement.
    Le site sera intégralement « Responsive Design ».
    L’ensemble des fonctionnalités détaillées dans ce document seront accessibles depuis un mobile.

# 2 Description graphique et ergonomique
## 2.1 Charte graphique :
La charte graphique doit être proposée par le prestataire, en respectant les consignes suivantes.

    La charte graphique doit être moderne et épurée. Utiliser les inspirations ci-dessous
    La couleur dominante du site sera le blanc : ??
    La couleur secondaire, utilisée pour les titres, les boutons, et autres éléments de navigation sera le rouge bordeaux : ??
    La troisième couleur, utilisée entre autre pour les à plats, sera le gris clair : ??

## 2.2 Inspirations
    ??

## 2.3 Logo
« An' Flore  » se réserve le droit de fournir directement le logo à utiliser. Si le prestataire souhaite proposer un logo, il peut alors proposer un devis pour le logo séparé du devis global.

# 3 Description fonctionnelle et technique
## 3.1 Arborescence du site :

Le site se décompose en 6 pages principales, toutes accessibles depuis le header du site, lui-même présent à l’identique sur l’ensemble des pages du site. Ces pages principales sont :

    Home (http://anflore.fr)
    Nos bouquet de fleurs (http://anflore.fr/nos-bouquet-de-fleurs)
    Nos coffrets (http://anflore.fr/nos-coffrets)
    Nos fournisseurs (http://anflore.fr/nos-fournisseurs)
    Qui sommes-nous ? (http://anflore.fr/qui-sommes-nous)
    Blog (http://anflore.fr/blog)
    Espace Client (http://anflore.fr/mon-compte)

En plus des ces pages principales, les pages suivantes doivent être accessibles depuis le footer :

    Nos bouquet de fleurs (http://anflore.fr/nos-bouquet-de-fleurs)
        Roses
        Deuil
        Compositions
    Nos coffrets (http://anflore.fr/nos-coffrets)
    Aide
        FAQ
        Mentions légales (http://anflore.fr/mentions-legales)
        Contact (http://anflore.fr/nous-contacter)
    Presse (http://anflore.fr/presse)
    Qui sommes-nous ? (http://anflore.fr/qui-sommes-nous)
    Blog (http://anflore.fr/blog)

## 3.2 Description fonctionnelle du site :

Boutique en ligne n°1 : Nos bouquet de fleurs
Le site de « An' Flore » doit bien évidemment comporter une boutique en ligne, accessible depuis l’onglet « Nos bouquet de fleurs ». Cette boutique en ligne doit par défaut afficher l’ensemble des bouquet de fleurs mis en ligne depuis le back-office, et disponibles en stocks, classés par ordre de prix croissant.
Une liste de filtres doit permettre d’affiner et de simplifier la recherche. La liste des filtres à proposer est la suivante :

    Prix (type fourchette)
    Couleurs
    Date de publications

Depuis la liste de chaque produit, les utilisateurs doivent pouvoir :

    Ajouter le produit au panier
    Consulter la fiche du produit

Boutique en ligne n°2 : Nos Coffrets
En plus de l’achat de bouquet de fleurs, « An' Flore » permettra d’acheter des « coffrets » de plusieurs bouquet de fleurs. La vente de coffrets s’effectuera depuis une boutique en ligne séparée et simplifiée, listant les différents coffrets.
Depuis la liste de chaque produit, les utilisateurs doivent pouvoir :

    Ajouter le produit au panier
    Consulter la fiche du produit

Fiches produits
Chaque fiche produit est composée des informations structurées suivantes :

    Nom du produit
    Note du produit
    Photo du produit
    Description du produit
    Région d’origine du produit

L’utilisateur pourra depuis ces pages produits effectuer un ajout panier et poster un commentaire.

Espace Client
Un utilisateur sera dans l’obligation de créer un compte client pour compléter un achat. Afin de créer un compte, l’utilisateur devra seulement fournir son adresse email et définir un mot de passe. La création d’un compte est indispensable afin de pouvoir finaliser une commande.

Blog
« An' Flore » disposera également d’un blog, composé d’une page principale listant les articles classés par date.

## 3.3 Description fonctionnelle du Back-office :

Depuis le back-office, l’équipe de « An' Flore » doit être en mesure d’effectuer en autonomie l’ensemble des tâches quotidiennes nécessaires au bon fonctionnement du site ecommerce.

Fonctionnalités standards

    Publication d’articles : Mise en ligne de nouveaux articles en toute autonomie. Possibilité d’utiliser du HTML aussi bien qu’un éditeur simplifié (type éditeur WordPress).

Fonctionnalités Ecommerce

Gestion du front

    Gestion du catalogue de produits : Ajout et retrait des produits affichés dans chacune des boutiques.
    Gestion des promotions et codes promos : Création et suppression de codes promo et offres temporaires sur des produits ou groupes de produits
    Mise à jour de la page d’accueil : Possibilité de mettre en avant des produits, promotions et articles

Gestion du Back-office

    Suivi des commandes : Affichage et modification de l’état (en cours de livraison, etc.)
    Suivi et gestion des paiements : Possibilité d’effectuer des remboursements et de suivre le montant des commandes par période.
    Gestion des stocks : Manuelle dans un premier temps. Il doit être possible de suivre depuis le Back-office le niveau des stocks pour chacun des produits.

3.4 Informations relatives aux contenus :

    Type de contenus : Le site utilisera aussi bien sur le site que le blog des types de contenus différents : images, vidéos, ressources téléchargeables, qu’il doit être possible de télécharger facilement sur le site.
    Optimisation du SEO : Pour chacune des pages ou produits, il doit être possible d’éditer les paramètres relatifs au SEO : Meta-description, Titre, mots clés, etc.

3.5 Contraintes techniques :

    Technologies et logiciels à utiliser : Pas de contraintes particulières. Le prestataire peut proposer des services et logiciels externes si cela permet de réduire le coût de création et de gestion du site.
    Le site doit être compatible avec l’ensemble des navigateurs standards : Google Chrome, Android, Mozilla FireFox, Internet Explorer, Safari & Opera. Les versions compatibles doivent être définies explicitement par le prestataire).
    L’hébergeur sera sélectionné et l’hébergement paramétré par le prestataire, mais directement facturé à « An' Flore ».
    Des systèmes tiers seront potentiellement intégrés par la suite de l’activité : réseaux sociaux, comptabilité, facturation, emailing, marketing automation, CRM, webanalyse. Le développement du site doit en tenir compte et rendre ces intégrations futures facilement réalisables.

4 Prestations attendues et modalités de sélection des prestataires
4.1 Prestations attendues :

    Design : Réalisation de maquettes pour chacune des pages principales listées dans l’arborescence du site
    Intégration : Intégration de ces maquettes après validation
    Développement du site et du back-office
    Création et paramétrage de la base de données du site
    Nom de domaine : Le nom de domaine sera acheté par nos soins une fois l’entreprise créée.
    L’hébergeur doit être sélectionné et l’hébergement paramétré par le prestataire, mais directement facturé à « An' Flore ».
    Maintenance : Le prestataire devra inclure dans le devis une proposition commerciale pour toutes les activités de maintenance suivant la mise en production du site.
    Formation à la gestion du site : Le prestataire devra organiser une formation pour l’équipe de « An' Flore » ainsi qu’un document d’aide décrivant les actions à effectuer pour la bonne gestion des activités courantes.
    Accompagnement marketing : Le prestataire peut être force de proposition. Tous les éléments relatifs à l’accompagnement marketing (SEO, SEA, webanalyse, Social Media) devront être proposés dans une section du devis bien distincte. « An' Flore » s’offre la possibilité de travailler avec différents prestataires pour la gestion des activités marketing et la création du site internet.

4.2 Planning :

La date limite de soumission d’un dossier de candidature est fixée au ??. D’éventuelles soutenances orales auront lieu entre le ??, et une sélection finale sera effectuée le ??.

Le projet sera ensuite découpé en 3 phases :

    Phase de prototypage (1 mois environ) : Construction des maquettes, validation des choix d’architectures et de technologies.
    Phase de développement du pilote (2 mois environ) : Développement de l’ensemble des fonctionnalités, intégration des maquettes
    Phase d’industrialisation (1 mois environ) : Intégration du catalogue de produits et des contenus.

L’objectif est donc un passage en production (livraison finale) le ??.
4.3 Propriété :

« An' Flore » sera propriétaire de lʼensemble des images, graphismes, icônes et autres contenus créés pour le site. Le prestataire s’engage également à transmettre ses droits de propriété, d’exploitation, de reproduction, d’adaptation, de distribution et de traduction sur l’ensemble du site, ainsi que le code source et l’ensemble des accès à « An' Flore » lors de la mise en production initiale.

4.5 Modalités de sélection du prestataire :
Afin de candidater, le prestataire devra impérativement fournir :

    Présentation de la société : Présenter l’équipe, les domaines d’expertises, la culture et les principales références du prestataire.
    Choix technique : Présenter les technologies qui seront utilisées pour le projet.
    Devis détaillé : Pour chaque composante du projet, donner une estimation de temps et une estimation budgétaire. Attention à présenter séparément les prestations de maquettage, les prestations design et les prestations marketing du reste du devis du budget.
    Potentielles difficultés identifiées : Ne pas hésiter à souligner les points qui pourraient avoir été mal anticipés ou mal conçus par « An' Flore ».

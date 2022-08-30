# Architecture MVC vs architecture Flux

C’est ce dernier inconvénient qui a forcé Facebook à mettre de côté le pattern MVC pour créer sa propre architecture : Flux.

# Contexte

Pour le contexte, alors que Facebook travaillait sur son système de messagerie, les développeurs ont rencontré exactement le problème dont on a parlé dans les inconvénients : les modèles et vues se mélangeaient les uns les autres.

Dans la vue principale de messagerie devait être affichées deux « sous-vues » : une affichant simplement le nombre de conversations non lues, l’autre affichant la liste des conversations, avec celles non lues en surligné (pour les démarquer des autres). Le problème était le suivant : marquer une seule conversation en lue forçait la mise à jour du modèle, mise à jour forçant le rafraichissement des autres vues lui étant liées. Ce qui n’était ni souhaitable ni nécessaire.

D’où la création de Flux.

# L’architecture Flux

Comme le montre le schéma suivant (que nous allons détailler), la principale différence entre MVC et Flux, est que le second implémente un flux de données unidirectionnel. Alors que MVC permet des échanges bidirectionnels, qui peuvent partir un peu dans tous les sens, comme dans l’exemple précédent.

![](https://talks.freelancerepublik.com/wp-content/uploads/2021/07/flux-facebook-1024x558.png)

Comme on le voit, l’architecture Flux se base sur quatre éléments :

- Les actions : une action est littéralement une action qui va déclencher un évènement ; elle est caractérisée par un type et des données ;
- Le store : c’est dans le store que sont stockées les données. On pourrait imaginer le store comme un super model MVC ;
- Le dispatcher : le dispatcher, qui porte bien son nom, dispatche les actions vers le store (qui va lui exécuter le code métier) ;
- Les views : les vues se rapprochent plus ou moins des vues de MVC dans le sens où elles sont l’interface entre l’utilisateur et le produit ; elles ont cependant plus de code logique. Elles écoutent les changements effectués dans le store et se mettent à jour en fonction de ces derniers.

Si vous venez du monde React, tous ces éléments vous sont déjà familiers.

En fait, ce qu’apporte réellement Flux (ou plutôt son approche de gestion autour d’évènements) par rapport à MVC, c’est un meilleur support des architectures front-end modernes basées sur des composants, comme… React !

Là où faire communiquer des vues « soeurs » était difficile avec MVC, Flux est venu simplifier tout ça grâce à ses actions et à son store.

# MVC ou Flux, quelle est la meilleure architecture ?

En fait, la comparaison n’a pas forcément lieu d’être. L’architecture Flux est née pour résoudre une problématique de MVC, il faut plutôt la voir comme une évolution de ce pattern plutôt que comme un concurrent.

Cette évolution a ajouté une touche de complexité à la compréhension et à la mise en place d’une webapp, mais c’est au profit d’une scalabilité plus importante.

React (et sa version mobile React Native) est aujourd’hui tellement utilisé qu’on pourrait dire que le pattern Flux est en quelque sorte devenu une nouvelle norme, lui aussi.

Si vous voulez avec plus de détails sur Flux ainsi que des exemples concrets de code, allez sur la documentation Facebook.
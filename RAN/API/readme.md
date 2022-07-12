# API
## Vidéo simple et efficace

- [C’est quoi une API ? Les bases pour les développeur·ses web](https://youtu.be/chzaNy0KVx8)
- [C'est quoi une API REST ?](https://youtu.be/SC4sEiBje1Q)

# API REST : Comprendre et construire une API Restful

Dans un monde de plus en plus régi par la data et l’interactivité entre applications, les APIs ont pris une place prépondérante dans le développement informatique. Concevoir, développer ou maintenir une API REST sont aujourd’hui parmi les missions les plus communes pour un développeur back-end ou fullstack. C’est pourquoi la compréhension du concept d’API et de ses différents standards est primordiale pour un développeur, tout comme sa capacité à en construire.

Dans ce cours, nous expliquons tout sur les API REST, leur utilité, leur différence avec d’autres standards et leurs principes de fonctionnement.

## Qu’est-ce qu’une API REST ?

API est un acronyme pour “Application Programming Interface” ou Interface de programmation d’application en français. Il s’agit d’une interface permettant l’interaction entre différentes applications. Elle définit quels appels ou requêtes peuvent être réalisés et comment les réaliser : le format des données à utiliser, la structure de la réponse, les conventions à respecter etc.

Les APIs sont à la base de toutes les interactions entre différentes applications. De très nombreuses entreprises et organisations proposent aujourd’hui des APIs pour interagir avec leurs applications. Cela permet ainsi aux développeurs d’applications tierces de réaliser des opérations comme transmettre ou accéder à des données d’une application à une autre via cette API.

![image](https://cdn.sanity.io/images/kjg6yd05/production/a611c8b84295e9b3992e6b62c9a509f560800c22-938x708.png?w=3840&fit=clip)

C’est ce qu’on appelle une API Publique. Cela signifie que cette API est destinée à l’interaction avec des apps tierces. Elle peut être complètement ouverte ou restreinte à certains clients via authentification (par exemple, Oauth).

Une API peut également permettre aux briques d’une même application de communiquer entre elles, très pratique pour les architectures microservices. Elle peut aussi être uniquement réservée à l’interaction entre les différentes apps d’une même entreprise comme c’est le cas avec Uber et Airbnb par exemple. Dans ce cas, il s’agit d’une API Privée qui n’est pas accessible par des applications tierces.
Très souvent, une documentation est mise à disposition et sert de “mode d’emploi” à l’API. Elle liste toutes les opérations possibles : chaque action est accessible via une URL spécifique qu’on appelle endpoint, attend des paramètres précis (obligatoires ou optionnels) et renvoie une réponse structurée dans un format défini, par exemple en JSON.

## Exemple d’API REST avec l’API Wikipédia

Prenons pour exemple l’API REST de Wikipédia qui est très complète et bien documentée. Elle permet de nombreuses opérations différentes, notamment sur les pages (créer, éditer, supprimer une page, changer sa langue etc.) et sur les comptes (créer, bloquer, éditer un utilisateur et ses permissions etc.). Il s’agit d’une API Publique accessible via le protocole HTTP. Nous pouvons donc y faire des appels et lire les réponses directement depuis notre navigateur web.

L’une des actions les plus importantes et les plus utilisées sur l’API Wikipédia est la récupération de données. Voyons ensemble un exemple d’appel vers l’API Wikipédia pour récupérer un extrait du contenu d’une page : <https://fr.wikipedia.org/w/api.php?action=query&titles=Terre&prop=extracts&exchars=500&explaintext&utf8&format=json>

![image](https://cdn.sanity.io/images/kjg6yd05/production/40f9206842b68112a1afea0ded285253461a102c-1024x694.png?w=3840&fit=clip)

Déconstruisons cet appel élément par élément pour bien le comprendre :

- <https://fr.wikipedia.org/w/api.php> est l’endpoint de l’API REST, c’est-à-dire l’URL à laquelle envoyer les appels. L’API Wikipédia ne dispose que d’un seul endpoint, mais certaines APIs en ont plusieurs (par exemple : example.com/api/articles/edit.php et example.com/api/articles/create.php).
- “action=query” est le premier paramètre de cet appel. Comme pour toute requête HTTP standard, le premier paramètre est toujours précédé d’un séparateur point d’interrogation (“?”). Vient ensuite le nom du paramètre (“action”) qui, selon la documentation de l’API Wikipédia, va définir le type d’action que l’on réalise. La valeur du paramètre est ici “query”, ce qui signifie pour l’API Wikipédia que l’on cherche à récupérer le contenu d’une fiche Wikipédia.
- “titles=Terre” est le deuxième paramètre de cet appel. Après le premier paramètre, tous les autres sont séparés par un séparateur esperluette (“&”). Le nom de ce paramètre est “titles”, ce qui définit le ou les titres des fiches Wikipédia que l’on cible avec notre appel. La valeur du paramètre est “Terre”, c’est-à-dire que l’on va cibler la fiche Wikipédia de la planète Terre ; mais on pourrait très bien essayer avec “Node.js” ou “Charles de Gaulle” par exemple. L’API de Wikipédia nous autorise également à préciser plusieurs valeurs séparées par une barre verticale (“|”) pour obtenir les contenus de plusieurs fiches dans un seul et même appel. Par exemple : “titles=Terre|Mars|Lune|Jupiter”.
- “prop=extracts” est le troisième paramètre. Il définit les différentes propriétés que l’on souhaite récupérer sur la fiche ciblée. Ici, la valeur du paramètre est “extracts” ce qui signifie, selon la documentation de l’API Wikipédia, que la réponse contiendra un extrait, limité ou non, du contenu textuel de la fiche. Là encore, l’API nous permet de préciser plusieurs valeurs séparées d’une barre verticale.
- “exchars=500” est le quatrième paramètre. Il limite l’extrait de texte à 500 caractères.
- “explaintext” est un paramètre booléen, c’est-à-dire qu’il n’a que deux valeurs possibles : vrai (souvent symbolisé 1 ou true voire on) ou faux (souvent symbolisé 0 ou false voire off). Ce paramètre permet de retourner l’extrait en texte brut plutôt qu’en HTML. Étant désactivé par défaut, le simple fait de préciser le nom du paramètre permet de l’activer ; mais nous aurions pu définir ce paramètre de cette façon : “explaintext=1” ou “explaintext=true”.
- “utf8” est le dernier paramètre de l’appel et est également un paramètre booléen. Il active, lui, l’encodage du texte en UTF-8.

Voyons maintenant la réponse renvoyée par l’API REST Wikipédia suite à notre appel :

```json
{
    "batchcomplete": "",
    "query": {
        "pages": {
            "3027": {
                "pageid": 3027,
                "ns": 0,
                "title": "Terre",
                "extract": "La Terre est une planète du Système solaire, la troisième plus proche du Soleil et la cinquième plus grande, tant en taille qu'en masse, de ce système planétaire dont elle est également la plus massive des planètes telluriques.\n\n\n== Description ==\nLa Terre s'est formée il y a 4,54 milliards d'années environ et la vie y est apparue moins d'un milliard d'années plus tard. La planète abrite des millions d'espèces vivantes, dont les humains. La biosphère de la Terre a fortement modifié l'atmosphère et…"
            }
        }
    }
}
```

Cette réponse est au format JSON et contient des informations, certaines que nous avons demandées, d’autres non. On y retrouve le titre de la fiche ciblée par l’API, ce qui nous permet de vérifier que nous avons bien récupéré le contenu de la fiche “Terre” ; nous avons également l’identifiant “pageid” de la fiche, utile pour réaliser d’autres appels sur cette fiche ; pour finir, nous avons l’extrait que nous avons demandé, en texte plein, encodé en ut8 et limité à 500 caractères comme indiqué dans notre requête.

Cet exemple ne vaut que pour l’API de Wikipédia puisque chaque API est unique et a ses propres conventions, sa propre structure avec ses paramètres et endpoints spécifiques. Par exemple, certaines API répondront par défaut au format XML et d’autres n’accepteront pas les séparateurs en barre verticale mais plutôt avec des plus (“+”).
L’API publique de Wikipédia est une API RESTful, c’est à dire qu’elle respecte les normes imposées par le standard d’API REST.

## Qu’est-ce que le standard d’API REST ?

REST (pour REpresentational State Transfer) est une type d’architecture d’API qui fournit un certain nombre de normes et de conventions à respecter pour faciliter la communication entre applications. Les APIs qui respectent le standard REST sont appelées API REST ou API RESTful.

## Les principes d’une architecture REST

Le standard REST impose six contraintes architecturales qui doivent toutes être respectées par un système pour qu’il soit qualifiable de système RESTful. Le strict respect de ces six contraintes permet d’assurer une fiabilité, une scalabilité et une extensibilité optimales.

Les six principes de l’architecture REST sont :

- La séparation entre client et serveur : les responsabilités du côté serveur et du côté client sont séparées, si bien que chaque côté peut être implémenté indépendamment de l’autre. Le code côté serveur (l’API) et celui côté client peuvent chacun être modifiés sans affecter l’autre, tant que tous deux continuent de communiquer dans le même format. Dans une architecture REST, différents clients envoient des requêtes sur les mêmes endpoints, effectuent les mêmes actions et obtiennent les mêmes réponses.
- L’absence d’état de sessions (stateless) : la communication entre client et serveur ne conserve pas l’état des sessions d’une requête à l’autre. Autrement dit, l’état d’une session est inclus dans chaque requête, ce qui signifie que ni le client ni le serveur n’a besoin de connaître l’état de l’autre pour communiquer. Chaque requête est complète et se suffit à elle-même : pas besoin de maintenir une connexion continue entre client et serveur, ce qui implique une plus grande tolérance à l’échec. De plus, cela permet aux APIs REST de répondre aux requêtes de plusieurs clients différents sans saturer les ports du serveur. L’exception à cette règle est l’authentification, pour que le client n’ait pas à préciser ses informations d’authentification à chaque requête.
- L’uniformité de l’interface : les différentes actions et/ou ressources disponibles avec leurs endpoints et leurs paramètres spécifiques doivent être décidés et respectés religieusement, de façon uniforme par le client et le serveur. Chaque réponse doit contenir suffisamment d’informations pour être interprétée sans que le client n’ait besoin d’autres informations au préalable. Les réponses ne doivent pas être trop longues et doivent contenir, si nécessaire, des liens vers d’autres endpoints.
- La mise en cache : les réponses peuvent être mises en cache pour éviter de surcharger inutilement le serveur. La mise en cache doit être bien gérée : l’API REST doit préciser si telle ou telle réponse peut être mise en cache et pour combien de temps pour éviter que le client ne reçoive des informations obsolètes.
- L’architecture en couches : un client connecté à une API REST ne peut en général pas distinguer s’il est en communication avec le serveur final ou un serveur intermédiaire. Une architecture REST permet par exemple de recevoir les requêtes sur un serveur A, de stocker ses données sur un serveur B et de gérer les authentifications sur un serveur C.
- Le code à la demande. Cette contrainte est optionnelle. Elle signifie qu’une API peut retourner du code exécutable au lieu d’une réponse en JSON ou en XML par exemple. Cela signifie qu’une API RESTful peut étendre le code du client tout en lui simplifiant la vie en lui fournissant du code exécutable tel qu’un script JavaScript ou un applet Java.

Une API REST ne peut être qualifiée de RESTful si elle ne respecte pas les six contraintes, mais on peut tout de même la qualifier d’API REST si elle n’enfreint que deux ou trois principes. REST est sans doute le standard le plus utilisé pour concevoir des architectures d’API, mais il en existe bien d’autres qui pourraient le complémenter, voir un jour le détrôner.

## SOAP et les autres types d’API

Si l’immense majorité des APIs publiques et privées suivent les normes du standard REST, d’autres styles d’architecture d’API sont également utilisés (en plus des APIs ne respectant aucune norme précise car accessibles uniquement via leur propre SDK) :

- APIs natives ou de navigateur : il s’agit des APIs des systèmes d’exploitation (par exemple : accéléromètre ou système de fichiers sur smartphone etc.) ou des navigateurs (par exemple : audio ou géolocalisation en HTML5, XMLHttpRequest etc.) et qui sont accessibles à travers les applications web et mobiles.
- APIs Push ou Streaming : ce sont les APIs qui ouvrent un flux continu d’échange de données entre client et serveur, telles que les websockets ou webhooks.
- GraphQL : dernière tendance des architectures d’APIs, c’est également un langage de requête permettant d’obtenir des données complexes de sources différentes en une seule requête.
- RPC (Remote Procedure Call) : certainement le style d’architecture d’API le plus répandu après REST, il est utilisé par les Web Services et utilise en général SOAP ou d’autres protocoles tels que XML-RPC.

## API REST vs API SOAP : quelle différence ?

Créé en 1998, SOAP a longtemps été le protocole le plus utilisé pour interfacer différents systèmes via le web. Ses spécifications sont maintenues par le World Wide Web Consortium (W3C). Il est souvent comparé à tort à REST. En effet, SOAP est un protocole alors que REST est un style d’architecture. Les deux ne sont en revanche pas compatibles car REST a été créé dans l’espoir de résoudre certains problèmes liés à SOAP et qui en faisaient un protocole trop peu flexible.

Le principal inconvénient de SOAP et qui a mené à l’adoption majoritaire de REST est l’utilisation de XML. L’utilisation de ce langage pour les requêtes et les réponses peut s’avérer complexe et verbeux, d’autant qu’il nécessite d’être interprété, ce qui représente une charge supplémentaire côté client et côté serveur. De plus, il est intolérant aux erreurs, ce qui est un grand risque pour la continuité de fonctionnement des apps modernes. Le code client est ainsi très dépendant du code serveur et inversement, à un point tel que l’un ne peut être changé sans modifier l’autre.L’utilisation de SOAP nécessite donc une configuration et une maintenance plus lourde, moins adaptées à l’aspect agile et ouvert du développement web actuel que les APIs REST.

SOAP présente néanmoins toujours certains avantages par rapport à REST : il est compatible avec tous les langages de programmation et de nombreux protocoles tels que HTTP, TCP, SMTP, JMS ou UDP. Il supporte également différentes extensions telles que WS-Security, WS-Federation, WS-Coordination etc. Ces extensions peuvent ou non être utilisés, par exemple une API destinée à une utilisation publique et ouverte n’aura pas besoin de WS-Security.

Peu importe le choix du protocole ou de l’architecture, une API de bonne qualité est une API bien documentée, disponible et scalable, qui doit être testée régulièrement, par exemple via Postman.

# 12 APIs de données gratuites et puissantes pour vos applications

## 1 - Open Food Fact

Grâce à cette API, retrouvez toutes les informations sur les aliments que vous achetez comme les ingrédients, le conditionnement, les additifs, les revendeurs, etc...

Cette API est très puissante car les données récoltées sont des données fournies légalement par les industriels selon les lois française, elle est notamment utilisée par des applications très populaires comme Yuka.

Lien vers l'API : <https://fr.openfoodfacts.org/data>

## 2 - Open Sky

Avec l'API d'OpenSky-Network, retrouvez toutes les informations en temps-réel des avions actuellement dans le ciel partout sur la planète. L'aéroport de départ et d'arrivée, la position exacte, toutes les informations importantes sont disponibles.

Lien vers l'API : <https://opensky-network.org/apidoc/rest.html>

    Bonus: Découvrez aussi l'API de Skyscanner qui vous permet de chercher (et même réserver) les vols à venir.

## 3 - NASA

Retrouvez des photos de la terre prisent par les satellites de la NASA, les photos prises par les rovers mais aussi des centaines d'autres données plus complexes liées à la recherche astronomique et à l'aérospatial sur cette API.

Lien vers l'API : <https://api.nasa.gov/>

    Bonus : Si vous cherchez des données sur notre système solaire, vous pouvez aussi essayer l'API https://api.le-systeme-solaire.net/en/

## 4 - Trefle.io

Trefle est tout simple une API globale et gratuite sur les connaissances botaniques. Nom commun, nom scientifique, famille, année de découverte, photos d'un million de plantes, arbres et fleurs indexées dans la base de données !

Lien vers l'API : <https://trefle.io/>

## 5 - OpenWeather Map

Est-ce qu'il y a besoin d'en dire plus ? Une API grâce à laquelle vous pourrez retrouver toutes les infos météorologiques d'une zone géographique en particulier !

Attention néanmoins, l'API est soumise à un quota en mode gratuit.

Lien vers l'API : <https://openweathermap.org/api>

## 6 - OpenData France

Pas vraiment une API, ce site est le rassemblement de toutes les données ouvertes nationales agrégées par les différents organismes publics. Vous pourrez y trouver des données très spécifiques pour certaines villes comme la position exacte de chaque arbre de la ville, ou encore des données nationales comme la propagation du covid-19.

Lien vers l'API : data.gouv.fr

## 7 - TheMovieDB

L'équivalent du site IMDB (Internet Movie DataBase) mais en version API gratuite et encore plus complète. Retrouvez absolument toutes les informations sur n'importe quel film référencé.

Lien vers l'API : <https://www.themoviedb.org/documentation/api>

## 8 - RandomUser

Contrairement aux autres API, celle-ci ne référence pas des données de la vraie vie, mais vous permet d'afficher des données générées aléatoirement. En l'occurence, vous pourrez avoir, à chaque appel, un nouveau profil fictif d'utilisateur, avec toutes les informations personnelles ainsi qu'une photo de profil.

C'est notamment cette API que j'ai utilisé pour la présentation de mon projet "John Doe", un template minimaliste de site web personnel pour développeur.

Lien vers l'API : <https://randomuser.me/>

## 9 - RestCountries

Retrouvez un grand nombre de données à propos d'un ou plusieurs pays comme la monnaie, la liste des langues, des frontières, etc...

Lien vers l'API : <https://restcountries.eu/>

## 10 - CountryFlags

Accéder directement à la liste de tous les drapeaux des pays du monde, sous deux thèmes différents (flat et shiny) pour intégrer à vos applications en un simple lien !

Lien vers l'API : <https://www.countryflags.io/>

## 11 - Giphy

Giphy est l'une des plateformes les plus populaire rassemblant des GIFs et des stickers (les stickers sont des GIFs sur fond transparent) avec lesquels inonder le web.

Grâce à l'API (et même aux différents SDK), vous pouvez proposer à vos utilisateurs une sélection de GIFs en lien avec un sujet, faire un choix aléatoire, etc...

Lien vers l'API : <https://api.giphy.com>

## 12 - Pappers

Pappers est un site qui regroupe un  maximum de données publiques sur les entreprises françaises. Elle rassemble les informations de l'INSEE, l'INPI et le BODACC, pour les compiler et les mettre à disposition sur une API synchronisée au jour le jour.

À noter que l'API est payante, mais avec un forfait gratuit de 100 fiches entreprise/mois ou 1000 résultats de recherche/mois ce qui permet de faire beaucoup de choses intéressantes !

Lien vers l'API : <https://www.pappers.fr/api>

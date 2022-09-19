# HTTP

## Vidéo simple et efficace
[TOUT SUR LES MÉTHODES HTTP EN 12 MINUTES !](https://youtu.be/B-3TGySiSLo)

# Une introduction au HTTP : tout ce qu’il faut savoir
Dans ce cours, je vais vous expliquer comment le World Wide Web fonctionne à un niveau fondamental.

La technologie de base est HTTP - Hypertext Transfer Protocol. C'est le protocole de communication que vous utilisez lorsque vous naviguez sur le Web.

À un niveau fondamental, lorsque vous visitez un site Web, votre navigateur envoie une requête HTTP à un serveur. Ensuite, ce serveur répond avec une ressource (une image, une vidéo ou le code HTML d'une page Web) - que votre navigateur affiche ensuite pour vous.

Il s'agit du modèle HTTP basé sur les messages. Chaque interaction HTTP comprend une requête et une réponse.

De par sa nature, HTTP est sans état.

Sans état signifie que toutes les requêtes sont séparées les unes des autres. Ainsi, chaque demande de votre navigateur doit contenir suffisamment d'informations pour que le serveur réponde à la demande. Cela signifie également que chaque transaction du modèle HTTP basé sur les messages est traitée séparément des autres.

## URL

**L'URL** (Uniform Resource Locator) est probablement le concept le plus connu du Web. C'est aussi l'un des concepts les plus importants et les plus utiles. Une URL est une adresse Web utilisée pour identifier des ressources sur le Web.

L'idée du web est structurée autour des ressources. Dès ses débuts, le Web était la plate-forme de partage de fichiers texte/HTML, de documents, d'images, etc., et en tant que tel, il peut être considéré comme une collection de ressources.

![image](https://www.freecodecamp.org/news/content/images/2019/08/0-DTR8JpFZo31ht-Kd.jpg)

**Protocole**  — Le plus souvent, il s'agit de HTTP (ou HTTPS pour une version sécurisée de HTTP).

D'autres protocoles notables sont:

    File Transfer Protocol (FTP) — est un protocole standard utilisé pour transférer des fichiers entre un client et un serveur sur un réseau.
    Le protocole SMTP (Simple Mail Transfer Protocol) est une norme de transmission de courrier électronique.

**Domaine**  — Nom utilisé pour identifier une ou plusieurs adresses IP où se trouve la ressource.

**Chemin** — Spécifie l'emplacement de la ressource sur le serveur. Il utilise la même logique qu'un emplacement de ressource utilisé sur l'appareil sur lequel vous lisez cet article (c'est-à-dire /search/cars/VWBeetle.pdf ou C:/my cars/VWBeetle.pdf).

**Paramètres**  — Données supplémentaires utilisées pour identifier ou filtrer la ressource sur le serveur.

Remarque : Lors de la recherche d'articles et de plus d'informations sur HTTP, vous pouvez rencontrer le terme URI (ou identificateur de ressource uniforme). L'URI est parfois utilisé à la place de l'URL, mais principalement dans les spécifications formelles et par les personnes qui veulent se montrer. :)

## Requêtes HTTP

En HTTP, chaque requête doit avoir une adresse URL. De plus, la requête nécessite une méthode. Les quatre principales méthodes HTTP sont :

    GET
    PUT
    POST
    DELETE

J'expliquerai ces méthodes, et plus encore, dans la section Méthodes HTTP de ce cours.

Et ces méthodes correspondent directement à des actions :

    lis
    mettre à jour
    créer
    effacer

Tous les messages HTTP ont un ou plusieurs en-têtes, suivis d'un corps de message facultatif. Le corps contient les données qui seront envoyées avec la requête ou les données reçues avec la réponse.

La première partie de chaque requête HTTP contient trois éléments :

Exemple:

    GET /adds/search-result?item=vw+beetle HTTP/1.1

Lorsqu'une URL contient un "?" signe, cela signifie qu'il contient une requête. Cela signifie qu'il envoie les paramètres de la ressource demandée.

1. La première partie est une méthode qui indique quelle méthode HTTP est utilisée. La méthode GET est la plus couramment utilisée. La méthode GET récupère une ressource du serveur Web et puisque GET n'a pas de corps de message, rien après l'en-tête n'est nécessaire.
2. La deuxième partie est une URL demandée.
3. La troisième partie est une version HTTP utilisée. Version 1.1. est la version la plus courante pour la plupart des navigateurs, cependant, la version 2.0 prend le relais.

Il y a aussi d'autres choses intéressantes dans une requête HTTP :

**Referer header**  - indique l'URL d'où provient la demande.

**User-Agent header** — informations supplémentaires sur le navigateur utilisé pour générer la requête.

**Host header**  — identifie de manière unique un nom d'hôte ; il est nécessaire lorsque plusieurs pages Web sont hébergées sur le même serveur.

**Cookie header**  — soumet des paramètres supplémentaires au client.

## Réponses HTTP

Tout comme dans les requêtes HTTP, les réponses HTTP se composent également de trois éléments :

Exemple:

HTTP/1.1 200 OK

1. La première partie est la version HTTP utilisée.
2. La deuxième partie est le code numérique du résultat de la requête.
3. La troisième partie est une description textuelle de la deuxième partie.

Il y a d'autres choses intéressantes dans une réponse HTTP :

**Server header**  — informations sur le logiciel de serveur Web utilisé.

**Set-Cookie header**  — envoie le cookie au navigateur.

**Message body**  — il est courant qu'une réponse HTTP contienne un corps de message.

**Content-Length header**  — indique la taille du corps du message en octets.

## Méthodes HTTP

Les méthodes les plus courantes sont GET et POST. Mais il y en a quelques autres aussi.

**GET** — Vous utilisez cette méthode pour demander des données à partir d'une ressource spécifiée où les données ne sont modifiées en aucune façon. Les requêtes GET ne modifient pas l'état de la ressource.

**POST**  — Vous utilisez cette méthode pour envoyer des données à un serveur afin de créer une ressource.

**PUT** — Vous utilisez cette méthode pour mettre à jour la ressource existante sur un serveur en utilisant le contenu du corps de la demande. Considérez cela comme un moyen de "modifier" quelque chose.

**HEAD** — Vous utilisez cette méthode de la même façon que vous utilisez GET, mais avec la différence que le retour d'une méthode HEAD ne doit pas contenir de corps dans la réponse. Mais le retour contiendra les mêmes en-têtes que si GET était utilisé. Vous utilisez la méthode HEAD pour vérifier si la ressource est présente avant de faire une requête GET.

**TRACE** —  Vous utilisez cette méthode à des fins de diagnostic. La réponse contiendra dans son corps le contenu exact du message de requête.

**OPTIONS**  — Vous utilisez cette méthode pour décrire les options de communication (méthodes HTTP) qui sont disponibles pour la ressource cible.

**PATCH** —  Vous utilisez cette méthode pour appliquer des modifications partielles à une ressource.

**DELETE** — Vous utilisez cette méthode pour supprimer la ressource spécifiée.

## En-têtes HTTP

Il y a trois composants principaux qui composent la structure requête/réponse. Ceux-ci inclus:

    Première ligne
    En-têtes
    Corps/Contenu

Nous avons déjà parlé de la première ligne dans les requêtes et réponses HTTP, et la fonction du corps a également été mentionnée. Nous allons maintenant parler des en-têtes HTTP.

Les en-têtes HTTP sont ajoutés après la première ligne et sont définis comme des paires nom:valeur séparées par deux-points. Les en-têtes HTTP sont utilisés pour envoyer des paramètres supplémentaires avec la demande ou la réponse.

Comme je l'ai déjà dit, le corps du message comprend les données à envoyer avec la requête ou les données reçues avec la réponse.

Il existe différents types d'en-têtes qui sont regroupés en fonction de leur utilisation en 4 grandes catégories :

- **General header**  — En-têtes qui peuvent être utilisés à la fois dans les requêtes et les messages de réponse et qui sont indépendants des données échangées.
- **Request header**  — Ces en-têtes définissent des paramètres pour les données demandées ou des paramètres qui donnent des informations importantes sur le client faisant la demande.
- **Response header**  — Ces en-têtes contiennent des informations sur la réponse entrante.
- **Entity header**  — Les en-têtes d'entité décrivent le contenu qui constitue le corps du message.

![](https://www.freecodecamp.org/news/content/images/2019/08/0-0BI1BEJpajUiJ_4R.jpg)

## Codes d'état HTTP

En naviguant sur le Web, vous avez peut-être rencontré des pages "Erreur 404 : introuvable" ou des pages "Erreurs 500 : le serveur ne répond pas".

Ce sont des codes d'état HTTP.

Chaque message de réponse HTTP doit contenir un code d'état HTTP dans sa première ligne, nous indiquant le résultat de la requête.

![](https://www.freecodecamp.org/news/content/images/2019/09/Steve_Losh_on_Twitter___HTTP_status_ranges_in_a_nutshell__1xx__hold_on_2xx__here_you_go_3xx__go_away_4xx__you_fucked_up_5xx__I_fucked_up_.png)

Il existe cinq groupes de codes d'état qui sont regroupés par le premier chiffre :

    1xx — Informationnel.
    2xx — La demande a réussi.
    3xx — Le client est redirigé vers une autre ressource.
    4xx — La requête contient une erreur quelconque.
    5xx — Le serveur a rencontré une erreur lors de l'exécution de la demande.

Voici une liste complète des codes de réponse d'état HTTP et leur explication.

## HTTPS (protocole de transfert hypertexte sécurisé)

La version sécurisée du protocole HTTP est HyperText Transfer Protocol Secure (HTTPS). HTTPS fournit une communication cryptée entre un navigateur (client) et le site Web (serveur).

Dans HTTPS, le protocole de communication est crypté à l'aide de Transport Layer Security (TLS) ou Secure Sockets Layer (SSL).

Le protocole est donc aussi souvent appelé HTTP sur TLS, ou HTTP sur SSL.

Les protocoles TLS et SSL utilisent tous deux un système de cryptage asymétrique. Les systèmes de chiffrement asymétrique utilisent une clé publique (clé de chiffrement) et une clé privée (clés de déchiffrement) pour chiffrer un message.

N'importe qui peut utiliser la clé publique pour chiffrer un message. Cependant, les clés privées sont secrètes, ce qui signifie que seul le destinataire prévu peut déchiffrer le message.

![](https://www.freecodecamp.org/news/content/images/2019/08/0-pB_y5GVIF_O_z4lw.gif)

## Prise de contact SSL/TLS

Lorsque vous demandez une connexion HTTPS à un site Web, le site Web envoie son certificat SSL à votre navigateur. Ce processus par lequel votre navigateur et votre site Web initient la communication s'appelle la « prise de contact SSL/TLS ».

La poignée de main SSL/TLS implique une série d'étapes au cours desquelles le navigateur et le site Web se valident mutuellement et démarrent la communication via le tunnel SSL/TLS.

Comme vous l'avez probablement remarqué, lorsqu'un tunnel sécurisé de confiance est utilisé lors d'une connexion HTTPS, l'icône de cadenas vert s'affiche dans la barre d'adresse du navigateur.

![](https://www.freecodecamp.org/news/content/images/2019/08/0-g7q-rF8JTGp7fs19.png)

## Avantages du HTTPS

Les principaux avantages d'un HTTPS sont :

- Les informations client, telles que les numéros de carte de crédit et autres informations sensibles, sont cryptées et ne peuvent pas être interceptées.
- Les visiteurs peuvent vérifier que vous êtes une entreprise enregistrée et que vous possédez le domaine.
- Les clients savent qu'ils ne sont pas censés visiter des sites sans HTTPS, et par conséquent, ils sont plus susceptibles de faire confiance et d'effectuer des achats sur des sites qui utilisent HTTPS.

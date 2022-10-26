# Broken Access Control - Contrôle d’accès brisé

- Contrôle d'accès brisé : https://youtu.be/aVlBaxikKOQ

En cybersécurité, le Top 10 OWASP est une ressource inestimable pour assurer la sécurité des applications web. La liste change chaque année en fonction des vulnérabilités qui deviennent plus répandues. Pour moi, l'une des choses les plus intéressantes à propos de la version de cette année est que les vulnérabilités de  Broken Access Control sont passées du n ° 5 en 2020 au n ° 1.

Maintenant qu'il s'agit de la faiblesse la plus courante sur le Web, il est plus important que jamais de comprendre comment ce type de vulnérabilité fonctionne et comment l'empêcher. Regardons de plus près.

Dans cet article, nous couvrons des exemples de Broken Access Control, comment le trouver dans votre application et les conséquences possibles.

Le contrôle d’accès, ou autorisation, est la façon dont une application Web permet aux utilisateurs d’accéder à certaines ressources, mais pas à d’autres. Ces ressources se divisent principalement en deux catégories : les données sensibles, auxquelles seuls certains utilisateurs devraient avoir accès, et les fonctions qui peuvent modifier les données sur le serveur Web, ou même modifier les fonctionnalités du serveur. Les vérifications d’autorisation sont effectuées après l’authentification : lorsqu’un utilisateur visite une page Web, il doit d’abord s’authentifier, c.-à-d. se connecter, puis s’il tente d’accéder à une ressource, le serveur vérifie s’il est autorisé ou non à le faire.

# Exemples de Broken Access Control :

- Les ID non sécurisés : Lorsque nous cherchons quelque chose dans une base de données, la plupart du temps, nous utilisons un ID unique. Souvent, cet ID est utilisé dans l’URL pour identifier les données que l’utilisateur veut obtenir. Disons que je suis connecté à un site Web, et mon ID utilisateur est 1337. Lorsque je vais à ma propre page de profil, l’URL ressemble à ceci : https://example.com/profile?id=1337. Cette page peut contenir des données sensibles, que personne d’autre ne devrait voir. Mais que faire si je remplace l’ID par l’ID d’un autre utilisateur? Si le serveur web n’est pas configuré correctement, alors si je visite une autre page, par exemple https://example.com/profile?id=42, alors j’obtiendrai la page de profil d’un autre utilisateur, avec toutes ses données sensibles. Comment puis-je connaître l’ID d’un autre utilisateur, vous pourriez demander. Eh bien, utiliser des identifiants d’utilisateur aléatoires qui sont gardés secrets le rend un peu plus difficile, mais ce n’est pas assez de défense. Il s’agit d’un bon exemple de « sécurité par l’obscurité », qui est largement considéré comme une mauvaise pratique. La meilleure solution est de mettre en œuvre un contrôle d’accès correct dans le serveur, de sorte qu’il ne sert pas l’utilisateur avec les données demandées s’ils ne sont pas autorisés à y accéder.
    
- Navigation forcée : La navigation forcée est lorsque l’utilisateur tente d’accéder à des ressources qui ne sont pas référencées par l’application, mais toujours disponibles. Par exemple, une application Web peut avoir une page d’administration, mais il n’y a pas de lien vers la page d’administration sur d’autres parties du site Web, un utilisateur régulier ne trouvera pas à la page d’administration en cliquant simplement autour. Mais si quelqu’un modifie directement l’URL, p. ex., visitez https://example.com/admin, il pourrait accéder à la page d’administration si le contrôle d’accès est brisé.

- Traversée de répertoire : Lorsqu’un site Web stocke des données dans différents fichiers, le serveur peut s’attendre à un nom de fichier comme paramètre de requête. Par exemple, s’il y a une application web pour lire des romans courts, l’URL pourrait ressembler à ceci : https://example.com/novels?file=novel1.txt. Du côté du serveur, il y a probablement un dossier où tous les romans sont stockés, et le serveur cherche le nom de fichier donné dans ce dossier. Un attaquant pourrait abuser de ce comportement en visitant l’URL https://example.com/novels?file=../.. /.. /.. /.. /.. /etc/passwd. Le modèle répété de .. /-s finira par atteindre le répertoire racine, et l’attaquant peut accéder à n’importe quel fichier à partir de là. Afin de se défendre contre cette attaque, le serveur web doit être configuré de manière à ne pas avoir accès aux fichiers dont il n’a pas besoin. Le filtrage pour .. dans le paramètre d’entrée est une autre solution potentielle..
    
- Cache côté client : Les navigateurs stockent les sites Web dans leur cache pour assurer un chargement plus rapide si l’utilisateur tente d’accéder au même site Web à nouveau. Cela pourrait être un problème si plusieurs personnes utilisent le même ordinateur, par exemple dans une bibliothèque ou un cybercafé. Les développeurs devraient empêcher les navigateurs de stocker des données sensibles dans leur cache. Ceci peut être accompli par exemple en utilisant des balises HTML meta.

# Sécurité API

Dans la plupart des exemples ci-dessus, l’attaquant modifie l’URL, mais dans les applications web modernes, cela peut ne pas fonctionner. Aujourd’hui, la plupart des applications web utilisent une API côté serveur, et du code javascript côté client pour communiquer avec l’API. Lorsque le code javascript envoie une requête à l’API, vous ne verrez rien dans la barre d’URL. En général, ces requêtes sont très similaires à celles que votre navigateur envoie au serveur lorsque vous naviguez vers une URL. Ce sont toujours des requêtes HTTP, juste un peu différentes. Heureusement, la plupart des navigateurs modernes sont équipés de certains outils de développement, qui peut être vraiment utile. Avec les outils de développement, vous pouvez inspecter chaque demande que votre navigateur envoie, peu importe comment il a été envoyé. Dans certains navigateurs (par ex. Firefox), il y a une option Modifier et Renvoyer qui est très utile. Vous pouvez faire la même chose comme dans les exemples ci-dessus, mais au lieu d’utiliser la barre d’URL, vous devez utiliser les outils de développement pour inspecter les requêtes, et lorsque vous voyez des paramètres suspects, les modifier et renvoyer la requête.

# Des exemple trouvé dans la nature 
## Exemple 1 :
Il y a eu plusieurs cas où les vulnérabilités du Broken Access Control ont eu des conséquences réelles. En août 2015, par exemple, le chercheur en sécurité Laxman Muthiyah a découvert une vulnérabilité Facebook qui lui a permis de devenir administrateur de n’importe quelle page Facebook. Ceci a été fait en faisant une requête POST à un endpoint d’API vulnérable de Facebook.

```http
POST /<page_id>/userpermissions HTTP/1.1

Host :  graph.facebook.com

Content-Length: 245

role=MANAGER&user=<target_user_id>&business=<associated_business_id>&access_token=<application_access_token>
```

Dans ce cas, n’importe qui peut utiliser le endpoint de l’API `graph.facebook.com/<page_id>/userpermissions` pour modifier ses propres permissions pour une page. Un utilisateur qui n’est pas déjà administrateur ne devrait pas avoir accès à cette capacité d’élever les privilèges des autres utilisateurs. Cependant, il semble que ce paramètre n’ait pas été correctement configuré pour éviter que cela ne se produise. C’est un excellent exemple de Broken Access Control dans la nature.

## Exemple 2 : Accès au contenu restreint

Un autre exemple de Broken Access Control est celui soumis par un chercheur qui a accédé au contenu premium sur le site Web du client qui aurait dû être accessible uniquement aux abonnés payants. C’était possible parce que même si l’URL de base du site était accessible uniquement aux utilisateurs payants, les endpoints étaient accessibles à tout le monde.

L’URL de base de cette application était :

https://client-website/directory-1/

Il s’agissait essentiellement de la page d’accueil d’un service où les utilisateurs pouvaient accéder à différentes ressources sous le répertoire « directory-1 ». Si l’utilisateur n’a pas payé pour l’accès, alors le contenu n’était pas visible.

Cependant, en naviguant directement vers un service particulier de la page, le chercheur pouvait accéder à tout le contenu du sous-répertoire :

https://client-website/directory-1/service-1/

Cette technique est appelée « navigation forcée ». Cela se produit lorsqu’un utilisateur non authentifié navigue vers une URL qui ne devrait être accessible qu’aux utilisateurs authentifiés. Les attaquants peuvent trouver ces endpoints habituellement grâce à l’utilisation d’un outil de forçage brutal de répertoire qui trouvera les répertoires d’applications web en utilisant une liste de mots pour naviguer automatiquement vers les endpoints et voir si elles mènent à des réponses valides. Si la réponse n’est pas 404, alors le paramètre existe probablement. Il existe également une méthode OSINT appelée « Google Dorking », où les attaquants utilisent des requêtes de recherche spéciales de Google pour trouver des extrémités « cachées ». Normalement, l’utilisateur devrait être redirigé ou refusé lorsqu’il tente d’accéder à un répertoire auquel il n’a pas accès, mais ce n’était pas le cas dans cet exemple.

Il s’agit d’un exemple clair de Broken Access Control, car un utilisateur non payant ne devrait pas être en mesure de voir du contenu auquel seuls ceux qui ont payé devraient avoir accès.

## Exemple 3 : Contrôle d’accès défaillant - compromettre un réseau entier

Un autre cherheur a trouvé une vulnérabilité très intéressante et à fort impact du Broken Access Control, ce qui a entraîné la compromission possible de plusieurs machines dans le réseau du client. Cela a été fait en trouvant un jeton d’authentification d’administrateur pour une API utilisée pour la gestion des correctifs.

Le chercheur a constaté que le endpoint https://client-website.com/api/userData contenait le jeton d’authentification de plusieurs utilisateurs, y compris l’administrateur principal. Cela a permis au chercheur d’utiliser les fonctionnalités plus restreintes de l’API. Cela comprenait la possibilité d’énumérer les utilisateurs et les machines sur le réseau du client, l’affichage des données des correctifs, et même la capacité d’exécuter des correctifs malveillants ou des scripts sur ces machines. En théorie, cet exploit aurait très bien pu être exploité pour reprendre tout le réseau interne auquel l’API avait accès.

Dénombrement des utilisateurs dans Active Directory avec l’authToken :

![](https://www.synack.com/wp-content/uploads/2022/01/synack-blog-ListofActiveDirectory.jpg)

Dans ce scénario, ce type de données utilisateur ne devrait pas être accessible au public, en particulier pour une API qui a la capacité de causer un impact aussi massif sur l’ensemble d’un réseau. C’est la raison pour laquelle il est préférable de refuser par défaut toutes les ressources qui ne sont pas publiques.

## Example 4 : Contrôle d’accès défaillant - augmentation des privilèges verticaux

Les vulnérabilités brisées du contrôle d’accès peuvent également entraîner une escalade verticale des privilèges. Dans cet exemple particulier, une page de paramètres d’un utilisateur privilégié inférieur a été exploitée pour obtenir des privilèges d’administration sur une application Web. Cela a été fait en modifiant la demande PUT qui était envoyée à une API, qui était censée être utilisée pour enregistrer toute modification apportée par l’utilisateur à son profil.

La requête PUT de la page des paramètres ressemblait à ceci :

```http

PUT /api/v1/management/users/user1 HTTP/1.1
Host: client-website.com

{
“id”:”user1″,
“username”:”Synack”,
“userRole”:”user”,
“firstName”:”Synack”,
“lastName”:”Researcher”
}
```

Comme vous pouvez le voir, la demande PUT contient diverses informations sur l’utilisateur, y compris le niveau d’accès qu’il a. Lorsque la demande est traitée, cette information est enregistrée pour cet utilisateur dans l’API. Certains de ces paramètres, comme la valeur « userRole », ne peuvent pas être modifiés via l’interface utilisateur de l’application. Cependant, la requête peut être interceptée à l’aide d’un proxy, qui peut ensuite être modifié pour faire changer toutes ces valeurs. La valeur la plus importante qui peut être modifiée est le paramètre « userRole ».

Ainsi, le chercheur a pu envoyer cette demande à l’API à la place :

```http
PUT /api/v1/management/users/user1 HTTP/1.1
Host: client-website.com

{
“id”:”user1″,
“username”:”Synack”,
“userRole”:”admin”,
“firstName”:”Synack”,
“lastName”:”Researcher”
}
```
 
Ce petit changement de « utilisateur » à « administrateur » a fait en sorte que son rôle est devenu un utilisateur administrateur dans l’application. Cela a permis au chercheur de visualiser et de modifier des données auxquelles il n’avait pas accès auparavant. Un utilisateur normal ne devrait pas être en mesure de modifier le champ « userRole » sur le point de terminaison de l’API et devrait plutôt faire face à une erreur lorsqu’il tente de le faire. Ce champ n’était protégé que sur l’interface utilisateur de l’application, mais pas sur le endpoint de l’API qui stocke ces informations.

# Comment pouvez-vous le trouver dans votre application ?

Tout d’abord, vous avez besoin d’une politique de contrôle d’accès bien documentée, sinon vous ne pouvez pas décider ce qui devrait être considéré comme un Broken Access Control. Un examen détaillé du code qui met en œuvre le contrôle d’accès devrait révéler certaines des vulnérabilités. En outre, les tests de pénétration pourrait aider. Ces vulnérabilités ne sont pas trop difficiles à trouver, il suffit souvent de rédiger une demande pour une ressource qui ne devrait pas être accessible.

# L’impact de la rupture du contrôle d’accès

Selon la vulnérabilité, les conséquences peuvent être dévastatrices. Le pire scénario est celui où un utilisateur non autorisé a accès à une fonction privilégiée. Cela peut leur donner la possibilité de modifier ou de supprimer le contenu du site Web, ou pire encore, de prendre le plein contrôle de l’application Web.
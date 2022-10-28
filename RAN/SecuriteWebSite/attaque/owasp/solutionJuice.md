## Tableau des scores (Divers)

Trouver le tableau de bord est l'une des tuiles Pwning The Juice Shop Manual, pleine d'indices, de trucs et d'astuces.

Il existe deux façons de résoudre celui-ci, et elles sont explicites :
« Regardez à travers le JavaScript côté client dans l'onglet Sources pour trouver des indices. Ou commencez simplement à deviner l'URL. C'est à vous."

Deviner est toujours une option, mais… essayons de trouver ces fichiers JS côté client. Browser Dev Tools montre qu'ils sont au nombre de 5 :

![](https://headfullofciphers.files.wordpress.com/2020/06/jsfiles_cleaned.jpg?w=144)

J'ai ouvert main.js dans Chrome Dev Tools, et après une réponse rapide CTRL+F apparaît :

```js
{
    path: "score-board",
    component: Oo
}
```

Pour être honnête, n'importe qui le devinerait probablement. Mais le début est le moment de se familiariser avec les outils du navigateur.

Une fois cette tâche terminée, le tableau de bord s'affiche désormais dans le menu contextuel :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/context_cleaned.jpg?w%3D182)

## Politique de confidentialité (Divers )

Celui-ci est encore plus facile. En marchant sur le chemin heureux, j'ai été encouragé à créer un compte, alors je l'ai fait. (n'oubliez pas de toujours fournir de FAKE DATA à l'application vulnérable !)

Après l'inscription, la politique de confidentialité est disponible dans le menu contextuel du compte :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/privacy_cleaned.jpg?w%3D323)

## DOM XSS et charge utile bonus (XSS)

Dans celui-ci, nous sommes encouragés à effectuer une attaque DOM XSS avec :

```html
<iframe src="javascript:alert(`xss`)">
```

> DOM Based  XSS est une attaque XSS dans laquelle la charge utile de l'attaque est exécutée à la suite de la modification de "l'environnement" DOM ​​dans le navigateur de la victime utilisé par le script côté client d'origine, de sorte que le code côté client s'exécute de manière "inattendue". Autrement dit, la page elle-même ne change pas, mais le code côté client contenu dans la page s'exécute différemment en raison des modifications malveillantes qui se sont produites dans l'environnement DOM.

Nous devons donc trouver un endroit où l'entrée de l'utilisateur est contenue dans la page (par exemple, via la barre de recherche) :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/dom1_cleaned.jpg?w%3D512)

Alors vérifions sur cette piste:

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/dom2_cleaned.jpg?w%3D512)

Et il fonctionne!

Après cela, pour terminer les ⭐ défis XSS, je suis allé pour Bonus Payload .

La description est simple : Utilisez la charge utile bonus (…) dans le défi DOM XSS.

Facile, non ? Mais je voulais vérifier le tutoriel, et c'était assez simple!

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/tutorial1_cleaned.jpg?w%3D300)

 Première étape du didacticiel - et taillez comme il faut

![](https://headfullofciphers.files.wordpress.com/2020/06/tutorial2_cleaned.jpg?w=367)

Confirmation que notre supposition sur le champ de recherche était correcte

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/tutorial3_cleaned.jpg)

Et le plus important🙂

Après cela, j'ai écouté un très joli jingle OWASP Juice Shop, qui a terminé la tâche !

## Gestion des erreurs (mauvaise configuration de la sécurité)

Une seule et unique erreur de configuration de sécurité est décrite comme Provoke, une erreur qui n'est pas gérée de manière très élégante ni cohérente. Et fait allusion avec : Essayez de soumettre une mauvaise entrée aux formulaires. Vous pouvez également modifier le chemin ou les paramètres de l'URL.

Pour l'instant, je voudrais faire simple, donc j'essaierais de jouer avec les formes. Le formulaire de recherche était déjà utilisé pour deux XSS, donc je ferais mieux d'utiliser le formulaire de connexion.

Les erreurs typiques liées aux formulaires de connexion sont liées aux apostrophes. Donc, après la première, meilleure estimation :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/loginerror.jpg)

## Document confidentiel (exposition de données sensibles)

Dans celui-ci, nous devons accéder à un document confidentiel.

Cela m'a fait penser à quel type de document serait "suffisamment confidentiel". La facture ferait probablement l'affaire (Remarque : ce n'est pas le cas). J'ai donc commandé des produits, et pendant que ma commande était en transit, j'ai voulu obtenir ma confirmation de commande :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/confirmation1_cleaned-1.jpg)

Le lien vers le fichier qui a attiré mon attention :
<http://xxx:3000/ftp/order_85f9-7058b831f084ebdd.pdf>

J'ai donc décidé de raccourcir un peu :
<http://xxx:3000/ftp/>

Cela nous amène au répertoire passionnant :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/ftp_cleaned.jpg?w%3D1024)

Et il y a un document confidentiel :

```php
# Acquisitions prévues

> Ce document est confidentiel ! Ne pas distribuer!
```

Complété😉

## Mesure exposée (exposition aux données sensibles)

Dans celui-ci, nous devons trouver le point de terminaison qui sert les données d'utilisation à gratter par un système de surveillance populaire .

L'un des logiciels open source de surveillance et d'alerte d'événements les plus populaires à cet effet est Prometheus. Comme nous pouvons le lire dans le document Prometheus Premiers pas ( <https://prometheus.io/docs/introduction/first_steps/> ), les métriques sont disponibles avec le lien /metrics .

Alors quand on vérifie :
<http://xxx:3000/metrics/>

Notre tâche est terminée😉

## Liste blanche obsolète (redirections non validées)

Nous avons besoin de celle des adresses de crypto-monnaie qui ne sont plus promues.

Celui-ci n'est pas clair, menant a décidé de visiter plus d'indices qui m'ont conduit à Pwning the Juice Shop.

J'ai découvert qu'« il y a quelque temps, le projet Juice Shop acceptait les dons via Bitcoin, Dash et Ether. Il n'en a jamais reçu, donc ceux-ci ont été abandonnés à un moment donné. Et puis, après avoir (encore) recherché des fichiers js, il était facile de constater qu'il y avait une redirection non nettoyée vers le portefeuille Bitcoin.

En outre, il y avait un autre indice important :
il ne suffit bien sûr pas de visiter directement l'un des liens de crypto-monnaie pour résoudre le défi.

Direct est un mot crucial 😉, le code JS ressemble à ceci :

```js
showBitcoinQrCode() {
    this.dialog.open(bn, {
        data: {
            data: "bitcoin:1AbKfgvw9psQ41NbLi8kufDQTezwG8DRZm",
            url: "./redirect?to=https://blockchain.info/address/1AbKfgvw9psQ41NbLi8kufDQTezwG8DRZm",
            address: "1AbKfgvw9psQ41NbLi8kufDQTezwG8DRZm",
            title: "TITLE_BITCOIN_ADDRESS"
        }
    })
}
```

Et le bon lien à visiter ressemble à ceci :

<http://xxx:3000/#/redirect?to=https://blockchain.info/address/1AbKfgvw9psQ41NbLi8kufDQTezwG8DRZm>

## Encodage manquant (validation d'entrée incorrecte)

Maintenant, nous devons récupérer la photo du chat de Bjoern en "mode combat au corps à corps". Donc, le premier endroit où j'essaierai de chercher des images serait Photo Wall.

Et en fait, il y a une photo qui ne s'affiche pas correctement :
![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/caterror_cleaned.jpg?w%3D292)

En inspectant HTML, nous pouvons voir que la source du fichier contient des emoji et des hachages :

```html
<img _ngcontent-cnn-c217=""
class="image" src="assets/public/images/uploads/
<img draggable="false" role="img" class="emoji" alt="😼" src="https://s0.wp.com/wp-content/mu-plugins/wpcom-smileys/twemoji/2/svg/1f63c.svg">-#zatschi-#whoneedsfourlegs-1572600969477.jpg" 
alt="<img draggable="false" role="img" class="emoji" alt="😼" src="https://s0.wp.com/wp-content/mu-plugins/wpcom-smileys/twemoji/2/svg/1f63c.svg"> #zatschi #whoneedsfourlegs">
```

Après avoir appliqué l'encodage manqué (%F0%9F%98%BC pour 😼et %23 pour #) et remplacé le src incorrect par :

assets/public/images/uploads/%F0%9F%98%BC-%23zatschi-%23whoneedsfourlegs-1572600969477.jpg

On peut voir le chat de Bjoern 🙂

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/cat_cleaned.jpg?w%3D238)

## Enregistrement répétitif (validation d'entrée incorrecte)

Je dois suivre le principe DRY lors de l'enregistrement d'un utilisateur pour cette tâche.

Qu'est-ce que le principe DRY ? Comme on peut le lire dans le manuel de Pwning the Juice Shop :

> Le principe DRY (Ne vous répétez pas) stipule : Chaque élément de connaissance doit avoir une représentation unique, non ambiguë et faisant autorité au sein d'un système.

Il est également mentionné le formulaire d'inscription de l'utilisateur avec le champ de mot de passe de répétition. Pour moi, c'est le signal pour commencer Burp.

Après avoir rempli le formulaire d'inscription avec des mots de passe répétés :
![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/burpform_cleaned.jpg?w%3D379)

Burp intercepte la requête avec JSON :

```
{"email":"z@a.com",
"password":"12345",
"passwordRepeat":"12345",
"securityQuestion":
{"id":2,"question":"Mother's maiden name?",
"createdAt":"2020-06-14T07:05:55.689Z",
"updatedAt":"2020-06-14T07:05:55.689Z"},
"securityAnswer":"1"}
```

Après avoir changé le mot de passe répéter, nous avons terminé la tâche😊

## Zéro étoile (validation d'entrée incorrecte)

Dans celui-ci, nous devons "donner un retour dévastateur de zéro étoile au magasin". Ce qui devrait être simple comme bonjour avec Burp.

Il existe un signet dédié aux commentaires des clients, je dois donc remplir le formulaire :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/0star1_cleaned.jpg?w%3D457)

Et ma requête ressemble à ceci :

```
{"UserId":24,
"captchaId":0,
"captcha":"64",
"comment":"0star! (***.com)",
"rating":1}
```

Changer la note à 0 me mène au succès😊

## Conclusion

Après ces exercices rapides, mon tableau de bord ressemble-t-il à ce qu'il devrait ?

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/1starful_cleaned-1.jpg?w%3D768)

## Administrateur de connexion (injection)

Il y a toujours du magnétique dans les catégories 'Injection'. On dirait dans le film - quelques astuces, nous sommes connectés en tant qu'utilisateur différent. Je vais donc suivre cette « gravité » et commencer par celle-ci. Il y a aussi un tutoriel interactif, alors pourquoi pas ?

Pour commencer ce défi, nous devons être déconnectés (évidemment) et la magie commence dans la page de connexion !

Comme vous pouvez le voir, Shopp fournit un tutoriel étape par étape

Ensuite, il nous est conseillé de mettre comme identifiant :

```
' OR true
```

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/sql5_cleaned_cleaned.jpg?w%3D371)

Mais encore, ça ne marche pas…

![](https://headfullofciphers.files.wordpress.com/2020/06/sql6_cleaned_cleaned.jpg?w=504)

Cela devrait fonctionner !

Et succès :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/sql7_cleaned_cleaned-1.jpg)

> Une attaque par injection SQL consiste en l'insertion ou « l'injection » d'une requête SQL via les données d'entrée du client vers l'application. Un exploit d'injection SQL réussi peut lire des données sensibles de la base de données, modifier les données de la base de données (Insérer/Mettre à jour/Supprimer), exécuter des opérations d'administration sur la base de données (comme l'arrêt du SGBD), récupérer le contenu d'un fichier donné présent sur le fichier du SGBD système et, dans certains cas, envoyer des commandes au système d'exploitation. Les attaques par injection SQL sont un type d'attaque par injection, dans lequel des commandes SQL sont injectées dans l'entrée du plan de données afin d'effectuer l'exécution de commandes SQL prédéfinies.

### Section Admin (contrôle d'accès brisé)

Pour la deuxième tâche aujourd'hui, nous devons accéder à la section d'administration du magasin. L'indice indique que c'est juste un peu plus complexe que le lien du tableau de bord. Encore une fois, nous pouvons vérifier les fichiers JS :

![](https://headfullofciphers.files.wordpress.com/2020/06/jsfiles_cleaned.jpg?w=144)

Et après un simple CTRL+F, on trouve :

```
Xs = [{
    path: "administration",
    component: Xi,
    canActivate: [_]
},
```

L'URL ressemble donc à ceci :
<http://xxx:3000/#/administration>

Je dois vous dire que j'étais toujours connecté en tant qu'administrateur, j'ai donc vu la bonne page :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/administration_cleaned_cleaned.jpg?w%3D512)

Après vérification, l'accès des utilisateurs non autorisés est interdit :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/admin403_cleaned_cleaned.jpg?w%3D1024)

## Rétroaction cinq étoiles (contrôle d'accès cassé)

On nous demande de nous débarrasser de tous les commentaires des clients 5 étoiles dans cette tâche. Comme nous l'avons vu sur la page d'administration, il y a une colonne avec des commentaires :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/feedback_cleaned_cleaned.jpg?w%3D322)

Après avoir cliqué sur le bouton de la corbeille 🗑️, la tâche est terminée.

## Voir le panier (contrôle d'accès cassé)

La dernière catégorie liée à la tâcheBroken Access Control veut que nous voyions le panier d'un autre utilisateur. Il y a 2 façons de le faire : regarder et manipuler le trafic HTTP ou trouver l'association côté client des utilisateurs et de leurs paniers. Encore une fois, nous avons un didacticiel de piratage interactif, alors allons-y :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/basket1_cleaned.jpg)

> L'élévation des privilèges se produit lorsqu'un utilisateur a accès à plus de ressources ou de fonctionnalités qu'il n'est normalement autorisé, et une telle élévation ou modification aurait dû être empêchée par l'application. Ceci est généralement causé par une faille dans l'application. Le résultat est que l'application effectue des actions avec plus de privilèges que ceux prévus par le développeur ou l'administrateur système. (…)

> Habituellement, les gens se réfèrent à  l'escalade verticale  lorsqu'il est possible d'accéder à des ressources accordées à des comptes plus privilégiés (par exemple, l'acquisition de privilèges administratifs pour l'application), et à  l'escalade horizontale  lorsqu'il est possible d'accéder à des ressources accordées à un compte configuré de manière similaire (par exemple, dans une application de banque en ligne, accéder à des informations relatives à un autre utilisateur).

Et encore une fois, nous sommes guidés pas à pas vers Session Storage

Et les clés de session sont dans mon cas : bid (basked ID, je présume) et item-total :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/basket4.jpg?w%3D257)

Après avoir changé d'enchère, allez à la page principale, et de nouveau au panier, nous pouvons voir différents paniers

## Politique de sécurité (divers)

Nous devons nous comporter comme n'importe quel "chapeau blanc" avant d'entrer dans l'action et lire la politique de sécurité avant de mener toute recherche sur l'application.

La politique de sécurité mène au projet : security.txt – une norme proposée qui permet aux sites Web de définir des politiques de sécurité. Le processus est divisé en deux étapes :

1. Créez un fichier texte appelé  security.txt sous le  .well-known répertoire de votre projet.
2. Vous êtes prêt à partir!

Ainsi après avoir visité :
<http://xxx:3000/.well-known/security.txt>

La tâche est terminée🙂

## Interface obsolète (mauvaise configuration de sécurité)

Dans cette tâche, nous devons utiliser une interface B2B obsolète qui n'a pas été correctement fermée.

Cela signifie qu'ils étaient une interface, et maintenant "les développeurs qui ont désactivé l'interface pensent qu'ils pourraient devenir invisibles en fermant simplement les yeux".

Celui-là est intéressant. Je ne sais pas par où commencer, alors je voulais utiliser plus d'indices.

The Juice Shop représente une application Business-to-Consumer (B2C) classique. Néanmoins, il compte également des entreprises clientes pour lesquelles il serait peu pratique de commander de grandes quantités de jus via l'interface utilisateur de la boutique en ligne. Pour ces clients, il existe une interface B2B dédiée.

C'est intéressant. J'ai parcouru les fichiers js pour "B2B", et j'ai trouvé une ligne :

```
Input area for uploading a single invoice PDF or XML B2B order file or a ZIP archive containing multiple invoices or orders.
```

Cela me mène à la page de plainte avec un client, un message et des champs de facture. Lorsque nous vérifions allowMimeType, il y a :

```js
this.uploader = new ra.c({
    url: "./file-upload",
    authToken: `Bearer ${localStorage.getItem("token")}`,
    allowedMimeType: ["application/pdf",
"application/xml", "text/xml", "application/zip",
"application/x-zip-compressed", "multipart/x-zip"],
    maxFileSize: 1e5
}),
```

J'ai donc décidé de vérifier avec. fichier JPG, et j'ai une erreur :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/forbidden_cleaned.jpg)

Après avoir créé un fichier some.xml vide, le résultat était différent :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/b2b-success_cleaned.jpg?w%3D613)

## XSS réfléchi (XSS)

Non, nous devons effectuer une attaque XSS réfléchie avec

```html
<iframe src="javascript:alert(`xss`)">
```

> Les attaques réfléchies sont celles où le script injecté est renvoyé sur le serveur Web, comme dans un message d'erreur, un résultat de recherche ou toute autre réponse qui inclut tout ou partie des entrées envoyées au serveur dans le cadre de la requête. Les attaques réfléchies sont transmises aux victimes via un autre itinéraire, par exemple dans un message électronique ou sur un autre site Web. Lorsqu'un utilisateur est amené à cliquer sur un lien malveillant, à soumettre un formulaire spécialement conçu ou même simplement à naviguer sur un site malveillant, le code injecté se rend sur le site Web vulnérable, ce qui renvoie l'attaque au navigateur de l'utilisateur. Le navigateur exécute alors le code car il provient d'un serveur « de confiance ». Le XSS réfléchi est aussi parfois appelé XSS non persistant ou de type II.

Nous avons également reçu un indice pour rechercher les paramètres d'URL où sa valeur apparaît dans la page à laquelle il mène.

La page principale n'est pas vulnérable à cette attaque (comme nous l'avons vu dans un article à une étoile, elle est vulnérable au DOM XSS), il faut donc aller plus loin.

Après avoir terminé le défi "voir le panier", j'ai décidé de terminer la commande. Maintenant, je voulais vérifier l'état de ma commande.

Donc dans mon historique de commande, il est possible de suivre la fausse commande :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/trackorder_cleaned.jpg?w%3D512)

Le lien de suivi ressemble à ceci :
<http://xxx:3000/#/track-result?id=357a-fdd2fce18975a144>

Et la page :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/trackorder2_cleaned_cleaned.jpg?w%3D638)

Donc après avoir changé le lien en:
<<http://xxx:3000/#/track-result?id=%3Ciframe%20src=%22javascript:alert(%60xss%60)%22%3E>

Nous avons réussi à résoudre le défi :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/trackorder3_cleaned_cleaned.jpg?w%3D1024)

## Connexion MC SafeSearch (exposition de données sensibles)

Dans celui-ci, nous devons nous connecter avec les informations d'identification d'origine de MC SafeSearch sans appliquer l'injection SQL ou tout autre contournement. Et MC SafeSearch c'est une grande inconnue pour moi. Mais l'indice m'amène à la chanson à succès de 'MC "Protect Ya Passwordz".

Donc MC SafeSearch est un rappeur, et il explique l'importance des mots de passe et de la protection des données sensibles !

Agréable! Ici vous pouvez trouver la chanson: https://youtu.be/v59CX2DiX0Y

Depuis la tâche 'être et admin' (Login Admin), nous pouvons facilement trouver son email, qui est (difficile à deviner) : mc.safesearch@juice-sh.op

La chanson parle des mots de passe et de la sécurité sur Internet. Au début, le rappeur chante sur la création de mots de passe à partir du nom de son animal de compagnie - mais en étant délicat, et n'oubliez pas de changer "certaines voyelles en zéros"

Après vérification:

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/mcsafe_cleaned.jpg)

Nous avons un autre succès😉

## Crypto étrange (problèmes cryptographiques)

JuiceShop utilise l'algorithme MD5 (qui est obsolète) et Base64 (qui n'est qu'un encodage, la forme incorrecte de "cryptage"). Donc après vérification :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/weirdcrypto.jpg)

La tâche est terminée😊

## Force du mot de passe (authentification brisée)

La dernière tâche nécessite de se connecter avec les informations d'identification de l'utilisateur de l'administrateur sans les modifier ni appliquer l'injection SQL. Nous avons 3 options ici :

- Force brute
- Craquer le hachage du mot de passe
- Devinez simplement

D'un autre côté, simplement deviner est juste… trop simple. Essayons donc de forcer brutalement le mot de passe avec Burp.

En tant que dictionnaire, j'utiliserai PasswordDictionary de PeterStaev GitHub - c'est la liste de près de 7000 mots de passe populaires (et non sécurisés).

Heureusement, le login est bien connu :

admin@juice-sh.op

Je vais donc commencer par la première supposition :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/bruteforce.jpg?w%3D272)

La demande POST /rest/user/login a le corps :

```
{"email":"admin@juice-sh.op","password":"x"}
```

Nous devons donc l'envoyer à l'intrus et le changer en :

```
{
    "email":"admin@juice-sh.op",
    "password":"§x§"
}
```

et démarrez Sniper Attack avec une liste chargée de mots de passe. Au bout d'un moment, on peut observer qu'une des requêtes retourne une longueur différente :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/bruteforce2.jpg?w%3D521)

Donc les identifiants sont :

```
email: admin@juice-sh.op
password: admin123
```

Le défi est terminé😉

## Conclusion

Après cette autre partie des défis, mon tableau de bord semble mieux maintenant :

![](https://translate.google.com/website?sl=en&tl=fr&hl=fr&client=webapp&u=https://headfullofciphers.files.wordpress.com/2020/06/scoreboard-green.jpg?w%3D512)
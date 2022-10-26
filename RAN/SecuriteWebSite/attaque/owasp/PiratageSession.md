# Empêchez le piratage de session [Broken Authentication]

- Broken Authentication: OWASP Top 10 <https://youtu.be/_8joIrohSLk>
- Piratage éthique - Récupérer un cookie de session <https://youtu.be/nHUswhLl-Bw>
- broken authentication and session management attacks example <https://youtu.be/MHYweIZi6Ws>

L’authentification est une fonctionnalité cruciale dans votre application web pour permettre à vos utilisateurs d’accéder à leur données et à leur environnement. Dans ce chapitre, nous allons voir comment sécuriser l’authentification.

## Définissez le piratage de session

Le piratage de session (ou Broken Authentication) est l’attaque qui occupe la deuxième place du classement de l’OWASP depuis 2013. Considérant qu'elle occupait la troisième place en 2010, l'OWASP démontre que l’exploitation de l’authentification est une faille courante.

Alors qu'est-ce que c'est et pourquoi est-ce une attaque si populaire ?

Supposons que vous ayez un site qui exige que vous vous connectiez avec votre nom d'utilisateur et votre mot de passe pour accéder aux pages qui contiennent des informations sur votre compte. Lorsque vous vous connectez, les informations d'identification sont transmises à la base de données. Si le nom d'utilisateur et le mot de passe correspondent à ceux de la base de données, vous serez authentifiés pour une session.

> Une session est une période de temps spécifiée pendant laquelle un utilisateur authentifié aura accès à des pages et à des activités spécifiques de l'application.

À tout moment du processus d'authentification, un utilisateur malveillant peut obtenir un accès non autorisé à la session et avoir accès à des données sensibles.

Une session peut inclure des données personnelles, des données financières et l'accès à des informations protégées ou à des secrets commerciaux, par exemple.

Le piratage de l’authentification peut être automatisé avec l’utilisation de la technique de force brute, c’est-à-dire l’utilisation d’une multitude de couples identifiant/mot de passe de manière automatique, jusqu’à obtenir le bon.

Lorsqu'un utilisateur malveillant a un accès non autorisé à une liste de noms d'utilisateur et de mots de passe, une attaque appelée credential stuffing peut être utilisée pour essayer toutes les combinaisons de noms d'utilisateur et de mots de passe, jusqu'à ce que le pirate s'authentifie.

> Le credential stuffing est un type d’attaque où des informations de comptes volées, généralement des listes d'identifiants et des mots de passe associés, sont utilisés pour obtenir un accès non autorisé à des comptes utilisateurs par le biais de demandes de connexion automatisée adressées à des applications web.

## Appréhendez l'utilisation de cookies

Un cookie HTTP (également appelé cookie web, cookie Internet, cookie de navigateur ou simplement cookie) est une petite donnée envoyée depuis un site web et stockée sur l'ordinateur de l'utilisateur par un navigateur web lorsque l'utilisateur navigue.

Les cookies ont été conçus pour constituer un mécanisme fiable permettant aux sites web de mémoriser des informations importantes (telles que les éléments ajoutés au panier dans une boutique en ligne) ou d'enregistrer l'activité de navigation de l'utilisateur (en se connectant ou en enregistrant les pages consultées). Ils peuvent également être utilisés pour mémoriser des informations arbitraires que l'utilisateur a précédemment entrées dans des champs de formulaire, telles que des noms, des adresses, des mots de passe et des numéros de carte de crédit. Voilà pourquoi il représente un intérêt pour un attaquant.

Vous vous souvenez peut-être que votre navigateur vous a averti qu'un site web nécessite l'utilisation de cookies pour que vous puissiez l'utiliser ?

HTTP ne peut pas enregistrer d'informations sur votre navigateur. Un cookie est donc un fichier tiers enregistré qui donne un accès personnalisé à l'utilisateur du site. Les cookies ont été créés pour vous faciliter la vie, de sorte à ce que vous n’ayez pas besoin de vous reconnecter ou d'entrer les mêmes données encore et encore. Ils aident un site web à se souvenir de ce que vous avez fait sur leur site pour personnaliser l'expérience. Ces cookies ne sont accessibles que par le site web qui les a créés.

Il existe deux types de cookies : les cookies de suivi et les cookies de session.

### Découvrez les cookies de suivi

Les cookies de suivi sont un type de cookie spécifique distribué, partagé et lu sur au moins deux sites web non liés, dans le but de collecter des informations ou éventuellement de vous présenter des données personnalisées.

Supposons que j'achète des biscuits sur un site web appelé koookiestore.com, et qu'il télécharge un cookie sur mon navigateur avec des informations qui m'identifient. Toutes mes activités sur ce site seront enregistrées sur koookiestore.com via le cookie qui contient mon identifiant.

![](https://user.oc-static.com/upload/2019/11/12/15735532617311_image1.png)

Puis, je décide d'aller sur le site funnikaaaats.com, et soudain je vois toutes ces annonces me montrant les biscuits que je regardais sur koookiestore.com !

Mais seul koookiestore.com peut accéder aux informations des cookies stockées sur son site, alors comment funnikaaaats.com a découvert que j'aime ces cookies ?

funnikaaaats.com a intégré un code pour koookiestore.com à l'intérieur de son site web afin qu'il puisse accéder à votre cookie koookistore.com. Et maintenant, ces informations sont stockées sous ce cookie ID dans koookiestore.com.

Maintenant, le cookie de suivi de koookiestore.com sait quels cookies et vidéos de chat vous aimez.

Bien que les cookies de suivi ne peuvent pas être utilisés pour pirater une session, ils peuvent représenter un problème concernant la confidentialité et la vie privée, car ils permettent l’accès à vos habitudes de navigation.

### Découvrez les cookies de session

Les cookies de session contiennent un identifiant qui identifie une session.

Supposons que vous vous connectez au site web de votre banque et que vous recevez un cookie qui est stocké dans votre navigateur et qui vous garde connecté jusqu'à ce que la session expire.

Dans ce cas, chaque session reçoit un ID de session. L'authentification peut être détournée si l'utilisateur malveillant devine le bon ID de session.

Avec le protocole HTTP, les sites web n'ont pas la possibilité d'enregistrer des informations d'authentification ou de session sauf s'ils les stockent dans un fichier sur les navigateurs. C'est à ça que servent les cookies de session.

Souvent, le navigateur enregistre un cookie qui contient les informations de session, l'ID de session, la date et l'heure d'expiration.

Des token peuvent être utilisés pour l'authentification avec le Single Sign-On (SSO). Un utilisateur reçoit un ticket ou un jeton après authentification, afin de se connecter à une session. Le pirate peut accéder au jeton et le réutiliser pour s’authentifier sans avoir besoin d'un nom d'utilisateur ou d'un mot de passe.

### Protégez vos cookies

Voici quelques recommandations pour garantir la sécurité des cookies :

- assurez-vous que les cookies sont chiffrés lors de la transmission via HTTPS ;
- ne stockez pas d'informations d'identification en texte clair dans vos cookies ;
- définissez une date d'expiration pour vos cookies-session.

## Prévenez votre application des authentifications non autorisées

Des recommandations simples peuvent être appliquées :

- exigez de vos utilisateurs qu'ils aient un mot de passe fort, c'est-à-dire contenant des majuscules, des minuscules, des chiffres et des caractères spéciaux. Il sera ainsi plus difficile pour un utilisateur malveillant de trouver le mot de passe ;
- il est également recommandé d'exiger des utilisateurs qu'ils changent régulièrement leur mot de passe en cas d’attaque de credential stuffing ;
- mettez en place le verrouillage de compte lorsqu'un utilisateur essaie de se connecter un trop grand nombre de fois sans y parvenir. Cela permet d'empêcher les attaques de force brute ;
- changez ou désactivez les comptes par défaut ;
- implémentez une authentification forte, c’est-à-dire avec plusieurs facteurs d’authentification, comme la validation par SMS ou par mail, par exemple.

Heureusement, il existe des frameworks pour vous aider à implémenter plus facilement un code sécurisé, quel que soit le langage que vous utilisez :

- ASP.NET Core IdentityFramework peut être intégré dans votre application web pour personnaliser vos besoins d'authentification. L'ajout d'ASP.NET Core IdentityServer vous permet d'utiliser les techniques de développement sécurisé pour l'authentification par jeton.
- Ruby a des fonctions (gems) comme omniauth qui peuvent être implémentées pour l'authentification.
- Java a javax.security.auth, et l'API Java Authentication and Authorization Service (JAAS), qui peuvent configurer votre authentification de la bonne façon !
- PHP a PHPSec peuvent être utilisés pour gérer la sécurité et les sessions.

## Prévenez l'authentification malveillante

Voici un exemple d'entrée avant qu'elle ne soit transmise à la base de données.

```php
//Remove all characters from the email except letters, digits and !#$%&'*+-=?^_`{|}~@.[]
echo filter_var($dirtyAddress, FILTER_SANITIZE_EMAIL);
```

Une bonne pratique pour la validation des entrées est de vérifier toutes les entrées en supprimant les caractères non pertinents.

En Java, vous pouvez créer une méthode pour hacher le mot de passe avec le framework Spring.

> Le hachage permet de générer une empreinte unique pour une entrée. Le problème est qu’il est possible d’utiliser des rainbow tables, c’est-à-dire des listes de hash préalablement calculés, puis de les utiliser avec une attaque de force brute. Pour éviter ce genre d’attaque, il est possible d’ajouter un sel permettant d’ajouter une donnée supplémentaire, et ainsi renforcer la sécurité.

Mais comment faire, concrètement ?

Tout d'abord, vous allez créer un objet pour l'algorithme de chiffrement, et le saler.

Le salage est une méthode permettant de renforcer la sécurité des informations qui sont destinées à être hachées (par exemple des mots de passe) en y ajoutant une donnée supplémentaire afin d’empêcher que deux informations identiques conduisent à la même empreinte (au même hash). Le but du salage est de lutter contre les attaques par analyse fréquentielle (permettant l’analyse des fréquences des caractères employés), les attaques utilisant des rainbow tables, les attaques par dictionnaire et les attaques par force brute.

Un sel est une séquence aléatoire utilisée en plus du chiffrement pour rendre le hachage imprévisible.

Quel que soit le langage dans lequel vous développez, il existe plusieurs solutions qui peuvent vous permettre de sécuriser votre mécanisme d'authentification !

Adopter les meilleures pratiques pour la gestion des sessions et des jetons est également important car il s'agit d'une autre forme d'authentification. Les cookies de session et les jetons peuvent rendre vos sessions vulnérables.

Voici quelques conseils pour vous aider à développer vos mécanismes d'identification et de validation de session :

- ne mettez pas l’ID de session dans l’URL ;
- limitez la durée de l'ID de session ;
- modifiez le nom d'ID de session par défaut.

PHP possède une bibliothèque appelée SessionManager avec des fonctions qui peuvent être utilisées pour valider les sessions avec des restrictions.

Voici un exemple de la fonction  preventHijacking()  du gestionnaire de sessions utilisé pour limiter une session à un hôte et à une adresse IP spécifiques. Si l'hôte et l'adresse IP ne sont pas identiques, ils ne s'authentifieront pas. Cela permet de sécuriser le mécanisme d'authentification.

```php
static protected function preventHijacking(){
    if(!isset($_SESSION['IPaddress']) || !isset($_SESSION['userAgent']))
        return false;
    if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR'])
        return false;
    if( $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'])
        return false;
    return true
}
```

## Connaissez votre niveau de protection

Si j'implémente toutes ces règles, mon application web sera-t-elle sécurisée ?

Peu importe le nombre de couches de sécurité et de fonctionnalités que vous ajoutez à votre code, il y a toujours des attaques auxquelles vous ne serez pas préparé.

Restez informé des nouvelles vulnérabilités afin de sécuriser votre application contre de futures attaques.

> Votre application n'est jamais sûre à 100% car le risque zéro n’existe pas !

Cependant, en respectant ces règles, vous pouvez prévenir les attaques courantes et réduire votre surface d'attaque de 80 %.

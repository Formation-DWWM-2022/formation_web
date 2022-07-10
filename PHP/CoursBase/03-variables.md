## Les variables [16 min] -> Q/R

<https://grafikart.fr/tutoriels/variables-php-1115#autoplay>

A partir de maintenant, nous allons véritablement rentrer dans le vif du sujet et commencer à pratiquer.

## Où écrire le code PHP ?

Nous allons pouvoir écrire nos scripts PHP soit dans des fichiers dédiés, c’est-à-dire des fichiers qui ne vont contenir que du PHP, soit intégrer le PHP au sein de nos fichiers HTML.

Les fichiers qui contiennent du PHP vont devoir être enregistrés avec l’extension .php. Dans le cas où on intègre du code PHP dans un fichier HTML, il faudra également changer son extension en .php.

## La balise PHP

Le serveur, pour être en mesure d’exécuter le code PHP, va devoir le reconnaitre. Pour lui indiquer qu’un script ou que telle partie d’un code est écrit en PHP, nous allons entourer ce code avec une balise PHP qui a la forme suivante : `<?php ?>`.

Lorsqu’on intègre du PHP dans du code HTML, on va pouvoir placer cette balise et du code PHP à n’importe quel endroit dans notre fichier. On va même pouvoir placer la balise PHP en dehors de notre élément html. De plus, on va pouvoir déclarer plusieurs balises PHP à différents endroits dans un fichier.

Regardez déjà l’exemple ci-dessous :

```php
<?php
?>
<html>
  <head>
    <title>Cours PHP & MySQL</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Titre principal</h1>
    <?php
    ?>
    <p>Un paragraphe</p>
  </body>
</html>
```

Ici, on déclare deux balises PHP au sein d’une page HTML. Pour le moment, nos balises PHP sont vides.

Note : Dans ce cours, vous pourrez copier-coller la plupart des codes directement, comme n’importe quel autre texte. Cela vous permettra de les tester sur votre propre machine ou de les récupérer pour les modifier.

## Syntaxe PHP de base

Écrivons une première instruction PHP afin d’analyser et de comprendre la syntaxe générale du PHP.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>

    <body>
        <h1>Titre principal</h1>
        <?php
            //Affiche "Hello World" avec un retour à la ligne
            echo 'Hello World <br>'; //Ceci est un commentaire PHP
            
            /*Affiche
              "Bonjour le Monde
            */
            echo "Bonjour le Monde"; /*Ceci est un commentaire PHP*/
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

Il y a plusieurs choses intéressantes dans ce premier script PHP. Décortiquons le ligne par ligne.

La première ligne contient un commentaire PHP monoligne. Les commentaires en PHP vont nous servir à expliquer le fonctionnement d’un script ou de neutraliser une ou plusieurs instructions. En effet, ce qu’il y a entre commentaires va être ignoré durant l’exécution du code. Donner des informations sur le fonctionnement d’un script peut être utile pour l’auteur du script (dans le cas où notre projet soit long et compliqué, pour nous permettre de nous rappeler de ce que fait chaque partie du code) ou lorsqu’il voudra le partager avec d’autres développeurs.

On va pouvoir écrire des commentaires en PHP en utilisant deux syntaxes différentes : la syntaxe utilisant // est réservée aux commentaires monoligne, tandis que la syntaxe utilisant /**/ peut être utilisée pour créer des commentaires monolignes ou multilignes.

Les parties echo `'Hello World <br>';` et `echo "Bonjour le Monde";` sont ce qu’on appelle des instructions car on « demande » au code de faire quelque chose.

En l’occurrence, ici, la structure de langage echo permet d’afficher une chaine de caractères. Notre script ici sert donc à afficher deux phrases : Hello World et Bonjour le Monde.

Une instruction en PHP doit toujours se terminer par un point-virgule. Si vous l’oubliez, votre script ne fonctionnera pas correctement.

Ici, vous pouvez remarquer qu’on a ajouté un élément br au sein du premier texte qui doit être affiché. Cet élément br ne sera pas affiché mais va permettre d’indiquer un retour à la ligne au navigateur.

En effet, ici, vous devez bien comprendre l’ordre dans lequel le code s’exécute. Lorsqu’on demande à un serveur de nous renvoyer une page, celui-ci va regarder s’il y a du code à exécuter comme du PHP dans la page.

Si c’est le cas, celui-ci va exécuter le code en question et ne va ensuite renvoyer au navigateur que du code qu’il peut comprendre, c’est-à-dire principalement du HTML. Le navigateur va finalement afficher la page à partir de sa structure HTML.

Dans notre cas, le serveur va exécuter nos deux instructions et renvoyer le texte (et l’élément HTML br qui est inclut dedans) au navigateur qui va lire le HTML pour nous afficher la page.

Si j’affiche ma page, voici le résultat que j’obtiens :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-premier-script-php.png)

## Enregistrer et exécuter un fichier PHP

A partir du moment où on ouvre une balise PHP dans un fichier HTML, nous allons devoir enregistrer le fichier avec l’extension .php. C’est essentiel pour que le serveur comprenne que la page contient du code PHP qu’il devra exécuter.

Dans notre cas, nous travaillons en local. Pour exécuter du code PHP, il va falloir utiliser le logiciel qu’on a installé précédemment (WAMP, XAMP ou LAMP). Pour faire cela, il va nous suffire d’enregistrer notre fichier dans le sous dossier dédié du logiciel choisi.

Si vous avez installé WAMP, par exemple, il faudra enregistrer tous vos fichiers PHP dans le sous-dossier « wamp ». Si vous utilisez comme moi MAMP, alors il faudra placer vos fichiers dans le sous-dossier « htdocs ».

Essayons donc d’enregistrer, d’exécuter et d’afficher le résultat d’un premier fichier PHP. Pour cela, commencez déjà par ouvrir votre éditeur de texte, et par recopier le fichier que j’ai créé ci-dessus, puis enregistrez le dans le bon dossier.

Une fois ces opérations réalisées, vous allez devoir démarrer votre logiciel. Pour cela, double-cliquez dessus. Vous arrivez sur l’interface d’accueil de celui-ci.

A partir de là, vous devriez avoir un bouton vous proposant de « démarrer les serveurs » ou au contraire de les arrêter, avec des voyants lumineux vous indiquant si les serveurs fonctionnent (voyants verts) ou pas (voyants rouges). Démarrez les serveurs si ceux-ci sont arrêtés.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/demarrage-serveur-wamp-mamp-lamp.png)

Pour lancer l’exécution du fichier PHP créé et voir le résultat dans notre navigateur, il faut alors accéder au dossier dans lequel le fichier a été stocké via notre navigateur web en passant par nos serveurs.

Pour cela, il suffit d’ouvrir un nouvel onglet dans notre navigateur favori et de renseigner l’adresse localhost ou localhost:8888 ou encore 127.0.0.1 selon votre système.

Pour avoir toutes les informations relatives à votre configuration, vous pouvez vous rendre sur la page d’accueil de votre logiciel (la page d’accueil s’ouvre soit automatiquement lorsque vous démarrez votre logiciel, soit vous pouvez y accéder via un raccourci qui devrait être facile à trouver). La page d’accueil de MAMP par exemple ressemble à cela :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/page-accueil-mamp-wamp-lamp.png)

En tapant la bonne adresse dans votre navigateur, vous allez pouvoir accéder au contenu du dossier dans lequel vous avez enregistré le fichier qu’on veut exécuter. Voici à quoi ressemble le contenu de mon propre dossier.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/dossier-wamp-mamp-lamp.png)

Dans mon cas, mon dossier contient de nombreux autres dossiers et fichiers. De votre côté, vous ne devriez avoir qu’un fichier. Cliquez donc dessus. Le serveur va exécuter le code PHP dans le fichier et renvoyer du code HTML que le navigateur va afficher. Ici, vous devriez avoir le résultat suivant :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-premier-fichier-php.png)

Note : si vous tentez d’ouvrir un fichier contenant du code PHP sans passer par un serveur (c’est-à-dire par le localhost dans notre cas), alors le code de toute la page sera affiché tel quel tout simplement car un navigateur n’est pas capable de comprendre ni d’exécuter du code PHP.

## Une première définition : les structures de langage

Commençons déjà par définir ce qu’on appelle « structure de langage » (« language construct » en anglais) afin de partir sur de bonnes bases.

Une structure de langage correspond simplement à une partie de la syntaxe d’un langage. La syntaxe d’un langage informatique correspond à un ensemble de mots clefs au sens bien défini par le langage. A partir de cette syntaxe, et en combinant les mots clefs, nous allons pouvoir construire des expressions.

Les structures de langage sont en d’autres termes les atomes d’un langage informatique : ce sont les unités de base d’un langage qu’on va pouvoir utiliser pour construire des expressions.

Je tenais à commencer ce chapitre avec cette définition car de nombreuses personnes considèrent à tort que les structures de langage echo et print sont des fonctions. Or, les fonctions et les structures de langage sont deux types différents d’objets qui ne vont pas être traités de la même façon.

A votre niveau, il risque néanmoins d’être compliqué de bien comprendre et de bien vous représenter ce qu’est une structure de langage. Ne vous inquiétez pas, c’est tout à fait normal : bien souvent, en code, une notion nécessite de connaitre un ensemble d’autres notions pour être bien comprise tandis que les autres notions ont besoin de cette première notion pour être comprises… C’est toute la difficulté lorsqu’on commence à apprendre un nouveau langage !

Essayez donc de retenir cette première définition et vous allez voir que celle-ci va devenir de plus en plus claire au fur et à mesure que vous allez avancer dans ce cours. De manière générale, je vous conseille de faire régulièrement des allers retours dans le cours pour retourner sur d’anciennes notions qui n’étaient pas claires pour vous à l’époque et essayer de les comprendre avec vos nouvelles connaissances.

## Les structures de langage echo et print

Les structures de langage echo et print vont nous permettre d’afficher un résultat en PHP.

Pour cela, nous allons écrire notre echo ou notre print suivi de ce qu’on souhaite afficher et suivi d’un point-virgule pour terminer l’instruction, en plaçant le tout dans une balise PHP.

Regardez plutôt l’exemple suivant qu’on va immédiatement expliquer :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
    </head>
    <body>
      <h1>Titre principal</h1>
        <h1>Titre principal</h1>
        <?php
            echo "<h2>Première instruction PHP avec echo</h2>";
            echo 'Bonjour à tous !<br>';
            echo  29;
            echo "<br>J'ai ", 29, " ans.<br>";
            print "<h2>Première instruction PHP avec print</h2>";
            print 'Bonjour à tous !<br>';
            print  29;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/affichage-resultat-echo-print.png)

Nous pouvons noter plusieurs choses à partir de l’exemple précédent. Déjà, vous pouvez observer qu’on peut tout à fait passer des balises HTML dans ce qu’on souhaite afficher. Ces balises HTML seront lues comme les autres par le navigateur.

Ensuite, vous pouvez remarquer que j’utilise parfois des apostrophes droites, parfois des guillemets droits et d’autres fois rien du tout pour entourer le contenu qui devra être affiché.

Ici, vous pouvez retenir que les chaines de caractères (c’est-à-dire les contenus de type texte) doivent toujours être entourés d’un couple d’apostrophes ou de guillemets pour pouvoir être affichées. Cela n’est pas nécessaire pour afficher un chiffre. Nous reparlerons des types de données plus tard dans ce cours.

Notez que les structures de langage echo et print ne sont pas strictement équivalentes mais qu’il existe quelques différences mineures entre elles.

La première de ces différences est que echo ne possède pas de valeur de retour à la différence de print qui va toujours retourner 1. Nous reparlerons des valeurs de retour dans une prochaine leçon : il est beaucoup trop tôt pour le moment.

La deuxième différence est qu’on va pouvoir passer plusieurs valeurs à echo tandis qu’on ne va pouvoir en passer qu’une à print. En pratique, cependant, il sera très rare de passer plusieurs paramètres à echo tout simplement car cela n’aura bien souvent aucune utilité.

Si vous regardez bien le dernier exemple utilisant echo, vous pouvez remarquer qu’on passe plusieurs valeurs entre différents couples de guillemets et séparées par des virgules.

Enfin, le dernier point de différence entre echo et print est que echo s’exécute un peu plus rapidement que print.

En pratique, nous utiliserons majoritairement echo pour afficher un résultat en PHP.

Notez finalement qu’une autre syntaxe avec un couple de parenthèses existe pour echo et print :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/syntaxe-echo-print-parenthese-php.png)

Je vais vous demander de ne pas vous préoccuper de cette syntaxe pour le moment et d’utiliser comme moi la syntaxe sans les parenthèses.

Jusqu’ici, vous pouvez vous dire que echo et print ne sont pas très utiles si elles ne servent qu’à afficher du texte qu’on écrit et qu’on pourrait aussi bien directement écrire nos contenus en HTML.

C’est tout à fait vrai : pour le moment, nous faisons un usage très basique de ces structures de langage et pourrions aussi bien écrire directement en HTML. Cependant, echo et print vont nous être très utiles par la suite lorsqu’on devra afficher le contenu de variables.

Nous débutons à peine, il est donc tout à fait normal que nous ne puissions pas encore faire d’utilisation très avancée des éléments du langage que nous étudions mais je vous demande ici de me faire confiance et de faire l’effort de bien comprendre ces premiers concepts qui vont nous servir dans tout le reste du cours.

## L’usage des apostrophes et des guillemets pour afficher des chaines de caractères

Pour afficher une chaine de caractère, c’est-à-dire un texte avec echo ou print, vous devez absolument l’entourer d’un couple d’apostrophes droites ou de guillemets droits.

Une nouvelle fois, les écritures avec les apostrophes et avec les guillemets ne sont pas strictement équivalentes mais vont pouvoir être utilisées dans des situations différentes et pour répondre à des problèmes différents.

Nous verrons précisément quand utiliser des guillemets et quand utiliser des apostrophes après avoir étudié les variables en PHP car il est nécessaire de les connaître pour bien cerner et comprendre les différents cas d’utilisation.

Pour l’instant, nous allons nous intéresser à une autre problématique que nous allons rencontrer lorsqu’un souhaitera afficher une chaine de caractères : que faire si la chaine de caractères qu’on souhaite afficher contient elle-même des apostrophes et / ou des guillemets ? Comment le PHP peut-il faire pour savoir qu’ils appartiennent à notre texte et qu’ils ne servent pas à le délimiter ?

La réponse est simple : il ne peut pas le savoir. Pour cela, nous allons devoir l’aider en « échappant » nos apostrophes ou nos guillemets (selon ce qui a été choisi pour entourer notre chaine de caractères), c’est-à-dire en neutralisant leur signification spéciale en PHP.

Pour faire cela, nous allons simplement devoir utiliser un antislash \ avant chaque caractère qu’on souhaite échapper pour neutraliser sa signification spéciale. L’antislash est en PHP un caractère d’échappement : il sert à indiquer au serveur qu’il ne doit pas tenir compte de la signification spéciale du caractère qui le suit dans le cas où ce caractère est un caractère spécial (c’est-à-dire un caractère qui possède une signification spéciale pour le PHP).

Illustrons immédiatement cela avec un exemple concret :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
    </head>
        <h1>Titre principal</h1>
        <?php
            echo 'Je m\'appelle Florian mais tout le monde m\'appelle "Flo"<br>';
            echo "Je m'appelle Florian mais tout le monde m'appelle \"Flo\"<br>";
            print 'Je m\'appelle Florian mais tout le monde m\'appelle "Flo"<br>';
            print "Je m'appelle Florian mais tout le monde m'appelle \"Flo\"<br>";
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

Dans cet exemple, notre script contient 4 instructions différentes utilisant echo et print.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-echappement-apostrophe-guillemet-php.png)

Dans notre première instruction, on utilise des apostrophes pour délimiter notre chaine de caractères à afficher. Toutes les apostrophes à l’intérieur de la chaine de caractères devront donc être échappés à l’aide d’un antislash afin d’éviter toute ambiguïté. Ici, pas besoin d’échapper les guillemets puisque le PHP sait qu’on utilise des apostrophes pour délimiter notre chaine de caractères. Il n’y a donc pas d’ambiguïté sur les guillemets.

Dans notre deuxième instruction, on utilise au contraire des guillemets pour entourer la chaine de caractères qu’on souhaite afficher. Il faudra donc ici échapper tous les guillemets présents au sein de notre chaine de caractères.

On réutilise les mêmes expressions pour nos troisième et quatrième instructions mais en utilisant cette fois-ci print plutôt qu’echo.

## Qu’est-ce qu’une variable ?

Une variable est un conteneur servant à stocker des informations de manière temporaire, comme une chaine de caractères (un texte) ou un nombre par exemple.

Le propre d’une variable est de pouvoir varier, c’est-à-dire de pouvoir stocker différentes valeurs au fil du temps.

En PHP, les variables ne servent à stocker une information que temporairement. Plus précisément, une variable ne va exister que durant le temps de l’exécution du script l’utilisant.

Ainsi, on ne va pas pouvoir stocker d’informations durablement avec les variables (pour cela, nous pourrons par exemple utiliser les fichiers, cookies ou les bases de données dont nous parlerons plus tard dans ce cours).

Note : Dans le début de ce cours, nous allons définir nous-mêmes les valeurs qui vont être stockées dans nos variables, ce qui n’a pas beaucoup d’intérêt en pratique. C’est donc tout à fait normal si vous ne voyez pas immédiatement le but d’utiliser des variables. Ici, vous pouvez retenir que les variables vont être vraiment intéressantes lorsqu’elles vont nous servir à stocker des données envoyées par les utilisateurs (via des formulaires par exemple) puisqu’on va ensuite pouvoir manipuler ces données.

## Les règles de déclaration des variables en PHP

Une variable est donc un conteneur ou un espace de stockage temporaire qui va pouvoir stocker une valeur qu’on va lui assigner.

Nous allons pouvoir créer différentes variables dans un script pour stocker différentes valeurs et pouvoir les réutiliser simplement ensuite. Lorsqu’on crée une variable en PHP, on dit également qu’on « déclare » une variable.

On va pouvoir choisir le nom qu’on souhaite donner à chacune de nos variables. Cependant, il y a quelques règles à respecter et à connaitre lors de la déclaration d’une nouvelle variable :

- Toute variable en PHP doit commencer par le signe $ qui sera suivi du nom de la variable ;
- Le nom d’une variable doit obligatoirement commencer par une lettre ou un underscore (_) et ne doit pas commencer par un chiffre ;
- Le nom d’une variable ne doit contenir que des lettres, des chiffres et des underscores mais pas de caractères spéciaux ;
- Le nom d’une variable ne doit pas contenir d’espace.

De plus, notez que le nom des variables est sensible à la casse en PHP. Cela signifie que l’usage de majuscules ou de minuscules va créer des variables différentes. Par exemple, les variables $texte, $TEXTE et $tEXTe vont être des variables différentes.

Enfin, sachez qu’il existe des noms « réservés » en PHP. Vous ne pouvez pas utiliser ces noms comme noms pour vos variables, tout simplement car le langage PHP les utilise déjà pour désigner différents objets intégrés au langage. Nous verrons ces différents noms au fil de ce cours.

## Déclarer une variable PHP en pratique

Pratiquons immédiatement et créons nos premières variables ensemble. Ici, nous allons créer deux variables $prenom et $age qui vont stocker respectivement une chaine de caractères et un nombre.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/declaration-variable-affectation-valeur-php.png)

Dans le script ci-dessus, nous déclarons donc nos deux variables $prenom et $age. On assigne ou on affecte la valeur Pierre à la variable $prenom. Cette variable va donc stocker la valeur Pierre. De la même façon, on assigne la valeur 28 à la variable $age.

Notez qu’il va falloir utiliser des guillemets ou des apostrophes pour stocker une chaine de caractères dans une variable. En revanche, nous n’en utiliserons pas pour assigner un nombre à une variable.

Il y a une chose que vous devez bien comprendre avec les variables : le signe = est dans ce cadre un opérateur d’affectation ou d’assignation et non pas un opérateur d’égalité comme cela est le cas au sens mathématiques du terme.

Ici, on assigne les valeurs Pierre et 28 à nos variables $prenom et $age mais ces variables ne sont pas « égales » à la valeur qu’elles contiennent.

En effet, vous devez bien comprendre que le propre d’une variable est de pouvoir varier, ce qui signifie qu’on va pouvoir assigner différentes valeurs à une variable au cours du script. Notre variable stockera toujours la dernière valeur qui lui a été assignée. Cette valeur écrasera la valeur précédente stockée par la variable.

## Afficher et modifier le contenu d’une variable PHP

Nous allons pouvoir réaliser toutes sortes d’opérations avec nos variables. La plus basique d’entre elles consiste à afficher le contenu d’une variable PHP. Pour cela, nous allons généralement utiliser une instruction echo comme ceci :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>

    <body>
        <h1>Titre principal</h1>
        <?php
          $prenom = "Pierre";
          $age = 28;
                    
          echo $prenom;
        ?>
        
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-affichage-valeur-variable-php.png)

Ici, vous pouvez noter que nous n’avons pas besoin d’utiliser de guillemets ni d’apostrophes autour de notre variable pour en afficher le contenu avec echo : on va réserver cela seulement aux chaines de caractères, c’est-à-dire aux textes.

Comme je l’ai précisé plus haut, le propre d’une variable est de pouvoir stocker différentes valeurs dans le temps. Ainsi, on peut tout à fait affecter une nouvelle valeur à une variable. Notez cependant déjà qu’une variable PHP « classique » ne va pouvoir stocker qu’une valeur à la fois (nous verrons les différentes exceptions à cette règle au fil de ce cours).

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>

    <body>
        <h1>Titre principal</h1>
        <?php
            $prenom = "Pierre";
            $age = 28; //$age stocke le nombre 28
            
            echo "La variable \$age contient : ";
            echo $age;
            echo "<br>";
            
            $age = 29; //$age stocke le nombre 29
            echo "La variable \$age contient : ";
            echo $age;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-modification-valeur-variable-php.png)

Pour bien comprendre l’exemple précédent, vous devez savoir qu’ici notre script PHP est lu ou interprété linéairement, c’est-à-dire ligne par ligne dans l’ordre d’écriture.

Ici, notre variable $age commence par stocker le nombre 28. La première série d’instructions echo va afficher un texte, le contenu de la variable et créer un retour à la ligne.

Ensuite, on affecte une nouvelle valeur à notre variable $age. Notre nouvelle valeur, 29, va écraser l’ancienne. La variable $age va donc désormais stocker le nombre 29. La dernière instruction echo affiche la nouvelle valeur de la variable.

Note : Lorsqu’on utilise des guillemets, les variables déclarées au sein d’une chaine de caractères sont interprétées, ce qui signifie que c’est leur valeur qui va être affichée et non pas le nom de la variable dans notre cas.

Pour éviter ce comportement et afficher le nom de nos variables plutôt que la valeur qu’elles contiennent, nous allons devoir échapper le caractère $ avec un antislash comme on l’a fait ici ou utiliser les apostrophes plutôt que les guillemets.

## Les opérateurs d’affection et de comparaison

Une nouvelle fois (et j’insiste car c’est très important), vous devez bien comprendre que le signe égal simple utilisé ci-dessus n’est pas un opérateur de comparaison mais bien un opérateur d’affection (ou d’assignation) : il sert à affecter une valeur à une variable.

Cela signifie que l’opérateur = ne représente pas l’égalité d’un point de vue mathématique.

L’égalité en termes de valeurs simples est symbolisée en PHP par le double signe égal : ==. L’égalité en termes de valeurs et de types de données, c’est-à-dire l’identité, va être représentée en PHP par le triple signe égal : ===.

En effet, nous allons voir plus tard dans ce cours que les variables peuvent stocker différents types de données : des chaines de caractères, des nombres entiers, des nombres décimaux, etc. En utilisant des guillemets ou des apostrophes, on indique que la valeur stockée par la variable est une chaine de caractères.

Ainsi, si j’écris $age = "28" par exemple, la variable $age stockera la chaine de caractères 28. Cette chaine de caractères va être égale en valeur au nombre 28 mais les types de ces deux valeurs vont être différents (la première valeur est une chaine de caractères, la seconde est un nombre entier). Les deux variables ne vont pas être égales d’un point de vue de l’identité. Nous aurons l’occasion de réexpliquer tout cela dans les prochains chapitres.

## A quoi servent de manière concrète les variables PHP ?

Les variables vont être extrêmement utiles en PHP et cela dans de nombreuses situations. Par exemple, elles vont nous permettre de manipuler des données non connues à priori. En effet, imaginons par exemple que vous souhaitiez manipuler (afficher, stocker, etc.) des données récoltées via un formulaire qui sera rempli par vos visiteurs.

Nous ne connaissons pas les valeurs qui vont être envoyées par nos visiteurs à priori. Pour manipuler ces données nous allons utiliser les variables. Ici, nous allons donc créer un script qui va traiter les données envoyées par les utilisateurs. Les valeurs envoyées vont être stockées dans des variables et nous allons manipuler ces variables.

Ainsi, à chaque fois qu’un visiteur enverra le formulaire avec ses données, notre script se déclenchera et les données seront placées dans des variables prédéfinies. Le script en question sera créé de manière à manipuler ces variables et leur contenu pour les afficher, les stocker, etc.

Les variables vont également être un outil privilégié pour dynamiser notre site grâce à leur faculté de pouvoir stocker différentes valeurs. Imaginons ici que nous souhaitions afficher une horloge sur notre site.

Nous allons alors créer un script qui va recalculer toutes les secondes par exemple l’heure actuelle. Cette heure sera placée dans une variable $heure par exemple. Le script sera fait de telle sorte que le contenu de cette variable s’actualisera toutes les secondes (chaque seconde, la variable stockera une valeur actualisée qui sera l’heure actuelle) et affichera le contenu de cette variable.

Nous allons bien évidemment pouvoir utiliser les variables dans de nombreuses autres situations pour créer des scripts plus complexes. Cependant, il serait difficile à votre niveau actuel d’illustrer l’intérêt des variables en prenant appui sur une situation faisant appel à trop de connaissances hors de votre portée pour le moment.

Une nouvelle fois, pour le moment, faites-moi confiance et faîtes votre maximum pour comprendre au mieux chaque notion que je vous présente car elles vont nous être très utiles par la suite.

Les variables PHP vont pouvoir stocker différents types de valeurs, comme du texte ou un nombre par exemple. Par abus de langage, nous parlerons souvent de « types de variables » PHP.

En PHP, contrairement à d’autres langages de programmation, nous n’avons pas besoin de préciser à priori le type de valeur qu’une variable va pouvoir stocker. Le PHP va en effet automatiquement détecter quel est le type de la valeur stockée dans telle ou telle variable, et nous allons ensuite pouvoir performer différentes opérations selon le type de la variable, ce qui va s’avérer très pratique pour nous !

Une conséquence directe de cela est qu’on va pouvoir stocker différents types de valeurs dans une variable au fil du temps sans se préoccuper d’une quelconque compatibilité. Par exemple, une variable va pouvoir stocker une valeur textuelle à un moment dans un script puis un nombre à un autre moment.

Les variables en PHP vont pouvoir stocker 8 grands types de données différents :

- Le type « chaine de caractères » ou String en anglais ;
- Le type « nombre entier » ou Integer en anglais ;
- Le type « nombre décimal » ou Float en anglais ;
- Le type « booléen » ou Boolean en anglais ;
- Le type « tableau » ou Array en anglais ;
- Le type « objet » ou Object en anglais ;
- Le type « NULL » qui se dit également NULL en anglais ;
- Le type « ressource » ou Resource en anglais ;

Nous allons pour le moment nous concentrer sur les types simples de valeurs. Les autres types feront l’objet de leçons ou de parties dédiées dans ce cours.

## Le type chaîne de caractères ou String

Le premier type de données qu’une variable va pouvoir stocker est le type String ou chaîne de caractères. Une chaine de caractères est une séquence de caractères, ou ce qu’on appelle communément un texte.

Notez que toute valeur stockée dans une variable en utilisant des guillemets ou des apostrophes sera considérée comme une chaine de caractères, et ceci même dans le cas où nos caractères sont à priori des chiffres comme « 28 » par exemple.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/type-donnee-string-variable-php.png)

Ici, notre première variable $prez stocke la chaine de caractère « Je m’appelle Pierre ». Notre deuxième variable $age, quant à elle, stocke le nombre 28. En revanche, notre troisième variable $age2 stocke la chaine de caractères « 28 » et non pas un nombre.

En effet, l’utilisation de guillemets ou d’apostrophe fait qu’une valeur est immédiatement considérée comme une chaine de caractères, quelle que soit cette valeur.

Pour s’en convaincre, on peut utiliser la fonction gettype() qui nous permet de connaître le type d’une variable (en anglais). Nous verrons plus en détail ce que sont les fonctions plus tard dans ce cours.

Pour le moment, il vous suffit de savoir que la fonction gettype() va renvoyer en résultat le type de la valeur stockée dans une variable. Nous allons ensuite utiliser une instruction echo pour afficher ce résultat renvoyé.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prez = "Je m'appelle Pierre";
            $age = 28; //Stocke le nombre 28
            $age2 = "28"; //Stocke la chaine de caractères "28"
            
            echo "La variable \$age contient une valeur de type ";
            echo gettype($age);
            
            echo "<br>La variable \$age2 contient une valeur de type ";
            echo gettype($age2);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-type-donnee-string-variable-php.png)

Le code ci-dessus peut vous sembler complexe à votre niveau car nous effectuons deux opérations sur la même ligne : tout d’abord, on demande à gettype() va retourner le type de la valeur contenue dans notre variable puis on echo le résultat renvoyé par gettype().

Ne cherchez pas forcément à tout comprendre immédiatement. Une nouvelle fois, nous reparlerons des fonctions plus tard dans ce cours. Pour le moment, nous voulions juste démontrer que $age2 contient bien une valeur de type « chaine de caractères » ou String en anglais, ce qui est bien le cas.

## Les types de données nombre entier (Integer) et nombre décimal (Float ou Double)

En PHP, on va pouvoir stocker deux types différents de donnée numéraires dans nos variables : le type Integer, qui contient tous les nombres entiers positifs ou négatifs et le type Float ou Double, qui contient les nombres décimaux (nombres à virgule) positifs ou négatifs.

On va donc pouvoir stocker un entier ou un nombre décimal dans une variable. Pour cela, il suffit d’affecter le nombre à stocker à notre variable, sans guillemet ni apostrophe.

Attention cependant : lorsque l’on code, on utilise toujours les notations anglo-saxonnes. Ainsi, il faudra préciser des points à la place de nos virgules pour les nombres relatifs. Voyons immédiatement un exemple ensemble :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prez = "Je m'appelle Pierre";
            $age = 28; //Stocke le nombre 28
            $age2 = "28"; //Stocke la chaine de caractères "28"
            $distance = 2.84;
            
            echo "La variable \$age contient une valeur de type ";
            echo gettype($age);
            
            echo "<br>La variable \$distance contient une valeur de type ";
            echo gettype($distance);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-type-donnee-integer-float-double-variable-php.png)

## Le type de données booléen (Boolean)

Une variable en PHP peut encore stocker une valeur de type booléen (Boolean en anglais).

Le type booléen est un type qui ne contient que deux valeurs : les valeurs true (vrai) et false (faux). Ce type n’est pas courant dans la vie de tous les jours mais est très (très) utilisé en informatique.

Nous aurons souvent recours aux booléens dans ce cours car ils vont être à la base de nombreux mécanismes en PHP, et aurons donc largement le temps de comprendre tout l’intérêt de ces valeurs.

Pour stocker une valeur de type booléen dans une variable, pensez bien à ne pas entourer true ou false par des guillemets ou des apostrophes. Si vous utilisez des guillemets ou apostrophes, en effet, les valeurs seront considérées comme étant de type chaine de caractères ou String et nous n’allons pas pouvoir les utiliser pour réaliser certaines opérations.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prez = "Je m'appelle Pierre";
            $age = 28; //Stocke le nombre 28
            $age2 = "28"; //Stocke la chaine de caractères "28"
            $distance = 2.84;
            $vrai = true;
            $faux = false;
            
            echo "La variable \$vrai contient une valeur de type ";
            echo gettype($vrai);
            
            echo "<br>La variable \$faux contient une valeur de type ";
            echo gettype($faux);
        ?> 
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-type-donnee-boolean-variable-php.png)

## Le type de données Null

Le type de données Null est un type un peu particulier puisqu’il correspond à l’absence de valeur et sert donc à représenter des variables vides en PHP.

Ce type de valeur ne contient qu’une seule valeur : la valeur NULL qui correspond elle-même à l’absence de valeur. Il est un peu tôt pour vous faire comprendre l’intérêt de ce type de valeurs ; nous en reparlerons plus tard dans ce cours lorsque nous aurons à l’utiliser.

Notez que si vous déclarez une nouvelle variable sans lui affecter de valeur (ce qui est déconseillé de manière générale), cette variable sera automatiquement de type Null.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prez = "Je m'appelle Pierre";
            $age = 28; //Stocke le nombre 28
            $age2 = "28"; //Stocke la chaine de caractères "28"
            $distance = 2.84;
            $vrai = true;
            $faux = false;
            $vide = NULL;
            $vide2;
            
            echo "La variable \$vide contient une valeur de type ";
            echo gettype($vide);
            
            echo "<br>La variable \$vide2 contient une valeur de type ";
            echo gettype($vide2);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-type-donnee-null-variable-php.png)

## Les types de données PHP tableau (Array) et objet (Object)

Les types de données Array et Object sont des types de données complexes particuliers qui méritent de faire chacun l’objet de chapitres séparés.

Nous n’étudierons donc pas ces deux types pour le moment car n’avons pas les connaissances suffisantes pour bien les comprendre.

Sachez simplement que l’on va pouvoir stocker plusieurs valeurs d’un coup à l’intérieur d’une variable en lui assignant des valeurs de type Array (tableau) ou Object (objet).

## Le type de données ressource (Resource)

Une ressource est une variable particulière qui contient une référence vers une ressource externe au PHP, comme dans le cas d’une variable qui représente la connexion vers une base de données par exemple.

Là encore, ce type de données est complexe et nécessite d’avoir une bonne vision d’ensemble du langage pour être bien compris. Nous l’étudierons donc plus tard.

## Qu’est-ce qu’un opérateur ?

Un opérateur est un symbole qui va être utilisé pour effectuer certaines actions notamment sur les variables et leurs valeurs.

Par exemple, l’opérateur + va nous permettre d’additionner les valeurs de deux variables, tandis que l’opérateur = va nous permettre d’affecter une valeur à une variable.

La documentation officielle de PHP classe les différents opérateurs qu’on va pouvoir utiliser selon les groupes suivants :

- Les opérateurs arithmétiques ;
- Les opérateurs d’affectation ;
- Opérateurs sur les bits ;
- Opérateurs de comparaison ;
- Opérateur de contrôle d’erreur ;
- Opérateur d’exécution ;
- Opérateurs d’incrémentation et décrémentation ;
- Les opérateurs logiques ;
- Opérateurs de chaînes ;
- Opérateurs de tableaux ;
- Opérateurs de types ;

Dans cette leçon, nous allons nous concentrer sur les opérateurs arithmétiques, les opérateurs de chaines et les opérateurs d’affectation.

Nous verrons les autres types d’opérateurs au fil de ce cours lorsque cela fera le plus de sens (c’est-à-dire lorsqu’on en aura besoin).

## Les opérateurs de chaines et la concaténation en PHP

Concaténer signifie littéralement « mettre bout à bout ». L’opérateur de concaténation qui est le point (.) va donc nous permettre de mettre bout à bout deux chaines de caractères.

Cet opérateur va s’avérer particulièrement utile lorsqu’on voudra stocker le contenu de plusieurs variables qui stockent des données de type chaine de caractères ou pour afficher différentes données au sein d’une même instruction echo.

Pour bien comprendre comment fonctionne l’opérateur de concaténation et son intérêt, il me semble nécessaire de connaitre les différences entre l’utilisation des guillemets et des apostrophes lorsqu’on manipule une chaine de caractères en PHP.

Sur ce sujet, vous pouvez retenir que la différence majeure entre l’utilisation des guillemets et d’apostrophes est que tout ce qui est entre guillemets va être interprété tandis que quasiment tout ce qui est entre apostrophes va être considéré comme une chaine de caractères.

Ici, « interprété » signifie « être remplacé par sa valeur ». Ainsi, lorsqu’on inclut une variable au sein d’une chaine de caractères et qu’on cherche à afficher le tout avec un echo et en utilisant des guillemets, la variable va être remplacée par sa valeur lors de l’affichage.

C’est la raison pour laquelle il faut échapper le $ si on souhaite afficher le nom de la variable comme chaine de caractères plutôt que sa valeur.

En revanche, lorsqu’on utilise des apostrophes, les variables ne vont pas être interprétées mais leur nom va être considéré comme faisant partie de la chaine de caractères.

Regardez plutôt l’exemple suivant :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prenom = "Pierre";
            $nom = "Giraud";
            $age = 28;
            
            echo "Je m'appelle $prenom et j'ai $age ans <br>";
            echo "Je m'appelle {$prenom} et j'ai {$age} ans <br>";
            echo 'Je m\'appelle $prenom et j\'ai $age ans <br>';
            
            $prez = "Je suis $prenom $nom, j'ai $age ans <br>";
            $prez2 = "Je suis {$prenom} {$nom}, j'ai {$age} ans <br>";
            $prez3 = 'Je suis $prenom $nom, j\'ai $age ans';
            
            echo $prez;
            echo $prez2;
            echo $prez3;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-php-apostrophe-guillemet-difference-chaine-caracteres.png)

Ici, nous déclarons trois variables $prenom, $nom et $age.

On essaie ensuite d’afficher du texte avec des echo en incluant nos noms de variables au sein du texte.

Pour notre premier echo, on utilise des guillemets pour entourer le texte. Les variables dans le texte vont être interprétées et c’est leur contenu qui va être affiché.

Notez cependant ici que la syntaxe avec les noms de variables directement au milieu du texte est déconseillée aujourd’hui et qu’on préfèrera utiliser la syntaxe de de notre deuxième echo qui utilise des accolades pour entourer les variables.

Dans notre troisième echo, on utilise cette fois-ci des apostrophes. Les noms des variables ne vont donc pas être interprétés mais être considérés comme du texte et s’afficher tel quel.

Finalement, on crée de la même façon trois variables $prez, $prez2 et $prez3 qui stockent à nouveau du texte au sein duquel on inclut les noms de nos variables.

On echo alors le contenu de nos trois variables. Sans surprise, les variables $prez et $prez2 stockent le texte donné avec le contenu des variables $prenom, $nom et $age tandis que la variable $prez3 stocke le nom de ces variables plutôt que leurs valeurs.

L’opérateur de concaténation va nous permettre de mettre bout à bout les différentes données tout en faisant en sorte que chaque donnée soit interprétée par le PHP.

Nous allons l’utiliser pour séparer nos différentes variables des chaines de caractères autour. Regardez l’exemple suivant pour bien comprendre :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prenom = "Pierre";
            $nom = "Giraud";
            $age = 28;
            $prez = "Je suis " .$prenom. " " .$nom. ", j'ai " .$age. " ans";
            $prez2 = 'Je suis ' .$prenom. ' ' .$nom. ', j\'ai '.$age. ' ans';
            
            
            echo "Je m'appelle " .$prenom. " et j'ai " .$age. " ans <br>";
            echo 'Je m\'appelle ' .$prenom. ' et j\'ai ' .$age. ' ans <br>';
            
            echo $prez. '<br>' .$prez2;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-php-operateur-concatenation.png)

Pour concaténer correctement avec l’opérateur de concaténation, la règle est de séparer les différentes variables avec l’opérateur de concaténation (le point) des textes autour. Chaque texte devra être entouré de guillemets ou d’apostrophes selon ce qu’on a choisi.

A ce niveau, il est probable que vous vous demandiez l’intérêt d’utiliser l’opérateur de concaténation qui semble ici compliquer inutilement le code plutôt que simplement des guillemets et des accolades.

Ma réponse va être très simple : ici, vous pouvez utiliser l’une ou l’autre de ces méthodes pour un résultat identique. Cependant, rappelez-vous que l’utilisation d’apostrophes ou de guillemets n’est pas identique au sens où ce qui est entre guillemets va être interprété tandis que la grande majorité de ce qui est entre apostrophes ne le sera pas.

Ainsi, parfois, on voudra utiliser des apostrophes plutôt que des guillemets et dans ce cas, si on souhaite que certaines de nos variables soient interprétées, il faudra utiliser l’opérateur de concaténation.

De manière générale, il est conseillé de toujours utiliser l’opérateur de concaténation lorsqu’on souhaite mettre bout-à-bout plusieurs chaines de caractères (qui seront généralement séparées par des variables), et ceci qu’on utilise des guillemets ou des apostrophes.

## Les opérateurs arithmétiques

Les opérateurs arithmétiques vont nous permettre d’effectuer toutes sortes d’opérations mathématiques entre les valeurs contenues dans différentes variables lorsque ces valeurs sont des nombres.

Le fait de pouvoir réaliser des opérations entre variables va être très utile dans de nombreuses situations. Par exemple, si un utilisateur commande plusieurs produits sur notre site ou plusieurs fois un même produit et utilise un code de réduction, il faudra utiliser des opérations mathématiques pour calculer le prix total de la commande.

En PHP, nous allons pouvoir utiliser les opérateurs arithmétiques suivants :

| Opérateur | Nom de l’opération associée |
| --- | --- |
| + | Addition
| – | Soustraction
| * | Multiplication
| / | Division
| % | Modulo (reste d’une division euclidienne)
| ** | Exponentielle (élévation à la puissance d’un nombre par un autre)

Avant d’utiliser les opérateurs arithmétiques, clarifions ce que sont le modulo et l’exponentielle.

Le modulo correspond au reste entier d’une division euclidienne. Par exemple, lorsqu’on divise 5 par 3, le résultat est 1 et il reste 2 dans le cas d’une division euclidienne. Le reste, 2, correspond justement au modulo.

L’exponentielle correspond à l’élévation à la puissance d’un nombre par un autre nombre. La puissance d’un nombre est le résultat d’une multiplication répétée de ce nombre par lui-même. Par exemple, lorsqu’on souhaite calculer 2 à la puissance de 3 (qu’on appelle également « 2 exposant 3 »), on cherche en fait le résultat de 2 multiplié 3 fois par lui-même c’est-à-dire 2*2*2 = 8.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $x = 2;
            $y = 3;
            $z = 4;
            echo '$x stocke ' .$x. ', $y stocke ' .$y. ', $z stocke ' .$z. '<br>';
            
            $a = $x + 1; //$a stocke 2 + 1 = 3
            $b = $x + $y; //$b stocke 2 + 3 = 5
            $c = $x - $y; //$c stocke 2 - 3 = -1
            echo '$a stocke ' .$a. ', $b stocke ' .$b. ', $c stocke ' .$c. '<br>';
            
            $x = $x * $y; //$x stocke désormais 2 * 3 = 6
            echo 'La variable $x stocke désormais : ' .$x. '<br>';
            
            $z = $x / $y; //$z stocke désormais 6 / 3 = 2
            echo 'La variable $z stocke désormais : ' .$z. '<br>';
            
            $m = 5 % 3; //$m stocke le reste de la division euclidienne de 5 par 3
            echo 'Le reste de la division euclidienne de 5 par 3 est ' .$m. '<br>';
            
            $p = $z ** 4; //$p stocke 2^4 = 2 * 2 * 2 * 2 = 16
            echo 'La variable $p stocke le résultat de 2 puissance 4 = ' .$p;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-php-operateur-arithmetique.png)

Concernant les règles de calcul, c’est-à-dire l’ordre de priorité des opérations, celui-ci va être le même qu’en mathématiques : l’élévation à la puissance va être prioritaire sur les autres opérations, tandis que la multiplication, la division et le modulo vont avoir le même ordre de priorité et être prioritaires sur l’addition et la soustraction qui ont également le même niveau de priorité.

Si deux opérateurs ont le même ordre de priorité, alors c’est leur sens d’association qui va décider du résultat. Pour les opérateurs arithmétiques, le sens d’association correspond à l’ordre de leur écriture à l’exception de l’élévation à la puissance qui sera calculée en partant de la fin.

Ainsi, si on écrit $x = 1 – 2 – 3, la variable $x va stocker la valeur -4 (les opérations se font de gauche à droite). En revanche, si on écrit $x = 2 **3** 2, la variable $x stockera 512 qui correspond à 2 puissance 9 puisqu’on va commencer par calculer 3 ** 2 = 9 dans ce cas.

Nous allons finalement, comme en mathématiques, pouvoir forcer l’ordre de priorité en utilisant des couples de parenthèses pour indiquer qu’une opération doit se faire avant toutes les autres :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $x = 2 + 3 * 4; //$x stocke 14
            $y = (2 + 3) * 4; //$y stocke 20
            $z = 2 ** 3 - 4 * 4 / 8; //$z stocke 6
            
            echo '$x : ' .$x. '<br>$y : ' .$y. '<br>$z : ' .$z;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-php-operateur-arithmetique-ordre-calcul.png)

Ici, $x stocke la valeur 14. En effet, la multiplication est prioritaire sur l’addition. On va donc commencer par faire 3 * 4 puis ajouter 2 au résultat.

La variable $y stocke 20. En effet, on utilise des parenthèses pour forcer la priorité de l’addition par rapport à la multiplication.

Finalement, $z stocke la valeur 6. En effet, on commence ici par calculer 2 puissance 3 (2 *2* 2 = 8). Ensuite, on calcule 4 * 4 / 8 = 16 / 8 = 2 car la multiplication et la division sont prioritaires sur la soustraction. Finalement, on calcule 8 – 2 = 6.

Notez également que les opérateurs + et - peuvent également servir à convertir le type de valeur contenue dans une variable vers Integer ou Float selon ce qui est le plus approprié.

Cette utilisation des opérateurs va pouvoir nous être utile lorsqu’on aura variables contenant des « nombres » stockés sous le type de chaines de caractères et pour lesquelles on voudra réaliser des opérations mathématiques. Nous aurons l’occasion de rencontrer ce cas plus tard dans ce cours.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $x = "2";
            $y = "3.14";
            
            echo '$x stocke la valeur ' .$x. ' de type ' .gettype($x). '<br>';
            echo '$y stocke la valeur ' .$y. ' de type ' .gettype($y). '<br>';
            
            $x = +$x;
            $y = -$y;
            $z = +"3";
            
            echo '$x stocke la valeur ' .$x. ' de type ' .gettype($x). '<br>';
            echo '$y stocke la valeur ' .$y. ' de type ' .gettype($y). '<br>';
            echo '$z stocke la valeur ' .$z. ' de type ' .gettype($z);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-php-operateur-arithmetique-modification-type-donnee.png)

## Les opérateurs d’affectation et opérateurs combinés

Les opérateurs d’affectation vont nous permettre, comme leur nom l’indique, d’affecter une certaine valeur à une variable.

Nous connaissons déjà bien l’opérateur d’affectation le plus utilisé qui est le signe =. Cependant, vous devez également savoir qu’il existe également des opérateurs combinés notamment pour les opérateurs arithmétiques et l’opérateur de concaténation et qui sont les suivants :
| Opérateur | Définition
| --- | --- |
| .= | Concatène puis affecte le résultat
| += | Additionne puis affecte le résultat
| -= | Soustrait puis affecte le résultat
| *= | Multiplie puis affecte le résultat
| /= | Divise puis affecte le résultat
| %= | Calcule le modulo puis affecte le résultat
| **= | Élève à la puissance puis affecte le résultat

Illustrons immédiatement cela et voyons comment se servir de ces opérateurs :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $a = "Bonjour";
            $a .= " le monde"; //$a stocke "Bonjour le monde"
            echo '$a stocke : ' .$a. '<br>';
            
            $x = 5;
            $x -= 3; //$x stocke désormais 2
            echo '$x stocke : ' .$x. '<br>';
            
            $y = 3;
            $y **= $x; //$y stocke 3^2 = 3 * 3 = 9
            echo '$y stocke : ' .$y;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-php-operateur-affectation-combine-concatenation-arithmetique.png)

Ce qu’il faut bien comprendre dans l’exemple précédent est que les opérateurs d’affectation combinés font deux choses à la fois : ils exécutent une opération puis ils affectent une valeur.

Au début, notre variable $a stocke Bonjour. Ensuite, on utilise l’opérateur d’affectation concaténant .= qui va concaténer la valeur à droite avec la valeur contenue dans la variable à gauche avant de lui affecter le résultat.

Ici, on concatène donc la chaine de caractères le monde avec la valeur Bonjour et on affecte le résultat (c’est-à-dire les deux chaines concaténées) dans la variable $a. La variable $a va donc désormais stocker Bonjour le monde.

On fait la même chose avec $x en dessous : $x stocke au départ 5, puis on lui soustrait 3 avant d’affecter à nouveau le résultat (5 – 3 = 2) à $x qui va donc désormais stocker 2.

Par ailleurs, notez que tous les opérateurs d’affectation ont une priorité de calcul égale mais qui est inférieure à celle des opérateurs arithmétiques ou de concaténation.

Lorsque des opérateurs ont des ordres de priorité égaux, c’est le sens d’association de ceux-ci qui va décider du résultat. Pour les opérateurs arithmétiques, on a vu que l’association se faisait par la gauche sauf pour l’élévation à la puissance. Pour les opérateurs d’affectation, l’association se fait par la droite.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $x = 1;
            $y = 2;
            $z = 3;
            $a = 5;
            
            $x = $z += 2; //$z stocke 5 et $x stocke 5
            echo '$x stocke : ' .$x. ' et $z stocke : ' .$z. '<br>';
            
            $y += $z -= 2; //$z stocke 5 - 2 = 3 et $y stocke 2 + 3 = 5
            echo '$y stocke : ' .$y. ' et $z stocke : ' .$z. '<br>';
           
            $y /= $z -= 2; //$z stocke 1 et $y stocke 5
            echo '$y stocke : ' .$y. ' et $z stocke : ' .$z. '<br>';
            
            $a *= 4 + 2; //$z stocke 30
            echo '$a stocke : ' .$a;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-php-ordre-operateur-affectation-arithmetique.png)

Pour notre premier calcul, nous utilisons les deux opérateurs d’affectation = et +=. L’association va se faire par la droite. On commence donc à ajouter 2 à la valeur de $z qui stocke désormais 5 et on stocke la même valeur dans $x. Faites bien attention ici : $x ne stocke bien évidemment pas la variable $z mais seulement la dernière valeur connue de $z. Si on modifie ensuite la valeur de $z, cela n’a aucun impact sur $x.

Les deux exemples suivants utilisent à nouveau deux opérateurs d’affectation. L’association va donc toujours se faire par la droite.

Dans notre dernier exemple, cependant, on utilise à la fois un opérateur d’affectation et un opérateur arithmétique. Les opérateurs arithmétiques sont prioritaires sur les opérateurs d’affectation. On commence donc par réaliser l’opération arithmétique (4 + 2 = 6) et on multiplie ensuite la valeur de $a par 6 avant d’affecter la nouvelle valeur dans $a.

### Exo 1

- Parmi les variables suivantes, lesquelles ont un nom valide : $a, $_a, $a_a, $AAA, $a!, $1a et $a1 ?
- Utiliser l'instruction d'affichage echo pour afficher :
  - la variable a doit contenir la chaîne de caractère 42;
  - la variable b doit contenir l'entier 42;
  - la variable c doit contenir la chaîne de caractère Hello World!;
- Modifier le code ci-dessous pour calculer la moyenne des notes.

  ```php
  <?php
    $note_maths = 15;
    $note_francais = 12;
    $note_histoire_geo = 9;
    $moyenne = 0;
    echo 'La moyenne est de '.$moyenne.' / 20.';
  ?>
  ```

- Calculer le prix TTC du produit.

  ```php
  <?php
    $prix_ht = 50;
    $tva = 20;
    $prix_ttc = 0;
    echo 'Le prix TTC du produit est de '.$prix_ttc.' €.';
  ?>
  ```

- Déclarer une variable $test qui contient la valeur 42. En utilisant la fonction var_dump(), faire en sorte que le type de la variable $test soit string et que la valeur soit bien de 42.

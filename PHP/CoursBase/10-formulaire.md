## Traitement des formulaires [1h01] -> Q/R

<https://grafikart.fr/tutoriels/forms-php-1123#autoplay>

## Rappels sur les formulaires HTML

L’objet de cette partie n’est pas d’apprendre à créer des formulaires en HTML ni de découvrir les différents éléments de formulaire puisque je pars du principe que vous connaissez déjà le HTML et savez donc créer un formulaire en HTML.

Pour la bonne compréhension de tous, néanmoins, nous allons dans cette première leçon effectuer quelques rappels sur l’utilité des formulaires et la création de formulaires en HTML.

Ensuite, dans le reste de cette partie, ce qui va nous intéresser va être de comprendre comment on va pouvoir récupérer les données envoyées via un formulaire en PHP et d’apprendre à les manipuler et à les stocker.

Pour faire cela, nous allons utiliser un formulaire très simple comme base de travail.

## Définition et rôle des formulaires HTML

Les formulaires HTML vont nous permettre de recueillir des données envoyées par nos utilisateurs. Les formulaires vont se révéler indispensable pour tout site proposant aux utilisateurs de s’inscrire et de se connecter, et vont être l’élément privilégié pour permettre aux utilisateurs d’envoyer un message via notre site par exemple.

Les formulaires HTML vont pouvoir être composés de champs de texte (cas d’un champ de formulaire demandant à un utilisateur de renseigner son adresse mail pour se connecter ou pour s’inscrire sur le site par exemple), de listes d’options (choix d’un pays dans une liste de pays par exemple), de cases à cocher, etc.

L’intérêt et le rôle principal des formulaires HTML va résider dans le fait que les formulaires vont permettre de transmettre des données. En effet, une fois que l’utilisateur a fini de remplir un formulaire, il va pouvoir l’envoyer. Les données envoyées vont ensuite pouvoir être stockées ou traitées / manipulée (on va ainsi par exemple pouvoir vérifier que le pseudo et le mot de passe d’un utilisateur souhaitant se connecter à notre site sont valides).

## L’élément form et ses attributs

Pour créer un formulaire, nous allons utiliser l’élément HTML form. Cet élément form va avoir besoin de deux attributs pour fonctionner normalement : les attributs method et action.

L’attribut method va indiquer comment doivent être envoyées les données saisies par l’utilisateur. Cet attribut peut prendre deux valeurs : get et post.

Que signifient ces deux valeurs et laquelle choisir ? Les valeurs get et post vont déterminer la méthode de transit des données du formulaire. En choisissant get, on indique que les données doivent transiter via l’URL (sous forme de paramètres) tandis qu’en choisissant la valeur post on indique qu’on veut envoyer les données du formulaire via transaction post HTTP.

Concrètement, si l’on choisit l’envoi via l’URL (avec la valeur get), nous serons limités dans la quantité de données pouvant être envoyées et surtout les données vont être envoyées en clair. Evitez donc absolument d’utiliser cette méthode si vous demandez des mots de passe ou toute information sensible dans votre formulaire.

Cette méthode de transit est généralement utilisée lors de l’affichage de produits triés sur un site e-commerce (car oui, les options de tris sont des éléments de formulaires avant tout !). Regardez bien les URL la prochaine fois que vous allez sur un site e-commerce après avoir fait un tri : si vous retrouvez des éléments de votre tri dedans c’est qu’un get a été utilisé.

En choisissant l’envoi de données via post transaction HTTP (avec la valeur post), nous ne sommes plus limités dans la quantité de données pouvant être envoyées et les données ne sont visibles par personne. C’est donc généralement la méthode que nous utiliserons pour l’envoi véritablement de données que l’on souhaite stocker (création d’un compte client, etc.).

L’attribut action va lui nous servir à préciser l’adresse relative de la page qui va traiter les données. En effet, nous ne pouvons pas effectuer les opérations de traitement ou de stockage des données avec le HTML. Pour faire cela, nous devrons utiliser des langages comme le PHP (pour le traitement) et le MySQL (pour le stockage) par exemple.

## Création d’un formulaire HTML

Comme énoncé précédemment, nous allons créer un petit formulaire en HTML qui va nous servir pour le reste de cette partie.

Ce formulaire va nous permettre de récupérer les informations suivantes :

- Le prénom d’un utilisateur ;
- Son adresse mail ;
- Son âge ;
- Son sexe ;
- Son pays de résidence.

Voici les codes HTML et CSS que nous allons utiliser pour ce formulaire ainsi que le résultat obtenu :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/code-html-formulaire-php.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/code-css-formulaire-php.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-html-css-formulaire-php.png)

Ici, on utilise des éléments input pour demander le prénom, le mail et l’âge de l’utilisateur. On ajuste la valeur de l’attribut type en fonction du type de données attendues (texte, nombre, etc.).

On utilise également un input type="radio" pour le choix du sexe. L’utilisation de boutons radio est ici toute indiquée puisque l’utilisateur ne devrait pouvoir faire qu’un choix dans la liste d’options et car cela va grandement faciliter le traitement des données par la suite puisque nous allons toujours recevoir soit la valeur « femme » soit la valeur « homme » soit « autre ».

Enfin, nous utilisons un élément select pour le choix des pays avec différents éléments option pour chaque option. Ici, nous groupons les pays par continent avec l’élément optgroup.

Notez qu’on utilise également à chaque fois des éléments label pour indiquer à l’utilisateur ce qu’il doit renseigner comme information. On lie également chaque label à son champ de formulaire grâce aux attributs for du label et id de l’input ou du select en leur donnant la même valeur.

Côté mise en forme et CSS, on va se contenter du strict minimum puisqu’encore une fois ce n’est pas l’objet de cette partie. Nous allons ici nous servir de nos div class="c100" pour mettre chaque champ de formulaire sur une nouvelle ligne et allons mettre rapidement en forme les autres éléments.

Notez bien ici les valeurs données aux attributs method et action et notre élément form car c’est cela qui va particulièrement nous intéresser.

Ici, on indique qu’on choisit d’envoyer nos données par transaction http de type post. Nous allons envoyer les données vers la page formulaire.php. C’est cette page là qui va s’occuper du traitement des données du formulaire et sur laquelle nous allons nous concentrer par la suite.

Si vous cliquez sur le bouton de validation, vous pouvez observer que vous êtes renvoyés vers cette page. Cependant, comme nous n’avons pas encore crée la page, vous devriez avoir une erreur de type « page introuvable ».

Nous avons notre base, il est donc maintenant temps d’apprendre à récupérer et à manipuler les données envoyées via nos formulaires en PHP.

## Récupérer et manipuler les données des formulaires HTML en PHP

Le HTML nous permet de créer nos formulaires. Pour récupérer et manipuler les données envoyées, cependant, nous allons devoir utiliser du PHP.

Nous allons voir comment récupérer et manipuler (afficher, stocker, etc.) les données récoltées via les formulaires.

## Les superglobales $_POST et $_GET

Dans la leçon précédente, nous avons créé un formulaire dans une page qui s’appelait formulaire.html.

Notre élément form possédait les attributs suivants : method="post" et action="formulaire.php".

Cela signifie que les données vont être envoyées via transaction post http à la page (ou au script) formulaire.php.

La première chose à comprendre ici est que toutes les données du formulaire vont être envoyées et être accessibles dans le script PHP mentionné en valeur de l’attribut action, et cela quelle que soit la méthode d’envoi choisie (post ou get).

En effet, le PHP possède dans son langage deux variables superglobales $_GET et $_POST qui sont des variables tableaux et dont le rôle va justement être de stocker les données envoyées via des formulaires.

Plus précisément, la superglobale $_GET va stocker les données envoyées via la méthode get et la variable $_POST va stocker les données envoyées via la méthode post.

Les valeurs vont être stockées sous forme d’un tableau associatif c’est-à-dire sous la forme clef => valeur où la clef va correspondre à la valeur de l’attribut name d’un champ de formulaire et la valeur va correspondre à ce qui a été rempli (ou coché, ou sélectionné) par l’utilisateur pour le champ en question.

A noter : On va également pouvoir utiliser la variable superglobale $_REQUEST pour accéder aux données d’un formulaire sans se soucier de la méthode d’envoi. Cependant, utiliser $_REQUEST ne présente généralement que peu d’intérêt en pratique et peut potentiellement ouvrir des failles de sécurité dans nos formulaires. C’est la raison pour laquelle je n’en parlerai pas plus dans ce cours.

## Affichage simple des données de formulaire reçues

Comme $_GET et $_POST sont des variables superglobales, elles seront toujours accessibles n’importe où dans le script par définition.

On va alors très facilement pouvoir accéder aux données envoyées dans les formulaires en parcourant nos variables superglobales $_GET ou $_POST.

Par exemple, on va pouvoir très simplement afficher les données reçues à l’utilisateur. Pour cela, nous allons echo les valeurs contenues dans $_POST via notre page d’action formulaire.php :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Page de traitement</title>
        <meta charset="utf-8">
    </head>
    <body>
        <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>
        
        <?php
            echo 'Prénom : '.$_POST["prenom"].'<br>';
            echo 'Email : ' .$_POST["mail"].'<br>';
            echo 'Age : ' .$_POST["age"].'<br>';
            echo 'Sexe : ' .$_POST["sexe"].'<br>';
            echo 'Pays : ' .$_POST["pays"].'<br>';
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-variable-post-formulaire-valeur-envoi.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-variable-post-formulaire-valeur-resultat.png)

En pratique, cependant, nous n’allons pas créer des formulaires pour afficher les données aux utilisateurs mais bien pour utiliser les données de notre côté. Généralement, donc, l’utilisateur ne verra pas la page de traitement des données et nous le redirigerons plutôt immédiatement vers une page pertinente.

Par exemple, on va renvoyer l’utilisateur vers une page de remerciement si le formulaire était un formulaire créé pour nous envoyer un message, ou vers la page d’accueil du site ou son espace client si le formulaire était un formulaire de connexion, ou encore le renvoyer vers la page où se situe le formulaire si le formulaire servait à envoyer un commentaire sur un article.

Pour renvoyer un utilisateur vers une autre page, on peut utiliser la fonction PHP header() à laquelle on va passer la page où l’utilisateur doit être renvoyé sous la forme Location : adresse de ma page.

Pour illustrer cela, on va créer deux nouvelles pages formulaire2.php et form-merci.html. Notre page formulaire2.php va être notre nouvelle page d’action, pensez donc bien à modifier la valeur de l’attribut action dans le formulaire.

Dans cette page, nous allons donc effectuer différentes manipulations de données (que l’on va se contenter d’imaginer pour le moment) et renvoyer immédiatement l’utilisateur vers une autre page qu’on appelle ici form-merci.html et qui va être une page de remerciement.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-redirection-formulaire-header.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-page-redirection-formulaire.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-page-redirection-formulaire-resultat.png)

## Sécurisation et validation des formulaires en PHP

Nous allons comprendre l’importance de la validation des données envoyées par les formulaires et allons voir comment mettre en place un premier système de validation de ces données.

## Ne jamais faire confiance aux données utilisateurs

La sécurisation des formulaires est un aspect essentiel de la création de ceux-ci.

Lorsqu’on crée des formulaires, c’est généralement pour demander aux utilisateurs de nous envoyer des données. Si on ne met pas en place des systèmes de filtre sur le type de données qui peuvent être envoyées pour chaque champ et de vérification ensuite de la qualité des données envoyées, les données récoltées vont alors pouvoir être aberrantes ou même potentiellement dangereuses.

En effet, sans contrainte sur les données qui peuvent être envoyées, rien n’empêche un utilisateur d’envoyer des données invalides, comme par exemple un prénom à la place d’une adresse email ou un âge de 2000 ans ou encore de tenter de nous envoyer un script potentiellement dangereux.

Ici, il va falloir faire la différence entre deux types d’utilisateurs qui vont être gérés de façons différentes : les utilisateurs maladroits qui vont envoyer des données invalides par mégarde et les utilisateurs malveillants qui vont tenter d’exploiter des failles de sécurité dans nos formulaires pour par exemple récupérer les données personnelles d’autres utilisateurs.

Pour ce premier groupe d’utilisateurs qui ne sont pas mal intentionnés, la première action que nous allons pouvoir prendre va être d’ajouter des contraintes directement dans notre formulaire pour limiter les données qui vont pouvoir être envoyées. Pour cela, nous allons pouvoir utiliser des attributs HTML comme min, max, required, etc. ainsi que préciser les bons types d’input à chaque fois.

Nous allons ensuite également pouvoir tester que les données nous conviennent dès le remplissage d’un champ ou au moment de l’envoi du formulaire grâce au HTML ou au JavaScript (principalement) et bloquer l’envoi du formulaire si des données ne correspondent pas à ce qu’on attend.

Tout cela ne va malheureusement pas être suffisant contre les utilisateurs malintentionnés pour la simple et bonne raison que n’importe qui peut neutraliser toutes les formes de vérification effectuées dans le navigateur. Pour cela, il suffit par exemple de désactiver l’usage du JavaScript dans le navigateur et d’inspecter le formulaire pour supprimer les attributs limitatifs avant l’envoi.

Contre les utilisateurs malveillants, nous allons donc également devoir vérifier les données après l’envoi du formulaire et neutraliser les données potentiellement dangereuses. Nous allons effectuer ces vérifications en PHP, côté serveur.

Ces deux niveaux de vérifications (dans le navigateur / côté serveur) doivent être implémentés lors de la création de formulaires. En effet, n’utiliser qu’une validation dans le navigateur laisse de sérieuses failles de sécurité dans notre formulaire puisque les utilisateurs malveillants peuvent désactiver ces vérifications.

N’effectuer qu’une série de vérifications côté serveur, d’autre part, serait également une très mauvaise idée d’un point de vue expérience utilisateur puisque ces vérifications sont effectuées une fois le formulaire envoyé.

Ainsi, que faire si des données aberrantes mais pas dangereuses ont été envoyées par un utilisateur maladroit ? Supprimer les données ? Le recontacter pour qu’il soumette à nouveau le formulaire ? Il est bien plus facile dans ce cas de vérifier directement les données lorsqu’elles sont saisies dans le navigateur et de lui faire savoir si une donnée ne nous convient pas.

Note : Dans ce cours, je n’envisage les formulaires que sous forme de code HTML avec traitement des données en PHP. Certains sites utilisent cependant également le JavaScript notamment pour actualiser les données en direct, sans avoir à recharger la page.

Cela va être le cas pour les options de tri d’un site e-commerce par exemple (qui sont également créées avec des formulaires). Dans ce cas-là, il faudra bien évidemment également sécuriser le code JavaScript.

## Les failles XSS et l’injection

Un peu plus haut, j’ai parlé « d’utilisateurs malveillants » et de « données dangereuses ». La question que vous devriez vous poser est donc : comment un utilisateur peut-il exploiter mon formulaire ? Pour répondre à cela, je vais devoir vous parler des failles XSS pour « cross site scripting ».

Une attaque XSS consiste en l’injection d’un code dans le formulaire qui va permettre au hacker d’exécuter des scripts JavaScript dans le navigateur de la victime.

Ici, le hacker n’attaque pas directement sa victime qui va être un autre utilisateur du site mais exploite une faille dans le formulaire du site pour que le site lui-même délivre le code JavaScript à la victime.

## La validation des données du formulaire dans le navigateur

Les processus de validation des données que nous allons pouvoir mettre en place dans le navigateur vont s’effectuer avant ou au moment de la tentative d’envoi du formulaire.

L’objectif va être ici de bloquer l’envoi du formulaire si certains champs ne sont pas correctement remplis et de demander aux utilisateurs de remplir correctement les champs invalides.

Nous allons pouvoir faire cette vérification principalement en HTML et / ou en JavaScript.

Le HTML5 propose aujourd’hui des options de validation relativement puissantes et couvrant la majorité de nos besoins. Je vais donc ici n’utiliser que du HTML.

Notez toutefois que si vous utilisez du JavaScript dans vos formulaires pour par exemple modifier les données de la page sans avoir à la rafraichir, il faudra bien évidemment également sécuriser vos scripts JavaScript.

La validation des données en HTML va principalement passer par l’ajout d’attributs dans les éléments de formulaire. Nous allons ainsi pouvoir utiliser les attributs suivants :
| Attribut | Définition
| --- | ---
| size | Permet de spécifier le nombre de caractères dans un champ
| minlength | Permet de spécifier le nombre minimum de caractères dans un champ
| maxlength | Permet de spécifier le nombre maximum de caractères dans un champ
| min | Permet de spécifier une valeur minimale pour un champ de type number ou date
| max | Permet de spécifier une valeur maximale pour un champ de type number ou date
| step | Permet de définir un multiple de validité pour un champ acceptant des donnés de type nombre ou date. En indiquant step="4" , les nombres valides seront -8, -4, 0, 4, 8, etc.
| autocomplete | Permet d’activer l’autocomplétion pour un champ : si un utilisateur a déjà rempli un formulaire, des valeurs lui seront proposées automatiquement lorsqu’il va commencer à remplir le champ
| required | Permet de forcer le remplissage d’un champ. Le formulaire ne pourra pas être envoyé si le champ est vide
| pattern | Permet de préciser une expression régulière. La valeur du champ devra respecter la contrainte de la regex pour être valide

Reprenons notre formulaire précédent et ajoutons quelques contraintes sur les données que l’on souhaite recevoir :

- Le prénom est désormais obligatoire et ne doit comporter que des lettres + éventuellement des espaces, tirets ou apostrophes. Sa taille ne doit pas accéder 20 caractères ;
- Le mail doit avoir au moins 1 caractère de type lettre ou chiffre + le symbole « @ » + à nouveau au moins 1 caractère de type lettre ou chiffre + le symbole « . » + au moins deux caractères de type lettre ou chiffre. Il est également obligatoire ;
- L’âge doit être un nombre et être compris entre 12 et 99 ans.

Nous allons donc écrire :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/attributs-html-protection-donnees-formulaire.png)

Ici, on utilise l’attribut required pour nos champs « prenom » et « mail » pour indiquer qu’ils doivent être automatiquement remplis.

Ensuite, on utilise maxlength pour limiter la taille de notre champ à 20 caractères. On utilise également min et max pour fournir un intervalle de valeurs valides pour le champ âge.

Finalement, on utilise l’attribut pattern pour ajouter des contraintes sur la forme des données qui doivent être renseignées pour nos champs prenom et mail en fournissant des regex adaptées.

L’idée n’est pas ici de refaire un cours sur les expressions régulières, je vous invite donc à relire la partie qui leur est dédiée dans ce cours si vous ne comprenez pas l’écriture ci-dessus. Notez simplement que nous n’avons pas besoin ici de préciser des délimiteurs pour nos regex avec l’attribut pattern.

## La validation des données du formulaire sur serveur

La validation dans le navigateur va nous éviter une immense majorité de données invalides et donc d’avoir des données à priori exploitables.

Cependant, elle n’est pas suffisante contre des utilisateurs malveillants puisque n’importe qui peut neutraliser les attributs HTML ou le JavaScript en les désactivant dans le navigateur avant d’envoyer le formulaire.

Une validation côté serveur, en PHP, va donc également s’imposer pour filtrer les données potentiellement dangereuses.

Le PHP nous offre différentes options pour sécuriser nos formulaires en testant la validité des données envoyées : on va pouvoir utiliser des fonctions, des filtres, des expressions régulières, etc.

Ici, la première fonction que vous devez absolument connaitre est la fonction htmlspecialchars(). Cette fonction va permettre d’échapper certains caractères spéciaux comme les chevrons « < » et « > » en les transformant en entités HTML.

En échappant les chevrons, on se prémunit d’une injection de code JavaScript puisque les balises `<script>` et `/<script>` vont être transformées en `& <script>` et `&/<script>` et ne vont donc pas être exécutées par le navigateur.

On va ensuite pouvoir utiliser d’autres fonctions pour nettoyer les données avant de les stocker comme trim() qui va supprimer les espaces inutiles et stripslashes() qui va supprimer les antislashes que certains hackers pourraient utiliser pour échapper des caractères spéciaux.

On peut ici créer une fonction personnalisée qui va se charger d’exécuter chacune des trois fonctions ci-dessus :

```php
<?php
    $serveur = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
    
    $prenom = valid_donnees($_POST["prenom"]);
    $mail = valid_donnees($_POST["mail"]);
    $age = valid_donnees($_POST["age"]);
    $sexe = valid_donnees($_POST["sexe"]);
    $pays = valid_donnees($_POST["pays"]);
    
    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
?>
```

Note : Ici, j’ai créé une nouvelle page formulaire-valid.php qui va être la nouvelle page d’action de ma page formulaire.html.

Ensuite, on peut aller plus loin en testant que les données envoyées ont bien la forme attendue en utilisant des filtres et / ou des expressions régulières.

```php
<?php    
    $prenom = valid_donnees($_POST["prenom"]);
    $mail = valid_donnees($_POST["mail"]);
    $age = valid_donnees($_POST["age"]);
    $sexe = valid_donnees($_POST["sexe"]);
    $pays = valid_donnees($_POST["pays"]);
    
    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
    
    /*Si les champs prenom et mail ne sont pas vides et si les donnees ont
     *bien la forme attendue...*/
    if (!empty($prenom)
        && strlen($prenom) <= 20
        && preg_match("^[A-Za-z '-]+$",$prenom)
        && !empty($mail)
        && filter_var($mail, FILTER_VALIDATE_EMAIL)){
            header("Location:form-merci.html");
    }else{
        header("Location:formulaire.html");
    }
?>
```

Que fait-on ici ? Lorsque le formulaire est envoyé, on commence par utiliser notre fonction valid_donnees() pour échapper les caractères dangereux potentiellement envoyées et effectuer un premier nettoyage des données du formulaire. On place alors le résultat dans nos variables $prenom, $mail, etc.

Ensuite, on ne va vouloir enregistrer les données en base de données que si elles nous conviennent. On va donc déjà tester les données envoyées avec un if : si le format est satisfaisant, alors on les enregistre et en envoie l’utilisateur vers la page de remerciement. Sinon (else), on renvoie l’utilisateur vers le formulaire pour qu’il le remplisse à nouveau.

Ici, notre if teste :

1. Que notre variable $prenom ne soit pas vide ;
2. ET que notre variable $prenom ne fasse pas plus de 20 caractères avec la fonction strlen() qui calcule la taille d’une chaine de caractères ;
3. ET que notre variable $prenom ait bien la forme attendue avec le fonction preg_match() à laquelle on passe une regex ;
4. ET que notre variable $mail ne soit pas vide ;
5. ET que notre variable $mail ait bien la forme attendue avec le fonction filter_var() et le filtre FILTER_VALIDATE_EMAIL.

### Exo 13

- Demander à l’utilisateur les coordonnées de deux points : $x1, $x2, $y1 et $y2.
- Calculer et afficher la distance d entre les deux points X1 et X2, avec la formule :
- Formule : ![image](https://user-images.githubusercontent.com/46321539/156747841-bbc92b58-a592-4c32-80cc-798ade6eb208.png)

### Exo 14

Créer un document form.php form.php qui permettra à l'utilisateur d'encoder :

    son nom,
    son prénom,
    son adresse (n°, rue, CP, Localité),
    son pays (utiliser un datalistdatalist pour les pays d'Europe)
    un mot de passe,
    un message de signature,
    son genre (homme ou femme).

- Le formulaire soumettra ses données à un document traitement.php (POST ). Dans traitement.php , afficher chaque donnée reçue.
- Idem en utilisant GET au lieu de POST .
- Vérifier l'existence des données avant de tenter de les utiliser.
- Rédigez un script qui permet de tester si une chaîne ne contient que de lettres .
- Ecrire un script qui teste si une chaîne de caractères contient le caractère '@' (le cas d'une adresse e-mail).
- Utiliser les expressions régulières pour vérifier si une chaîne de caractères correspond à :
  - Un numéro de téléphone sous la  forme : 00 00 00 00 00 ou 00-00-00-00-00
  - Un matricule qui commence par 3 lettres et se termine par 2 chiffres (exemple "abc12").

### Exo 15

Les données encodées par l’utilisateur dans les différents formulaires doivent d’abord être contrôlées côté serveur et validées. Si une ou plusieurs données reçues ne correspondent pas à leur domaine de validité, l’utilisateur est redirigé vers le formulaire, dans lequel les champs erronés ont été marqués, un message explicatif accompagnant le champ, et les données correctes ont été recopiées telles quelles.

- Une fois l’entièreté des données soumises valides, celles-ci sont réaffichées à l’utilisateur ainsi que son Indice de Masse Corporelle (calculé : poids en kg / taille en cm au carré).
- Les données valides et confirmées par l’utilisateur seront stockées/traitées par le site.
- Créer un document form.php qui permettra à l'utilisateur d'encoder :

        nom,
        prénom,
        adresse (n°, rue
        code postal,
        localité,
        pays (datalist des pays d'Europe),
        mot de passe,
        message de signature,
        genre (homme ou femme).
        taille en centimètres,
        poids en kilogrammes. Implanter un bouton permettant de réinitialiser les champs.

- Le formulaire soumettra ses données via la méthode POST.
- Toute la logique est implémentée dans le même script : form.php.
- Si un ou plusieurs champs sont invalides, le formulaire sera rechargé.
- Les champs incriminés seront marqués et assortis d’un message d’erreur (attention à l’ergonomie).
- Les valeurs des champs correctement encodés seront pré-remplies.
- Implémenter la vérification des données pour votre formulaire :

        nom doit contenir uniquement des lettres ou le signe tiret (-),
        prénom doit contenir uniquement des lettres ou le signe tiret (-),
        adresse doit contenir uniquement des chiffres, des lettres ou un des signes suivants : (/,-),
        code postal doit contenir uniquement des chiffres,
        localité doit contenir uniquement des lettres ou le signe tiret (-),
        mot de passe est une suite de caractères imprimables,
        message de signature ne doit pas contenir de balise (tout terme entouré de ‘<…>’),
        taille doit être un nombre entier,
        poids doit être un nombre entier ou réel.

- L’ensemble des contenus générés seront mis en forme et positionnés de la manière la plus ergonomique possible ; les messages d’erreur seront aussi explicatifs que possible et placés à l’endroit le plus adéquat. Les codes couleurs retenus permettront à l’utilisateur d’identifier au premier coup d’œil les champs valides et les champs à corriger.

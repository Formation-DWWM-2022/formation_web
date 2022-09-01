# Présentation des filtres PHP

Dans cette nouvelle leçon, nous allons découvrir l’extension filter et ce que sont les filtres PHP. Nous allons pour le moment particulièrement nous attarder sur les fonctions de cette extension.

# Présentation des filtres et de l’extension PHP filter

Les filtres en PHP vont nous permettre de filtrer des données et notamment des données externes comme des données provenant d’utilisateurs et qui ont été transmises par des formulaires.

Les filtres en PHP sont disponibles via l’extension filter qui est une extension activée par défaut depuis PHPH 5.2. Il n’y a donc aucune manipulation à faire pour utiliser les filtres.

Il existe deux grands types de filtres en PHP : des filtres de validation et des filtres de nettoyage.

« Valider » des données correspond à déterminer si les données reçues possèdent la forme attendue. Par exemple, on va pouvoir vérifier si une adresse email possède bien un caractère « @ ».

« Nettoyer » ou « assainir » des données correspond à retirer les caractères indésirables de celles-ci. Nous allons par exemple pouvoir supprimer des espaces non nécessaires ou certains caractères spéciaux gênants.

Des options ou des « drapeaux » vont également pouvoir être utilisées avec certains filtres pour préciser leur comportement dans le cas où on ait un besoin spécifique. Nous aurons l’occasion d’illustrer cela plus tard.

A noter que l’extension filtre, en plus de fournir une liste de filtres puissants, possède également des fonctions et des constantes prédéfinies qu’on va pouvoir utiliser.

# Les fonctions de l’extension filtre et la liste des filtres disponibles

L’extension filter de PHP nous fournit donc différentes fonctions et filtres qui vont nous permettre de vérifier la conformité des données envoyées par rapport à ce qu’on attend.

Pour être exact, l’extension filter met les fonctions suivantes à notre disposition :

| Fonction | Description
| --- | ---
| filter_list() | Retourne une liste de tous les filtres supportés
| filter_id() | Retourne l’identifiant d’un filtre nommé
| filter_input() | Récupère une variable externe et la filtre
| filter_var() | Filtre une variable avec un filtre spécifique
| filter_var_array() | Récupère plusieurs variables et les filtre
| filter_input_array() | Récupère plusieurs variables externes et les filtre
| filter_has_var() | Vérifie si une variable d’un type spécifique existe

Nous allons utiliser la plupart de ces fonctions dans la suite de cette leçon. Pour le moment, essayons déjà d’obtenir la liste des filtres disponibles en utilisant la fonction filter_list().

La fonction filter_list() renvoie un tableau avec une liste de noms de tous les filtres qu’on va pouvoir utiliser.

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
            echo '<pre>';
            print_r(filter_list());
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
 
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-filtre-fonction-filter-list-resultat.png)

En plus du simple nom des filtres, vous devez savoir que l’extension filter utilise d’autres moyens d’identifier un filtre et notamment un système d’id nommés et numérotés. L’id d’un filtre sous forme de chaine de caractères est constitué du mot FILTER suivi du type de filtre et suivi du nom du filtre.

Par exemple, l’id nommé du filtre string est FILTER_SANITIZE_STRING. Notez que certaines fonctions vont accepter le nom des filtres tandis que d’autres vont accepter un id du filtre pour fonctionner.

Pour obtenir l’id numéroté d’un filtre, on va pouvoir utiliser la fonction filter_id(). Cette fonction va prendre un nom de filtre en argument et retourner l’id correspond au filtre si le nom passé correspond bien à un filtre ou false dans le cas contraire.

Pour obtenir directement les id de chaque filtre disponible, on va pouvoir créer une boucle foreach en bouclant sur les valeurs renvoyées par filter_list() et en passant spécifiquement les noms de filtre à filter_id().

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
            echo '
                <table>
                    <tr>
                        <th>Nom du filtre</th>
                        <th>Id numéroté</th>
                    </tr>';
            $filtres_tb = filter_list();
            foreach($filtres_tb as $clef => $nom){
                echo '
                    <tr>
                        <td>' .$nom. '</td>
                        <td>' .filter_id($nom). '</td>
                    </tr>';
            }
            echo '</table>'
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-filtre-fonction-filter-id-resultat.png)

Ici, on choisit de retourner un tableau HTML pour une meilleure présentation. Notez que j’ai déclaré certains styles pour mon tableau dans mon fichier cours.css et notamment appliqué des bordures entre les cellules de mon tableau.

# Nettoyer et valides des données en PHP : choisir la fonction et le filtre adaptés

Pour filtrer des données et avoir le résultat attendu, il va avant tout falloir utiliser la bonne fonction de l’extension Filter.

Si on ne souhaite filtrer qu’une donnée en particulier, alors on pourra utiliser les fonctions filter_var() ou filter_input() dans le cas où la variable à filtrer est une variable externe au script comme une donnée envoyée via un formulaire par exemple.

Pour filtrer plusieurs données en même temps, on va pouvoir utiliser les fonctions filter_var_array() ou filter_input_array() pour des variables externes.

Finalement, si on souhaite tester l’existence d’un type spécifique de variable, on pourra utiliser la fonction filter_has_var(). Ici, il faut comprendre « type » au sens de la provenance de la variable (récupérées via un formulaire et get ou `<code<post`, via un cookie, etc).

Dans ce cours, nous allons nous concentrer sur les fonctions filter_var(), filter_input() et filter_has_var().

Pour utiliser la fonction filter_var(), nous allons devoir lui passer le nom de la variable que l’on souhaite filtrer, l’id (sous forme de nombre ou de chaine de caractères) du filtre que l’on souhaite appliquer à la variable et facultativement un tableau associatif d’options ou des drapeaux qui vont servir à préciser notre filtre.

La fonction filter_var() va retourner les données filtrées en cas de succès ou false si le filtre échoue.

La fonction filter_input() va s’utiliser de manière similaire à filter_var() à la différence qu’on va également devoir lui passer en tout premier argument une constante qui va indiquer la façon dont les données ont été transmises pour lever toute ambiguïté sur la variable qu’on souhaite filtrer.

On va pouvoir choisir parmi les constantes suivantes :

- INPUT_GET : donnée récupérée via un formulaire et la méthode get ;
- INPUT_POST : donnée récupérée via un formulaire et la méthode post ;
- INPUT_COOKIE : donnée récupérée via un cookie ;
- INPUT_SERVER : donnée de serveur ;
- INPUT_ENV : données d’environnement ;

La fonction filter_input() va également retourner les données filtrées en cas de succès ou false si le filtre échoue.

Finalement, nous allons devoir passer à la fonction filter_has_var() une constante parmi la liste ci-dessus ainsi que le nom de la variable dont on souhaite vérifier l’existence.

# Filtres de validation, de nettoyage et drapeaux de l’extension PHP Filter

Maintenant que nous avons une première idée du fonctionnement et du résultat des fonctions de l’extension filtre, il est temps de les utiliser en pratique.

Pour utiliser ces fonctions intelligemment, il va falloir renseigner le filtre qui répond à nos besoins. Il existe deux grands types de filtres : les filtres de validation et de nettoyage.

Les filtres de validation vont permettre, comme leur nom l’indique, de « valider » des données c’est-à-dire de vérifier que les données filtrées possèdent bien une certaine forme.

Les filtres de nettoyage vont eux nous permettre de « nettoyer » des données, c’est-à-dire par exemple de supprimer certains caractères non voulus comme des caractères spéciaux.

Dans cette leçon, nous allons présenter les différents filtres disponibles dans chaque groupe et également illustrer le comportement de certains d’entre eux à travers différent exemples.

Nous allons également présenter et utiliser les options et les drapeaux des filtres qui vont nous servir à préciser ou à modifier le comportement par défaut d’un filtre.

# Les filtres de validation

Les filtres de validation vont nous permettre de vérifier qu’une certaine donnée possède une forme conforme à ce qu’on attend. Ces filtres se basent sur des règles de validation précises et parfois complexes qui sont issues de certaines normes. Le filtre de validation de mail, par exemple, va notamment vérifier qu’une donnée possède bien un caractère « @ » entre autres.

Illustrons immédiatement le fonctionnement de ces filtres grâce à quelques exemples concrets d’application.

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
            $tb = [
                10,
                2.5,
                'pierre.giraud@edhec.com',
                'https://www.pierre-giraud.com',
                'Pierre'
            ];
            
            foreach($tb as $valeur){
                echo '"' .$valeur. '" a la forme d\'un nombre entier ? : ';
                var_dump(filter_var($valeur, FILTER_VALIDATE_INT));
                echo '<br>"' .$valeur. '" a la forme d\'un nombre décimal ? : ';
                var_dump(filter_var($valeur, FILTER_VALIDATE_FLOAT));
                echo '<br>"' .$valeur. '" a la forme d\'un mail ? : ';
                var_dump(filter_var($valeur, FILTER_VALIDATE_EMAIL));
                echo '<br>"' .$valeur. '" a la forme d\'une URL ? : ';
                var_dump(filter_var($valeur, FILTER_VALIDATE_URL));
                echo '<br><br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-utilisation-filtre-validation-resultat.png)

Ici, on commence par créer un tableau numéroté qui stocke 5 valeurs. Nous allons déjà filtrer les valeurs de notre tableau en utilisant filter_var() (puisque les données sont ici internes = définies dans notre script) et différents filtres de validation.

Pour cela, on crée une boucle foreach qui va parcourir notre tableau. Pour chaque valeur du tableau, on va utiliser successivement 4 filtres qui sont les filtres int, float, validate_email et validate_url.

On choisit ici de passer leur id sous forme de texte à filter_var() mais on aurait aussi bien pu passer leur id numéroté. Si la validation réussit, la fonction filter_var() renvoie la donnée filtrée et dans le cas contraire renvoie false.

On utilise ici var_dump() en lui passant le résultat de filter_var() pour afficher finalement si la validation a réussi ou si elle a échoué.

# Les filtres de nettoyage

Les filtres de nettoyage permettent de « préparer » des données en les nettoyant. Ils vont par exemple nous servir à nous débarrasser de certains caractères non souhaités lors de la réception de données et donc d’obtenir au final des données assainies qu’on va pouvoir manipuler et toute sécurité.

Les filtres de nettoyage sont donc bien différents des filtres de validation puisqu’à la différence de ces derniers ils ne vont pas nous permettre de valider la forme d’une donnée mais plutôt de modifier la forme des données reçues en suivant certains schémas qui vont dépendre du filtre utilisé.

Notez bien que les filtres de validation et les filtres de nettoyage sont souvent utilisés conjointement. On va par exemple pouvoir commencer par nettoyer une donnée reçue puis ensuite valider la forme de la donnée après nettoyage (nous verrons cela plus en détail dans la prochaine leçon).

Attention : certains noms se ressemblent entre les filtres de nettoyage et de validation tout simplement car certains filtres vont permettre de nettoyer ou de valider une donnée de même type comme un email ou un entier par exemple.

Vous pouvez noter ici que c’est la raison pour laquelle certains filtres de validation possèdent « validate » dans leur nom : tout simplement car le nom simple était déjà pris par un filtre de nettoyage. Faites donc bien attention à ne pas confondre les différents noms !

Utilisons immédiatement quelques filtres de nettoyage pour nettoyer une chaine de caractères par exemple :

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
            $texte = 'Je suis <strong>Pierre</strong>. J\'ai 29 ans & vous ?';
        
            echo $texte. '<br>';
            echo filter_var($texte, FILTER_SANITIZE_NUMBER_INT). '<br>';
            echo filter_var($texte, FILTER_SANITIZE_SPECIAL_CHARS). '<br>';
            echo filter_var($texte, FILTER_SANITIZE_FULL_SPECIAL_CHARS). '<br>';
            echo filter_var($texte, FILTER_SANITIZE_STRING). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-utilisation-filtre-nettoyage-resultat.png)

Notre chaine de caractères possède ici des balises HTML, ainsi que des caractères spéciaux et des caractères « chiffres ». On commence déjà par echo la chaine telle quelle pour voir le résultat « naturel ».

On utilise ensuite un filtre FILTER_SANITIZE_NUMBER_INT qui va tout supprimer dans la chaine sauf les caractères chiffres, le signe + et le signe – avec notre fonction filter_var(). Ici, pas la peine d’utiliser var_dump() car les filtres de nettoyage vont quasiment toujours renvoyer des valeurs et on va donc plutôt directement echo le résultat qui est le nombre 29 trouvé dans notre chaine.

Nos deuxième et troisième filtres FILTER_SANITIZE_SPECIAL_CHARS et FILTER_SANITIZE_FULL_SPECIAL_CHARS vont par défaut convertir certains caractères spéciaux HTML et les transformer en entité ce qui va nous permettre d’échapper leur signification spéciale et de les afficher tels quels. Ici, les deux filtres renvoient le même résultat et comme vous pouvez le voir les balises « strong » ont bien été échappées.

Finalement, notre dernier filtre FILTER_SANITIZE_STRING va lui supprimer les balises HTML et encoder les autres caractères spéciaux.

 
Liste et utilisation des options et des drapeaux avec les filtres

Comme je vous le disais précédemment, on va également pouvoir utiliser des drapeaux ou des tableaux d’options avec la plupart de nos filtres.

Ces options et ces drapeaux vont nous permettre de modifier le comportement par défaut de nos filtres et / ou de les rendre plus ou moins strict.

Notez que les options vont devoir être passées via un tableau multidimensionnel qui devra être nommé options.

Illustrons le fonctionnement des options et des drapeaux avec quelques filtres de validation. Notez bien ici qu’on va pouvoir de la même façon utiliser des options et des drapeaux avec des filtres de nettoyage.

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
            $prenom = 'Pierre';
            $ipv4 = '127.0.0.1';
            $x = 5;
            $y = 50;
            $options = ['options' => ['min_range' => 0, 'max_range' => 10]];
            
            echo $prenom. ' booléen ? : ';
            var_dump(filter_var($prenom, 258)); // 258 = FILTER_VALIDATE_BOOLEAN
            echo '<br>' .$prenom. ' booléen ? : ';
            var_dump(filter_var($prenom, 258, FILTER_NULL_ON_FAILURE));
            
            echo '<br><br>' .$ipv4. ' a la forme d\'une IP ? : ';
            var_dump(filter_var($ipv4, 275)); //275 = FILTER_VALIDATE_IP
            echo '<br>' .$ipv4. ' a la forme d\'une IPv4 ? : ';
            var_dump(filter_var($ipv4, 275, FILTER_FLAG_IPV4));
            echo '<br>' .$ipv4. ' a la forme d\'une IPv6 ? : ';
            var_dump(filter_var($ipv4, 275, FILTER_FLAG_IPV6));
            
            echo '<br><br>' .$x. ' entier compris entre 0 et 10 ? : ';
            var_dump(filter_var($x, 257, $options)); //257 = FILTER_VALIDATE_INT
            echo '<br>' .$y. ' entier compris entre 0 et 10 ? : ';
            var_dump(filter_var($y, 257, $options));
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-utilisation-drapeau-option-filtre-resultat.png)

On passe cette fois-ci des id de filtre numérotés à filter_var() pour raccourcir notre écriture (j’ai mis en commentaire dans le code les équivalents en termes d’id nommé pour chaque filtre).

On commence par filtrer la valeur « Pierre » avec le filtre boolean. Notre fonction filter_var() renvoie false dans le premier exemple car le filtre boolean, utilisé sans drapeau, renvoie false pour toute valeur différente de « 1 », « true », « on » et « yes ».

On utilise ensuite à nouveau le filtre boolean pour filtrer la valeur de $prenom mais avec cette fois-ci le drapeau FILTER_NULL_ON_FAILURE. Ce drapeau va faire que le filtre boolean renverra NULL pour toute valeur non booléenne.

On tente ensuite de valider une adresse IP Notre variable $ipv4 stocke ici une valeur qui a la forme d’un IPv4 (IP version 4) mais pas la forme d’une IPv6.

On commence par utiliser le filtre validate_ip sans drapeau. Le filtre va donc filtrer n’importe quelle IP. Ensuite, on retente de filtrer en utilisant le drapeau FILTER_FLAG_IPV4 qui permet de filtrer des IPv4 en particulier. Finalement, on utilise le filtre FILTER_FLAG_IPV6 qui permet de ne filtrer que des IPv6 et la filtre échoue donc.

On tente ensuite de valider deux entiers stockés dans des variables $x et $y et dans le cas présent on va également valider le fait que les entiers stockés se situent dans un certain intervalle.

Pour faire cela, on va utiliser un tableau d’options. Le tableau d’options utilisé est un tableau multidimensionnel nommé options et qui va dans notre cas contenir un tableau associatif stockant les éléments min_range => 0 et max_range => 10.

Les clefs de tableau min_range et max_range sont des mots clefs qui possèdent déjà un sens en PHP : ils vont servir à définir des bornes d’intervalle.

Ici, on va donc valider le fait que nos deux variables contiennent des entiers et que ces entiers se situent dans l’intervalle de valeurs [0-10].

# Utilisation pratique des filtres en PHP

Dans cette leçon, nous allons voir les cas les plus courants d’utilisation des filtres en PHP en situation « réelle ». Nous allons donc construire un formulaire HTML et allons utiliser les filtres pour filtrer les données suivantes :

- Utiliser les filtres PHP pour valider une adresse IP ;
- Utiliser les filtres PHP pour nettoyer et valider une adresse mail ;
- Utiliser les filtres PHP pour nettoyer et valider une URL.

Nous discuterons également des limites des filtres et de ce que les filtres ne peuvent ou ne doivent pas faire.

# Valider une adresse IP

Commençons par l’exemple le plus facile qui consiste en une simple validation d’adresse IP. Pour valider une adresse IP, on va utiliser le filtre validate_ip.

Nous allons ici vouloir valider des données externes pour rendre l’exemple plus réel et allons donc créer un formulaire HTML très simple qui va contenir un champ de texte demandant une adresse IP.

On va ensuite utiliser la fonction filter_input() dont le rôle est de récupérer une variable externe pour la filtrer.

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
        <form method='post' action='cours.php'>
            <label for='ip'>Entrez une IP ici :</label>
            <input type='text' id='ip' name='ip'>
            
            <input type='submit' value='Envoyer'>
        </form>
        <?php
            //On vérifie déjà qu'une donnée ait bien été envoyée
            if(isset($_POST['ip'])){
                if(filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP)){
                    echo $_POST['ip']. ' ressemble à une IP valide <br>';
                }else{
                    echo $_POST['ip']. ' ne ressemble pas à une IP valide <br>';
                }
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-validation-ip-filtre-resultat.png)

Ici, les données de notre formulaire sont renvoyées vers la page courante avec action='cours.php' qui est la page qui abrite le formulaire. On utilise la méthode post pour envoyer les données qui vont donc être stockées dans la superglobale $_POST.

Dans notre script PHP, on commence déjà par s’assurer que notre superglobale $_POST contient bien un élément ip. C’est le rôle de la première instruction if englobante. Si ce n’est pas le cas, on ne rentre pas dans le if et rien ne sera affiché.

Si notre variable $_POST['ip'] a bien été définie, on va alors tester que la valeur passée a bien la forme d’une adresse IP. Notez que les filtres de validation ne servent bien sûr qu’à vérifier la concordance de forme et non pas dans le cas présent si l’IP existe vraiment et a été attribuée à quelqu’un.

Lorsqu’on utilise la fonction filter_input(), il faut préciser le nom simple de la donnée qu’on souhaite filtrer plutôt que l’emplacement de la valeur dans la superglobale. Cela est dû au fait que le premier argument de la fonction permet déjà de préciser d’où vient la donnée.

Pour une validation d’IP plus stricte, on aurait pu également utiliser les drapeaux FILTER_FLAG_IPV4 et FILTER_FLAG_IPV6 qui permettent de valider respectivement une IPv4 et une IPv6.

# Nettoyer et valider une adresse mail

Pour vérifier la validité d’une adresse email envoyée par un utilisateur en utilisant les filtres PHP, nous allons pouvoir procéder en deux étapes en commençant par nettoyer les données envoyées en supprimant tous les caractères « illégaux » envoyés (une espace, une virgule, etc.) puis en vérifiant que les données restantes ont bien la forme d’une adresse email.

Une nouvelle fois, nous n’allons pas pouvoir nous assurer que l’adresse email envoyée existe bien de cette manière, nous allons simplement pouvoir vérifier que les données envoyées ont la forme d’une adresse email (présence d’un symbole « @ » par exemple).

Pour illustrer cela, nous allons cette fois-ci créer un champ d’input de type email dans notre formulaire.

Notez que la plupart des navigateurs effectuent déjà une vérification sur les données passées dans les input type='email' et vérifient notamment la présence du caractère « @ » suivi par au moins une lettre.

Les filtres vont nous permettre d’aller plus loin. Si vous souhaitez pouvoir inscrire n’importe quoi dans le champ mail du formulaire pour bien vérifier votre filtre, vous pouvez créer un champ de type text plutôt que email.

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
        <form method='post' action='cours.php'>
            <label for='mail'>Entrez une adresse mail ici :</label>
            <input type='email' id='mail' name='mail'><br>
            
            <input type='submit' value='Envoyer'>
        </form>
        <?php
            //On vérifie déjà qu'une donnée ait bien été envoyée
            if(isset($_POST['mail'])){
                $m = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
                echo 'Valeur retenue : ' .$m.
                     '<br> Valeur originale : ' .$_POST['mail']. '<br>';
                if(filter_var($m, FILTER_VALIDATE_EMAIL)){
                    echo $m. ' ressemble à une adresse mail valide <br>';
                }else{
                    echo $m. ' ne ressemble pas à une adresse mail valide <br>';
                }
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-nettoyage-validation-mail-filtre-resultat.png)

Ici, on commence par utiliser un premier filtre de nettoyage FILTER_SANITIZE_EMAIL puis on récupère le résultat (la valeur filtrée) dans une variable $m.

On utilise ensuite un filtre de validation pour nous assurer que l’adresse contenue dans $m a bien la forme d’une adresse mail valide. On utilise ici filter_var() plutôt que filter_input() car notre variable $m a été définie en interne.

# Nettoyer et valider une URL

On va pouvoir de la même façon qu’avec nos adresses mail pouvoir filtrer des URL. Pour illustrer cela, on peut reprendre le code précédent et ajuster les filtres et les noms des variables :

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
        <form method='post' action='cours.php'>
            <label for='url'>Entrez une URL ici :</label>
            <input type='url' id='url' name='url'><br>
            
            <input type='submit' value='Envoyer'>
        </form>
        <?php
            //On vérifie déjà qu'une donnée ait bien été envoyée
            if(isset($_POST['url'])){
                $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
                echo 'Valeur retenue : ' .$url.
                     '<br> Valeur originale : ' .$_POST['url']. '<br>';
                if(filter_var($url, FILTER_VALIDATE_URL)){
                    echo $url. ' ressemble à une URL valide <br>';
                }else{
                    echo $url. ' ne ressemble pas à une URL valide <br>';
                }
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-nettoyage-validation-url-filtre-resultat.png)

# Les limites des filtres

Les filtres sont un bon outil pour s’assurer qu’une valeur possède une forme attendue ou pour échapper ou supprimer certains caractères problématiques d’une valeur.

Cependant, les filtres sont loin d’être parfaits et ne vont pas pouvoir être utilisés pour vérifier des données dans n’importe quelle condition.

Typiquement, les filtres vont être performants lorsqu’on souhaite afficher des données traitées dans une page web car la plupart des filtres se concentrent sur l’échappement des balises HTML et de certains caractères pouvant poser des problèmes lors d’un affichage.

En revanche, on ne pourra pas se reposer uniquement sur les filtres pour l’enregistrement de données en base de données par exemple, tout simplement car les filtres vont laisser passer certains caractères et schémas qui vont être potentiellement dangereux.
# Sécurisation et validation des formulaires en PHP

- Tout SAVOIR sur la faille XSS : https://youtu.be/Bkg7JoBs2ac 

Nous allons comprendre l’importance de la validation des données envoyées par les formulaires et allons voir comment mettre en place un premier système de validation de ces données.

# Ne jamais faire confiance aux données utilisateurs

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

# Les failles XSS et l’injection

Un peu plus haut, j’ai parlé « d’utilisateurs malveillants » et de « données dangereuses ». La question que vous devriez vous poser est donc : comment un utilisateur peut-il exploiter mon formulaire ? Pour répondre à cela, je vais devoir vous parler des failles XSS pour « cross site scripting ».

Une attaque XSS consiste en l’injection d’un code dans le formulaire qui va permettre au hacker d’exécuter des scripts JavaScript dans le navigateur de la victime.

Ici, le hacker n’attaque pas directement sa victime qui va être un autre utilisateur du site mais exploite une faille dans le formulaire du site pour que le site lui-même délivre le code JavaScript à la victime.

Prenons immédiatement un exemple d’injection simple pour voir comment ça fonctionne. Pour cela, je vais créer une nouvelle page xss.php et je vais récupérer mon formulaire HTML précédent en ne gardant que les champs prenom, mail et age.

L’idée va être ici de sauvegarder les données du formulaire en base de données puis de les afficher sur la même page, sous le formulaire.

Pour cela, j’indique la page actuelle en page d’action puisqu’on va effectuer ces opérations dans la même page de code et je vais également agrandir la taille de mon champ prénom pour plus de clarté sur les données que je vais insérer.

On va ensuite insérer le code PHP à la suite du formulaire. Côté PHP, on va donc déjà devoir se connecter à la base de données. Ensuite, on va vouloir insérer les nouvelles données si aucun des champs n’est vide puis récupérer toutes les données dans la table et les afficher.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="formulaire.css">
    </head>
    <body>
        <h1>Formulaire HTML</h1>
        
        <form action="xss.php" method="post">
            <div class="c100">
                <label for="prenom">Prénom : </label>
                <input type="text" id="prenom" name="prenom" style="width:30em">
            </div>
            <div class="c100">
                <label for="mail">Email : </label>
                <input type="email" id="mail" name="mail">
            </div>
            <div class="c100">
                <label for="age">Age : </label>
                <input type="number" id="age" name="age" min="12" max="99">
            </div>
            <div class="c100" id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>
        
        
        <?php
            $serveur = "localhost";
            $dbname = "cours";
            $user = "root";
            $pass = "root";
    
            $prenom = $_POST["prenom"];
            $mail = $_POST["mail"];
            $age = $_POST["age"];
            
            try{
                //On se connecte à la BDD
                $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                //On insère les données reçues si les champs sont remplis
                if(!empty($prenom)  && !empty($mail) && !empty($age)){
                    $sth = $dbco->prepare("
                        INSERT INTO form(prenom, mail, age)
                        VALUES(:prenom, :mail, :age)");
                    $sth->bindParam(':prenom',$prenom);
                    $sth->bindParam(':mail',$mail);
                    $sth->bindParam(':age',$age);
                    $sth->execute();
                }
                
                //On récupère les infos de la table 
                $sth = $dbco->prepare("SELECT prenom, mail, age FROM form");
                $sth->execute();
                //On affiche les infos de la table
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                $keys = array_keys($resultat);
                for($i = 0; $i < count($resultat); $i++){
                    $n = $i + 1;
                    echo 'Utilisateur n°' .$n. ' :<br>';
                    foreach($resultat[$keys[$i]] as $key => $value){
                        echo $key. ' : ' .$value. '<br>';
                    }
                    echo '<br>';
                }
            }   
            catch(PDOException $e){
                echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
            }
        ?>
    </body>
</html>
```

Ici, on insère les données dans la table form créée précédemment (les champs sexe et pays de la table seront vides pour les entrées ajoutées mais ce n’est pas grave).

Ensuite, on récupère les données dans la table et on les affiche. On récupère nos données sous forme d’un tableau associatif avec fetchAll(PDO::FETCH_ASSOC).

Notre variable $resultat va alors être n tableau multidimensionnel qui va contenir plusieurs tableaux associatifs (un par entrée). On utilise donc une boucle foreach pour récupérer les données dans chaque tableau associatif et une boucle for pour passer d’un tableau associatif à l’autre.

Voilà pour la partie PHP de la page. Ici, notre code ne contient aucune réelle sécurisation. Un utilisateur va donc pouvoir passer plus ou moins ce qu’il veut comme données dans le champ prenom. Par exemple, il peut tout à fait passer un élément script.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/passage-script-faille-xss-formulaire-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/execution-script-faille-xss-formulaire-html.png)

Ici, la valeur donnée dans le champ prénom va être enregistrée sans problème en base de données puis être récupérée et affichée. Cependant, lorsqu’on récupère cette valeur, le navigateur va lire l’élément script et donc exécuter le code JavaScript qu’il contient !

Comme les données de la table sont récupérées et affichées à chaque fois qu’un utilisateur arrive sur la page, tous les utilisateurs vont donc exécuter ce code JavaScript lorsqu’ils vont charger la page !

Dans ce cas-là, il s’agit d’une simple instruction alert et ce n’est donc pas dangereux en soi, juste gênant. Cependant, rien ne m’aurait empêché ici d’écrire un script qui, une fois exécuté, pourrait m’envoyer des informations de connexion comme des mots de passe ou autre.

Note : La plupart des navigateurs sont aujourd’hui vigilants par rapport à l’injection de JavaScript dans des formulaires et donc vont bloquer l’envoi du formulaire pour éviter justement le danger comme Chrome :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/navigateur-protection-faille-xss.png)

Cependant, il est tout à fait possible de passer outre ces vérifications ou simplement d’utiliser une ancienne version d’un navigateur qui ne les fait pas pour injecter du JavaScript. Vous ne pouvez donc pas vous en remettre aux vérifications effectuées par les navigateurs !

Je n’irai pas plus loin dans l’explication de l’exploitation des failles XSS car c’est un sujet complexe et qui mériterait un cours à lui seul. Je voulais simplement vous montrer un exemple concret d’injection pour que vous compreniez bien les risques.

# La validation des données du formulaire dans le navigateur

Les processus de validation des données que nous allons pouvoir mettre en place dans le navigateur vont s’effectuer avant ou au moment de la tentative d’envoi du formulaire.

L’objectif va être ici de bloquer l’envoi du formulaire si certains champs ne sont pas correctement remplis et de demander aux utilisateurs de remplir correctement les champs invalides.

Nous allons pouvoir faire cette vérification principalement en HTML et / ou en JavaScript.

Le HTML5 propose aujourd’hui des options de validation relativement puissantes et couvrant la majorité de nos besoins. Je vais donc ici n’utiliser que du HTML.

Notez toutefois que si vous utilisez du JavaScript dans vos formulaires pour par exemple modifier les données de la page sans avoir à la rafraichir, il faudra bien évidemment également sécuriser vos scripts JavaScript.

La validation des données en HTML va principalement passer par l’ajout d’attributs dans les éléments de formulaire. Nous allons ainsi pouvoir utiliser les attributs suivants :

| Attribut     | Définition                                                                                                                                                                                  |
| ------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| size         | Permet de spécifier le nombre de caractères dans un champ                                                                                                                                   |
| minlength    | Permet de spécifier le nombre minimum de caractères dans un champ                                                                                                                           |
| maxlength    | Permet de spécifier le nombre maximum de caractères dans un champ                                                                                                                           |
| min          | Permet de spécifier une valeur minimale pour un champ de type number ou date                                                                                                                |
| max          | Permet de spécifier une valeur maximale pour un champ de type number ou date                                                                                                                |
| step         | Permet de définir un multiple de validité pour un champ acceptant des donnés de type nombre ou date. En indiquant step="4" , les nombres valides seront -8, -4, 0, 4, 8, etc.               |
| autocomplete | Permet d’activer l’autocomplétion pour un champ : si un utilisateur a déjà rempli un formulaire, des valeurs lui seront proposées automatiquement lorsqu’il va commencer à remplir le champ |
| required     | Permet de forcer le remplissage d’un champ. Le formulaire ne pourra pas être envoyé si le champ est vide                                                                                    |
| pattern      | Permet de préciser une expression régulière. La valeur du champ devra respecter la contrainte de la regex pour être valide                                                                  |

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

# La validation des données du formulaire sur serveur

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
    
    /*Si les champs prenom et mail ne sont pas vides et si les donnees ont
     *bien la forme attendue...*/
    if (!empty($prenom)
        && strlen($prenom) <= 20
        && preg_match("^[A-Za-z '-]+$",$prenom)
        && !empty($mail)
        && filter_var($mail, FILTER_VALIDATE_EMAIL)){
    
        try{
            //On se connecte à la BDD
            $dbco = new PDO("mysql:host=$eerveur;dbname=$dbname",$user,$pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On insère les données reçues
            $sth = $dbco->prepare("
                INSERT INTO form(prenom, mail, age, sexe, pays)
                VALUES(:prenom, :mail, :age, :sexe, :pays)");
            $sth->bindParam(':prenom',$prenom);
            $sth->bindParam(':mail',$mail);
            $sth->bindParam(':age',$age);
            $sth->bindParam(':sexe',$sexe);
            $sth->bindParam(':pays',$pays);
            $sth->execute();
            //On renvoie l'utilisateur vers la page de remerciement
            header("Location:form-merci.html");
        }
        catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
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

# Bienvenue dans le Bac à Sable !
- Faille XSS : https://www.leblogduhacker.fr/sandbox/faillexss.php
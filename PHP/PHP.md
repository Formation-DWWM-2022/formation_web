## Cours Présentation de PHP [6 min] -> Q/R
https://grafikart.fr/tutoriels/php-presentation-1112#autoplay
## Installer PHP sur Windows [5 min] -> Q/R
https://grafikart.fr/tutoriels/install-php-windows-1114#autoplay

Afin d'installer et configurer rapidement et sans difficulté un serveur web, un gestionnaire de bases de données MySQL et PHP sous Windows, existe parmi d'autres la solution tout-en-un WAMP (acronyme de « Windows-Apache-MySQL-PHP »).
C'est une plateforme de développement web open source qui utilise Apache2, MySQL, MariaDB et PHP pour développer des applications web dynamiques sur le système d’exploitation Windows. D’ailleurs, WAMP peut être utilisé pour des tests internes et peut également servir à créer des sites web. Donc, dans ce tutoriel, nous allons voir comment installer le serveur WAMP pour Windows 10.

XAMPP est un autre alternatif de WAMP et c’est une distribution Apache facile à installer contenant MariaDB, PHP et Perl.

## Install

Téléchargez l'exécutable d'installation qui correspond à votre architecture (32 ou 64 bits) sur le site www.wampserver.com. (cliquez sur le menu « Télécharger »).

https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.2.6_x64.exe/download

## Puis 
Suivant -> Suivant -> Installer -> oui -> oui -> Suivant -> Terminer

Double-cliquez sur le raccourci créé.

Si le système vous retourne un message d'erreur « Fichier MSVCR110.dll manquant » ou « Fichier VCRUNTIME140.dll manquant », il s'agit d'un problème bien connu. Vous pouvez essayer de trouver sur le net la dll manquante, mais il faut qu'elle soit de la bonne version et de la bonne architecture. Alors, pour ne pas vous casser la tête, téléchargez Visual C++ Redistributable for Visual Studio 2012 à cette adresse : https://docs.microsoft.com/fr-FR/cpp/windows/latest-supported-vc-redist?view=msvc-170#visual-studio-2012-vc-110-update-4
    
Autre possibilité : utiliser l'outil check_vcredist disponible dans la section « Outils » du site wampserver : des paquetages de Visual C++ Redistributable for Visual Studio y sont également disponibles.
    
Il ne s'agit pas de la dernière version de Visual C++ Redistributable for Visual Studio, mais c'est celle qui correspond à la version désirée de la dll manquante.

L'exécution de WampServer ne déclenche pas grand-chose de visible, tout au plus la console qui s'ouvre et se referme rapidement. Mais si vous regardez dans votre zone de notification, à droite de la barre des tâches, vous verrez une icône avec le logo de WampServer devenir verte. Laissez traîner votre souris sur cette icône : une info-bulle vous indique que tous les services sont lancés.

![image](https://user-images.githubusercontent.com/46321539/156735007-bae598ce-1515-4c1b-8a3f-6927501a06a6.png)

Donc le raccourci vers WampServer sert à cela : démarrer tous les services de votre serveur web/MySQL.

L’icône est verte quand tous les services sont démarrés, rouge lorsqu’ils sont tous inactifs et orange lorsque seulement une partie d’entre eux sont démarrés.

Pour accéder à la page web d’accueil, vous devez démarrer votre navigateur et taper « localhost » dans la barre d'adresse :

![image](https://user-images.githubusercontent.com/46321539/156735061-40930738-e501-4176-a44f-db10b677c06b.png)

Le fait que cette page s'affiche atteste que le service Apache est bien en cours d'exécution.

Ce qui nous intéresse plus particulièrement est le menu Outils.

Cliquez sur phpinfo() :

![image](https://user-images.githubusercontent.com/46321539/156735167-a2669b57-182c-4f71-a008-e1773ff53166.png)

Comme vous le voyez, cela déclenche l'exécution de la fonction PHP phpinfo(), qui affiche toutes les informations de version et de fonctionnalités d'Apache et de PHP.

Revenez sur la page de configuration du serveur et cliquez sur phpMyAdmin :

![image](https://user-images.githubusercontent.com/46321539/156735257-e77d3532-1b29-4ceb-b8ac-b9bea9af9419.png)

L'application phpMyAdmin sert à administrer les bases de données MySQL sur le serveur local (le « My » désigne MySQL – il existe ainsi, par exemple, phpPgAdmin pour PostgreSQL).

Comme sur l'image ci-dessus, réglez éventuellement la langue, tapez « root » comme utilisateur, laissez le mot de passe vide et cliquez sur Exécuter :

![image](https://user-images.githubusercontent.com/46321539/156735245-3a2e21dc-ad4e-4775-b18a-ce0933bdf5db.png)

Vous constatez que WampServer a permis de configurer automatiquement Apache, MySQL et PHP, et s'est occupée de démarrer les services ad hoc. Nous disposons donc d'une configuration de test complète sur notre machine locale.

Mais pour permettre à une machine distante d'afficher une page web ou d'accéder à une base de données MySQL, il va falloir configurer certaines choses à la main.

Création de votre nouveau dossier projet dans le dossier 

      C:\wamp64\www\ 
      
Par exemple : 

    C:\wamp64\www\PROJET\index.php
    
```php
  //index.php
  <?php echo 'Salut' ?>
```

    http://localhost/PROJET
  
  
## Les variables [16 min] -> Q/R
https://grafikart.fr/tutoriels/variables-php-1115#autoplay

### Exo 1 :
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

## Les conditions [22 min] -> Q/R
https://grafikart.fr/tutoriels/conditions-php-1117#autoplay

### Exo 2 :
- Déclarer une variable $sexe qui contient une chaîne de caractères. Créer une condition qui affiche un message différent en fonction de la valeur de la variable.
- Déclarer une variable $budget qui contient la somme de 1 553,89 €. Déclarer une variable $achats qui contient la somme de 1 554,76 €. Afficher si le budget permet de payer les achats.
- Déclarer une variable $age qui contient la valeur de type integer de votre choix. Réaliser une condition pour afficher si la personne est mineure ou majeure.
- Déclarer une variable $heure qui contient la valeur de type integer de votre choix comprise entre 0 et 24. Créer une condition qui affiche un message si l'heure est le matin, l'après-midi ou la nuit.

## Les boucles [34 min] -> Q/R
https://grafikart.fr/tutoriels/boucles-php-1118#autoplay

### Exo 3 :
- En utilisant la boucle while, afficher tous les codes postaux possibles pour le département 77.
- En utilisant la boucle for, afficher la table de multiplication du chiffre 5.
- En utilisant deux boucles for, écrire un script qui produit le résultat ci-dessous.
 
      1
      22
      333
      4444
      55555
      
- Déclarer une variable avec le nom de votre choix et avec la valeur 0. Tant que cette variable n'atteint pas 20, il faut :
  - l'afficher ;
  - incrémenter sa valeur de 2 ;
  - Si la valeur de la variable est égale à 10, la mettre en valeur avec la balise HTML appropriée.

### Exo 4 :
- Écrire une boucle qui produit une ligne horizontale de 8 étoiles.
- Imbriquer ce code dans une nouvelle boucle pour produire un carré de 8 lignes horizontales, chacune contenant 8 étoiles.
- Produire des triangles rectangles avec différentes orientations.

      *
      **
      ***
      ****
      *****
      ******
      *******
      ********
      *********
      **********
      
- Envisager les mêmes figures mais creuses et non plus pleines.


## Les tableaux [14 min] -> Q/R
https://grafikart.fr/tutoriels/tableaux-php-1116#autoplay
### Exo 5 :
- Déclarer une variable de type array qui stocke les informations suivantes :
  - France : Paris
  - Allemagne : Berlin
  - Italie : Rome
  - Afficher les valeurs de tous les éléments du tableau en utilisant la boucle foreach.
- En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires. Puis, tester si le chiffre 42 est dans le tableau et afficher un message en conséquence. Enfin, afficher le contenu de votre tableau avec var_dump.
- En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires. Puis, trier les valeurs dans deux tableaux distincts. Le premier contiendra les valeurs inférieures à 50 et le second contiendra les valeurs supérieures ou égales à 50. Enfin, afficher le contenu des deux tableaux.
- En utilisant le tableau ci-dessous, afficher seulement les pays qui ont une population supérieure ou égale à 20 millions d'habitants.
 
  ```php
  <?php
    $pays_population = array(
      France' => 67595000,
      Suede' => 9998000,
      Suisse' => 8417000,
      Kosovo' => 1820631,
      Malte' => 434403,
      Mexique' => 122273500,
      Allemagne' => 82800000,
    );
  ?>
  ```
- En reutilisant le tableau ci-dessus, compter le nombre d'éléments du tableau.
- Quelle syntaxe permet d'afficher le deuxième élément du tableau $cocktails ?
 
  ```php
  <?php
    $cocktails = array('Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule');
  ?>
  ```
- Quelle syntaxe permet d'afficher l'âge de Manuel ?

  ```php
  <?php
    $personnes = array(
      Jean' => 16,
      Manuel' => 19,
      André' => 66
    );  
  ?>
  ```
  
### Exo 6 :
- Écrivez un script PHP pour rediriger un utilisateur vers une autre page.
- Écrivez un script PHP, pour vérifier si la page est appelée depuis ‘HTTPS’ ou ‘HTTP’.
- Écrivez un programme PHP pour supprimer les doublons d’un tableau triée.

## Les fonctions [40 min] -> Q/R
https://grafikart.fr/tutoriels/fonctions-php-1119#autoplay

## Les fonctions utilisateurs [32 min] -> Q/R
https://grafikart.fr/tutoriels/fonctions-utilisateurs-php-1120#autoplay

### Exo 7 :
- Faite en sorte que la fonction HelloWorld retourne exactement la valeur Hello World!
- Créer une fonction from scratch qui s'appelle quiEstLeMeilleurProf(). Elle doit retourner Le prof de programmation Web
- Créer une fonction from scratch qui s'appelle jeRetourneMonArgument(). Exemple : Arg = "abc" ==> Return abc Arg = 123 ==> Return 123
- Créer une fonction from scratch qui s'appelle concatenation(). Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux. Exemple : argument 1 = Antoine Argument 2 = Griezmann; Resultat : AntoineGriezmann
- Créer une fonction from scratch qui s'appelle concatenationAvecEspace(). Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux. Exemple : argument 1 = Ngolo Argument 2 = Kante; Resultat : Ngolo Kante
- Créer une fonction from scratch qui s'appelle somme(). Elle prendra deux arguments de type int. Elle devra retourner la somme des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 10
- Créer une fonction from scratch qui s'appelle soustraction(). Elle prendra deux arguments de type int. Elle devra retourner la soustraction des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 0
- Créer une fonction from scratch qui s'appelle multiplication(). Elle prendra deux arguments de type int. Elle devra retourner la multiplication des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 25
- Créer une fonction from scratch qui s'appelle estIlMajeure(). Elle prendra un argument de type int. Elle devra retourner un boolean. Si age >= 18 elle doit retourner true si age < 18 elle doit retourner false Exemple : age = 5 ==> false age = 34 ==> true
- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra deux arguments de type int. Elle devra retourner le plus grand des deux.
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra deux arguments de type int. Elle devra retourner le plus petit des deux.
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra trois arguments de type int. Elle devra retourner le plus petit des trois.

### Exo 8 :
- Créer une fonction from scratch qui s'appelle premierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le premier élement du tableau. Si l'array est vide, il faudra retourner null;	
- Créer une fonction from scratch qui s'appelle dernierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le dernier élement du tableau. Si l'array est vide, il faudra retourner null;	
- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra un argument de type array. Elle devra retourner le plus grand des élements présent dans l'array. Si l'array est vide, il faudra retourner null;	
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra un argument de type array. Elle devra retourner le plus petit des élements présent dans l'array. Si l'array est vide, il faudra retourner null;	
- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password fait au moins 8 caractères et false si moins.	
- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :	
  - Faire au moins 8 caractères
  -	Avoir au moins 1 chiffre
  -	Avoir au moins une majuscule et une minuscule
- Créer une fonction from scratch qui s'appelle capital(). Elle prendra un argument de type string. Elle devra retourner le nom de la capitale des pays suivants :	
  - France ==> Paris
  - Allemagne ==> Berlin
  - Italie ==> Rome
  - Maroc ==> Rabat
  - Espagne ==> Madrid
  - Portugal ==> Lisbonne
  - Angleterre ==> Londres
  - Tout autre pays ==> Inconnu
  - Il faudra utiliser la structure SWITCH pour faire cette exercice.
- Créer une fonction from scratch qui s'appelle listHTML(). Elle prendra deux arguments :	
  - Un string représentant le nom de la liste
  - Un array représentant les élements de cette liste
  - Elle devra retourner une liste HTML. Chaque element de cette liste viendra du tableau passé en paramètre.
  - Exemple : Paramètre : Titre : Capitale Liste : ["Paris", "Berlin", "Moscou"] Résultat : <h3>Capitale</h3><ul><li>Paris</li><li>Berlin</li><li>Moscou</li></ul>
  - Comme vous pouvez le voir il n'y a pas d'espace ni de retour à la ligne entre les élements de la liste. Pas d'espace non plus entre le titre et la liste.
  - Si le titre est null et vide il faut que la fonction retourne null. Si l'array est vide, il faut que la fonction retourne null.
- Créer une fonction from scratch qui s'appelle remplacerLesLettres(). Elle prendra un argument de type string. Elle devra retourner cette même string mais en remplacant les e par des 3, les i par des 1 et les o par des 0 Exemple :	
  - input : "Bonjour les amis" ==> Output : B0nj0ur l3s am1s
  - input : "Les cours de programmation Web sont trops cools" ==> Output : L3s c0urs d3 pr0grammat10n W3b s0nt tr0ps c00ls

### Exo 9 :
Avec des fonctions et des tableaux : 
- affiche tous les éléments d'un tableau,
- calcule la moyenne des nombres contenus dans un tableau donné,
- indique combien d'éléments sont supérieurs ou égaux à 10,
- teste si la note 20 est présente ou non,
- détermine la meilleure note obtenue.
- On souhaite stocker les notes d'étudiants, vous utiliserez un tableau associatif pour ça :
  - Albert : 12, 8, 9, 7, 13
  - Michel : 14, 13, 12, 11, 10
  - Vincent : 17, 16, 15, 18, 13
  - Faite une fonction qui prend en paramètre un tableau de note et permet de calculer la moyenne de l'étudiant

### Exo 10 :
Il faut écrire la fonction check_form. Celle-ci prend un tableau associatif en paramètre. Ce dernier contient les clés suivantes :

    nom
    prenom
    CP
    naissance
    banque

La fonction check_form doit vérifier que les données sont valides. Pour être valides les données doivent respecter les contraintes suivantes :

    Le nom doit exclusivement être composé des caractères de a à z, de - et (d'espace).
    Le prenom doit exclusivement être composé des caractères de a à z, de - et (d'espace).
    CP est une valeur numérique comprise entre 1000 et 9999.
    naissance doit être une date valide au format jour/mois/année.
    banque doit être un numéro de compte belge au format européen (eg. BE15 1234 5678 9012)

Pour vous aider dans la vérification des données vous pouvez utiliser les expressions régulières (voir fonction preg_match). Voici des expressions régulières pouvant vous aider :

    #^[A-Za-z -]*$# vérifie qu'une chaîne est composée des caractères de a à z, de - et (d'espace).
    #^[0-9]{1,2}/[0-9]{1,2}/[0-9]{1,4}$# vérifie qu'une chaine est au format xx/xx/xxxx où x est un nombre.
    #^BE[0-9]{2}( ?[0-9]{4}){3}$# vérifie qu'une chaîne correspond à un numéro de compte belge au format européen.

La fonction retournera un tableau associatif contenant les informations suivantes :

    valide valeur booléenne TRUE ou FALSE selon que toutes les données sont valides ou non
    nom
        valide valeur booléenne TRUE ou FALSE selon que les données dans nom sont valides ou non.
        message un message d'erreur relatif à nom si valide est FALSE.
    prenom
        valide valeur booléenne TRUE ou FALSE selon que les données dans prenom sont valides ou non.
        message un message d'erreur relatif à prenom si valide est FALSE.
    CP
        valide valeur booléenne TRUE ou FALSE selon que les données dans CP sont valides ou non.
        message un message d'erreur relatif à CP si valide est `FALSE
    naissance
        valide valeur booléenne TRUE ou FALSE selon que les données dans naissance sont valides ou non.
        message un message d'erreur relatif à naissance si valide est FALSE.
    banque
        valide valeur booléenne TRUE ou FALSE selon que les données dans banque sont valides ou non.
        message un message d'erreur relatif à banque si valide est FALSE.

## TP [COMBAT DE HEROS]
1. Faites une fonction qui prend en paramètres 6 arguments, les 3 premiers seront les clés d'un tableau et les 3 suivantes leur valeur respective
La fonction devra renvoyer le tableau créé et initialisé.
Tester votre fonction avec :

* name : Warrior
* hp : 540
* damages : 25

* name : Mage
* hp : 430
* damages : 31

2. Faites une fonction qui prend en paramètre un tableau de "Héros", cette fonction doit afficher un héros sous la forme :
* Nom : xxxx
* Point de vie : xxxx
* Dégâts : xxxx

Testez votre fonction

3. Faites une fonction qui prend en pramètre deux tableaux de héros
La fonction doit faire "combattre" chaque héros, un héros inflige des blessures à l'autre, à partir de ses dégâts (damages), aux points de vie (hp).
C'est à dire que l'on va soustraire aux point de vie d'un héro, les dégâts de l'autre.
Appelez cette fonction dans une boucle, tant qu'un héro est en vie, on fait combattre les héros chacun leur tour.

---
---
---

## Require & Include [10 min] -> Q/R
https://grafikart.fr/tutoriels/require-include-php-1121#autoplay

### Exo 11 :
- Créer les fichiers :
  - head.php qui contient la configuration de la page
  - header.php qui contient le haut de cette page.
  - footer.php qui contient le base de cette page.
- Puis les inclure dans un fichier index.php pour obtenir un beau résultat.

![image](https://user-images.githubusercontent.com/46321539/156745897-0ec50d55-e3a2-453a-b12b-16f75c6472c6.png)

## PHP & HTML [39 min] -> Q/R
https://grafikart.fr/tutoriels/html-template-php-1122#autoplay

### Exo 12 :
- Utiliser une boucle pour générer une liste déroulante dont les valeur seront les nombres de 1 à 10 et les valeurs affichées seront le nombre suivi de pair pour les nombres pairs et impair pour les nombres impairs :

        <SELECT>
            <OPTION value="1">1 impair</OPTION>
            <OPTION value="2">2 pair</OPTION>
            …
            
- Afficher la table de multiplication des nombres de 1 à 10 sous la forme d’un tableau carré de 11 cases sur 11.

![image](https://user-images.githubusercontent.com/46321539/156747601-88261b0e-2716-4d8f-9e64-2acde6b255bf.png)

- Remplir un tableau de dimensions 10x10 de valeurs aléatoires comprises entre -50 et 50 et compter les valeurs positives, négatives et nulles.
    - Afficher le tableau sous forme tabulaire, puis les valeurs calculées.

## Traitement des formulaires [1h01] -> Q/R
https://grafikart.fr/tutoriels/forms-php-1123#autoplay

### Exo 13 :
- Demander à l’utilisateur les coordonnées de deux points : $x1, $x2, $y1 et $y2.
 - Calculer et afficher la distance d entre les deux points X1 et X2, avec la formule :
 - Formule : ![image](https://user-images.githubusercontent.com/46321539/156747841-bbc92b58-a592-4c32-80cc-798ade6eb208.png)


### Exo 14 :
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

### Exo 15 :
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

## Les dates [50 min] -> Q/R
https://grafikart.fr/tutoriels/dates-php-1124#autoplay

### Exo 16
- Créer une fonction from scratch qui s'appelle quelleAnnee(). Elle devra retourner un integer representant l'année actuelle.
- Créer une fonction from scratch qui s'appelle quelleDate(). Elle devra retourner une string representant la date actuelle sous le format suivant DD/MM/YYYY
- A partir d’un âge, on doit indiquer l’année de naissance
- Ecrire un script qui affiche la date et l'heure courantes sous les formes suivantes :

        Mon, 25 Jan 2016 23:31:01 +0100
        Monday/January/2016
        25/Jan/2016
        25-01-16
        23h: 31m: 01s

- Afficher la date courante en français sous les formes suivantes :

        lundi 25 janvier 2016, 23:37
        25 janvier 2016
        
- Quel jour de la semaine était le 6 novembre 1975?
- Calculez votre âge à l’instant en cours
- Vérifiez si la date du 29 février 2010 est valide.
- Rédigez le script qui teste si le 1 Mai 2016 est un vendredi ou un lundi , si oui il affiche « Week-end prolongé !».

## Lecture de fichiers [35 min] -> Q/R
https://grafikart.fr/tutoriels/file-get-contents-1125#autoplay

## Écriture de fichiers [16 min] -> Q/R
https://grafikart.fr/tutoriels/file-put-contents-1126#autoplay

### Exo 17
Ecrire un script php qui  permet de lire des nombres décimaux à partir d'un fichier texte nommé "decimal.txt",  et stocke leurs équivalents en binaire dans un autre fichier "binaire.txt".

        La fonction base_convert permet de convertir un nombre d'une base à une autre :
            base_convert(nombre,frombase,tobase);

### Exo 18
On souhaite mettre en place un espace qui permet à des adhérents de déposer des images sur le serveur Web .
- Créer une page upload.php qui permet de choisir une image et  la transférer vers un dossier nommé "images"  sur le  serveur.
    - N'autorisez que les extensions des images ('jpg', 'gif', 'png').
    - Après l'envoi on récupère le fichier , on le stocke dans le dossier "images" et on affiche un message de confirmation.n En cas d'erreurs on affiche un message d'erreur approprié.
- Le lien "Consulter les images" envoie vers la page "galerie.php" qui liste les images contenues dans le dossier « images » , avec la date de création et la taille de chaque image:
- Utiliser les fonctions suivantes : opendir ,readdir,filesize,filectime

## Les Cookies [35 min] -> Q/R
https://grafikart.fr/tutoriels/cookies-php-1127#autoplay

### Exo 19
Ecrire un script php qui permet de sauvegarder les heures de visites dans un cookie , et affiche les détails de visites comme suit :
Pour la première visite :
![image](https://user-images.githubusercontent.com/46321539/156780765-db7f353b-aac2-47e5-b974-9f45dea64d3f.png)
Par la suite affiche la liste des heures :
![image](https://user-images.githubusercontent.com/46321539/156780811-9bca414b-1d97-4808-91ff-cf841135d26f.png)

## La session [8 min] -> Q/R
https://grafikart.fr/tutoriels/session-php-1128#autoplay

### Exo
Pour cet exercice, il faut réaliser un jeu de calcul. Les calculs doivent être générés au hasard parmi les opération +, - et *. Les 2 opérandes sont des nombres choisis aléatoirement entre 0 et 20.
- Il faut pouvoir :

        répondre au calcul proposé ;
        changer d'utilisateur ;
        clôturer la partie.

- Lors de la réponse, le résultat est vérifié; si celui-ci est correct, le joueur marque un point, sinon il perd un point.
- Lorsque l'on veut changer de joueur, 2 options sont possibles :

        le joueur existe déjà et peut être choisi dans un menu déroulant;
        le joueur n'existe pas et doit être ajouté via un champ de texte.

- Lors de la clôture d'une partie, on est dirigé vers une nouvelle page affichant les résultats de tous les joueurs. On affichera les points, le nombre de bonnes réponses, le nombre de mauvaises réponses et le pourcentage de bonnes réponses données. Les résultats sont affichés par ordre de points décroissants.

## TP [GESTION DE MEMBRE]
Pour cet exercice, il s'agit de :

    Créer une page d’inscription permettant à un utilisateur de fournir un login (qui devra être unique) et un mot de passe.
    Créer une page de login permettant à un utilisateur préalablement inscrit de se connecter.
    Créer une page profil à laquelle l’utilisateur accède lorsqu’il se connecte. Dans celle-ci : un rappel du login de l’utilisateur, l’avatar de l’utilisateur, un formulaire permettant d’uploader une nouvelle image d’avatar, un bouton permettant à l’utilisateur de supprimer son profil (après confirmation). Enfin, un lien vers une page reprenant la liste des utilisateurs existants.
    Créer une page listing reprenant la liste des utilisateurs existants. Les utilisateurs seront présentés par ordre alphabétique de login. Si l’utilisateur connecté est un superuser, il a la possibilité pour chaque utilisateur de modifier ses droits (user=>superuser ou l’inverse).
    Créer une page de déconnexion permettant à un utilisateur préalablement connecté de se déconnecter.

- L’ensemble des informations sur les utilisateurs sera stocké dans un fichier users.dat situé à la racine du site. Dans le fichier, on stockera un tableau sérialisé contenant en clé principale le nom d’utilisateur et en valeur un tableau avec mot de passe, genre, droits et avatar de l’utilisateur.
- Le login sera unique, le mot de passe stocké sous forme de hash, le genre sera soit M soit F ; Les droits seront par défaut 0 (user), ils pourront être positionnés à 1 (superuser) par un administrateur. L’avatar de l’utilisateur consiste en une image de 100 pixels sur 100 au format JPG ou PNG, stockée sous forme base64_encodée dans le tableau sérialisé.
Références

    file-exists
    file-get-contents
    file-put-contents
    serialize
    unserialize
    array-key-exists
    ksort

```php
//Encoder un image base64
function base64_encode_image ($filename,$filetype)
{
    if ($filename)
    {
        $imgbinary = fread(fopen($filename, "r"), filesize($filename));
        return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
    }
}
```

## Les dates [50 min] -> Q/R

<https://grafikart.fr/tutoriels/dates-php-1124#autoplay>

Dans cette nouvelle partie, nous allons nous intéresser aux dates et aux fonctions PHP qui vont nous permettre de les manipuler.

Avant tout, nous allons définir ce qu’est le Timestamp UNIX et comprendre son intérêt.

## Le Timestamp UNIX

Le format Timestamp UNIX est un format de mesure de date très utilisé en programmation. Le Timestamp UNIX représente le nombre de secondes écoulées depuis le 1er janvier 1970 à minuit (heure GMT) et jusqu’à une date donnée.

Ce format de date est difficile à manier pour un humain mais comme le Timestamp UNIX est un nombre on va très facilement pouvoir le manipuler en PHP et l’utiliser pour par exemple comparer deux dates.

Un autre intérêt majeur du Timestamp est qu’il va être le même pour un moment donné quel que soit le fuseau horaire puisque ce nombre représente le nombre de secondes écoulées depuis un point précis dans le temps. Cela va s’avérer très pratique lorsqu’on aura besoin de représenter le temps pour l’ensemble de la planète d’un coup.

Notez finalement que le PHP met bien évidemment à notre disposition certaines fonctions qui vont nous permettre d’exprimer une date sous un format dont on a l’habitude (jour-mois-année par exemple) à partir d’un Timestamp.

## Obtenir un Timestamp et le Timestamp actuel en PHP
### Obtenir le Timestamp relatif à la date actuelle en PHP

Pour obtenir le Timestamp actuel en PHP, c’est-à-dire le nombre de secondes écoulées entre le 1er janvier 1970 à minuit GMT et le moment actuel, nous allons utiliser la fonction time().
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
            echo 'Timestamp actuel : ' .time(). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-obtenir-timestamp-actuel-time-resultat.png)

Si vous testez ce code chez vous, il est tout à fait normal que vous n’ayez pas les mêmes valeurs que moi puisque nous n’exécutons pas le code au même moment et donc qu’un nombre différent de secondes se sont écoulées depuis le 1er janvier 1970 pour vous et moi.

### Obtenir le Timestamp d’une date donnée en PHP

Pour obtenir le Timestamp UNIX lié à une date donnée, nous allons pouvoir utiliser la fonction mktime() qui retourne le Timestamp UNIX d’une date ou la fonction gmmktime() qui retourne le Timestamp UNIX d’une date GMT.

Ces deux fonctions vont s’utiliser de la même façon. Nous allons pouvoir leur passer une série de nombres en arguments. Ces nombres vont constituer une date et vont représenter (dans l’ordre) les parties suivantes de la date dont on souhaite obtenir le Timestamp :

1. L’heure ;
2. Les minutes ;
3. Les secondes ;
4. Le jour ;
5. Le mois ;
6. L’année.

Les arguments sont tous facultatifs et si certains sont omis ce sera la valeur courante ou actuelle de la date qui sera utilisée et donc le Timestamp actuel qui sera renvoyé. Attention cependant : lorsque des arguments sont omis, la fonction considère que ce sont les derniers car elle n’a aucun moyen de savoir quel argument est omis.

Ainsi, il est impossible d’omettre juste le jour par exemple puisque dans ce cas la fonction considérerait que la valeur du mois correspond au jour et celle de l’année au mois. Pour omettre l’argument « jour », il faudra également omettre le mois et l’année.
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
            echo 'Timestamp actuel : ' .time(). '<br>';
            echo 'Timestamp actuel (avec mktime()) : '.mktime(). '<br>';
            $t1 = mktime(8, 30, 0, 1, 25, 2019);
            $gmt1 = gmmktime(8, 30, 0, 1, 25, 2019);
            echo 'Timestamp 25 janvier 2019 08h30 (GMT+1) : ' .$t1. '<br>';
            echo 'Timestamp 25 janvier 2019 08h30 (GMT) : ' .$gmt1. '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-timestamp-mktime-gmmktime-resultat.png)

Lorsqu’on travaille avec les dates, la chose la plus difficile à comprendre est généralement la façon dont vont être gérés les fuseaux horaires.

Ici, la fonction mktime() calcule le Timestamp d’une date donnée en fonction du fuseau horaire du serveur. Pour moi, en France et en hiver, je suis à GMT+1. Quand il est 8h30 chez moi, il est donc 7h30 sur un fuseau GMT. La fonction va donc transformer mon heure en heure GMT et se baser sur 7h30 pour calculer le Timestamp.

La fonction gmmktime(), en revanche, considère que l’heure passée est une heure GMT. Cette fonction va donc calculer le Timestamp de l’heure exacte donnée. C’est la raison pour laquelle j’ai un écart de 3600 secondes entre mes deux Timestamps renvoyées par mktime() et gmmktime() : car ces deux Timestamps ne représentent pas la même date.

### Obtenir un Timestamp à partir d’une chaine de caractères

Finalement, nous allons également pouvoir obtenir un Timestamp à partir d’une chaine de caractères en utilisant la fonction strtotime() qui transforme une chaine de caractères de format date ou temps en Timestamp.

Pour que cette fonction fonctionne correctement, il va falloir lui passer une chaine de caractères en argument sous un format qu’elle comprend. Notez déjà que cette fonction se base sur le fuseau horaire de votre serveur.

Il y a de nombreuses façons d’écrire une date en PHP. Si vous souhaitez connaitre la liste complète, je vous invite à aller sur la documentation officielle ici : http://php.net/manual/fr/datetime.formats.php.

Les dates littérales devront bien évidemment toujours être écrites en anglais puisque l’anglais est la langue prise comme standard en développement informatique. Les formats de date les plus courants acceptés sont les suivants :

- mm/dd/y (mois/jour/année). Ex : 1/25/19, 1/25/2019 ;
- y-mm-dd (anné-mois-jour). Ex : 19-01-25, 2019-01-25 ;
- dd-mm-yy (jour-mois-année). Ex : 25-01-2019 ;
- dd-mois y (jour-mois textuel année). Ex : 25-January 2019 ;
- mois dd, y (mois textuel jour, année). Ex : January 25, 2019 ;

On va ensuite pouvoir ajouter à ces dates un temps qu’on va également pouvoir préciser sous différents formats. Le format de loin le plus utilisé pour les temps est le format heures:minutes:secondes comme par exemple 12:30:15.

Notez que la fonction strtotime() va également accepter des formats de date relatifs comme :

- Le nom d’un jour (« sunday », « monday », etc.) ;
- Une notation basée sur le jour comme yesterday (hier à minuit), today (aujourd’hui à minuit), now (maintenant), tomorrow (demain à minuit), etc ;
- Une notation ordinale comme « first fri of January 2019 » (premier vendredi de janvier en 2019) ;
- Une notation avec « ago » comme « 2 days ago » (avant-hier) ou « 3 months 2 days ago » (il y a trois mois et deux jours) ;
- Une notation avec des « + » et des « – » comme « +1 day » (demain) ou « – 3 weeks » (il y a 3 semaines).

Nous allons de plus pouvoir combiner ces formats de dates ensemble en respectant certaines règles pour créer des formats de dates complexes. Dans ce cours, nous allons cependant nous contenter de manipuler des dates simples car elles vont se révéler suffisantes dans l’immense majorité des cas.
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
            echo 'Timestamp actuel : ' .time(). '<br>';
            $t1 = mktime(8, 30, 0, 1, 25, 2019);
            $gmt1 = gmmktime(8, 30, 0, 1, 25, 2019);
            echo 'Timestamp 25 janvier 2019 08h30 (GMT+1) : ' .$t1. '<br>';
            echo 'Timestamp 25 janvier 2019 08h30 (GMT) : ' .$gmt1. '<br>';
            
            $stt1 = strtotime('2019/01/25 08:30:00');
            $stt2 = strtotime('2019/01/25');
            $stt3 = strtotime('next friday');
            $stt4 = strtotime('2 days ago');
            $stt5 = strtotime('+1 day');
            
            echo 'Timestamp 25 janvier 2019 08h30 (GMT+1) : ' .$stt1. '<br>';
            echo 'Timestamp 25 janvier 2019 minuit (GMT+1) : ' .$stt2. '<br>';
            echo 'Timestamp vendredi 1 février minuit (GMT+1) : ' .$stt3. '<br>';
            echo 'Timestamp il y a 48h : ' .$stt4. '<br>';
            echo 'Timestamp dans 24h : ' .$stt5;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-timestamp-strtotime-resultat.png)
 
## Obtenir une date à partir d’un Timestamp en PHP

Pour obtenir une date en PHP, on va pouvoir utiliser la fonction getdate().

Cette fonction va accepter un Timestamp en argument et retourner un tableau associatif contenant les différentes informations relatives à la date liée au Timestamp.

Si aucun argument n’est passé à getdate(), alors la fonction utilisera le Timestamp relatif à la date courante et retournera donc la date actuelle locale.

Le tableau associatif renvoyé par getdate() est de la forme suivante :
| Clef | Valeur associée
| --- | ---
| seconds | Les secondes
| minutes | Les minutes
| hours | L’heure
| mday | Le numéro du jour dans le mois
| wday | Le numéro du jour de la semaine (dimanche = 0, lundi = 1, samedi = 6 pour nous)
| mon | Le numéro du mois (de 1 à 12)
| year | L’année complète
| yday | Le jour de l’année (1er janvier = 0, 2 janvier = 1, etc.)
| weekday | Le jour de la semaine sous forme de texte (en anglais)
| month | Le mois de l’année écrit en toutes lettres (en anglais)
| 0 | Le Timestamp relative à la date renvoyée

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
            echo 'Timestamp actuel : ' .time(). '<br>';
            $stt = strtotime('2019-01-25');
            echo 'Timestamp 25 janvier 2019 minuit (GMT+1) : ' .$stt. '<br>';
            
            echo '<pre>';
            print_r(getdate());
            echo '</pre><br>';
            
            echo '<pre>';
            print_r(getdate($stt));
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-obtenir-date-timestamp-getdate-resultat.png)

Nous allons apprendre à récupérer une date en PHP et à la formater pour la rendre lisible pour nous et nos visiteurs.

## La fonction PHP date() et les formats de date

La fonction PHP date() va nous permettre d’obtenir une date selon le format de notre choix.

Cette fonction va pouvoir prendre deux arguments. Le premier argument correspond au format de date souhaité et est obligatoire. Le deuxième argument est facultatif et va être un Timestamp relatif à la date qu’on souhaite retourner.

Si le Timestamp est omis, alors la fonction date() se basera sur la date courante du serveur.

Pour indiquer le format de date qu’on souhaite voir renvoyer à la fonction date(), nous allons lui passer une série de lettres qui vont avoir une signification spéciale.

Les caractères les plus couramment utilisés pour formater une date sont les suivants :
| Caractère | Signification
| --- | ---
| d | Représente le jour du mois en deux chiffres (entre 01 et 31)
| j | Représente le jour du mois en chiffres sans le zéro initial (de 1 à 31)
| D | Représente le jour de la semaine en 3 lettres (en anglais)
| l (L minuscule) | Représente le jour de la semaine en toutes lettres (en anglais)
| N | Représente le jour de la semaine en chiffre au format ISO-8601 (lundi = 1, dimanche = 7)
| w | Représente le jour de la semaine en chiffre (dimanche = 0, samedi = 6)
| z | Représente le jour de l’année de 0 (1er janvier) à 365
| W | Représente le numéro de la semaine au format ISO-8601 (les semaines commencent le lundi)
| m | Représente le mois de l’année en chiffres avec le zéro initial (de 01 à 12)
| n | Représente le mois de l’année de chiffres sans le zéro initial (de 1 à 12)
| M | Représente le mois en trois lettres en anglais (Jan, Feb…)
| F | Représente le mois en toutes lettres en anglais
| t | Représente le nombre de jours contenus dans le mois (de 28 à 31)
| Y | Représente l’année sur 4 chiffres (ex : 2019)
| y | Représente l’année sur 2 chiffres (ex : 19 pour 2019)
| L | Renvoie 1 si l’année est bissextile, 0 sinon
| a et A | Ajoute « am » ou « pm » (pour a) ou « AM » ou « PM » (pour A) à la date
| h | Représente l’heure au format 12h avec le zéro initial
| g | Représente l’heure au format 12h sans zéro initial
| H | Représente l’heure au format 24h avec le zéro initial
| G | Représente l’heure au format 24h sans le zéro initial
| i | Représente les minutes avec le zéro initial
| s | Représente les seconds avec le zéro initial
| v | Représente les millisecondes avec le zéro initial
| O et P | Indique la différence d’heures avec l’heure GMT sans deux points (pour O, ex : +0100) ou avec deux points (pour P, ex : +01:00)
| I (i majuscule) | Renvoie 1 si l’heure d’été est activée, 0 sinon
| c | Représente la date complète au format ISO 8601 (ex : 2019-01-25T12:00:00+01:00)
| r | Représente la date complète au format RFC 2822 (ex : Fri, 25 Jan 2019 12 :00 :00 +0100)
| Z | Représente le décalage horaire en secondes par rapport à l’heure GMT

Cela fait beaucoup de signes différents et bien évidemment personne ne vous demande de tous les retenir d’un coup. Contentez-vous de retenir et de comprendre que nous allons pouvoir grâce à ces caractères récupérer une date selon différents formats ce qui va être très pratique pour ensuite pouvoir travailler avec les dates.

Essayons d’utiliser ces caractères avec date() afin de renvoyer la date sous différents formats :

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
            echo date('d/m/Y'). '<br>';
            echo date('l d m Y h:i:s'). '<br>';
            echo date('c'). '<br>';
            echo date('r'). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fonction-date-resultat.png)

Il y a deux choses principales à noter ici : déjà, on va pouvoir séparer nos différents caractères de dates avec des tirets, des points, des slashs ou des espaces pour rendre une date plus lisible.

Ensuite, notez également qu’il faudra faire bien attention à la casse lorsqu’on définit un format d’heure puisque la plupart des caractères ont deux significations totalement différentes selon qu’on les écrit en minuscule ou en majuscule.

## Formater une date en PHP : la gestion du décalage horaire

Notez que la fonction date() formate une date localement, ce qui signifie que la date renvoyée va être la date locale (avec le décalage horaire). Si on souhaite retourner une date GMT, alors on utilisera plutôt la fonction gmdate() qui va s’utiliser exactement de la même manière.

Par ailleurs, il est également possible que la date renvoyée ne corresponde pas à celle de l’endroit où vous vous trouvez si le serveur qui héberge votre site se situe sur un autre fuseau horaire ou s’il a été paramétré sur un fuseau horaire différent du vôtre.

Pour régler ce problème, on peut utiliser la fonction date_default_timezone_set() en lui passant un fuseau horaire sous un format valide pour définir le fuseau horaire qui devra être utilisé pour les fonctions relatives à la date utilisées dans le script.

Le fuseau horaire qui va particulièrement nous intéresser va être Europe/Paris. Pour le liste complète des fuseaux horaires valides, je vous invite à lire la documentation officielle : http://php.net/manual/fr/timezones.php.
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
            echo date('d m Y h:i:s'). '<br>';
            echo gmdate('d-m-Y h:i:s'). '<br>';
            date_default_timezone_set('Europe/Moscow');//Moscou = GMT+3
            echo date('d m Y h:i:s'). '<br>';
            echo gmdate('d-m-Y h:i:s'). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-set-default-timezone-set-gmdate-resultat.png)

Ici, on modifie notre fuseau horaire de référence pour prendre celui de Moscou au milieu de notre code. Le résultat de la fonction date() appelée ensuite va donc être différent de précédemment.

Rappelez-vous bien ici que le code est lu linéairement dans notre script, c’est-à-dire ligne après ligne. Il faudra donc bien faire attention à l’endroit où on définit les fonctions comme date_default_timezone_set() afin d’avoir les résultats attendus.

## Transformer une date en français

Par défaut, les dates vont être renvoyées en anglais par la plupart des serveurs. Pour transformer une date en anglais vers du français, nous avons plusieurs solutions mais une est recommandée par les éditeurs du PHP : l’utilisation des fonctions setlocale() et strftime().

La fonction setlocale() va nous permettre de modifier et de définir de nouvelles informations de localisation. On va déjà pouvoir passer une constante à cette fonction qui va définir les données qui doivent être définies localement : la comparaison de chaines de caractères, la monnaie, les chiffres et le séparateur décimal, les dates ou tout cela à la fois.

Dans notre cas, nous allons nous contenter de modifier les informations de localisation pour le format de date et d’heure et allons pour cela utiliser la constante LC_TIME.

En plus de la constante, il va falloir passer un tableau en deuxième argument de setlocale() qui va nous permettre de choisir la langue souhaitée pour nos informations de localisation.

Notez que la valeur « correcte » du deuxième argument censé déterminer la langue va pouvoir être différente d’un système d’opérations à l’autre car celle-ci n’est pas standardisée. Pour le Français par exemple certains systèmes vont utiliser fr, d’autres fr_FR ou d’autres encore fra.

Par sécurité, on va donc indiquer un maximum de valeurs dans ce tableau : la fonction setlocale() sélectionnera ensuite la première qui est reconnue.

Avec setlocale(), nous avons défini des informations de localisation. Cependant, les fonctions date() et strtotime() par exemple vont ignorer ces informations et continuer de travailler uniquement en anglais.

La seule fonction relative à la date qui supporte la localisation en PHP est la fonction strftime() et c’est donc celle que nous allons utiliser avec setlocale().

Nous allons passer à cette fonction des caractères qui vont représenter des parties de date, de la même façon qu’on avait pu le faire avec la fonction date().

Attention cependant : les caractères ne vont pas forcément être les mêmes et signifier la même chose que pour date() et nous allons cette fois-ci devoir les préfixer avec un %.
| Caractère | Signification
| --- | --
| %a | Représente le jour de la semaine en trois lettres en anglais
| %A | Représente le jour de la semaine en toutes lettres en anglais
| %u | Représente le jour de la semaine en chiffre au format ISO-8601 (lundi 1, dimanche = 7)
| %w | Représente le jour de la semaine en chiffre (dimanche = 0, samedi = 6)
| %d | Représente le jour du mois en deux chiffres (entre 01 et 31)
| %j | Représente le jour de l’année avec les zéros de 001 à 366
| %U | Représente le numéro de la semaine de l’année en ne comptant que les semaines pleines
| %V | Représente le numéro de la semaine de l’année en suivant la norme ISO-8601 (si au moins 4 jours d’une semaine se situent dans l’année alors la semaine compte)
| %m | Représente le mois sur deux chiffres de 01 à 12
| %b | Représente le nom du mois en lettres en abrégé
| %B | Représente le nom complet du mois
| %y | Représente l’année sur deux chiffres
| %Y | Représente l’année sur 4 chiffres
| %H | Représente l’heure, de 00 à 23
| %k | Représente l’heure de 0 à 23
| %I (i majuscule) | Représente l’heure de 01 à 12
| %M | Représente les minutes de 00 à 59
| %S | Représente les secondes de 00 à 59
| %T | Identique à %H:%M:%S
| %D | Identique à %m/%d/%y
| %x | Représente la date sans l’heure au format préféré en se basant sur la constant locale
| %c | Affiche la date et l’heure basées sur la constant locale
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
            echo strftime('%A %d %B %Y %I:%M:%S'). '<br>';
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            echo strftime('%A %d %B %Y %I:%M:%S'). '<br>';
            echo strftime('%x'). '<br>';
            echo strftime('%T'). '<br>';
            echo strftime('%c'). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-date-france-setlocale-strftime-resultat.png)

Nous allons comprendre les défis de la comparaison de deux dates et allons voir comment les contourner. Nous apprendrons également à tester la validité d’une date.

## La comparaison de dates en PHP

La comparaison de dates est une chose difficile en informatique et particulièrement en PHP.

La raison principale à cela est qu’une date peut être écrite sous de multiples formats : soit tout en chiffres, soit tout en lettres, soit avec un mélange de chiffres et de lettres, avec les mois avant ou après les jours, etc.

Lorsqu’on utilise un opérateur de comparaison, les deux opérandes (ce qui se situe d’un côté et de l’autre de l’opérateur) vont être comparés caractère par caractère. Cela rend impossible la comparaison de dates dont le format n’est pas strictement identique ainsi que la comparaison de dates écrites avec des lettres.

Nous allons donc ici généralement privilégier la comparaison des Timestamp liés aux dates puisque les Timestamp sont des nombres et qu’il est très facile de comparer deux nombres en PHP.

On va donc procéder en deux étapes : on va déjà commencer par récupérer les Timestamp liés aux dates qu’on souhaite comparer avec une fonction comme strtotime() par exemple puis on va comparer les Timestamp.

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
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            
            $d1 = '25-01-2019';
            $d2 = '30-June 2018';
            $tmstp1 = strtotime($d1);
            $tmstp2 = strtotime($d2);
            
            $dfr1 = strftime('%A %d %B %Y', $tmstp1);
            $dfr2 = strftime('%A %d %B %Y', $tmstp2);
            
            if($tmstp1 < $tmstp2){
                echo 'Le ' .$dfr1. ' est avant le ' .$dfr2;
            }elseif($tmstp1 == $tmstp2){
                echo 'Les deux dates sont les mêmes';
            }else{
                 echo 'Le ' .$dfr2. ' est avant le ' .$dfr1;
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-comparaison-date-timestamp-resultat.png)
 
## La validation de dates : en quoi est-ce utile ?

Jusqu’à présent, nous n’avons travaillé qu’en local, c’est-à-dire sur nos propres machines et pour nous-mêmes. Comme nous créons et testons nos codes nous-mêmes, nous n’avons aucun problème de sécurité / validité.

Cependant, l’objectif reste de pouvoir par la suite créer de véritables sites dynamiques, avec des formulaires, des espaces clients, etc. Dans ces cas-là, bien souvent, vous allez demander aux utilisateurs de vous envoyer des données.

Cela va être par exemple le cas si vous créez un formulaire d’inscription sur votre site, ou si vous possédez un site marchand. Vous demanderez alors certainement les nom, prénom, adresse mail, numéro de téléphone, date de naissance, etc. des utilisateurs.

Il va alors falloir être très précautionneux car vous ne devez jamais vous attendre à recevoir des données valides de la part de vos utilisateurs.

En effet, certains vous faire des fautes, d’autres seront étourdis, d’autres encore vont refuser de remplir certaines données et un petit pourcentage va même potentiellement être composé d’utilisateurs mal intentionnés qui essaieront d’exploiter des possibles failles dans votre site, en tenant de vous envoyer (ou “injecter”) des bouts de code par exemple.

Pour ces raisons, nous testerons et traiterons toujours les informations envoyées par nos utilisateurs, et notamment les dates.

## Tester la validité d’une date

La manière la plus robuste de vérifier la validité d’une date en PHP est d’utiliser la fonction checkdate() qui a été créée dans ce but précis.

Cette fonction va accepter trois chiffres en arguments : le premier représente le mois de la date à tester, le deuxième représente le jour et le troisième représente l’année.

Pour que la date soit considérée valide, elle devra remplir les critères suivants :

- Le mois doit être compris entre 1 et 12 ;
- Le jour doit être un jour autorisé par le mois donné (le 30 février, le 31 avril ou le 45 juin seront considérés invalides par exemple). Notez que les années bissextiles sont prises en compte ;
- L’année doit être comprise entre l’an 1 et l’an 32767.

Si checkdate() valide la date passée, alors elle renverra le booléen true. Dans le cas contraire, elle renverra false.

Notez bien ici que cette fonction va nous permettre d’écarter les valeurs aberrantes de dates, c’est-à-dire les dates qui n’existent pas dans le calendrier mais ne va bien évidemment pas nous permettre de vérifier la cohérence d’une date.

Si vous avez un formulaire demandant la date de naissance des utilisateurs sur votre site, par exemple, ce sera à vous d’ajouter des contraintes sur la date de naissance pour écarter par exemple les dates de naissance fantaisistes comme les dates dans le futur ou les dates avant 1900.
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
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            
            if(checkdate(1,25,2019)){
                echo 'Le 25 janvier 2019 est une date valide <br>';
            }
            if(checkdate(1,35,2019)){
                echo 'Le 35 janvier 2019 est une date valide <br>';
            }
            if(checkdate(2,29,2015)){
                echo 'Le 29 février 2015 est une date valide <br>';
            }
            if(checkdate(2,29,2016)){
                echo 'Le 29 février 2016 est une date valide <br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-validite-date-test-checkdate-resultat.png)

Ici, on teste différentes dates avec checkdate(). Si la date passée à checkdate() est validée par la fonction, alors la fonction renvoie la date et le test de notre condition va être validé et on va donc echo la date formatée localement grâce à setlocale().

## Tester la validité d’un format de date locale

On va également pouvoir vérifier si un format de date locale nous convient, c’est-à-dire vérifier la validité d’une date générée par la fonction strftime() en utilisant cette fois-ci la fonction strptime().

On va passer la chaine de type date renvoyée par strftime() à la fonction strptime() ainsi que le format de date utilisé par strftime().

La fonction strptime() va alors soit retourner un tableau contenant les différentes informations liées à la date si celle-ci a été jugée valide, soit la valeur false en cas d’erreur sur la date.

Si la date est validée, le tableau renvoyé sera de la forme suivante :
| Type de données | Signification
| --- | ---
| tm_sec | Représente les secondes
| tm_min | Représente les minutes
| tm_hour | Représente l’heure de 0 à 23
| tm_mday | Le jour du mois en chiffres sans le zéro initial
| tm_mon | Représente le mois sous forme de chiffres (janvier = 0, décembre = 11)
| tm_year | Le nombre d’années écoulées depuis 1900
| tm_wday | Le numéro du jour de la semaine (Dimanche = 0, Samedi= 6)
| tm_yday | Le jour de l’année en chiffres (1er janvier = 0)
| unparsed | La partie de la date qui n’a pas été reconnue

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
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            
            $format1 = '%A %d %B %Y %H:%M:%S';
            $format2 = '%H:%M:%S';
            
            $date1 = strftime($format1);
            $date2 = strftime($format1);
            $date3 = strftime($format2);
            
            echo $date1. '<br>' .$date2. '<br>' .$date3. '<br>';
            
            if(strptime($date1, $format1)){
                echo '<pre>';
                print_r(strptime($date1, $format1));
                echo '</pre><br>';
            }
            if(strptime($date2, '%A %d %B %Y')){
                echo '<pre>';
                print_r(strptime($date2, '%A %d %B %Y'));
                echo '</pre><br>';
            }
            if(strptime($date3, '%A %d %B %Y')){
                echo '<pre>';
                print_r(strptime($date3, '%A %d %B %Y'));
                echo '</pre>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-validite-format-date-locale-strptime-resultat.png)

Ici, on commence par définir une constante de date locale avec setlocale() puis on définit les formats de date %A %d %B %Y %H:%M:%S et %H:%M:%S qu’on va passer à strftime().

On demande ensuite à strftime() de nous renvoyer trois dates en utilisant nos différents formats et on place les résultats dans trois variables $date1, $date2 et $date3 pour bien voir avec quelles dates on travaille.

On crée ensuite trois conditions. Dans notre première condition, on appelle strptime() en lui passant notre variable $date1 et le même format que celui utilisé avec strftime()

La date contenue dans $date1 est la date courante et les formats utilisés sont les mêmes pour strftime() et strptime(). Toutes les informations de date vont bien être affichées.

Dans notre deuxième condition, en revanche, on passe un format de date différent à strptime(). Ici, seuls les éléments communs aux formats passés à strftime() et à strptime() seront renvoyés dans les « bons » éléments du tableau créé par strptime(). Le reste de la date sera associé à la clef unparsed car non reconnu.

Finalement, on utilise un format totalement différent pour tester notre troisième date. Ici, une erreur va être renvoyée et donc strptime() va renvoyer false et le test de notre condition va échouer.

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

## Ajouter des secondes à une date donnée

> Des scientifiques délirants cherchent à découvrir la date qu'il sera dans 9 gigasecondes (1 000 000 000 secondes ou 10^9 secondes). Aidez-les avec une fonction !

Créez une fonction qui prend en paramètre une date au format "YYYY-MM-DD" et qui ajoute 9 gigasecondes à cette date.

Étapes :

1. Déclarez une fonction qui prend une string au format `YYYY-MM-DD`
2. Dans la fonction, créez un objet DateTime à partir de la date en argument de la fonction : `$object = new DateTime($date)`
3. Cet objet DateTime est une date "évoluée" avec plein de méthodes pour travailler sur les dates !
4. Récupérez le timestamp de l'objet (trouvez comment récupérer le timestamp d'un objet DateTime)
5. Ajoutez à ce timestamp 9 gigasecondes (1 000 000 000 secondes)
6. Changez le timestamp de votre objet DateTime en lui donnant la nouvelle valeur avec : $object->setTimestamp($nouvelleValeur)`
7. Retournez l'objet au format `YYYY-MM-DD` (trouvez comment retourner la date d'un DateTime dans un format précis)

<details>
  <summary>Spoiler warning</summary>

```php
function addNineGigaseconds(string $date) {
    
    // On créée un objet DateTime qui nous permet de manipuler
    // des dates facilement
    $dateObject = new DateTime($date);

    // On prépare notre variable gigasecond
    // $gigasecond = pow(10,9);
    // $gigasecond = 10e9;
    $gigasecond = 1000000000;

    // On récupère le timestamp de la date donnée (en secondes)
    $givenDateTimestamp = $dateObject->getTimestamp();

    // On ajoute la gigaseconde à la date donnée
    $newDateTimestamp = $givenDateTimestamp + $gigasecond;

    // On modifie l'objet DateTime avec le nouveau timestamp
    $dateObject->setTimestamp($newDateTimestamp);

    // On prépare la nouvelle date au format Y-m-d
    $format = $dateObject->format('Y-m-d');

    // On retourne la nouvelle date
    return $format;
}
```

#### Solution 2 : version procédurale (sans POO)

```php
function dateAddSeconds(string $date) {
    // avec strtotime(), on récupère le timestamp d'une date donnée en string
    // intval pour n'avoir que des nombres
    $date = intval(strtotime($date));
    
    // On retourne la date avec la fonction date() et son deuxième paramètre qui permet de préciser un timestamp
    return date("Y-m-d", $date += pow(10, 9));
}
```

</details>
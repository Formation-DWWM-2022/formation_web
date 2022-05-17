# PostgreSQL et pgadmin

PostgreSQL est une base de données relationnelle et objet (SGBDO) libre. Cette page synthétise son processus d’installation sur Windows via un package EntrepriseDB.

## Ressources

Les versions 10 et inférieures de PostgreSQL sont compatibles avec Windows 32-bit et 64-bit. Depuis la version 11, PostgreSQL n’est compatible qu’avec la version 64-bit (voir le site PostgreSQL.org).

La version 12.X utilisée dans cette installation est disponible sur EntrepriseDB.com.

L’installeur inclut le serveur PostgreSQL, pgAdmin (une interface graphique pour gérer vos bases de données) et Stack Builder (un gestionnaire de packages pour installer et utiliser des outils, extensions et drivers PostgreSQL additionnels).

Une fois l’installeur pour la version de PostgreSQL de votre choix téléchargé, lancez-le : https://www.enterprisedb.com/downloads/postgres-postgresql-downloads

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_02-install_home-1.png)

## Répertoire d’installation

Spécifiez l’emplacement du répertoire d’installation de votre choix. Je recommande l’utilisation du répertoire C:\Serveurs\PostgreSQL.
Cliquer sur Suivant pour poursuivre l’installation.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_03-install_directory.png)

## Sélection des composants

L’assistant d’installation vous propose quatre composants (dans d’anciennes versions de l’installeur, par exemple PostgreSQL 9.X, cet écran peut intervenir plus tard voire être absent) :

- PostgreSQL Server (le serveur PostgreSQL)
- pgAdmin 4 (l’interface graphique via page web pour gérer vos bases de données)
- Stack Builder (nécessaire à l’installation et l’activation d’extensions, comme PostGIS)
- Command Line Tools (outils pour manipuler PostgreSQL avec une console de commande)

Nous laissons ces quatre cases cochées pour la présente installation. Cliquez sur Suivant.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_04-install-composants.png)

## Répertoire d’installation des données (cluster)

Ne modifiez pas l’emplacement proposé par défaut (ici C:\Serveurs\PostgreSQL\[votre numéro de version]\data). Cliquez sur Suivant pour poursuivre l’installation.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_05-install-donnees.png)

## Mot de passe

Indiquez ensuite, le mot de passe du super utilisateur postgres de la base de données. Il est conseillé d’utiliser un mot de passe fort si vous installez PostgreSQL dans un environnement de production. Il est indispensable de conserver ce mot de passe.

Cliquer sur Suivant.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_06-install-mdp.png)

## Port

Indiquez ensuite le numéro de port. Par défaut, il s’agit du 5432 (s’il est libre). Poursuivez en cliquant sur Suivant.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_07-install-port.png)

## Options avancées

Vous pouvez sélectionner ici le nouveau cluster de bases de données.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_08-install-options-avancees.png)

## Installation prête

Un dernier écran fournit un résumé de l’installation (répertoires, port, etc.). Notez que c’est ici que vous pouvez prendre connaissance du nom du super-utilisateur : postgres. En cliquant sur Suivant, vous lancerez l’installation. Celle-ci peut prendre plusieurs minutes.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_09-install-resume.png)

## Fin de l’installation

L’installation est terminée.

Une fenêtre vous invitera à lancer Stack Builder si vous souhaitez installer dès maintenant une extension, comme PostGIS. Il est toutefois conseillé de décocher cette case, de faire quelques tests et de vérifier la bonne installation de PostgreSQL avant cela (voir étape 10).

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_10-install-fin.png)

Félicitations, vous venez d’installer PostgreSQL !

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_09-fin-postgre.png)

## Erreurs possibles

    Librairie incompatible

Selon la version de l’OS utilisée, il est possible que le message d’erreur signifiant une incompatibilité de librairie apparaisse en cours d’installation de PostgreSQL. Dans ce cas, supprimer le fichier C:\WINDOWS\LIBEAY32.DLL.

Une nouvelle version de ce fichier est automatiquement installée avec PostgreSQL.

    Utilisateur réseau

Si un nom de domaine réseau est spécifié sur l’écran de saisie du nom d’utilisateur, il est possible d’obtenir une erreur. Ce message apparaît si l’utilisateur n’existe pas dans le domaine spécifié. Dans ce cas, il est nécessaire de créer préalablement l’utilisateur avec l’outil adéquat (Active Directory par exemple).

## Tests

    Consultation des services

Une fois l’installation terminée, ouvrir le gestionnaire de services Windows (services.msc) et vérifier la présence du service ‘PostgreSQL Database Server [votre numéro de version]’. Le service est paramétré par défaut pour démarrer automatiquement.

    pgAdmin 4

L’installation de PostgreSQL procède aussi à l’installation de pgAdmin 4 (si laissé coché à l’étape 2). Lancez pgAdmin à partir du menu Démarrer de votre système.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_15-pgadmin.jpg)

Dans le navigateur (partie gauche de l’application), la connexion au serveur local est déjà enregistrée. Double-cliquez dessus et saisir le mot de passe de l’utilisateur postgres.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_16-pgAdmin-mdp.jpg)

Si le serveur fonctionne correctement, vous pouvez consulter la liste des bases, des tablespaces, etc.

![image](https://www.veremes.com/wp-content/uploads/postgreSQL_Windows_17-pgAdmin-connexion-1024x455.jpg)

Vous pouvez tester davantage : pour cela, il suffit de créer un nouveau serveur (Objetct > Create > Server) en renseignant les informations de connexion à la base de données « postgres » créée par défaut (ces informations sont à renseigner dans l’onglet « Connection »).

    Host : localhost
    Maintenance database : postgres
    Username : postgres
    Password : [mot de passe renseigné lors de l’installation]

Si vous arrivez à vous connecter, l’installation est correctement effectuée.
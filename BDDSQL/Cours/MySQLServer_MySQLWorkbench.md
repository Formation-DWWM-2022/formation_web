# MySQL Server et MySQL Workbench
Il existe 2 version de MySQL:
- MySQL Cummunity: La version gratuite. (Nous allons installer cette version).
- MySQL Enterprise Edition: La version commerciale. 

MySQL Community, après avoir été téléchargé et installé complètement, inclut les pièces les plus importantes:
- MySQL Server
- MySQL Workbench (Un outil virtuel pour apprendre et travailler avec MySQL)

Pour télécharger MySQL Community,allez à l'adresse : http://dev.mysql.com/downloads/

![image](https://s1.o7planning.com/fr/10221/images/20529.png)
![image](https://s1.o7planning.com/fr/10221/images/20524.png)
![image](https://s1.o7planning.com/fr/10221/images/20531.png)

Le résultat de téléchargement :
![image](https://s1.o7planning.com/fr/10221/images/20553.png)

## Install MySQL Community
![image](https://s1.o7planning.com/fr/10221/images/20709.png)
![image](https://s1.o7planning.com/fr/10221/images/20711.png)

Sélectionnez tout, y compris l'exemple de base de données (à des fins d'étude).
![image](https://s1.o7planning.com/fr/10221/images/20713.png)

Cliquez sur les bibliothèques requises et cliquez sur le bouton "Execute".
![image](https://s1.o7planning.com/fr/10221/images/21283524.png)
![image](https://s1.o7planning.com/fr/10221/images/21284005.png)
![image](https://s1.o7planning.com/fr/10221/images/21284204.png)
![image](https://s1.o7planning.com/fr/10221/images/20717.png)

L'installeur affiche une liste de packages à installer.
![image](https://s1.o7planning.com/fr/10221/images/20719.png)
![image](https://s1.o7planning.com/fr/10221/images/20721.png)

L'installeur continue à la section de configuration du MySQL Server.
![image](https://s1.o7planning.com/fr/10221/images/20723.png)
![image](https://s1.o7planning.com/fr/10221/images/20725.png)
![image](https://s1.o7planning.com/fr/10221/images/21284731.png)
![image](https://s1.o7planning.com/fr/10221/images/21284820.png)
![image](https://s1.o7planning.com/fr/10221/images/20729.png)
![image](https://s1.o7planning.com/fr/10221/images/20731.png)
![image](https://s1.o7planning.com/fr/10221/images/21285092.png)
![image](https://s1.o7planning.com/fr/10221/images/20733.png)
![image](https://s1.o7planning.com/fr/10221/images/20735.png)

Continuez la configuration pour des exemples de la base de données:
![image](https://s1.o7planning.com/fr/10221/images/20737.png)
![image](https://s1.o7planning.com/fr/10221/images/21285417.png)

Saisissez le mot de passe et cliquez sur Check pour tester la connexion avec MySQL.
![image](https://s1.o7planning.com/fr/10221/images/20739.png)
![image](https://s1.o7planning.com/fr/10221/images/20741.png)
![image](https://s1.o7planning.com/fr/10221/images/20743.png)
![image](https://s1.o7planning.com/fr/10221/images/20745.png)

Cliquez sur Finish pour terminer l'installation.
![image](https://s1.o7planning.com/fr/10221/images/20747.png)

## Configure MySQL
La connexion avec MySQL à partir d'un autre ordinateur peut être bloquée. Vous devez le configurer pour que l'autre ordinateur puisse se connecter à votre MySQL.
![image](https://s1.o7planning.com/fr/10221/images/20807.png)
![image](https://s1.o7planning.com/fr/10221/images/20809.png)
![image](https://s1.o7planning.com/fr/10221/images/20811.png)

Notre objectif est d'attribuer l'autorisation d'accéder à MySQL à un user à partir de n'importe quelle adresse IP.

Syntax :
```GRANT ALL ON *.* to myuser@'%' IDENTIFIED BY 'mypassword';```

Note: The 'root' user is available after installing MySQL.
```GRANT ALL ON *.* to root@'%' IDENTIFIED BY '12345';```

![image](https://s1.o7planning.com/fr/10221/images/20813.png)
La réussite de la subvention.
![image](https://s1.o7planning.com/fr/10221/images/20815.png)

## Using MySQL Workbench
Ouvrez MySQL Workbench:
![image](https://s1.o7planning.com/fr/10221/images/20763.png)
![image](https://s1.o7planning.com/fr/10221/images/20765.png)
![image](https://s1.o7planning.com/fr/10221/images/20767.png)

L'image de MySQL Workbench.
![image](https://s1.o7planning.com/fr/10221/images/20769.png)
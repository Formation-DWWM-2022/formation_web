## Lecture de fichiers [35 min] -> Q/R

<https://grafikart.fr/tutoriels/file-get-contents-1125#autoplay>

## Écriture de fichiers [16 min] -> Q/R

<https://grafikart.fr/tutoriels/file-put-contents-1126#autoplay>

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

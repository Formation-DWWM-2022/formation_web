### Exo 17

Ecrire un script php qui  permet de lire des nombres décimaux à partir d'un fichier texte nommé "decimal.txt",  et stocke leurs équivalents en binaire dans un autre fichier "binaire.txt".

        La fonction base_convert permet de convertir un nombre d'une base à une autre :
            base_convert(nombre,frombase,tobase);

```php
//tester l’existence du fichier 
if(file_exists("decimal.txt")){
    //ouverture du fichier decimal.txt en mode lecture.
    $fd = fopen("decimal.txt","r");
    //ouverture du fichier binaire.txt en mode écriture (en cas d’inexistence il sera créer).
    $fb=fopen("binaire.txt","w");
    while (!feof($fd)) {//parcourir les lignes du fichier décimal.txt
            $d=fgets($fd,30); //récupérer le contenu de la ligne.
            echo "$d<br>";//afficher le contenu (le nombre)
            $b=base_convert($d,10,2);// convertir le nombre en binaire
            fputs($fb,$b."\n");//stocker l'équivalent binaire dans le fichier binaire.txt
    }
    //fermeture des fichiers.
    fclose($fd);
    fclose($fb);
}else{
    echo "Echec de l'ouverture du fichier"; exit;
}
```

### Exo 18

On souhaite mettre en place un espace qui permet à des adhérents de déposer des images sur le serveur Web .

- Créer une page upload.php qui permet de choisir une image et  la transférer vers un dossier nommé "images"  sur le  serveur.
  - N'autorisez que les extensions des images ('jpg', 'gif', 'png').
  - Après l'envoi on récupère le fichier , on le stocke dans le dossier "images" et on affiche un message de confirmation.n En cas d'erreurs on affiche un message d'erreur approprié.
- Le lien "Consulter les images" envoie vers la page "galerie.php" qui liste les images contenues dans le dossier « images » , avec la date de création et la taille de chaque image:
- Utiliser les fonctions suivantes : opendir ,readdir,filesize,filectime

```php
<html>
<head>
    <title>Upload dimages</title>
    <meta charset="utf-8">
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <p>
        Formulaire denvoi de fichier :<br />
        <input type="file" name="image" /><br /><br />
        <input type="submit" value="Envoyer le fichier" name="submit"/>
    </p>
</form>
<?php
if(isset($_POST ["submit"])){
    // Tester si le fichier a été envoyé sans erreur
    if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
        // Tester la taille du fichier
        if ($_FILES['image']['size'] <= 1000000)
        {
            // Tester si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['image']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
                // stocker le fichier définitivement dans le dossier "image"

                move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . basename($_FILES['image']['name']));
                echo "L'envoi a bien été effectué !<br>";
            }
            else{
                echo "Erreur :Extension non autorisée.<br>";
            }
        }
        else{
            echo "le fichier est trop gros<br>";
        }
    }else{
        echo "Erreur  d'envoi<br>";
    }
}
?>
<a href="/galerie.php">Consulter les images</a>
</body>
</html>
```

```php
<html>
<head>
 <title>galeri</title>
 <meta charset="utf-8">
 <style type="text/css">
 /* style  css pour la mise en page des articles */
    div{
        display: inline-block;
        text-align: center;
        margin: 15px;
    }
    img{
    width: 200px;
    height: 200px;
    }
 </style>
</head>
<body>

</body>
</html>
<?php
if(is_dir("images")){
    $rep=opendir('images');

    while ($fichier = readdir($rep)){ 
        if($fichier!="." && $fichier!="..")
            echo '<div><img src="/images/'.$fichier.'" /><p> la taille :'.filesize("images/".$fichier).' bytes <p> la date de creation '.date("d-m-y h:m:s",filectime(("images/".$fichier))).'</p></p></div>';
 
    }
    closedir($rep);
}else{
    echo "dossier introuvable";
}
```

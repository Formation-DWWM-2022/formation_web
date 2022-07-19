## Exo 19

Ecrire un script php qui permet de sauvegarder les heures de visites dans un cookie , et affiche les détails de visites comme suit :
Pour la première visite :

![image](https://user-images.githubusercontent.com/46321539/156780765-db7f353b-aac2-47e5-b974-9f45dea64d3f.png)

Par la suite affiche la liste des heures :

![image](https://user-images.githubusercontent.com/46321539/156780811-9bca414b-1d97-4808-91ff-cf841135d26f.png)

```php
// On vérifie si le cookie a été reçu dans la superglobale $_COOKIE.
  
if(isset($_COOKIE["dates_visites"])){
    //On ne peut stocker que les chaines de caractères dans un cookie
    $liste_visites =$_COOKIE["dates_visites"];
    //Décoder la chaine liste_visites pour obtenir le tableau des dates
    $dates=unserialize($_COOKIE["dates_visites"]);
    //Ajouter la date actuelle
    $dates[]=time();
    //renvoyer le cookie avec sa nouvelle valeur , pour cela on sérialise le tableau
    setcookie("dates_visites",serialize($dates));
    //Afficher Les dates de visites stockées dans le tableau $dates
    echo " Vous avez consulté cette page ".count($dates)." fois , voici les détails:";
    echo "<ul>";
    foreach ($dates as $key => $value) {
        echo "<li>".date("d-m-Y H:i:s",$value)."</li>";
    }
    echo "</ul>";
}else{ //Le cookie n’a pas été reçu
    //Créer un tableau $dates initialisé par la date actuelle
    $dates[]=time();
    //envoyer le cookie en sérialisant le tableau
    setcookie("dates_visites",serialize($dates));
    echo "C'est votre première visite :".date("d-m-Y H:i:s",time());
}
```

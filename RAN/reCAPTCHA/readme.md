# Intégrer Google reCAPTCHA sur votre site

Si vous possédez un site web, vous y proposez certainement un formulaire de contact qui permet à vos visiteurs de vous envoyer un message directement, sans quitter le site et sans connaître votre adresse e-mail.

Le gros inconvénient de ce formulaire de contact réside dans le fait qu'il s'agit d'une porte d'entrée pour les spams en tous genres, qui peuvent rapidement remplir votre boîte mail.

Pour éviter de perdre votre temps à trier ces nombreux e-mails, il existe plusieurs solutions, comme le Captcha, par exemple, qui demande de recopier un code, ou la case "Je ne suis pas un robot".

# Google reCAPTCHA : comment ça marche ?

La plupart des spams sont envoyés par des robots, scripts automatiques qui parcourent les sites à la recherche de formulaires. Lors de la soumission du formulaire, la plupart des robots ne passent pas par la page elle même et soumettent donc le formulaire directement.

Une première vérification permet de savoir que le formulaire n'a jamais été affiché.

Certains robots affichent le formulaire mais n'ont pas un comportement "humain", ils sont trop rapides, trop systématiques, ne bougent pas la souris, autant de critères qui permettent de les détecter.

Google reCAPTCHA détecte ces comportements et déduit si le visiteur est humain ou non.

# Créer le formulaire de base

Un formulaire de contact de base contiendra, par exemple, le code suivant

```html
<form action="traitement.php" method="post">
    <p>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
    </p>
    <p>
        <label for="sujet">Sujet :</label>
        <input type="text" name="sujet" id="sujet">
    </p>
    <p>
        <label for="email">E-mail :</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="message">Message :</label>
        <textarea name="message" id="message"></textarea>
    </p>
    <button>Envoyer</button>
</form>
```

Ce formulaire enverra l'information au fichier "traitement.php", mais sera vulnérable aux spams.

# Traiter le formulaire

Notre fichier "traitement.php" permettra comme son nom l'indique de traiter le formulaire. Ce traitement, dans cet exemple, n'enverra pas de mail mais confirmera l'envoi, pour simuler le fonctionnement.

```php
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // On vérifie que tous les champs sont remplis
    if(
        isset($_POST['nom']) && !empty($_POST['nom']) &&
        isset($_POST['sujet']) && !empty($_POST['sujet']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['message']) && !empty($_POST['message'])
    ){
        // On "nettoie" le contenu
        $nom = strip_tags($_POST['nom']);
        $sujet = strip_tags($_POST['sujet']);
        $email = strip_tags($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Ici vous devrez traiter les données

        echo " Message de {$nom} envoyé";

    }

}else{
    http_response_code(405);
    echo "Méthode non autorisée";
}
```

# Mettre en place Google reCAPTCHA

Nous allons tout d'abord devoir créer un compte sur la plateforme Google reCAPTCHA.

Une fois le compte créé, vous pouvez accéder à la console d'administration qui ressemble à l'écran ci-dessous

![](https://nouvelle-techno.fr/assets/uploads/content/a58af75b78361e7cd467affd8dabfce4.png)

Cliquez sur le "+" en haut à droite pour enregistrer un nouveau site et remplissez le formulaire en sélectionnant la V3.

Lorsque vous cliquez ensuite sur "Envoyer", vous verrez apparaître deux clés, l'une publique (clé du site), l'autre privée (clé secrète)

![](https://nouvelle-techno.fr/assets/uploads/content/46c24066a77ef4f66181d6ec5edf423f.png)

Ces clés nous permettront de faire fonctionner Google reCAPTCHA

Nous allons effectuer quelques modifications dans notre code pour mettre en place l'antispam.

# Le formulaire

Du côté du formulaire, nous allons avoir quelques modifications à effectuer.

La première sera l'ajout d'un champ caché qui contiendra une clé de validation envoyée par Google.

```html
<input type="hidden" id="recaptchaResponse" name="recaptcha-response">
```

Après notre formulaire nous ajouterons également le code javascript permettant de lancer la vérification

```html
<script src="https://www.google.com/recaptcha/api.js?render=ICI_LA_CLE_DU_SITE"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('ICI_LA_CLE_DU_SITE', {action: 'homepage'}).then(function(token) {
        document.getElementById('recaptchaResponse').value = token
    });
});
</script>
```

# Le traitement

Ensuite, dans le traitement, nous allons vérifier si ce champ est vide avant de continuer. Le fichier "traitement.php" contiendra donc ceci

```php
<?php

// On vérifie que la méthode POST est utilisée
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // On vérifie si le champ "recaptcha-response" contient une valeur
    if(empty($_POST['recaptcha-response'])){
        header('Location: index.php');
    }else{
        if(
            isset($_POST['nom']) && !empty($_POST['nom']) &&
            isset($_POST['sujet']) && !empty($_POST['sujet']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['message']) && !empty($_POST['message'])
        ){
            // On nettoie le contenu
            $nom = strip_tags($_POST['nom']);
            $sujet = strip_tags($_POST['sujet']);
            $email = strip_tags($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Ici vous traitez vos données

            echo "Message de {$nom} envoyé";
        }
    }
}else{
    http_response_code(405);
    echo 'Méthode non autorisée';
}
```

Nous devons également vérifier que la réponse de Google reCAPTCHA est un succès.

Pour ce faire, nous devons interroger l'URL suivante

```
https://www.google.com/recaptcha/api/siteverify?secret=VOTRE_CLE_SECRETE&response=REPONSE_DE_GOOGLE
```

Nous pouvons interroger cette url de deux façons. Avec CURL ou avec la méthode file_get_contents.

Nous utiliserons de préférence CURL, de la façon suivante

```php
// On prépare l'URL
$url = "https://www.google.com/recaptcha/api/siteverify?secret=6Ldw_9oUAAAAAMyZp2-qjvJX4xfRMEYvzS8DwSMy&response={$_POST['recaptcha-response']}";

// On vérifie si curl est installé
if(function_exists('curl_version')){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($curl);
}else{
    // On utilisera file_get_contents
    $response = file_get_contents($url);
}
```

Nous vérifions ensuite si nous avons une réponse et si elle est positive

```php
// On vérifie qu'on a une réponse
if(empty($response) || is_null($response)){
    header('Location: index.php');
}else{
    $data = json_decode($response);
    if($data->success){
        // Google a répondu avec un succès
        // On traite le formulaire
    }else{
        header('Location: index.php');
    }
}
```

Le fichier "traitement.php" final sera donc le suivant

```php
<?php

// On vérifie que la méthode POST est utilisée
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // On vérifie si le champ "recaptcha-response" contient une valeur
    if(empty($_POST['recaptcha-response'])){
        header('Location: index.php');
    }else{
        // On prépare l'URL
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Ldw_9oUAAAAAMyZp2-qjvJX4xfRMEYvzS8DwSMy&response={$_POST['recaptcha-response']}";

        // On vérifie si curl est installé
        if(function_exists('curl_version')){
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
        }else{
            // On utilisera file_get_contents
            $response = file_get_contents($url);
        }

        // On vérifie qu'on a une réponse
        if(empty($response) || is_null($response)){
            header('Location: index.php');
        }else{
            $data = json_decode($response);
            if($data->success){
                if(
                    isset($_POST['nom']) && !empty($_POST['nom']) &&
                    isset($_POST['sujet']) && !empty($_POST['sujet']) &&
                    isset($_POST['email']) && !empty($_POST['email']) &&
                    isset($_POST['message']) && !empty($_POST['message'])
                ){
                    // On nettoie le contenu
                    $nom = strip_tags($_POST['nom']);
                    $sujet = strip_tags($_POST['sujet']);
                    $email = strip_tags($_POST['email']);
                    $message = htmlspecialchars($_POST['message']);

                    // Ici vous traitez vos données

                    echo "Message de {$nom} envoyé";
                }
            }else{
                header('Location: index.php');
            }
        }
    }
}else{
    http_response_code(405);
    echo 'Méthode non autorisée';
}
```

Et voilà, les spams devraient drastiquement diminuer avec cette méthode.

A noter qu'aucune méthode ne fonctionnera à 100%.
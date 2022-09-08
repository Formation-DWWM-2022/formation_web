<!-- https://github.com/TyTy-cf/hb-php/tree/main/mvc_api/pokemon -->

-  Utiliser une API avec cURL  : https://youtu.be/vq7yJDuf42E

# Création d'une API

Afin de créer une API REST, en partant d'un projet MVC, il suffit de :

1. Créer des routes adéquates : chaque route doit pointer vers une ressource identifiable, par exemple :

- GET /articles pour consulter tous les articles
- POST /articles pour consulter tous un seul article
- GET /articles/32 pour consulter l'article dont l'ID est 32
- PUT servira uniquement à mettre à jour des données
- DELETE sera réservé à la suppression de données

2. Tout d'abord, au début du fichier, nous définirons les entêtes HTTP nécessaires au bon fonctionnement de l'API.
```php
// Headers requis 
header("Access-Control-Allow-Origin: *"); // Accès depuis n'importe quel site ou appareil (*) 
header("Content-Type: application/json; charset=UTF-8"); // Format des données envoyées 
header("Access-Control-Allow-Methods: GET"); // Méthode autorisée 
header("Access-Control-Max-Age: 3600"); // Durée de vie de la requête 
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"); // Entêtes autorisées 
```

3. Retourner la donnée en JSON et l'annoncer dans les headers HTTP :

```php
class ArticlesController extends Db {
  // Route GET /articles
  public function index() {
    $articles = Db::findAll('articles');
    if(!empty($articles)){
        // On transforme l'array $articles en json
        $jsonArticles = json_encode($articles);
        header("Access-Control-Allow-Methods: GET"); // Méthode autorisée 
        // On modifie les headers HTTP :
        header('Content-type: application/json');
        // On envoie le code réponse 200 OK
        http_response_code(200);
        // On retourne la donnée en json
        return $jsonArticles;
    } else {
        // On gère l'erreur
        http_response_code(405);
        echo json_encode(["message" => "Aucun article"]);
    }
  }
}
```

# cURL c'est quoi ?
Selon Wikipédia cURL (abréviation de client URL request library : « bibliothèque de requêtes aux URL pour les clients » ou see URL : « voir URL ») est une interface en ligne de commande, destinée à récupérer le contenu d'une ressource accessible par un réseau informatique.

Cette bibliothèque permet avec php de faire différentes requêtes avec les méthodes traditionnelles GET et POST sur des serveurs web, pratique pour la communication avec une API !​

Curl supporte actuellement les protocoles HTTP (GET, POST, PUT, ...), HTTPS, FTP, IDAP, FILE, DICT, TELNET, ...



# Comment utiliser cUrl ?

Pour utiliser cUrl dans un script PHP, Il faut commencer par initialiser une nouvelle session cURL en utilisant la fonction curl_init(), renseigner ensuite les différentes options à envoyer avec la requête à travers la fonction curl_setopt(), exécuter la session avec curl_exec() puis fermer la session une fois l’exécution terminée avec curl_close().

Nous pouvons trouver accéder à la documentation de toutes les fonctions cURL au lien suivant : https://www.php.net/manual/fr/ref.curl.php

# Exemples de requete cURL GET

```php
    $session_curl = curl_init('http://api.football-data.org/v2/competitions'); // on initialisation la session cURL 
    /*
    on renseignement l'option "CURLOPT_HEADER" avec "true" comme valeur
    pour inclure l'en-tête dans la réponse
    */
    curl_setopt($session_curl , CURLOPT_HEADER, true);
    $data = curl_exec($session_curl ); // on execute la session, en récupérant la réponse dans $data
    curl_close($session_curl ); // on ferme la session cURL 
    echo $data; // On affiche la réponse
```

# Exemples de requete cURL POST
```php
function connectUser($adresse, $email, $password) {
	$ch = curl_open(); // $ch pour "channel" (canal)
	curl_setopt($ch, CURLOPT_URL, $adresse); // On renseigne l'adresse du serveur
	$user  = array('email' => $email,  'password' => $password); // Le tableau de données : adresse email et mot de passe
	curl_setopt($ch, CURLOPT_POST, true);  // On renseigne la méthode "POST"
	curl_setopt($ch, CURLOPT_POSTFIELDS, $user); // On renseigne les données à envoyer
	$reponse = $curl_exec($ch);
	curl_close($ch);
	echo $reponse;
}

// On appel la fonction "connectUser"
connectUser("http://www.siteweb.com", "mon_adresse@email.com", "mon_mot_de_passe");
```

Dans certains projets nécessitant l'utilisation de CURL pour par exemple appelé une API avec PHP, recopié la requête à chaque fois, c'est long et assez pénible non ? Voici donc deux fonctions pour vous permettre d'être plus rapide :

# GET (sans token)

```php
function cURLGet($server, $calltype) { 
    $ch = curl_init($server . $calltype); 
    curl_setopt_array($ch, [
            CURLOPT_HTTPGET => true, 
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_HTTPHEADER => ['Content-Type:application/json'] // "Content-Type:application/json", et non pas "Content-Type: application/json" 
        ]
    ); 
    $response = curl_exec($ch); 
    if ($response === false) { 
        return (curl_error($ch)); 
    } 
    $responseData = json_decode($response, true); 
    return $responseData;
}
```

server correspond à l'URL de votre api, par exemple : https://mon-api.com
calltype correspond au chemin de votre api, par exemple : /v1/login/

```php
$maVariable = apiCallGet('https://mon-api.com', '/v1/login/');
```

# GET (avec token)

```php
function cURLGet($server, $access_token, $calltype) { 
    $ch = curl_init($server . $calltype); 
    curl_setopt_array($ch, [
            CURLOPT_HTTPGET => true, 
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_HTTPHEADER => [
                'authorization:Bearer ' . $access_token, 
                'Content-Type:application/json'
            ]
        ]
    ); 
    // "authorization:Bearer", et non pas "authorization: Bearer" 
    // "Content-Type:application/json", et non pas "Content-Type: application/json"
    $response = curl_exec($ch); 
    if ($response === false) { 
        return (curl_error($ch)); 
    } 
    $responseData = json_decode($response, true);
    return $responseData; 
}
```

access_token correspond au token d'authentification API, "authorization:Bearer" lui correspond à une authentification de type Bearer.

# POST (sans token)

```php
function cURLPost($server, $postData, $calltype) { 
    $ch = curl_init($server . $calltype); 
    curl_setopt_array($ch, [
            CURLOPT_POST => true, 
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_HTTPHEADER => ['Content-Type:application/json'], // "Content-Type:application/json", et non pas "Content-Type: application/json"  
            CURLOPT_POSTFIELDS => json_encode($postData) 
        ]
    ); 
    $response = curl_exec($ch); 
    if ($response === false) { 
        return (curl_error($ch)); 
    } 
    $responseData = json_decode($response, true); 
    return $responseData; 
}
```

postData est un tableau contenant vos paramètres à envoyer.

```php
$dataPost = [ 'grant_type' => 'password', 'username' => 'monUsername', 'password' => 'monPassword' ]; 
$postCurl = cURLPost('https://mon-api.com/', $dataPost, '/api/oauth/token'); 
```

# POST (avec token)

```php
function cURLPost($server, $postData, $access_token, $calltype) { 
    $ch = curl_init($server . $calltype); 
    curl_setopt_array($ch, [
            CURLOPT_POST => true, 
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_HTTPHEADER => ['authorization:Bearer ' . $access_token, // "authorization:Bearer", et non pas "authorization: Bearer" 
            'Content-Type:application/json' // "Content-Type:application/json", et non pas "Content-Type: application/json" 
            ], 
            CURLOPT_POSTFIELDS => json_encode($postData) 
        ]
    ); 
    $response = curl_exec($ch); 
    if ($response === false) { 
        return (curl_error($ch)); 
    } 
    $responseData = json_decode($response, true); 
    return $responseData; 
}
```
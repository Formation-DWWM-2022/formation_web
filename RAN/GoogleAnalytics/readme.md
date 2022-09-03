# RGPD et Google Analytics - Comment être dans les clous ?

Depuis le 25 mai 2018, le Réglement Général relatif à la Protection des Données (RGPD) est entré officiellement en vigueur.

Nombreux sont les développeurs qui se sont attelés à rendre leurs sites conformes à cette réglementation européenne.

Concernant Google Analytics, son utilisation "classique" au moyen d'un code Javascript provoque une baisse visible des statistiques collectées si l'application du RGPD est faîte en totale conformité.

En effet, ce code Javascript crée des cookies sur le disque du visiteur, ces fichiers ne pouvant être créés sans l'accord express de ce visiteur. De fait, tous les visiteurs ne donnant pas ou n'ayant pas donné leur accord sont exclus des statistiques.

Heureusement, une solution existe pour faire fonctionner Google Analytics sans cookies.

Il faudra toutefois faire quelques concessions. En effet, certaines techniques utilisées ci-dessous vont rendre les rapports moins précis.

# Voici une liste non exhaustive des avantages et inconvénients de la méthodes avec cookie

Avantages :
- Permet de collecter toutes les données
- Produit des rapports précis

Inconvénients :
- Ecrit des cookies sur le disque
- Nécessite l'accord des visiteurs AVANT d'écrire les cookies

# Voici une liste non exhaustive des avantages et inconvénients de la méthodes avec cookie

Avantages :
- Permet d'être facilement conforme au RGPD
- Collecte les données sans écrire de cookie
- Ne nécessite pas l'accord de l'utilisateur (si bien configuré)

Inconvénients :
- Produit des rapports moins précis
- Nécessite un développement côté serveur
- Comptabilisera toutes les visites y compris les moteurs de recherche (qui ignorent le code JS), sauf à les exclure en PHP

# Être dans les clous avec Javascript

Pour être conforme au RGPD en utilisant Google Analytics version Javascript, il "suffit" d'empêcher la création de cookies tant que le visiteur n'a pas donné son consentement.

Afin d'y parvenir, il existe une librairie JS appelée Tarteaucitron qui fait le travail pour vous.

Sa documentation détaillée vous facilite la tâche.

# Être dans les clous avec Google Analytics côté serveur

Nous allons utiliser PHP et cURL pour communiquer les données des visiteurs à Google Analytics.

Ici, nous verrons un code de base qui fonctionne mais je vous inviterai à approfondir le fonctionnement en lisant la documentation de Google sur le sujet.

Dans un premier temps, nous devrons fabriquer une requête postée vers l'url ci-dessous

```
https://www.google-analytics.com/collect
```

Cette requête contiendra diverses informations parmi lesquelles :
- La version du protocole (v)
- Le "Tag ID" (tid), qui est l'identifiant donné par Google Analytics
- Le "Cliend ID" (cid) qui est un identifiant de session du client
- Le type (t) de hit
- L'information, obligatoire pour être valide avec le RGPD, d'anonymisation des adresses IP (aip)
- La source des données (ds), web, application...
- La page référente (dr)
- L'url de la page (dp)
- Le navigateur utilisé (ua)
...

Il va de soi que de nombreuses autres informations peuvent être envoyées.

Ces informations seront rassemblées dans un tableau PHP et ensuite envoyées en post via cURL à Google.

Voici un exemple de code qui fonctionne

```php
<?php

// On fabrique le tableau contenant les différentes données à envoyer
$params=[
    'v'     => 1,
    'tid'   => 'UA-XXXXXXXX-XX', // Ajoutez ici votre ID Google Analytics
    'cid'   => 'ID DE SESSION', // Ajoutez ici votre ID de session utilisateur
    't'     => 'pageview',
    'aip'   => 1,
    'ds'    => 'web',
    'dr'    => $_SERVER['HTTP_REFERER'],
    'dp'    => $_SERVER['REQUEST_URI'],
    'ua'    => $_SERVER['HTTP_USER_AGENT']
];

// On ouvre la connexion
$ch = curl_init('https://www.google-analytics.com/collect');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// On crée la requête
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

// On exécute
$response = curl_exec($ch);

// On ferme la connexion
curl_close($ch);
```

Et voilà, vos stats revivent !!

Attention toutefois, ce code est loin d'être complet, il permet d'envoyer les données à Google Analytics mais de nombreuses options existent. N'hésitez pas à consulter la documentation mentionnée plus haut.
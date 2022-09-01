# Config.php

Nous avons déjà dit que index.php sous le dossier public est le point d’entrée, pour cette raison nous incluons les fichiers nécessaires à partir de là.

Tout d’abord, nous chargeons le fichier de configuration, voici le contenu de index.php:

```php
// Load Config
require_once '.. /config/config.php';
```

Maintenant nous pouvons créer un fichier config.php sous le dossier config.

Dans le fichier de configuration, nous pouvons stocker les paramètres du framework, par exemple, nous pouvons stocker le nom de notre application, le chemin de la racine, et bien sûr, les paramètres de connexion de la base de données:

```php
<? php
//nom du site
define('SITE_NAME', 'your-site-name');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
définir ('URL_ROOT', '/');
définir('URL_SUBFOLDER', '');

//DB Params
définir ('DB_HOST', 'your-host');
define('DB_USER', 'your-username');
define('DB_PASS', 'your-password');
define('DB_NAME', 'your-db-name');
```
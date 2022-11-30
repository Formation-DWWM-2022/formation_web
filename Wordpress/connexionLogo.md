# Personnaliser la page de connexion de WordPress et son logo

Il est possible de personnaliser l’écran de connexion de WordPress afin de l’adapter aux couleurs de vos thèmes et de vos clients. Une petite touche esthétique rapide à mettre en place mais plutôt sympathique.

On va profiter des prochains cours pour personnaliser l’interface d’administration de notre site, dans le but de la simplifier, et l’adapter à nos besoins.

Et on va commencer par personnaliser l’écran de connexion du site. À l’aide d’un hook et un peu de CSS, on passera de ça :

![](https://capitainewp.io/wp-content/uploads/2020/04/ecran-connexion-wordpress-scaled.jpg.webp)

à ça, par exemple :

![](https://capitainewp.io/wp-content/uploads/2017/05/ecran-connexion-personnalise-css-scaled.jpg.webp)

## Le hook

Pour cela nous avons le hook login_enqueue_scripts à notre disposition, que l’on va utiliser comme d’habitude, dans notre functions.php :

```php
<?php 
function alex_login_logo() {
 wp_enqueue_style( 
        'custom-login', 
        get_template_directory_uri() . '/css/custom-login.css', 
        array( 'login' ) 
    );
}
add_action( 'login_enqueue_scripts', 'alex_login_logo' );
```

On pourrait écrire notre CSS directement dans ce hook via un echo, mais je ne suis pas très fan de cette technique. Je préfère créer un fichier CSS distinct et l’appeler via wp_enqueue_style, qu’on a déjà utilisé pour charger les scripts et styles de notre thème.

> Au niveau du nom du style, ‘login’ est déjà utilisé par le système, c’est pour ça que j’ai appelé le premier paramètre ‘custom-login’.

En dépendance, j’ai justement indiqué login, afin que ma feuille de styles vienne se charger après celle de WordPress. De cette manière, il me sera plus facile de surcharger les styles de bases, sans avoir recours à des subterfuges CSS comme !important.

## Les styles et le logo

Ensuite, créez votre fichier CSS et placez-le par exemple dans le dossier /css/ à partir de la racine du thème . J’ai appelé le mien custom-login.css.

```css
/* Fond */ 
body {
  background: #232634;
}

/* Logo */
#login h1 a, .login h1 a {
  background-image: url('../img/logo.svg');
}

/* Bouton */
.wp-core-ui .button-primary {
  background: #83BD71;
  border-color: #83BD71;
}

/* Liens */
.login #backtoblog a, 
.login #nav a,
.privacy-policy-page-link a {
  color: #BBBFCE;
}
```

Dans cet exemple, j’ai personnalisé le fond, le logo, le bouton de connexion et les liens en dessous.

Pour le logo, comme mon fichier CSS se trouve dans /css/, j’utilise ../ pour revenir un dossier en arrière (à la racine du thème) avant de repartir dans le dossier /img/.

Vous pourriez aller encore plus loin et ajouter une police d’écriture, modifier l’apparence des champs, la taille des textes…

> Par contre, vous ne pouvez pas modifier le HTML de cette page. Le mieux reste donc de se concentrer sur le CSS.

## Surcharger les styles avec les bons sélecteurs

Pour surcharger les styles sans se prendre la tête, il faut réutiliser les mêmes sélecteurs CSS que ceux utilisés par WordPress. Afin de les trouver, ouvrez l’inspecteur (clic droit, Inspecter).

1. Cliquez sur le bouton de sélection ;
2. Survolez ensuite l’élément que vous souhaitez personnaliser directement sur la page ;
3. Copiez enfin le sélecteur utilisé.

![](https://capitainewp.io/wp-content/uploads/2017/05/inspecter-css-selecteurs-scaled.jpg.webp)

Reportez-le tel quel dans votre propre feuille de style. Comme ça, vous n’aurez pas de souci de conflit CSS.

Dans cet exemple, n’écrivez donc pas juste .input, mais le sélecteur complet, à savoir :.login form .input.

Et voilà ! Vous savez maintenant personnaliser dans les moindres détails la page de connexion à WordPress, afin de tailler une expérience sur mesure à vos clients et utilisateurs.

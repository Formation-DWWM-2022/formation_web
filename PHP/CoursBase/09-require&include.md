## Require & Include [10 min] -> Q/R

<https://grafikart.fr/tutoriels/require-include-php-1121#autoplay>

## PHP & HTML [39 min] -> Q/R

<https://grafikart.fr/tutoriels/html-template-php-1122#autoplay>

Nous allons étudier 4 nouvelles structures de contrôle qui vont se révéler très utiles et pratiques lorsqu’on voudra créer un site : include, require, include_once et require_once.

## Présentation de include et de require et cas d’utilisation

Les instructions PHP include et require vont nous permettre toutes deux d’inclure des fichiers de code (ou plus exactement le contenu de ces fichiers) à l’intérieur d’autres fichiers de code.

Ces deux instructions sont très puissantes et vont s’avérer extrêmement utiles lors de la création d’un site web.

En effet, imaginions que vous vouliez créer un site personnel ou un site comme le mien. Sur votre site, il y a de fortes chances que l’en-tête, le menu et le pied de page soient identiques pour toutes les pages.

Jusqu’à présent, en HTML, nous étions obligés de réécrire le même code correspondant à l’en-tête, au menu et au pied de page sur chacune des pages de notre site.

Cela, en plus de ne pas être optimisé d’un point de vue performance, nous fait perdre beaucoup de temps et va poser de sérieux problèmes le jour où l’on souhaite modifier le texte dans notre pied de page par exemple pour tout notre site.

Plutôt que de réécrire tout le code relatif à ces différentes parties sur chacune de nos pages, pourquoi ne pas plutôt enregistrer le code de notre menu dans un fichier séparé que l’on appellera par exemple menu.php, et faire de même pour le code relatif à notre en-tête et à notre pied de page puis ensuite inclure directement ces fichiers sur chacune de nos pages ?

Nous allons pouvoir faire cela grâce aux instructions include et require.

Ainsi, nous n’avons plus qu’à écrire le code relatif à notre menu une bonne fois pour toutes et à l’inclure dans chaque page par exemple. Cela représente une considérable simplification pour la maintenance de notre code puisque nous n’avons qu’à modifier le code de notre menu dans le fichier menu.php plutôt que de le modifier dans toutes les pages si nous avions copié-collé le code du menu dans chaque page.

Notez déjà que pour inclure un fichier dans un autre fichier, il faudra préciser son emplacement par rapport au fichier qui contient l’instruction include ou require de la même façon qu’on pourrait le faire pour faire un lien en ou pour inclure une image en HTML.

## Les différences entre include, include_once, require et require_once

La seule et unique différence entre les instructions include et require va se situer dans la réponse du PHP dans le cas ou le fichier ne peut pas être inclus pour une quelconque raison (fichier introuvable, indisponible, etc.).

Dans ce cas-là, si l’inclusion a été tentée avec include, le PHP renverra un simple avertissement et le reste du script s’exécutera quand même tandis que si la même chose se produit avec require, une erreur fatale sera retournée par PHP et l’exécution du script s’arrêtera immédiatement.

L’instruction require est donc plus « stricte » que include.

La différence entre les instructions include et require et leurs variantes include_once et require_once est qu’on va pouvoir inclure plusieurs fois un même fichier avec include et require tandis qu’en utilisant include_once et require_once cela ne sera pas possible : un même fichier ne pourra être inclus qu’une seule fois dans un autre fichier.

## Exemples d’utilisation de include, include_once, require et require_once

Les 4 structures de contrôle include, require, include_once et require_once vont fonctionner de manière similaire.

Pour les faire fonctionner, il va nous falloir un fichier à inclure. On va donc commencer par créer un fichier menu.php qui va contenir un menu de navigation que je souhaite afficher dans les différentes pages de mon site. J’en profite également pour placer les styles CSS de mon menu dans un fichier cours.css.

Vous pouvez trouver les codes HTML et CSS du menu.php ci-dessous :

```html
<nav>
    <ul>
        <li><a href="#">Cours Complets</a></li>
        <li><a href="#">Articles</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">A propos</a></li>
    </ul>
</nav>
```

```css
*{
    margin: 0px;
    padding: 0px;
    font-family: Avenir, sans-serif;
}
nav{
    background-color: white;
    position: sticky;
    top: 0px;
}
nav ul{
    display: flex;
    flex-flow: nowrap;
    list-style-type: none;
}
nav li{
    flex: 1 1 auto;
    text-align: center;
}
nav a{
    display: block;
    text-decoration: none;
    color: black;
    border-bottom: 2px solid transparent;
    margin: 10px;
}
nav a:hover{
    color: orange;
    border-bottom: 2px solid gold;
}
```

Ensuite, nous allons tenter d’inclure le code de notre fichier de menu dans notre fichier principal qui s’appelle dans mon cas cours.php plusieurs fois en utilisant nos différentes instructions. Pensez bien à lier également le fichier CSS avec l’élément link pour que le menu s’affiche bien.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            echo '<h2>Menu inclus avec include</h2> <br>';
            include 'menu.php';
            include 'menu.php';
        
            echo '<h2>Menu inclus avec include_once</h2> <br>';
            include_once 'menu.php';
            
            echo '<h2>Menu inclus avec require</h2> <br>';
            require 'menu.php';
            require 'menu.php';
            
            echo '<h2>Menu inclus avec require_once</h2> <br>';
            require_once 'menu.php';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-include-require-resultat.png)

Ici, on inclut deux fois notre menu en utilisant include, puis on tente de l’inclure à nouveau en utilisant include_once et on répète la même opération avec require et require_once.

Comme vous pouvez le constater, les instructions include_once et require_once ne vont pas inclure le menu ici car le fichier a déjà été inclus dans la page une première fois (avec notre première instruction include en l’occurrence).

N’hésitez pas également à tester la réponse du PHP en passant un nom de fichier qui n’existe pas à include puis en réitérant l’opération avec require.

### Exo 11

- Créer les fichiers :
  - head.php qui contient la configuration de la page
  - header.php qui contient le haut de cette page.
  - footer.php qui contient le base de cette page.
- Puis les inclure dans un fichier index.php pour obtenir un beau résultat.

![image](https://user-images.githubusercontent.com/46321539/156745897-0ec50d55-e3a2-453a-b12b-16f75c6472c6.png)

### Exo 12

- Utiliser une boucle pour générer une liste déroulante dont les valeur seront les nombres de 1 à 10 et les valeurs affichées seront le nombre suivi de pair pour les nombres pairs et impair pour les nombres impairs :

        <SELECT>
            <OPTION value="1">1 impair</OPTION>
            <OPTION value="2">2 pair</OPTION>
            …

- Afficher la table de multiplication des nombres de 1 à 10 sous la forme d’un tableau carré de 11 cases sur 11.

![image](https://user-images.githubusercontent.com/46321539/156747601-88261b0e-2716-4d8f-9e64-2acde6b255bf.png)

- Remplir un tableau de dimensions 10x10 de valeurs aléatoires comprises entre -50 et 50 et compter les valeurs positives, négatives et nulles.
  - Afficher le tableau sous forme tabulaire, puis les valeurs calculées.

## Générer des fichiers PDF [21min] -> Q/R

<https://youtu.be/-GIa7-rLOMY?list=PLBq3aRiVuwyzPl8lh6lrdBXBnSpjLKwZi>

La bibliothèque dompdf est ne option pour créer et télécharger un PDF en PHP. Il nous permet de charger le HTML dans le PDF. Cette bibliothèque est très similaire à la bibliothèque mpdf ou fpdf; seules les méthodes sont différentes. Nous utiliserons les méthodes comme loadHtml(), render() et stream(). Nous devons télécharger la bibliothèque dans notre répertoire de travail à l’aide de la commande composer require dompdf/dompdf. Il créera le dossier vendor comme dans la première méthode avec les fichiers composer.json et composer.lock.

Par exemple, exigez le vendor/autoload.php comme première ligne du code dans le programme. Écrivez ensuite le mot-clé use pour importer la classe Dompdf en tant que use Dompdf/Dompdf. Nous pouvons utiliser le même tableau HTML que dans la méthode ci-dessus pour charger le PDF.

```php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
```

Après avoir stocké le HTML dans une variable $html, créez une autre variable $dompdf pour créer un objet de la classe Dompdf. Appelez ensuite la méthode loadHtml() avec $html en paramètre. Appelez ensuite la fonction render() puis la fonction stream() avec l’objet $dompdf.

Nous allons voir pas à pas comment réaliser la conversion d’un fichier HTML en PDF à l’aide du langage PHP et de la bibliothèque dompdf.
Commencez par créer un fichier que l’on nomme test_dompdf.html. Nous allons y inclure le code suivant :

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Page de Test HTML – dompdf, un outil puissant pour convertir de l’HTML vers PDF en PHP</title>
</head>

<body>
    <p>
        Cette page <em>HTML</em> va être convertie à l’aide de <em>dompdf</em> en <em>PDF</em>
    </p>
</body>
</html>
```

Ce fichier est très simple, c’est la partie visuelle du rendu.

Nous allons maintenant entrer dans le vif du sujet avec la création du fichier PHP. Pour cela, créez un fichier que l’on nomme test_dompdf.php. Dans celui-ci nous allons mettre le code suivant :

```php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new DOMPDF();

$dompdf->load_html_file($filename);

// OU di vous avez accès au contenu HTML plutot qu’au fichier HTML lui-même
//$dompdf->load_html($html);

// d’autres formats sont dispo, il est aussi possible de définir un format en "pt"
$dompdf->set_paper("a4", "landscape");

$dompdf->render();

// Si vous voulez le faire télécharger par le navigateur
$dompdf->stream("document.pdf", array("Attachment" => true));

// OU si vous voulez le mettre dans un ficher sur le serveur
// file_put_contents("document.pdf", $dompdf->output());
```

La première ligne permet d’inclure le fichier de configuration de dompdf. Pour cela vous devez spécifier le chemin du dossier dompdf.

Puis, on instancie la classe DOMPDF, et on charge le fichier HTML. Deux méthodes sont possibles : load_html_file ou load_html. La première comme son nom l’indique permet de charger un fichier HTML en passant en argument le fichier, quant à la seconde, elle charge directement le contenu HTML plutôt que le fichier HTML lui-même.

Ensuite il s’agit de la configuration du format de papier ($dompdf->set_paper("a4", "landscape"); ) que l’on désire. Ici j’ai choisis le format A4 avec une orientation en paysage. D’autres formats sont disponibles, et il est également possible de définir votre propre format en pt (point).

L’avant dernière opération génère récursivement les différents éléments de la DOM du fichier HTML.

Pour finir, nous téléchargeons le fichier PDF directement depuis le navigateur. Pour cela, nous utilisons l’instruction suivante : $dompdf->stream("document.pdf", array("Attachment" => true));.
Bien sûr vous avez la possibilité de déposer le fichier directement sur un répertoire de votre serveur en utilisant le code suivant : file_put_contents("document.pdf", $dompdf->output());. En effet, la méthode file_put_contents permet d’écrire le contenu passé en paramètre dans un fichier.

Tout un tas d’options sont possibles, pour plus de détails : http://dompdf.github.com/

Et voilà, votre PDF est généré. Rien de compliqué, n’est-ce pas ?

![](https://www.blog-nouvelles-technologies.fr/wp-content/uploads/2011/01/dompdf-2.png)
# Commentaires avec PHPDocs

- Bien documenter ses classes : https://youtu.be/KAL1vJtHces
- PHPDoc : https://youtu.be/oa1iXzlTs04
- Introduction to PhpDoc : https://www.sitepoint.com/introduction-to-phpdoc/
- PHP DocBlock - Adding Comments to Classes & Methods : https://youtu.be/hdDD0SNJ-pk

Si vous développez depuis plus de 5 minutes, il y a de fortes chances que quelqu’un vous ait parlé de l’importance de bien documenter votre code. Et comme une bonne personne qui ne veut pas faire pleurer les bébés, je sais que vous voulez faire tous les commentaires dans votre code dont il a besoin, afin que le monde comprenne votre chef-d’œuvre.

Mais commenter du code ne suffit pas. Avec PHPTools, ils peuvent survoler les appels de fonction et voir un synopsis de l’appel de fonction. Comme ceci :

![](https://blog.devsense.com/bl-content/uploads/pages/autosave-autosave-0883d4b608de6546171152459a84af7d/hoverfunctiondefinition.png)

Mais - c’est un peu ennuyeux de faire ramper les gens sur tout votre code pour trouver les fonctions utilisées, puis revenir au codage. Et s’il y avait un outil qui pouvait prendre tous les commentaires documentés dans le code, les rassembler dans des pages HTML avec des liens entre les méthodes et des explications détaillées de ce que chaque classe, méthode, et variable fait? Un tel outil pourrait-il exister?

Eh bien. Oui. Cela s’appelle [PHPDocumentor](https://www.phpdoc.org/), ou PHPDoc.

Bien que n’étant pas une partie officielle, le style de commentaire PHPDoc est une méthode largement acceptée de documenter les classes. En plus de fournir une norme pour les développeurs à utiliser lors de l’écriture de code, il a également été adopté par la plupart des kits de développement logiciel les plus populaires (SDK), tels que Eclipse et NetBeans, et sera utilisé pour générer des indices de code.

Un PHPDoc est défini en utilisant un commentaire de bloc qui commence par un astérisque supplémentaire :

```php
/**
 * This is a very basic PHPDoc
 */
```

Ces commentaires au format PHPDocs sont traduits en HTML, créant une documentation qui explique ce que chaque classe, fonction ou variable fait sans que les gens aient à lire tout le code. Ils peuvent utiliser les pages HTML de PHPDoc pour voir rapidement comment le logiciel fonctionne, ce que les fonctions utilisent pour les variables, ce que la fonction retourne, ou d’autres informations utiles que le développeur a décidé était important.

PHPDoc ne génère pas de commentaires ni de documentation pour vous ; vous devez tout de même saisir les détails. Mais il peut recueillir ces commentaires pour vous, et PHPTools le rend encore plus facile

La vraie puissance de PHPDocs vient avec la possibilité d’utiliser des balises, qui commencent par un symbole at (@) immédiatement suivi par le nom de la balise et la valeur de la balise. Les balises PHPDoc permettent aux développeurs de définir les auteurs d’un fichier, la licence d’une classe, les informations de propriété ou de méthode, et d’autres informations utiles.

Les balises les plus couramment utilisées sont les suivantes :

- @author : L’auteur de l’élément courant (qui peut être une classe, un fichier, une méthode ou n’importe quel bit de code) est répertorié à l’aide de cette balise. Plusieurs balises d’auteur peuvent être utilisées dans le même PHPDoc si plus d’un auteur est crédité. Le format du nom de l’auteur est John Doe <john.doe@email.com>.
- @copyright : Indique l’année du droit d’auteur et le nom du titulaire du droit d’auteur pour l’élément courant. Le format est 2022 Copyright Holder.
- @license : lien vers la licence de l’élément courant. Le format des informations de licence est http://www.example.com/path/to/license.txt License Name.
- @var : Contient le type et la description d’une variable ou d’une propriété de classe. Le format est la description d’élément de type.
- @param : Cette balise affiche le type et la description d’une fonction ou d’un paramètre de méthode. Le format est le type $element_name element description.
- @return : Le type et la description de la valeur de retour d’une fonction ou d’une méthode sont fournis dans cette balise. Le format est type return element description.

Un exemple de classe commentée avec PHPDocs pourrait ressembler à ceci :

```php
<?php
 
/**
 * A simple class
 *
 * This is the long description for this class,
 * which can span as many lines as needed. It is
 * not required, whereas the short description is
 * necessary.
 *
 * It can also span multiple paragraphs if the
 * description merits that much verbiage.
 *
 * @author Jason Lengstorf <jason.lengstorf@ennuidesign.com>
 * @copyright 2010 Ennui Design
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 */
class SimpleClass
{
  /**
   * A public variable
   *
   * @var string stores data for the class
   */
  public $foo;
 
  /**
   * Sets $foo to a new value upon class instantiation
   *
   * @param string $val a value required for the class
   * @return void
   */
  public function __construct($val)
  {
      $this->foo = $val;
  }
 
  /**
   * Multiplies two integers
   *
   * Accepts a pair of integers and returns the
   * product of the two.
   *
   * @param int $bat a number to be multiplied
   * @param int $baz a number to be multiplied
   * @return int the product of the two parameters
   */
  public function bar($bat, $baz)
  {
      return $bat * $baz;
  }
}
 
?>
```

Une fois que vous avez scanné la classe précédente, les avantages de PHPDoc sont évidents : tout est clairement défini de sorte que le prochain développeur peut ramasser le code et ne jamais avoir à se demander ce qu’un extrait de code fait ou ce qu’il devrait contenir.

# Un autre exemple de bonne pratique

```php
<?php
/**
 * @author Votre nom <nom@exemple.com>
 * @link http://www.phpdoc.org/docs/latest/index.html
 * @package helper
 */
class DateTimeHelper
{
    /**
     * @param mixed $anything Tout ce qui peut être traduit en un objet \DateTime
     *
     * @return \DateTime
     * @throws \InvalidArgumentException
     */
    public function dateTimeFromAnything($anything)
    {
        $type = gettype($anything);

        switch ($type) {
            // Ce bloc doit retourner un objet \DateTime
        }

        throw new \InvalidArgumentException(
            "Impossible de convertir '{$type}' en un objet DateTime"
        );
    }

    /**
     * @param mixed $date Tout ce qui peut être traduit en un objet \DateTime
     *
     * @return void
     */
    public function printISO8601Date($date)
    {
        echo $this->dateTimeFromAnything($date)->format('c');
    }

    /**
     * @param mixed $date Tout ce qui peut être traduit en un objet \DateTime
     */
    public function printRFC2822Date($date)
    {
        echo $this->dateTimeFromAnything($date)->format('r');
    }
}
```

La documentation d'une classe commence en premier lieu par l'introduction du nom de l'auteur avec le tag @author qui peut être répété s'il y a plusieurs auteurs. En deuxième lieu, nous pouvons indiquer un lien vers un site web si jamais il existe une relation entre ce dernier et le code via le tag @link. Enfin, si jamais la classe fait partie d'un espace de noms, il faut l'indiquer avec le tag @package.

À l'intérieur de cette classe, la première méthode a un paramètre indiqué par @param qui nous renseigne sur son type, son nom et une brève description. Si jamais une méthode renvoie un résultat, il faut l'indiquer avec le tag @return et utilisez @throws autant de fois qu'il y a d'exceptions signalées.

La seconde et la troisième méthodes sont très similaires et ont un unique tag @param comme la première méthode. La seule différence notable se trouvant dans la doc. est la présence d'un tag @return sur la seconde méthode. La valeur void pour le tag @return nous informe explicitement que la méthode ne renvoie rien (si vous omettez ce tag, c'est cette valeur qui sera indiquée par défaut).

# Générer des documents PHPDoc

Maintenant que vos développeurs ont ajouté tous les commentaires basés sur PHPDoc (peut-être aidé avec un talentueux et peut-on même dire - bon rédacteur technique pour aider), générons réellement notre PHPDoc.

![](https://blog.devsense.com/bl-content/uploads/pages/autosave-autosave-0883d4b608de6546171152459a84af7d/phpdoctags.gif)

A partir de la ligne de commande, nous naviguons vers le répertoire avec tous nos fichiers PHP et exécutons :

```
phpdoc
```

Selon le système d’exploitation que vous utilisez, c’est généralement suffisant. J’ai trouvé qu’il est préférable d’exécuter au moins:

```
phpdoc -d .
```

Le paramètre -d . signifie "utilisez le répertoire courant pour rechercher des fichiers PHP pour créer la documentation." Voici quelques autres options utiles:

  -t (cible) - spécifie le répertoire de sortie
  -f (fichiers) - spécifie sur quels fichiers exécuter PHPDoc
  --ignore (files or directories) - Indique à PHPDoc "Ignore these files or directories" - ceci est utile si vous avez une bibliothèque ou un framework dans ce répertoire, et que vous voulez documenter vos fichiers et pas tout.

Si nous n’utilisons que la version générique, les fichiers PHPDoc seront placés dans le répertoire de compilation.

 chose la plus importante à noter serait le fichier docs/index.html. Ouvrez cela avec n’importe quel navigateur standard et vous verrez toute cette belle documentation. Voici ce que nous voyons si nous allons dans notre client de classe :

 ![](https://blog.devsense.com/bl-content/uploads/pages/autosave-autosave-0883d4b608de6546171152459a84af7d/customerclass.png)

# Conclusion

Je ne saurais insister sur l’importance d’une bonne documentation pour vos projets. Il aide non seulement d’autres personnes, mais vous-même donc quand vous commencez à verser dans votre code pour trouver des erreurs, vous pouvez trouver le chemin de votre logique. PHPDoc peut vous aider, vos clients ou vos collègues développeurs à voir rapidement comment le code fonctionne afin qu’ils puissent retourner au travail. 
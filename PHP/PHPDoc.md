# Commentaires avec DocBlocks

Bien que n’étant pas une partie officielle, le style de commentaire DocBlock est une méthode largement acceptée de documenter les classes. En plus de fournir une norme pour les développeurs à utiliser lors de l’écriture de code, il a également été adopté par la plupart des kits de développement logiciel les plus populaires (SDK), tels que Eclipse et NetBeans, et sera utilisé pour générer des indices de code.

Un DocBlock est défini en utilisant un commentaire de bloc qui commence par un astérisque supplémentaire :

```php
/**
 * This is a very basic DocBlock
 */
```

La vraie puissance de DocBlocks vient avec la possibilité d’utiliser des balises, qui commencent par un symbole at (@) immédiatement suivi par le nom de la balise et la valeur de la balise. Les balises DocBlock permettent aux développeurs de définir les auteurs d’un fichier, la licence d’une classe, les informations de propriété ou de méthode, et d’autres informations utiles.

Les balises les plus couramment utilisées sont les suivantes :

- @author : L’auteur de l’élément courant (qui peut être une classe, un fichier, une méthode ou n’importe quel bit de code) est répertorié à l’aide de cette balise. Plusieurs balises d’auteur peuvent être utilisées dans le même DocBlock si plus d’un auteur est crédité. Le format du nom de l’auteur est John Doe <john.doe@email.com>.
- @copyright : Indique l’année du droit d’auteur et le nom du titulaire du droit d’auteur pour l’élément courant. Le format est 2022 Copyright Holder.
- @license : lien vers la licence de l’élément courant. Le format des informations de licence est http://www.example.com/path/to/license.txt License Name.
- @var : Contient le type et la description d’une variable ou d’une propriété de classe. Le format est la description d’élément de type.
- @param : Cette balise affiche le type et la description d’une fonction ou d’un paramètre de méthode. Le format est le type $element_name element description.
- @return : Le type et la description de la valeur de retour d’une fonction ou d’une méthode sont fournis dans cette balise. Le format est type return element description.

Un exemple de classe commentée avec DocBlocks pourrait ressembler à ceci :

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

Une fois que vous avez scanné la classe précédente, les avantages de DocBlock sont évidents : tout est clairement défini de sorte que le prochain développeur peut ramasser le code et ne jamais avoir à se demander ce qu’un extrait de code fait ou ce qu’il devrait contenir.

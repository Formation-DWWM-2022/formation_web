L'objectif final est d'implémenter une classe Money gràce au TDD en écrivant ce que l'on veut avec des tests.

Spécification: La classe Money a pour paramètres amount et  curr représentant un montant et une devise respectivement. La devise s’exprime comme une chaîne de trois caractères définie par la norme ISO (ici, seulement EUR (euro), USD ($), CHF (franc suisse), GBP (livre sterling)). Quand on additionne deux Money de même devise, le résultat a pour montant la somme des deux autres montants. Mais si les devises sont différentes alors il faut convertir.

La structure de la classe est la suivante:

```php
class Money {

private $amount ;
private $curr ;


    public function __construct( $amount , $currency );

    public function amount ( ): float ;

    public function currency ( ): string;

    public function addM (Money $m) : void;

    public function add (int $namount , string $ncurrency ) : void;

}
```

En partant de la structure ci-dessus, écrire une classe MoneyTest qui teste si Money est correcte (pour chaque méthode, au moins un cas de test est demandé).

Réfléchissez bien et donnez tous les scénarios possibles afin d'élaborer tous vos tests (Cela forme la spécification de votre classe).
N'oubliez de synthétiser avec des fixtures (@before, @beforeClass)

Nous nous limiterons aux devises EUR, USD (1 EUR = 1.19 USD au moment de l'écriture du sujet).

Ecrivez chaque cas de test, puis chaque méthode de la classe Money  de façon incrémentale (l'une après l'autre, petit à petit, donc en TDD). En fin de code, la classe Money
implantant l’en-tête donnée doit également passer tous vos tests.

# 2. Simulation de classes, de dépendances -> Mock

Il est fort probable que vous ayez effectué les convertions euro-dollard dans le code avec l'unité de convertion (1 EUR = 1.19 USD). Pour faire mieux, il plus interessant d'utiliser une Classe externe qui est une dépendance à Money.

Soit donc la Classe Convertion qui prends une méthode unit_Convertion (string $s):float avec s une chaine de convertion "EUR-USD", "USD_EUR" dans notre cas.

Nous ne souhaitons pas coder cette classe de suite car il faut finir Money. Il est important d'isoler la classe Money pour ne tester que cette classe et pas une classe Convertion "codée à l'arrache". Nous allons donc mettre en place un Mock de cette classe Convertion

Créez une classe Convertion vide:

```php
class Convertion {
    public function unit_Convertion(string $s):float {
            return 0.0;
    }
}
```

Modifiez votre class Money pour que le constructeur prenne une instance de Convertion (__construct($amount, $curr, $conv) et pour que les méthodes add et addM utilisent cette instance de Convertion.

Mettez à jour vos tests

Créer un cas test qui crée un mock de la classe Convertion avec $obs= $this->createMock(...) et
Indiquez dans ce cas de test  quelle valeur on souhaite retourner lorsque la méthode unit_Convertion est invoquée.

un exemple:

```php
$obs->method('unit_Convertion')
    ->with($this->equalTo('EUR-EUR'))
    ->willReturn(1.0);
```

Complétez votre cas de test et ajoutez en pour tester que les méthodes add et addM fonctionnent (avec le mock).

Sur un de ces cas de test, vérifiez que la méthode unit_convertion du mock n'est appelée qu'une fois.

Ajoutez dans le comportement du Mock que si vous recevez un argument commençant par " " dans la méthode unit_Convertion alors vous renvoyez une Exception 

Ajoutez la méthode sub en commençant par créer les tests.

Stockez la classe Money

# 4. Test de Robustesse

Il semble logique que les montants ne doivent pas être négatifs. Cela fait parti des tests de robustesse. De même, on ne veut pas de devise nulle ou farfelue.

Créez de nouveaux cas de tests afin de tester ces points. Combien faut-il de cas de test par classe ?

Modifiez le code de la classe Money pour que vos tests passent.


# 5. Couverture de code

Donnez la couverture de code obtenue.

Complétez le code de Money et /ou les cas de test (en précisant les modifications) pour obtenir une couverture de 100%
En travaillant de cette façon, vous devriez obtenir une classe Money qui correspond à vos attentes et un code de qualité (gestion des cas non prévus, excepptions. C'est à faire tout le temps, même en entreprise quand le temps le permet).
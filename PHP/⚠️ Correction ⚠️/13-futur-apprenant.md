## But du TP : créer un formulaire en utilisant des données externes d'une base de données par exemple, et valider les données reçues.

> Soignez votre CSS ! Utilisez un Bootstrap par exemple

> Le projet doit être proprement codé : utilisez les balises HTML et attributs qui conviennent ! (un `type=email` pour un input d'email par exemple)

Vous allez créer une page pour enregistrer un futur apprenant.
On utilisera la liste de pays en JSON suivante : <https://gist.githubusercontent.com/keeguon/2310008/raw/bdc2ce1c1e3f28f9cab5b4393c7549f38361be4e/countries.json>

On devra pouvoir saisir les informations suivantes :

- Nom   (max 150 chars)
- Prénom    (max 50 chars)
- Date de naissance (format Y-m-d : On doit pouvoir créer une date avec `$d = DateTime::createFromFormat($format, $date)`;
- Nationalité (un des pays du json fourni)
- Adresse (max 255 chars)

## Formulaire

Vous créérez un formulaire avec les champs suivants :

- Nom (input)
- Prénom (input)
- Date de naissance (Y-m-d)
- Nationalité (select)
- Adresse postale
- Email
- Téléphone (10 chiffres)
- Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur) (select)

### Remplir le select "nationalité"

Vous devez récupérer la liste en JSON en la copiant-collant dans une variable :

<details>
  <summary>Spoiler warning</summary>

```php
$json = '[{name: 'Austria', code: 'AT'}, etc. etc. etc, ...';
```

</details>

Vous devez ensuite décoder ce JSON pour qu'il soit exploitable comme un array PHP :

<details>
  <summary>Spoiler warning</summary>

```php
$data = json_decode($json);
```

</details>

`$data` est maintenant votre array PHP ! N'hésitez pas à le `var_dump` pour voir ce qu'il contient, comment il est formé.

Avec `json_decode`, pour accéder aux données, par défaut, on y accède comme dans un objet (avec des flèches `->name`) et non pas comme dans un tableau (avec des crochets `['name']`). Par exemple :

<details>
  <summary>Spoiler warning</summary>

```php
foreach($data as $d) {
    echo 'Pays : ' . $d->name;
    echo 'Code : ' . $d->code;
}
```

</details>

Maintenant que vous avez accès aux données du tableau, utilisez ce `foreach` pour afficher un `select` qui ressemble à ça :

<details>
  <summary>Spoiler warning</summary>

```html
<select name="country">
 <option value="AT">Austria</option>
 ...
</select>
```

</details>

### Valider les données

Une fois votre formulaire complet, il doit envoyer ses données à un fichier de traitement (le champ `action`) du formulaire.

Dans ce fichier, vous allez **valider** les données, c'est à dire vous assurer que les données saisies par l'utilisateur sont valides selon vos besoins :

- Nom (input) : vérifier qu'il n'est pas vide et < 150 chars
- Prénom (input) : vérifier qu'il n'est pas vide < 50 chars
- Date de naissance (Y-m-d) : vérifier que vous pouvez créer une date sous ce format
- Nationalité (select) : vérifier que la valeur existe dans la liste des pays
- Adresse postale : vérifier qu'il n'est pas vide et < 255 chars
- Email : vérifier que c'est un format email
- Téléphone (10 chiffres) : vérifier que c'est un format de numéro de téléphone français
- Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur) (choix valide) `in_array()`

Pour chaque champ, il faudra valider de la façon suivante :

`EXISTENCE - NON VIDE - VALIDATION SPÉCIFIQUE`

<details>
  <summary>Spoiler warning</summary>
Par exemple, pour nom : on teste si elle existe `isset()`, si elle est non vide `!empty()` et sa validation spécifique (demandée dans l'énoncé), qui est la taille : `strlen()`.

```php
if (isset($_POST['nom'] && !empty($_POST['nom']) && strlen($_POST['nom']) < 255) {
 echo "Le nom est valide : " . $_POST['nom'] . "<br>";
} 
```

### Valider un format de date

```php
if (DateTime::createFromFormat('Y-m-d', $_POST['date'])) {
    var_dump('Le format de date est valide');
}
```

### Valider un email

```php
if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    echo 'email valide';
}
```

### Valider un numéro de téléphone

```php
if ( preg_match("(0|(\\+33)|(0033))[1-9][0-9]{8}", $telephone ) ) {
    echo 'le telephone est valide';
}
```

</details>

## Afficher les informations

Plutôt que de rediriger vers une autre page, vous pouvez très bien réutiliser la même page dans laquelle se trouve le formulaire !

Il suffit de demander à PHP si votre variable $_POST est vide ou non : si elle est vide, c'est qu'il n'y a pas de formulaire qui vient d'être envoyé, alors vous affichez le formulaire. Si elle n'est pas vide, alors le formulaire vient d'être envoyé : affichez les validations !

<details>
  <summary>Spoiler warning</summary>
Exemple :

```php
<html>


<?php
// Si POST est vide, alors j'affiche le formulaire :
if (empty($_POST)) { 
?>
 <form>
 ...
 </form>
<?php
}
// Sinon, j'affiche les validations de formulaire qui se trouvaient d'habitude dans un autre fichier :
else {
if (isset($_POST['nom'] && !empty($_POST['nom']) && strlen($_POST['nom']) < 255) {
 echo "Le nom est valide : " . $_POST['nom'] . "<br>";
} 

// etc...

} ?>
</html>

```

</details>

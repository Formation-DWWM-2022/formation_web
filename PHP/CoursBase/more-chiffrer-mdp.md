## Chiffrer les mots de passe [9 min] -> Q/R

<https://youtu.be/wAiSu6oiK-Q>

Documentation officiel : https://www.php.net/manual/fr/function.password-hash.php

La meilleure façon de chiffrer et de déchiffrer les mots de passe est d’utiliser une bibliothèque standard en PHP car la méthode de chiffrement et de déchiffrement correct des mots de passe à partir de zéro est complexe et implique de multiples possibilités de vulnérabilités de sécurité. L’utilisation de la bibliothèque standard garantit que l’implémentation du hachage est vérifiée et approuvée.

Remarque : cela utilise l’ API PHP Password disponible dans la version 5.5.0 et supérieure .

## Cryptage du mot de passe : Pour générer un hachage à partir de la string, on utilise la fonction password_hash().

```php
string password_hash(string $password, 
          mixed $algo, [array $options])
```

La fonction password_hash() crée un nouveau hachage de mot de passe de la string en utilisant l’un des algorithmes de hachage disponibles. Il renvoie le hachage qui fait actuellement 60 caractères, cependant, comme de nouveaux algorithmes plus puissants seront ajoutés à PHP, la longueur du hachage peut augmenter. Il est donc recommandé d’allouer 255 caractères à la colonne pouvant être utilisée pour stocker le hachage en base de données.

Les algorithmes suivants sont actuellement pris en charge lors de l’utilisation de cette fonction :

- PASSWORD_DEFAULT
- PASSWORD_BCRYPT
- PASSWORD_ARGON2I
- PASSWORD_ARGON2ID

Des options supplémentaires peuvent être transmises à cette fonction et peuvent être utilisées pour définir le coût du chiffrement, le sel à utiliser pendant le hachage, etc. dans le tableau $options .

L’exemple ci-dessous montre la méthode d’utilisation de la méthode password_hash() :

```php
<?php
  
  // The plain text password to be hashed
  $plaintext_password = "Password@123";
  
  // The hash of the password that
  // can be stored in the database
  $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
  
  // Print the generated hash
  echo "Generated hash: ".$hash;
?>
```
> Hachage généré : $2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6

## Décryptage du mot de passe : Pour décrypter un hash de mot de passe et récupérer la string d’origine, nous utilisons la fonction password_verify() .

```php
bool password_verify(string $password, string $hash)
```

La fonction password_verify() vérifie que le hachage donné correspond au mot de passe donné, généré par la fonction password_hash() . Elle renvoie true si le mot de passe et le hachage correspondent, ou false dans le cas contraire.

```php
<?php
  
  // Plaintext password entered by the user
  $plaintext_password = "Password@123";
  
  // The hashed password retrieved from database
  $hash = 
"$2y$10$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm";
  
  // Verify the hash against the password entered
  $verify = password_verify($plaintext_password, $hash);
  
  // Print the result depending if they match
  if ($verify) {
      echo 'Password Verified!';
  } else {
      echo 'Incorrect Password!';
  }
?>
```
> Password Verified!

Nb: Il ne faut jamais stocker un mot de passe en clair dans un fichier ou une base de données et même dans votre code.
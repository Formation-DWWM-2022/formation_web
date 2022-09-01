# L'autoload

- Autoloading et Composer : https://youtu.be/HuXWn20lLao?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- L'AUTOLOADING (CHARGEMENT AUTOMATIQUE DES CLASSES) : https://youtu.be/DimHSKuoyUo
- L'autoloader : https://youtu.be/pwD-xxtZ1g0
- Namespaces & Autoloading : https://youtu.be/NLXtGZ6Ilsw
- Autoloading in PHP without and with Composer : https://youtu.be/FCHWAyUDXik
- Load Classes Automatically In OOP PHP : https://youtu.be/z3pZdmJ64jo?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh

Comme vous l'avez remarqué, nous aurons rapidement de nombreux fichiers à charger lors de l'utilisation des objets.

Nous allons mettre en place un système de chargement des fichiers à la demande.

En résumé, si le serveur PHP trouve une classe qu'il ne connaît pas, il va chercher le fichier correspondant et le charger pour nous.

# La fonction spl_autoload_register

Tout repose sur la fonction PHP appelée spl_autoload_register. Cette fonction a pour rôle d'enregistrer une fonction qui sera appelée à chaque fois qu'une classe inconnue sera rencontrée. Ainsi, nous pourrons mettre en oeuvre un système qui permettra de chercher le fichier PHP correspondant à une classe et de le charger, si il existe.


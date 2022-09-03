Presque chaque application ou blog gère les Users. Qu’il s’agisse du processus d’inscription, de la connexion et de la déconnexion, de l’envoi de rappels aux Users qui ont perdu leurs mots de passe ou de la modification des mots de passe à la demande, tout le code qui gère les Users devrait être regroupé en une seule classe d’Users. Dans notre exemple, nous appelons la classe qui gère les Users User, en accord avec la convention de nommage en vigueur.

Écrivons une classe User avec les outils que nous venons d’acquérir. Cette classe contiendra le prénom et le nom de famille de chaque User et sera en mesure de dire bonjour à toute personne qui utilise notre application.

Créez la première instance, et appelez-la $user1. Utilisez le nouveau mot-clé pour créer un objet à partir de la classe. Définissez les valeurs pour le prénom et le nom de famille à $user1. Obtenir le prénom et le nom de famille de l’User, et l’imprimer à l’écran avec echo. Utilisez la méthode hello() avec les variables prénom et nom de famille pour dire bonjour à l’User. 

Ajoutez un autre objet, appelez-le $user2, donnez-lui un prénom de 'Jane' et un nom de 'Doe', puis dites bonjour à l’User.

Ajoutez à la méthode hello() la possibilité d’approcher la propriété $firstName, ainsi la méthode hello() pourrait retourner la chaîne "hello, $firstName".

--- 

Créez une nouvelle propriété de classe avec le nom de $firstName, et empêchez tout code en dehors de la classe de changer la valeur de la propriété en utilisant le modificateur d’accès approprié (privé ou public).

Créez une méthode pour définir la valeur de la propriété $firstName. Utilisez le bon modificateur d’accès pour la méthode (public/privé).

Maintenant, créez une méthode pour retourner la valeur $firstName.

Créez un nouvel objet User avec le nom de $user1, définissez son nom sur "Joe" et faites-lui retourner son nom.

--- 

Revenons à la classe User que nous avons développée dans l'exercice précédents. Cependant, au lieu d’utiliser les méthodes setter, nous définirons les valeurs pour le prénom et le nom de famille à travers le constructeur.

Il s’agit de la classe User avec les propriétés privées $firstName et $lastName.

Ajoutez à la classe une méthode de construction pour définir une valeur à la propriété $firstName et $lastName dès que l’objet est créé.

Ajoutez à la classe une méthode publique getFullName() qui retourne le nom complet.

Créez un nouvel objet, $user1, et passez au constructeur les valeurs du prénom et du nom.
Le prénom est "John" et le nom de famille est "Doe" (vous pouvez choisir votre combinaison préférée de prénom et nom de famille).

Obtenir le nom complet, et l’écho à l’écran.

---

Créer une classe User.

Ajoutez à la classe une propriété privée avec le nom de $username.

Créez une méthode setter qui peut définir la valeur du $username.

Créez une classe Admin qui hérite de la classe User.

Maintenant, ajoutons un peu de code à la classe Admin. Tout d’abord, ajoutez une méthode publique sous le nom expressYourRole(), et faites-lui retourner la chaîne : "Admin".

Ajouter à la classe Admin une autre méthode publique, sayHello(), qui renvoie la chaîne "Hello admin, XXX" avec le nom d’User au lieu de XXX.

Créer un objet $admin1 hors de la classe Admin
- mettre son nom à "Balthazar" et dire bonjour à l’User.
Tu vois un problème ?

Changez le code pour résoudre le problème.

Essayez d’écrire la solution avec une méthode getter à l’intérieur du parent qui peut être utilisée à partir de la classe enfant.

--- 
 
Dans l’exemple suivant, nous créerons une classe User abstraite et deux classes enfants (classes Admin et Viewer) qui hériteront de la classe abstraite.

Créez une classe abstraite avec le nom de l’User, qui a une méthode abstraite avec le nom de stateYourRole().

Ajoutez à la classe une variable protégée avec le nom de $username, et les méthodes public setter et getter pour définir et obtenir le $username.

Créez une classe Admin qui hérite de la classe User abstraite.

Quelle méthode doit être définie dans la classe ?

Définissez la méthode stateYourRole() dans la classe enfant et laissez-la retourner la chaîne "admin";

Créez une autre classe, Viewer, qui hérite de la classe User abstract. Définissez la méthode qui doit être définie dans chaque classe enfant de la classe User.

Créer un objet à partir de la classe Admin, définir le nom d’User à "Balthazar", et lui faire retourner la chaîne "admin".

--- 

Dans ce tutoriel, nous avons vu qu’une classe peut implémenter plus d’une interface. Dans l’exemple final, nous irons un peu plus loin en laissant la même classe enfant hériter à la fois d’une classe mère et de deux interfaces.

Créez une classe User avec une propriété et des méthodes $username protégées qui peuvent définir et obtenir $username.

Créez une interface Auteur avec les méthodes suivantes qui peuvent donner à l’User un tableau de droits d’auteur. La première méthode est setAuthorPrivileges(), et elle obtient un paramètre de $array, et la deuxième méthode est getAuthorPrivileges().

Créez une interface d’éditeur avec des méthodes pour définir et obtenir les privilèges de l’éditeur.

Créez une classe AuthorEditor qui étend à la fois la classe User et implémente les interfaces Auteur et Éditeur.

Créez dans la classe AuthorEditor les méthodes qu’il devrait implémenter, et les propriétés que ces méthodes nous forcent à ajouter à la classe.

> Par exemple, pour implémenter la méthode publique setAuthorPrivileges(), nous devons ajouter à notre classe une propriété qui détient le tableau des droits d’auteur, et la nommer $authorPrivilegesArray en conséquence.

Maintenant, créons un objet avec le nom de $user1 de la classe AuthorEditor, et définissons son nom d’User à "Balthazar".

Définissez dans l’objet $user1 un tableau de privilèges d’auteur, avec les privilèges suivants : "write text", "add punctuation".

Définissez dans l’objet $user1 un tableau avec les privilèges éditoriaux suivants : "edit text", "edit punctuation".

Ecrire le code pour obtenir le nom et les privilèges $user1

--- 

Afin d’implémenter le principe du polymorphisme, nous allons créer une classe d’User abstraite qui engage les classes qui en héritent pour calculer le nombre de scores qu’un User a en fonction du nombre d’articles qu’il a rédigés ou édités. Sur la base de la classe User, nous allons créer les classes Auteur et Éditeur, et les deux calculeront le nombre de scores avec la méthode calcScores(), bien que la valeur calculée diffère entre les deux classes.

Ajouter à la classe User des méthodes concrètes pour définir et obtenir le nombre d’articles:
1. setNumberOfArticles($int)
2. getNumberOfArticles()
$int signifie un entier.

Ajouter à la classe la méthode abstraite : calcScores(), qui effectue les calculs de scores séparément pour chaque classe.

Créez une classe Auteur qui hérite de la classe User. Dans l’Auteur créer une méthode calcScores() concrète qui renvoie le nombre de scores à partir du calcul suivant:
numérotationArticles * 10 + 20

Créez également une classe Éditeur qui hérite de la classe User. Dans l’éditeur, créez une méthode calcScores() concrète qui renvoie le nombre de scores à partir du calcul suivant :
numérotationArticles * 6 + 15

Créez un objet, $author1, à partir de la classe Auteur, définissez le nombre d’articles à 8, et faites écho aux partitions que l’auteur a obtenues.

Créez un autre objet, $editor1, à partir de la classe Editor, définissez le nombre d’articles à 15, et faites écho aux partitions que l’éditeur a gagnées.
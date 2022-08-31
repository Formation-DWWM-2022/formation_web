# Introduction à la programmation orientée objet PHP : classes, instances et objets

-  L'objet DateTime : https://youtu.be/DhMcHjDOitE

Nous allons redécouvrir le PHP sous un nouvel angle avec la programmation orientée objet. La programmation orientée objet est une façon différente de coder qui va suivre des règles différentes et va amener une syntaxe différente, ce qui fait qu’elle peut être perçue comme difficile à comprendre pour des débutants.

Je vais essayer de vous présenter le PHP orienté objet étape par étape et vous conseille fortement de ne pas faire l’impasse sur cette partie car cette nouvelle façon d’écrire son code va posséder des avantages indéniables qu’on va illustrer ensemble et est l’une des grandes forces du PHP.

Par ailleurs, il convient de noter que de nombreux langages serveurs possèdent une écriture orientée objet car encore une fois cette façon de coder va s’avérer très puissante.

# Qu’est-ce que la programmation orientée objet (POO) ?

La programmation orientée objet (ou POO en abrégé) correspond à une autre manière d’imaginer, de construire et d’organiser son code.

Jusqu’à présent, nous avons codé de manière procédurale, c’est-à-dire en écrivant une suite de procédures et de fonctions dont le rôle était d’effectuer différentes opérations sur des données généralement contenues dans des variables et ceci dans leur ordre d’écriture dans le script.

La programmation orientée objet est une façon différente d’écrire et d’arranger son code autour de ce qu’on appelle des objets. Un objet est une entité qui va pouvoir contenir un ensemble de fonctions et de variables.

L’idée de la programmation orientée objet va donc être de grouper des parties de code qui servent à effectuer une tâche précise ensemble au sein d’objets afin d’obtenir une nouvelle organisation du code.

Les intérêts principaux de la programmation orientée objet vont être une structure générale du code plus claire, plus modulable et plus facile à maintenir et à déboguer.

La programmation orientée objet va introduire des syntaxes différentes de ce qu’on a pu voir jusqu’à présent et c’est l’une des raisons principales pour lesquelles le POO en PHP est vu comme une chose obscure et compliquée par les débutants.

Au final, si vous arrivez à comprendre cette nouvelle syntaxe et si vous faites l’effort de comprendre les nouvelles notions qui vont être amenées, vous allez vous rendre compte que la POO n’est pas si complexe : ce n’est qu’une façon différente de coder qui va amener de nombreux avantages.

Pour vous donner un aperçu des avantages concrets de la POO, rappelez-vous du moment où on a découvert les fonctions prêtes à l’emploi en PHP. Aujourd’hui, on les utilise constamment car celles-ci sont très pratiques : elles vont effectuer une tâche précise sans qu’on ait à imaginer ni à écrire tout le code qui les fait fonctionner.

Maintenant, imaginez qu’on dispose de la même chose avec les objets : ce ne sont plus des fonctions mais des ensembles de fonctions et de variables enfermées dans des objets et qui vont effectuer une tâche complexe qu’on va pouvoir utiliser directement pour commencer à créer des scripts complexes et complets !

# Classes, objets et instance : première approche

La programmation orientée objet se base sur un concept fondamental qui est que tout élément dans un script est un objet ou va pouvoir être considéré comme un objet. Pour comprendre ce qu’est précisément un objet, il faut avant tout comprendre ce qu’est une classe.

Une classe est un ensemble cohérent de code qui contient généralement à la fois des variables et des fonctions et qui va nous servir de plan pour créer des objets. Le but d’une classe va donc être de créer des objets que nous allons ensuite pouvoir manipuler.

Il est généralement coutume d’illustrer ce que sont les objets et les classes en faisant des parallèles avec la vie de tous les jours. De manière personnelle, j’ai tendance à penser que ces parallèles embrouillent plus qu’ils n’aident à comprendre et je préfère donc vous fournir ici un exemple plus concret qui reste dans le cadre de la programmation.

Imaginons qu’on possède un site sur lequel les visiteurs peuvent s’enregistrer pour avoir accès à un espace personnel par exemple. Quand un visiteur s’enregistre pour la première fois, il devient un utilisateur du site.

Ici, on va essayer de comprendre comment faire pour créer le code qui permet cela. Pour information, ce genre de fonctionnalité est quasiment exclusivement réalisé en programmation orienté objet.

Qu’essaie-t-on de réaliser ici ? On veut « créer » un nouvel utilisateur à chaque fois qu’un visiteur s’enregistre à partir des informations qu’il nous a fournies. Un utilisateur va être défini par des attributs comme son nom d’utilisateur ou son mot de passe. Ces attributs vont être des variables. Ensuite, un utilisateur va pouvoir réaliser certaines actions spécifiques comme se connecter, se déconnecter, modifier son profil, etc. Ces actions vont être des fonctions.

Nous allons donc définir les attributs et actions / fonctions de notre utilisateur. Pour cela, on va créer un formulaire d’inscription sur notre site qui va demander un nom d’utilisateur et un mot de passe d’un côté, et allons devoir côté serveur récupérer ces informations et les associer à un utilisateur en précisant qu’il s’agit du nom d’utilisateur et du mot de passe. On va également définir les actions (fonctions) propres à nos utilisateurs : connexion, déconnexion, possibilité de commenter, etc.

Sur notre site, on s’attend à avoir régulièrement de nouveaux visiteurs qui s’inscrivent et donc de nouveaux utilisateurs. Il est donc hors de question de définir toutes ces choses manuellement à chaque fois.

A la place, on va plutôt créer un bloc de code qui va initialiser nos variables nom d’utilisateur et mot de passe par exemple et qui va définir les différentes actions que va pouvoir faire un utilisateur.

Ce bloc de code est le plan de base qui va nous servir à créer un nouvel utilisateur. On va également dire que c’est une classe. Dès qu’un visiteur s’inscrit, on va pouvoir créer un nouvel objet « utilisateur » à partir de cette classe et qui va disposer des variables et fonctions définies dans la classe. Lorsqu’on crée un nouvel objet, on dit également qu’on « instancie » ou qu’on crée une instance de notre classe.

Une classe est donc un bloc de code qui va contenir différentes variables, fonctions et éventuellement constantes et qui va servir de plan de création pour différents objets. Chaque objet créé à partir d’une même classe dispose des mêmes variables, fonctions et constantes définies dans la classe mais va pouvoir les implémenter différemment.

# Classes et objets : exemple de création

Reprenons notre exemple précédent et créons une première classe qu’on va appeler Utilisateur. Bien évidemment, nous n’allons pas créer tout un script de connexion utilisateur ici, mais simplement définir une première classe très simple.

En PHP, on crée une nouvelle classe avec le mot clef class. On peut donner n’importe quel nom à une nouvelle classe du moment qu’on n’utilise pas un mot réservé du PHP et que le premier caractère du nom de notre classe soit une lettre ou un underscore.

Par convention, on placera généralement chaque nouvelle classe créée dans un fichier à part et on placera également tous nos fichiers de classe dans un dossier qu’on pourra appeler classes par exemple pour plus de simplicité.

Comme je vous l’ai dit plus haut, l’un des grands avantages de la POO se situe dans la clarté du code produit et cette clarté est notamment le résultat d’une bonne séparation du code.

On n’aura ensuite qu’à inclure les fichiers de classes nécessaires à l’exécution de notre script principal dans celui-ci grâce à une instruction require par exemple.

On va donc créer un nouveau fichier en plus de notre fichier principal cours.php qu’on va appeler utilisateur.class.php. Notez qu’on appellera généralement nos fichiers de classe « maClasse.class.php » afin de bien les différencier des autres et par convention une nouvelle fois.

Dans ce fichier de classe, nous allons donc pour le moment tout simplement créer une classe Utilisateur avec le mot clef class.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-creation-classe.png)

Pour le moment, notre classe est vide. Vous pouvez remarquer que la syntaxe générale de déclaration d’une classe ressemble à ce qu’on a déjà vu avec les fonctions.

Nous allons également directement en profiter pour inclure notre classe dans notre fichier principal cours.php avec une instruction require. Ici, mon fichier de classe est dans un sous-dossier « classes » par rapport à mon fichier principal.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-require-classe.png)

Ensuite, nous allons rajouter la ligne suivante dans notre script principal :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-instance-classe.png)

Ci-dessus, nous avons créé ce qu’on appelle une nouvelle instance de notre classe Utilisateur.

La syntaxe peut vous sembler particulière et c’est normal : rappelez-vous que je vous ai dit que le PHP orienté objet utilisait une syntaxe différente du PHP conventionnel.

Ici, le mot clef new est utilisé pour instancier une classe c’est-à-dire créer une nouvelle instance d’une classe.

Une instance correspond à la « copie » d’une classe. Le grand intérêt ici est qu’on va pouvoir effectuer des opérations sur chaque instance d’une classe sans affecter les autres instances.

Par exemple, imaginons que vous créiez deux nouveaux fichiers avec le logiciel Word. Chaque fichier va posséder les mêmes options : vous allez pouvoir changer la police, la taille d’écriture, etc. Cependant, le fait de personnaliser un fichier ne va pas affecter la mise en page du deuxième fichier.

A chaque fois qu’on instancie une classe, un objet est également automatiquement créé. Les termes « instance de classe » et « objet » ne désignent pas fondamentalement la même chose mais dans le cadre d’une utilisation pratique on pourra très souvent les confondre et c’est ce que nous allons faire dans ce cours.

Pour information, la grande différence est que chaque instance de classe est unique et peut donc être identifiée de manière unique ce qui n’est pas le cas pour les objets d’une même classe.

Lorsqu’on instancie une classe, un objet est donc créé. Nous allons devoir capturer cet objet pour l’utiliser. Pour cela, nous allons généralement utiliser une variable qui deviendra alors une « variable objet » ou plus simplement un « objet ».

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-creation-objet.png)

Pour être tout à fait précis, notre variable en question ne va exactement contenir l’objet en soi mais plutôt une référence à l’objet. Nous reparlerons de ce point relativement complexe en fin de partie et allons pour le moment considérer que notre variable contient notre objet.

# Classes, instances et objets : l’essentiel à retenir

Une classe est un « plan d’architecte » qui va nous permettre de créer des objets qui vont partager ses variables et ses fonctions. Chaque objet créé à partir d’une classe va disposer des mêmes variables et fonctions définies dans la classe mais va pouvoir implémenter ses propres valeurs.

Pour l’instant, nous n’avons créé qu’une classe vide et donc il est possible que vous ne compreniez pas encore l’intérêt des classes. Dès le chapitre suivant, nous allons inclure des variables et des fonctions dans notre classe et plus le cours va avancer, plus vous allez comprendre les différents avantages de programmer en orienté objet et des classes. Je ne peux juste pas tout vous révéler d’un coup, il va falloir y aller brique après brique.

Pour créer un objet, il faut instancier la classe en utilisant le mot clef new. Une instance est une « copie » de classe. On va stocker notre instance ou notre objet dans une variable pour pouvoir l’utiliser.

Pour vous donner finalement un parallèle avec la vie de tous les jours, imaginez le plan de création de base d’un modèle de voiture. Ce plan va définir les différents éléments des voitures, c’est-à-dire de quoi va être composée chaque voiture (un moteur, des portes, des roues, une peinture, etc.) ainsi que les actions de chaque voiture, c’est-à-dire ce que peut faire chaque voiture (accélérer, allumer les phares, etc.).

Nous allons pouvoir créer des voitures à partir de ce plan qui va être l’équivalent d’une classe et chaque voiture créée à partir de celui-ci va posséder les éléments (= variables) et actions (= fonctions) définies dans le plan. Les voitures créées sont ici nos objets.

Cependant, les éléments vont pouvoir avoir des apparences différentes : chaque voiture va posséder un moteur mais le moteur va pouvoir être différent pour chaque voiture (plus ou moins puissant). De même, chaque voiture va posséder une couleur mais la couleur de chaque voiture va pouvoir être différente.

Chaque voiture créée à partir du plan va avoir accès au même nombre d’actions mais les différentes actions des voitures vont être différentes en fonction des éléments de chaque voiture : chaque voiture va pouvoir accélérer mais une voiture avec un moteur plus puissant va accélérer plus vite qu’une autre qui possède un moteur plus petit.
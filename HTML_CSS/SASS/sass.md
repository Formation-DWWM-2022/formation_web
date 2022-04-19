# Présentation de Sass

Sass est un préprocesseur CSS. Un préprocesseur est un programme qui procède à des transformations sur un code source avant l’étape de traduction proprement dite (compilation dans le cas de Sass ou interprétation pour d’autres types de préprocesseur).

Sass permet en quelques sortes “d’étendre” les possibilités du CSS classique en nous permettant d’utiliser des variables, des règles imbriquées, des mixins, des fonctions, etc. Nous allons voir dans la suite de ce cours en quoi ces éléments vont nous aider à créer un meilleur CSS, plus intuitif et mieux organisé.

La structure d’un fichier SCSS va ressembler à celle de nos fichiers CSS classiques : nous allons utiliser des déclarations pour indiquer quels styles doivent être appliqués à quels éléments. Cependant, nous allons également pouvoir utiliser des fonctionnalités propres à SASS pour nous permettre d’avoir un code plus clair et plus facilement maintenable, comme par exemple l’imbrication de sélecteurs ou l’héritage de règles CSS.

Avant d’utiliser Sass à proprement parler, vous devez savoir que SASS supporte deux syntaxes différentes. Ces deux syntaxes sont représentées par deux extensions de fichiers différentes : les extensions .scss et .sass.

La syntaxe liée à l’extension .sass, qu’on appelle encore “syntaxe indenté”, est la syntaxe originelle de Sass. Cette syntaxe utilise notamment l’indentation à la place des accolades pour spécifier la structure du document.

La syntaxe liée à l’extension .scss est un sur-ensemble du CSS, ce qui signifie que tout code CSS valide est également reconnu et valide en SCSS. Cela rend cette syntaxe plus simple d’utilisation que la précédente, et c’est donc sur celle-ci que ce cours sera basé.

# Installation de Sass

Les navigateurs ne comprennent pas le code Sass. Pour utiliser Sass, nous allons devoir utiliser un compilateur dont le rôle va être de traduire les fichiers .sass ou .scss (fichiers Sass) en fichiers .css (fichiers CSS classiques) compréhensibles par le navigateur.

Nous avons deux moyens de faire cela : on peut soit utiliser une application qui se chargera de compiler le code Sass, soit installer Sass (qui embarque son propre compilateur) via notre ligne de commande pour ensuite pouvoir utiliser le compilateur Sass directement depuis celle-ci.

Je vais vous présenter les deux façons de faire ici car selon votre situation / entreprise vous aurez accès à certains outils et pas à d’autres et il est important que vous sachiez vous débrouiller en fonction des outils auxquels vous avez accès.

# Installation de Sass via la ligne de commande

L’interface en ligne de commande est une interface qui nous permet d’envoyer des commandes directement à notre machine en utilisant notre clavier. Si vous travaillez avec Mac, cherchez l’application Terminal. Si vous travaillez avec Windows, cherchez PowerShell ou l’Invite de Commande (cmd).

Note : pour ce cours, vous n’avez pas véritablement besoin de savoir comment fonctionne une interface en ligne de commande (Terminal, Invite de commande) puisque nous n’allons taper que quelques commandes pour installer les composants nécessaires pour utiliser Sass. Je vous recommande toutefois fortement d’apprendre à utiliser l’interface en ligne de commande car cela vous sera très utile dans votre futur de développeur.

Nous pouvons installer Sass à partir de plusieurs sources différentes en utilisant notre interface en ligne de commande. On peut cloner le dépôt Sass à partir de GitHub ou installer le paquet Sass via npm (Node Package Manager).

Dans ce cours, nous allons utiliser npm, le gestionnaire de paquets et le gestionnaire de paquets officiel de Node.js. La façon la plus simple d’installer npm est d’installer Node.js puisque npm est livré avec. Pour cela, rendez-vous sur le site nodejs.org et téléchargez la dernière version stable (LTS) de Node.

Pour vérifier que l’installation s’est bien passée, vous pouvez ouvrir votre Terminal (Mac) ou Invite de commande (Windows) et taper node -v qui devrait vous renvoyer la version de Node.js installée et npm -v qui devrait vous renvoyer la version de npm installée.

Pour installer Sass, il suffit de taper la commande npm install -g sass dans votre interface en ligne de commande.


![image](https://www.pierre-giraud.com/wp-content/uploads/2021/04/installation-sass-npm.png)

Cette commande va installer Sass globalement. Si vous préférez une installation locale, tapez simplement npm install sass à partir du répertoire dans lequel vous souhaitez installer Sass.
Note : La version de Sass disponible via npm est une implémentation JavaScript pure de Sass. Cette version s’exécute plus lentement que les autres et est donc à déconseiller pour du travail en production.
Note : Vous pouvez taper la commande sass --version pour vérifier que Sass a bien été installé. Si c’est le cas, cette commande vous renverra le numéro de version installée.

Si vous venez juste d’installer npm, il est possible qu’une erreur relative aux permissions vous soit renvoyée (notamment avec Mac) lors de la tentative d’installation de Sass et que celle-ci échoue donc.

Pour résoudre ce problème, vous avez deux solutions : changer les permissions du répertoire /usr/local/ ou créer un autre répertoire pour l’installation des paquets ou modules npm.

Il n’est pas recommandé de changer le propriétaire du fichier, notamment dans le cas où plusieurs utilisateurs utilisent votre machine. On va plutôt créer un nouveau répertoire dans lequel on installera nos paquets.

Pour cela, on commence par cd pour retourner dans notre répertoire de départ puis on crée un répertoire qu’on peut appeler “npm-global” avec mkdir npm-global.

Ensuite, il faut qu’on définisse ce répertoire comme préfixe avec la commande npm config set prefix /Users/votre_nom_utilisateur/npm-global. Vous devriez maintenant être capable d’installer n’importe quel paquet dans ce répertoire.

Pour exécuter les commandes des paquets installés, cependant, il va falloir qu’on ajoute ce répertoire à la liste des répertoire de notre variable $PATH (qui est une variable contenant une liste de répertoires indiquant à votre système d’exploitation où rechercher des programmes).

Pour faire cela, tapez cd pour retourner dans votre répertoire home puis tapez la commande vi ~/.profile . Dans le fichier profile, ajoutez la ligne export PATH=/USERS/pierre/npm-global/bin:$PATH. Pour sortir de l’éditeur vi, pressez la touche échap puis pressez shift et appuyez deux fois sur z.

Il ne reste plus alors qu’à rafraîchir la variable afin que la ligne ajoutée soit bien prise en compte par le système. Pour cela, on peut utiliser la commande source ~/.profile.

# Installation de Sass via une application

De nombreuses applications proposent également une prise en charge et la compilation des fichiers Sass. C’est notamment le cas de Visual Studio Code.

En effet, Visual Studio Code dispose de nombreuses extensions gratuites et directement installables. Pour accéder à ces extensions, il suffit de cliquer sur l’icône « Extensions » sur le panneau gauche de l’éditeur.

Parmi ces extensions, il y a notamment une extension nommée « Live Sass Compiler » qui va, comme son nom l’indique, compiler le code Sass en live en code CSS. Cherchez cette extension dans la barre de recherche et installez la.

![image](https://www.pierre-giraud.com/wp-content/uploads/2021/04/installation-sass-live-compiler.png)

Attention : L’extension Live Sass Compiler de Ritwick Dey n’est plus maintenue depuis mi-2018 et ne reconnaitra donc pas les fonctionnalités Sass ultérieures à cette date. Une toute nouvelle extension créée par Glenn Marks, basée sur le travail de Ritwick Dey et également appelée Live Sass Compiler est également disponible dans VS Code. Cette extension devrait être plus performante et reconnaitre toutes les dernières fonctionnalités de Sass.

Une fois l’extension installée, créez un nouveau dossier qu’on va appeler « sass-vs » sur votre bureau par exemple.

Nous allons créer un fichier cours.html dans ce dossier et un sous-dossier « css » dans lequel nous allons créer un fichier styles.scss.

Cliquez ensuite sur « ouvrir un dossier » dans l’explorateur de VS Code et ouvrez le dossier tout juste créé.

A partir de là, cliquez sur votre fichier cours.scss puis cliquez sur l’option « watch sass » en bas de la fenêtre. Deux fichiers cours.css et cours.css.map vont alors être automatiquement créés dans ce même dossier :

![image](https://www.pierre-giraud.com/wp-content/uploads/2021/04/compilateur-sass-live.png)

Nous n’avons alors plus qu’à écrire notre code Sass dans notre fichier cours.scss. A chaque sauvegarde du fichier cours.scss, le code est automatiquement compilé et enregistré dans le fichier cours.css. 

# Qu’est-ce qu’une variable Sass ?

Une variable Sass est un conteneur pour une valeur. L’idée est de lier un nom à une valeur puis d’utiliser ensuite ce nom à la place de la valeur dans le code. Le nom utilisé sera ensuite converti automatiquement en la valeur à laquelle il est lié. Cela permet une plus grande clarté dans le code et une bien meilleure maintenabilité puisque si on souhaite changer la valeur en question il suffit de la faire une fois à l’endroit où on l’a lié au nom.

Les variables Sass sont très simple d’utilisation : il suffit d’utiliser un signe $ (dollar) suivi d’un nom pour déclarer (c’est-à-dire créer) une variable et d’affecter une valeur à ce nom en séparant le nom de la valeur par le signe : (deux-points).

# Variables Sass vs variables CSS

Les variables Sass sont différentes des variables ou “propriétés personnalisées (“custom properties”) CSS et s’utilisent différemment :

- Les variables Sass sont toutes compilées par Sass. Les variables CSS sont incluses dans la sortie CSS.
- Les variables CSS peuvent avoir différentes valeurs pour différents éléments, mais les variables Sass n’ont qu’une valeur à la fois.
- Les variables Sass sont impératives, ce qui signifie que si vous utilisez une variable puis modifiez sa valeur, l’utilisation antérieure restera la même. Les variables CSS sont déclaratives, ce qui signifie que si vous modifiez la valeur, cela affectera les utilisations antérieures et ultérieures.

 # Cas pratique d’utilisation des variables Sass

Imaginons que nous possédions un site avec une charte graphique précise. Notre site va utiliser un nombre limité de couleurs et de variations pour habiller le contenu HTML.

Ici, l’utilisation des variables Sass va être particulièrement pertinente : nous allons pouvoir affecter les différentes couleurs de notre site à nos variables puis utiliser ces variables à travers tout notre code Sass. Si un jour nous venons à modifier la charte graphique, nous n’aurons ainsi qu’à mettre à jour la valeur affectée aux variables.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-support-html-utilisation-variable.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-utilisation-variable-resultat.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-utilisation-variable-css.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-utilisation-variable-scss.png)
 
# Valeur par défaut des variables

Dans certains cas, on voudra laisser la possibilité aux utilisateurs de notre code de personnaliser les valeurs des variables avant de les utiliser pour générer le code CSS. Cela peut être le cas par exemple lorsqu’on souhaite laisser aux utilisateurs la possibilité de changer les couleurs des différents éléments pour personnaliser leur site.

Sass met à notre disposition le drapeau !default qui permet de réaliser cela. En effet, ce drapeau permet d’indiquer qu’une valeur doit être affectée à une variable uniquement si cette variable n’est pas définie ou si sa valeur est null (c’est-à-dire dans si l’utilisateur n’a pas personnalisé la couleur dans notre exemple). Sinon, la valeur existante sera utilisée.

# La portée des variables

La “portée” des variables définit l’espace dans lequel les variables vont être accessibles. Les variables SASS peuvent avoir une portée soit globale, soit locale.

Les variables déclarées en dehors des accolades (dans les fichiers .scss) sont appelées variables globales. Les variables globales sont disponibles (utilisables) n’importe où après leur déclaration, même dans une autre feuille de style.

Les variables déclarées dans des blocs (les accolades dans les fichiers .scss) sont généralement locales et ne sont accessibles que dans le bloc où elles ont été déclarées.

Dans certains cas particuliers, on voudra définir des variables globales depuis un espace de portée local. Pour faire cela, il suffit d’utiliser le drapeau SASS !global qui permet d’indiquer qu’une variable doit être considérée comme globale quelque soit l’endroit où elle a été déclarée.

Deux variables locale et globale possédant le même nom peuvent tout à fait cohabiter : chaque variable sera considérée comme une entité différente. Dans ce cas, la variable locale aura la priorité sur la variable globale dans l’espace dans lequel elle a été déclarée. 

# Qu’est-ce qu’une fonction ?

Une fonction est un bloc de code contenant une suite d’instructions cohérentes et dont le rôle est d’effectuer une tâche précise.

L’idée de base d’une fonction est d’effectuer des calculs ou opérations dans son corps et de renvoyer une valeur en résultat. Généralement, les calculs vont être faits en fonction de certaines données qu’on va devoir passer à la fonction pour qu’elle fonctionne. On appelle ces données des arguments.

Il existe deux grands moyens d’utiliser les fonctions avec Sass : on peut soit utiliser des fonctions Sass prédéfinies ou “prêtes à l’emploi”, soit créer nos propres fonctions.

# A quoi servent les fonctions Sass ?

En programmation, les fonctions servent généralement deux objectifs :

- Gagner du temps de développement / simplifier nos scripts ;
- Masquer la complexité de certaines opérations.

Pour bien comprendre cela, il faut expliquer plus précisément ce que sont les fonctions.

Une fonction est un suite d’instruction cohérentes auxquelles on donne un nom. Il nous suffit ensuite d’utiliser ce nom pour exécuter tûtes les instructions contenues dans le corps de la fonction.

Imaginons qu’on doive faire certains calculs pour déterminer une couleur ou une marge, et qu’on doive refaire ces calculs plusieurs fois dans nos fichiers CSS. Il peut être ingénieux d’utiliser une fonction dans ce cas là.

En effet, nous n’aurons qu’à définir une seule et unique fois notre fonction avec notre suite de calcul dans la fonction puis nous allons pouvoir réutiliser cette fonction en l’appelant simplement dans notre fichier. Cela permet donc de créer du code plus clair, plus simple, et plus facilement maintenable à la manière des variables étudiées précédemment.

Les fonctions peuvent également permettre de masquer la complexité de certaines opérations, notamment dans le cas des fonctions prédéfinies. En effet, la Scss nous fournit des fonctions prêtes à l’emploi et certaines d’entres elles auraient été difficiles à coder nous même car elles contiennent beaucoup de calculs différents. Heureusement, nous n’avons qu’à appeler ces fonctions pour effectuer les opérations qu’elles contiennent !

# Utilisation des fonctions Sass prédéfinies

Une fonction prédéfini est une fonction dont le corps (le code) a déjà été défini et est intégré au langage.

Pour utiliser une fonction prédéfinie, il suffit de l’appeler en utilisant son nom en lui passant éventuellement des données dont elle a besoin pour fonctionner et qu’on appelle arguments. La syntaxe générale pour appeler une fonction va être la suivante : nom_de_fonction(argument1, argument2).

Pour appeler une fonction, on écrit donc son nom suivi d’un couple de parenthèses (obligatoires) dans lesquelles on peut éventuellement placer des données (arguments) qui seront transmis à la fonction pour qu’elle effectue des calculs.

Prenons immédiatement quelques exemples en présentant quelque fonctions Sass utiles. Vous pouvez obtenir la liste complète des fonctions Sass sur la documentation officielle ici.
La fonction Sass random()

La fonction Sass random() retourne un nombre aléatoire. Si on utilise cette fonction sans lui passer d’argument, la fonction retournera un nombre décimal aléatoire compris entre 0 et 1. Si on lui passe un argument plus grand que 1, la fonction random() retournera un nombre entier aléatoire compris entre 1 et le nombre passé.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-random-fonction-support-html.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-random-fonction-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-random-fonction-resultat-css.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-random-fonction-resultat.png)

Ici, on utilise random() trois fois au sein de la fonction CSS rgb() en lui passant une limite en argument de 255. A chaque fois qu’on utilise random(255), la fonction va renvoyer un nombre entier aléatoire compris entre 1 et 255.

La fonction rgb() va ainsi recevoir trois nombres aléatoires compris entre 1 et 255 et pouvoir à son tour calculer une couleur à partir de ces trois nombres.

# La fonction round()

La fonction round() permet d’arrondir un nombre décimal à l’entier le plus proche. Cette fonction peut être très utile pour arrondir un nombre après un calcul dans le cas de calculs de marges par exemple.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-round-fonction-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-round-fonction-resultat-css.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-round-fonction-resultat.png)

On utilise ici plusieurs notions d’un coup. Dans cet exemple, il faut commencer par imaginer qu’on obtient le nombre “1440” (contenu dans la variable $largeur suite à certains calculs et que ce nombre n’est pas connu à l’avance mais est variable.

On utilise ensuite ce nombre pour calculer des marges gauche et droite. Ici, comme on veut obtenir une valeur entière pour les marges, on utilise round($largeur/100. La fonction renvoie l’entier le plus proche de 1440/100 (14).

Ensuite, pour que la valeur soit bien reconnue par margin, il faut lui passer une unité. On utilise ici le signe + comme opérateur de concaténation. Concaténer signifie “mettre bout à bout”.

Lorsqu’on utilise + avec des valeurs de type chaine de caractères (des mots), il permet de mettre bout à bout ces valeurs pour créer une nouvelle chaine. Ici, on obtient donc 14px.

# La fonction adjust-color()

La fonction adjust-color() permet d’ajuster une couleur de base en modifiant certains de ses composants. Cette fonction va pouvoir être utile pour créer des variations d’une couleur principale par exemple.

Cette fonction peut prendre jusqu’à 5 arguments :

- soit une couleur puis trois nombres pour ajuster les canaux RGB de la couleur et enfin un niveau d’opacité ;
- soit une couleur puis trois nombres pour ajuster les canaux HSL de la couleur et enfin un niveau d’opacité.

Notez que seul le premier argument relatif à la couleur de base est obligatoire au fonctionnement de la fonction. Les autres sont facultatifs.

On va pouvoir utiliser cette fonction comme ceci (valeurs RGB) : adjust-color(couleur, $red: nombre, $green: nombre, $blue: nombre, $alpha: nombre) ou comme cela (valeurs HSL) : adjust-color(couleur, $hue: nombre, $saturation: nombre, $lightness: nombre, $alpha: nombre)

Les valeurs passées vont être ajoutées à la propriété correspondante de la couleur de base pour renvoyer finalement une couleur ajustée. On va pouvoir passer des valeurs négatives pour diminuer une propriété de la couleur de base.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-adjust-color-fonction-support-html.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-adjust-color-fonction-exemple.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-adjust-color-fonction-resultat-css.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-adjust-color-fonction-resultat.png)

# Les fonctions darken() et lighten()

Le fonctions darken() et lighten() permettent respectivement de rendre une couleur plus foncée ou plus claire d’un certain montant exprimé en pourcentage.

On va passer deux arguments à ces fonctions : une couleur de base à modifier et un montant compris entre 0% et 100% représentant de combien on souhaite foncer ou éclaircir la couleur de départ.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-darken-lighten-fonction-exemple.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-darken-lighten-fonction-resultat-css.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-darken-lighten-fonction-resultat.png)

 # Création de fonctions Sass

Nous allons également pouvoir créer nos propres fonctions Sass. Pour cela, nous allons devoir utiliser la règle @function suivi de la définition de notre fonction, c’est-à-dire de son nom, de la liste des arguments dont elle a besoin pour fonctionner et des instructions qu’elle doit exécuter.

Prenons un exemple simple pour comprendre comment créer une fonction en pratique. Ici, nous allons créer une fonction très simple dont le rôle est de multiplier un nombre par deux. En pratique, cette fonction n’est pas très utile mais cela me permet de vous présenter la syntaxe de création d’une fonction Sass.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-creation-fonction-code.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-creation-fonction-resultat-css.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-creation-fonction-resultat.png)

Ici, on crée une fonction qu’on appelle fois2(). Notez qu’on peut appeler nos fonctions comme on le souhaite du moment que le nom commence par une lettre, n’utilise pas de caractères spéciaux ni accentués et ne contient pas d’espace.

Le rôle de cette fonction est de multiplier un nombre par 2. Elle va donc avoir besoin d’un argument (le nombre qu’on souhaite multiplier par deux). Lors de la définition d’une fonction, on va utiliser un prête nom qui va représenter le nombre qu’on va ensuite passer en argument. On appelle ce prête nom un paramètre.

On peut choisir le nom qu’on souhaite pour les paramètres de notre fonction. Ici, j’ai choisi le nom $nb. Le corps de notre fonction est courte : on commence par multiplier par deux le nombre qui sera passé en argument et on place le résultat dans une variable $resultat. On retourne ensuite le contenu de la variable avec une règle @return.

La règle @return est indispensable : elle permet à notre fonction de retourner de manière effective son résultat. Attention ici : une fonction ne peut retourner qu’un résultat à la fois. Si vous tentez d’écrire du code après @return, celui-ci sera donc ignoré.

Notre fonction est désormais définie et prête à l’emploi. Pour l’utiliser, il nous suffit alors de l’appeler en lui passant un nombre en argument. 

# L’imbrication de sélecteurs CSS avec Sass

L’imbrication et donc la hiérarchisation de la structure d’une page est l’un des principes fondamentaux du HTML.

Le CSS, en contrepartie, n’offre toujours pas à ce jour de moyen d’imbriquer les sélecteurs CSS de la même façon qu’on imbrique les éléments HTML les uns dans les autres.

Sass propose cette fonctionnalité. Cela permet une meilleure organisation et lisibilité du code CSS dans son ensemble.

Faites cependant attention à ne pas trop abuser de cette fonctionnalité pour ne pas créer de sélecteur trop sur qualifié et pour ne pas au contraire obtenir au final un code CSS plus lourd et moins lisible, ce qui serait considéré comme une mauvaise pratique !

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-imbrication-selecteur-support-html.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-imbrication-selecteur-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-imbrication-selecteur-resultat-css.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-imbrication-selecteur-resultat.png)
 
# Le sélecteur parent Sass &

Le sélecteur parent & est un sélecteur spécial inventé par Sass qui est utilisé dans les sélecteurs imbriqués pour faire référence au sélecteur extérieur.

Ce sélecteur peut être utile si on souhaite réutiliser le sélecteur externe de manière plus complexe, comme par exemple pour ajouter une pseudo-classe ou pour ajouter un sélecteur avant le parent.

Notez que le sélecteur parent n’est autorisé qu’au début des sélecteurs composés, là où un sélecteur de type est également autorisé. Par exemple, on peut écrire & span mais pas span &

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-selecteur-parent-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-selecteur-parent-resultat-css.png)

# L’héritage des propriétés CSS

Sass nous permet à travers une règle @extend de mettre en place un système d’héritage des styles d’un sélecteur à un autre.

Concrètement, nous allons pouvoir définir un ensemble de propriétés CSS qu’on va lier à un sélecteur puis utiliser @extend pour partager cet cet ensemble de propriétés avec d’autres sélecteurs.

En pratique, cela permet d’organiser son code différemment en groupant les règles plutôt que les sélecteurs, ce qui peut permettre d’avoir une meilleure vue d’ensemble et ce qui peut rendre le code plus facile à maintenir.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-heritage-propriete-support-html.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-heritage-propriete-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-heritage-propriete-resultat-css.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-heritage-propriete-resultat.png)

ici, on utilise la notion d’héritage Sass pour passer ou “étendre” les styles définis dans notre sélecteur de classe .text-box aux sélecteurs .info et .warning.

On voit bien dans le rendu CSS que ces trois sélecteurs partagent les styles qui ont été définis dans .text-box.

# Le sélecteur placeholder Sass %

Utiliser la fonctionnalité d’héritage Sass devient particulièrement pertinent lorsqu’on l’utilise avec le sélecteur placeholder %.

Ce sélecteur permet de créer un ensemble de règles qui n’apparaitront dans la sortie CSS (dans le rendu final) qui si il est étendu avec @extend. Cela permet donc de créer des ensembles de règles qu’on va ensuite pouvoir utiliser ou pas et permet donc d’avoir un fichier de style beaucoup plus clair et concis.

Les sélecteurs placeholders vont être notamment utiles lors de l’écriture d’une bibliothèque Sass où chaque règle de style peut ou non être utilisée. En pratique, ils sont peu utilisés sur des projets simples et personnels.

Dans l’exemple précédent, par exemple, la classe .text-box n’est jamais utilisée en soi dans notre fichier, elle est simplement étendue. On va pouvoir ici utiliser un sélecteur placeholder plutôt qu’une sélecteur de classe afin de faire en sorte qu’elle ne soit pas inclue dans la feuille destine finale.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-heritage-selecteur-placeholder-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-heritage-selecteur-placeholder-resultat-css.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-heritage-selecteur-placeholder-resultat.png)

# Les mixins Sass

Les mixins Sass nous permettent de créer des groupes de déclarations CSS en vue de les réutiliser plus tard dans notre code. Cela peut notamment s’avérer utile pour les quelques propriétés CSS qui requièrent toujours l’usage des préfixes vendeurs ou pour certains projets avec des besoins précis et pour lesquels on va pouvoir gagner beaucoup de temps en créant des groupes de règles.

On va créer un mixant Sass avec la règle @mixin. Il va falloir donner un nom à chacun de nos mixins pour pouvoir s’ne resservir plus tard. Ensuite, on va inclure nos mixins dans n’importe quelle déclaration CSS grâce à la règle @include.

Les mixins paraissent très similaires à l’héritage Sass à première vue mais le code CSS ne sera pas le même au final et les cas d’usage sont en fait différents. Concrètement, lorsqu’on utilise l’héritage et @extend, les sélecteurs CSS vont être groupés autour des règles en commun lors de la compilation du code. Lorsqu’on utilise les mixins, les règles vont être au contraire dupliquées ce qui peut résulter en des feuilles de style beaucoup plus lourdes au final.

Pour cette raison, on utilisera peu les mixins en pratique. Je ne vous les présente ici que par souci d’exhaustivité.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-mixin-support-html.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-mixin-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-mixin-resultat-css.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-mixin-resultat.png)

Ici, on utilise un mixin pour la propriété transform. Il faut imaginer que notre projet utilise beaucoup cette propriété et qu’on a besoin d’indiquer les préfixes vendeurs afin que la propriété soit bien comprise par tous les navigateurs.

Utiliser les mixin nous permet d’écrire notre groupe de règle une seule fois pour toutes avec Sass et donc d’avancer plus rapidement sur notre projet. Cependant, les règles liés au mixin seront dupliquées pour chaque sélecteur dans la feuille de style finale. 

En programmation, une structure de contrôle est une structure qui permet d’influer sur le flux d’exécution normal du code. Les structures de contrôle vont nous permettre d’indiquer que tel code nie doit être exécuté que si telle condition est vérifiée ou que tel autre code doit être répété tel nombre de fois.

# Présentation des structures de contrôle Sass

Sass met à notre disposition quatre règles @ nous permettant de générer des structures de contrôle qui vont se manifester soit sous forme de conditions (le code ne sera exécuté que si telle condition est remplie), soit sous forme de boucles (le code sera exécuté un certain nombre de fois tant qu’une condition de sortie de boucle n’est pas vérifiée).

La condition d’exécution d’une condition ou d’une boucle prendra souvent la forme d’une comparaison : nous allons comparer une valeur à une autre et si la comparaison est vérifiée par Sass, c’est-à-dire si elle est évaluée à “vraie” (true), alors on exécutera le code.

Ces règles sont les suivantes :

- @if et @else permettent d’exécuter un bloc de code SI (if) une condition est remplie ou d’exécuter un autre code SINON (else) ;
- @each évalue un bloc pour chaque élément d’une liste ou chaque paire d’une map (le mapping correspond au fait de lier certaines données entre elles) ;
- @for évalue un bloc un nombre de fois précisé lors de la création de la règle (le nombre d’évaluation est connu à l’avance) ;
- @while évalue un bloc jusqu’à ce qu’une certaine condition de sortie soit remplie (le nombre d’évaluation n’est pas connu à l’avance).

Nous allons voir comment utiliser ces règles dans la suite de cette leçon. Cependant, je vais avant tout devoir vous parler des opérateurs Sass puisque les conditions qu’on va créer pour nos structures de contrôle vont faire un usage intensif de ces opérateurs.

# Opérateurs Sass et précédence (ordre de priorité) des opérateurs

Un “opérateur” est un signe ou un mot qui permet de réaliser une opération. Il existe des opérateurs de différents types qui permettent d’effectuer des types d’opérations différentes : opérateurs arithmétiques, opérateurs logiques, opérateurs de concaténation, etc.

## Les opérateurs de concaténation Sass

Concaténer signifie mettre bout-bout. Un opérateur de concaténation est un opérateur qui permet donc “d’additionner” plusieurs chaines de caractères entre elles.

Sass supporte trois opérateurs de concaténation ou opérateurs de chaines de caractères différent :

| Opérateur | Description |
|-----------|-------------|
| + | Retourne une chaine qui contient les deux expressions de départ concaténées |
| – | Retourne une chaine qui contient les deux expressions de départ concaténées et séparées par “-“ |
| / | Retourne une chaine qui contient les deux expressions de départ concaténées et séparées par “/“ |	
	
## Les opérateurs arithmétiques Sass

Les opérateurs arithmétiques vont nous permettre d’effectuer des opérations arithmétiques (des calculs) entre des nombres.

Sass nous permet d’utiliser les opérateurs arithmétiques suivants :
| Opérateur | Nom de l’opération associée |
|-----------|-----------------------------|
| + | Addition |
| – | Soustraction |
| * | Multiplication |
| / | Division |
| % | Modulo (reste d’une division euclidienne) |
 	
## Les opérateurs de comparaison Sass

Les opérateurs de comparaison nous permettent de comparer différentes valeurs entre elles. Lorsqu’on utilise un opérateur de comparaison, on demande à Sass d’effectuer la comparaison indiquées par l’opérateur. A l’issue de la comparaison, une valeur booléenne est automatiquement renvoyée : soit la valeur true si la comparaison est vérifiée par Sass, soit false si elle est jugée fausse.

Notez que le type de valeur booléen est un type de valeur qui ne possède que deux valeurs différentes : true et false.

Sass supporte les opérateurs de comparaison suivants :
| Opérateur | Définition |
|-----------|------------|
| == | Permet de tester l’égalité sur les valeurs (renvoie true si les valeurs sont égales) |
| != | Permet de tester la différence des valeurs (renvoie true si les valeurs sont différentes) |
| < | Permet de tester si une valeur est strictement inférieure à une autre |
| > | Permet de tester si une valeur est strictement supérieure à une autre |
| <= | Permet de tester si une valeur est inférieure ou égale à une autre |
| >= | Permet de tester si une valeur est supérieure ou égale à une autre |

## Les opérateurs logiques Sass

Les opérateurs logiques sont des opérateurs qui vont principalement être utilisés au sein de conditions. Ils vont nous permettre de créer des tests plus robustes.

Sass supporte trois opérateurs logiques : and, or et not.

L’opérateur logique and nous permet d’effectuer plusieurs comparaisons. Grosso modo, on va utiliser cet opérateur pour créer des codes comme cela : “si telle comparaison est vérifiée ET si telle autre comparaison l’est aussi…”.

L’opérateur and renvoie la valeur true uniquement si chaque comparaison renvoie true.

L’opérateur logique or va lui renvoyer true dès qu’une comparaison est évaluée à true.

Enfin, l’opérateur logique not inverse le résultat logique d’une comparaison. Si une comparaison est évaluée à true de base et qu’on utilise l’opérateur not, par exemple, le résultat final sera false.

## Précédence (ordre de priorité) des opérateurs

Parfois, nos conditions et boucles vont utiliser plusieurs opérateurs ensemble (notamment dans le cas où des opérateurs logiques sont impliqués).

Il est alors indispensable de savoir dans quel ordre les différents opérateurs vont être lus afin de créer des conditions et boucles qui nous permettent d’arriver au résultat voulu.

Sass a un ordre de priorité assez standard. Les opérateurs vont être traités dans l’ordre suivant (du plus prioritaire ou moins prioritaire) :

    Les opérateurs not et de concaténation +, -, et / ;
    Les opérateurs arithmétiques *, / et % ;
    Les opérateurs arithmétiques + et – ;
    Les opérateurs >, <, >=, <= ;
    Les opérateurs == et != ;
    L’opérateur and ;
    L’opérateur or.

 
# Utilisation des structures de contrôle Sass

Maintenant que nous avons vu les opérateurs, nous allons pouvoir créer nos structures de contrôle à proprement parler. Je vais ici me contenter de vous présenter les structures if et while.

## La condition if… else

La règle @if permet de créer une structure conditionnelle if. Cette structure conditionnelle permet d’exécuter un code si une expression (la condition dans la condition) est évaluée à true.

La règle @if est souvent accompagnée d’un règle @else qui permet d’exécuter un autre bloc de code dans le cas où l’expression du if est évaluée à false.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-condition-if-else-support-html.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-condition-if-else-exemple.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-condition-if-else-resultat-css.png)

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-condition-if-else-resultat.png)

Ici, on commence par créer un mixin qu’on appelle “theme” et quel on passe une variable $light-theme avec une valeur true par défaut. Cette valeur par défaut sera utilisée si aucune valeur n’est fournie lorsqu’on tentera d’inclure le mixin par la suite.

Dans notre mixin, on utilise une condition if…else centrée sur la valeur de $light-theme. Si $light-theme contient la valeur true ou une valeur évaluée à true, les propriétés dans le @if s’appliqueront. Dans le cas contraire, les propriétés dans le @else vont s’appliquer.

## La boucle while

On va pouvoir créer une boucle while en Sass avec une règle @while. Le principe de cette boucle est de répéter un code en boucle tant qu’une condition de sortie de boucle n’est pas vérifiée.

Il faudra donc toujours bien faire attention à créer un code dans la boucle qui fait qu’on atteint la condition de sortie à un moment ou à un autre car dans le cas contraire on va créer une boucle infinie qui va faire planter notre code.

![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-boucle-while-support-html.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-boucle-while-exemple.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-boucle-while-resultat-css.png)
![image](https://www.pierre-giraud.com/wp-content/uploads/2019/09/sass-boucle-while-resultat.png)

Il faut imaginer dans cet exemple qu’on récupère la taille courante de la fenêtre dans la variable $width. On utilise ensuite une boucle while avec la règle Sass @while pour calculer la taille des marges qui doivent être appliquées à notre page en fonction de la taille de la fenêtre.

Notre boucle commence par comparer la valeur dans $margin à celle dans $width divisée par 50 et, tant qu’elle est strictement inférieure, ajoute 1 à la dernière valeur contenue dans $margin.

Lors du premier passage dans la boucle, $margin stocke 0 qui est bien strictement inférieur à 1000/50 (= 20). On rentre dans la boucle et on ajoute 1 à $margin qui stocke donc désormais 1. On retourne au début de la boucle et on teste à nouveau si $margin contient une valeur strictement inférieure à $width. Comme c’est toujours le cas, on repasse dans la boucle et on ajoute à nouveau 1 à $margin qui contient désormais 2 et ainsi de suite jusqu’à ce que la comparaison d’entrée dans la boucle soit évaluée à false.

Le CSS dispose d’une option d’importation du code à travers la règle @import qui nous permet d’importer des règles dans une feuille de style à partir d’autres fichiers CSS.

Cette option nous permet théoriquement de diviser notre code en différents fichiers afin que celui-ci soit plus facile à gérer sans aucun inconvénient puisque nous pourrons ensuite tout réimporter dans un seul fichier.

En pratique, cependant, l’importation CSS possède un défaut majeur : une nouvelle requête HTTP est envoyée à chaque fois qu’on utilise @import, ce qui peut avoir un impact majeur sur la performance d’un site web si on abuse de cette règle.

Sass s’appuie sur cette règle @import et nous offre une option d’importation avec @import moins gourmande en termes de ressources puisqu’au lieu de créer une nouvelle requête HTTP Sass va récupérer le fichier qu’on souhaite importer et le combiner avec le fichier dans lequel on l’importe afin de n’envoyer au final qu’une seule feuille de style au navigateur.

Les importations Sass ont la même syntaxe que les importations CSS, à la différence près qu’elles permettent à plusieurs importations d’être séparées par des virgules plutôt que d’exiger que chacune ait son propre @import.

Lorsque Sass importe un fichier, ce fichier est évalué comme si son contenu apparaissait directement à la place de @import. Cela implique que tous les mixins, fonctions et variables du fichier importé sont mis à disposition et que tout le code CSS est inclus exactement à l’endroit où l’@import a été fait.

De plus, tous les mixins, fonctions ou variables définis dans la feuille qui importe et avant l’importation sont utilisables par la feuille de style importée.

Enfin, notez que Sass importe les fichiers à partir de leur URL. On peut cependant mentionner un chemin de fichier relatif lors de l’importation. De plus, il n’est pas nécessaire de préciser l’extension du fichier : Sass se chargera de trouver les fichiers de styles correspondants au nom et de les importer. 
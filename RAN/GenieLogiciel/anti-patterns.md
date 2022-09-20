# Qu'est-ce qu'un antipattern en génie logiciel ?

- 5 ERREURS DE PROGRAMMATION (ANTIPATTERNS) COURANT CHEZ LES DEBUTANTS : https://youtu.be/3TJvnYSrMVA
- 5 Programming ANTIPATTERNS for Beginners! https://youtu.be/lQ_rGCL17EE
- AntiPatterns : https://sourcemaking.com/antipatterns
- 9 Anti-Patterns Every Programmer Should Be Aware Of : https://sahandsaba.com/nine-anti-patterns-every-programmer-should-be-aware-of-with-examples.html
- Anti-Patterns and Code Smells : https://itnext.io/anti-patterns-and-code-smells-46ba1bbdef6d

Un modèle de conception logicielle est une solution efficace et réemployable qui peut être appliquée à un problème récurrent de la programmation logicielle. Donc un antipattern en serait tout le contraire, non ?

Eh bien, en quelque sorte.

À l'opposé des modèles de conception, les antipatterns sont généralement employés pour faire échouer un projet. Il est peu probable qu'un développeur de logiciels veuille délibérément introduire un antipattern qui, on le sait, occasionne des dysfonctionnements.

Les antipatterns peuvent se retrouver dans les logiciels parce qu'ils incluent des options et des choix qui semblent convenir à la résolution d'un problème spécifique. Un antipattern est généralement une solution peu conventionnelle ou complexe qui pourrait vous convenir à court terme, mais qui, à long terme, pourrait occasionner des dysfonctionnements et avoir des conséquences plus néfastes que les avantages à court terme.

Dans ce cours, nous allons présenter plusieurs types d'antipattern, en expliquerons les causes et décrirons les mesures à prendre pour les prévenir.

# Code Smells
    Une fonctionnalité considérée comme terminée (c’est-à-dire satisfaisant le besoin) mais ne présentant aucune finition technique. Autrement dit, c’est un défaut :)
[J'ai une dette technique et c'est mon choix !](https://www.synbioz.com/blog/tech/j-ai-une-dette-technique-et-cest-mon-choix)

# Différents types d'antipatterns en génie logiciel

Les antipatterns suivants peuvent induire une dette technique dans votre projet de développement logiciel. Votre équipe devra éventuellement faire machine arrière et corriger le code, ce qui pourrait compromettre le respect des échéances du projet.

Voici quelques antipatterns fréquents que vous devriez éviter.

# Code spaghetti

Si quelqu'un vous dit que vous développez un bon code spaghetti, ce n'est pas un compliment. Ils vous signalent que votre code a la même « structure logique et ordonnée qu'une assiette de spaghettis » (Richard Conway, 1978).

Le code spaghetti peut résulter du fait qu'un développeur se lance dans un codage sans réfléchir à la manière dont le programme devrait être exécuté. Le produit fini pourrait fonctionner comme prévu, mais il pourrait y avoir des problèmes plus tard puisque la structure et le fonctionnement ne sont pas pris en compte.

Au fur et à mesure que de nouveaux codes sont ajoutés et que d'anciens codes sont copiés et collés dans de nouveaux emplacements, votre programme qui était opérationnel auparavant se transforme en un fouillis de fichiers, de dossiers et de fonctions dont l'emplacement est aléatoire. Il est presque impossible d'ajouter de nouvelles choses sans risquer de provoquer des dysfonctionnements. Le code spaghetti peut se révéler aussi difficile à démêler que lorsque vous devez suivre d'un bout à l'autre chaque nouille de spaghetti dans votre assiette. 

C'est un peu comme ajouter une nouvelle pièce dans un bâtiment déjà construit. Vous ne commenceriez pas à construire avec des matériaux aléatoires sans tenir compte de l'architecture, des matériaux, des agencements de couleurs, du design et de la structure du bâtiment concerné. Une approche aléatoire aboutirait probablement à une pièce qui détonnerait avec le bâtiment en place et donnerait l'impression de ne pas être à sa place.

# Marteau doré

En psychologie, un biais cognitif fait référence à la vision qu'une personne a du monde qui l'entoure en fonction de ses propres croyances et expériences. Le marteau doré est un biais cognitif basé sur la croyance qu'un seul outil peut être utilisé pour résoudre tous vos problèmes de programmation. Vous vous êtes servi d'un fragment de code spécifique, bien pensé et conforme sur le plan architectural pour résoudre des problèmes liés à des projets antérieurs. Il est donc certain que cela fonctionnera à nouveau pour votre projet actuel, n'est-ce pas ?

Pas forcément.

L'idée est de ne pas se fier aveuglément à une seule solution, car une taille unique ne convient jamais vraiment à tout le monde. Dans notre exemple d'ajout d'une pièce, un marteau est un outil très utile, mais tenteriez-vous de l'utiliser pour scier un morceau de bois ?

Vous pourriez forcer votre antipattern du marteau d'or dans votre codage là où il ne conviendrait pas tout à fait et vous pourriez même réussir à le faire fonctionner, mais votre programme pourrait bien perdre en fiabilité et devenir très instable à mesure que vous ajoutez de nouvelles fonctionnalités. Et si vous ne vous méfiez pas, vous pourriez vous retrouver avec une autre assiette de code spaghetti.

# Ancre de bateau

Un antipattern d'ancre de bateau se produit lorsque quelqu'un laisse un morceau de code dans la base de code non pas parce qu'il est nécessaire, mais parce qu'il pourrait être utile plus tard. Le raisonnement est le suivant : lorsque le code deviendra nécessaire, il sera plus simple de l'activer et de le faire fonctionner. Il ne sera pas activé, alors quel dommage pourrait-il causer ?

Tel une ancre de bateau, ce type d'antipattern pèse sur votre projet et pourrait entraver son développement futur. Les développeurs pourraient se laisser distraire en lisant et en essayant de corriger un code qui ne sera même pas actif dans cette itération. Ce code additionnel et inutile aurait pour conséquence de surcharger le codebase et de freiner son développement. Et si vous activiez par inadvertance un ou plusieurs de ces antipatterns d'ancre de bateau, cela pourrait causer des problèmes tels que la défaillance du système et la création de risques ou de dettes techniques.  

# Code mort

Le code mort représente toute section du code source qui peut être exécutée, mais dont les résultats ne sont pas exploités par le programme. Ce code est inutile et engendre une consommation excessive de ressources de traitement.

Par exemple, il y a plusieurs années, un rédacteur technique était chargé de documenter des solutions pour les codes d'erreur émis par les logiciels réseau. Il fut étonné de constater que de nombreux programmeurs ne savaient pas :

- Ce que les codes d'erreur signifiaient
- Pourquoi le serveur envoyait une erreur
- Quel élément du code avait déclenché ces erreurs

Le code était essentiellement mort et il fallait le supprimer. Mais les ingénieurs hésitaient à le supprimer car ils craignaient que cela n'introduise de nouveaux bugs ou ne provoque une défaillance du code. 

Les antipatterns de code mort sont encombrants, ne présentent aucun intérêt pour le programme, ralentissent le développement, allongent les délais de conception et sont difficilement gérables.

# « God object » (objet divin) 

Lorsque vous avez un objet ou une classe qui en fait trop et qui est responsable de trop de choses, on peut le considérer comme un God object. Attribuer trop de responsabilités contredit le principe de responsabilité unique de la conception orientée objet. Chaque objet et chaque classe de votre code devrait être responsable d'une partie spécifique de la fonctionnalité du logiciel.

Par exemple, un objet ID client qui serait responsable du pseudo, du prénom, du nom de famille, de la liste des articles à acheter, du montant total dépensé, du numéro de transaction, et ainsi de suite, pourrait être un God object. Il est logique que l'objet ID client prenne en charge le pseudo, le prénom et le nom de famille, mais essayez de segmenter et de modulariser le code en créant un objet distinct pour gérer les détails de la transaction.

# Programmation par copier-coller

Parfois, copier et coller un code provenant d'autres sources dans votre code peut engendrer des dysfonctionnements accidentels. Le simple fait que ces extraits de code aient fonctionné pour d'autres développeurs sur des problèmes similaires aux vôtres ne signifie pas que les intégrer dans votre code fonctionnera.

Si vous avez testé le code et que vous vous êtes assuré qu'il fonctionne, qu'il est compatible avec l'architecture de votre projet, alors vous pouvez l'utiliser dans votre code. En revanche, si vous ne le testez pas et l'ajoutez parce qu'il a fonctionné pour d'autres personnes, vous risquez d'introduire des bugs et d'autres problèmes. Le seul moyen de corriger ce problème serait de rechercher et de supprimer tous les endroits où le code a été collé. Vous pourriez aussi revenir à une version antérieure du logiciel, avant que ne soient introduits les antipatterns que vous aviez copiés et collés.

# Infinite Loop
C’est une boucle qui contient uniquement une instruction testant une condition. Tant que cette condition n’est pas vérifiée, alors le thread attend. C’est généralement un autre process qui va faire que la condition est remplie et que le programme pourra continuer son déroulement. C’est un gaspillage car le programme va consommer de la ressource “pour rien”. Il vaut mieux utiliser des méthodes comme les événements ou les signaux.

# Deadlock et famine 
Mauvaise conception sur des blocs concurrentiels.

# Input Kludge 
Dans une application acceptant des entrées utilisateur, aucune vérification n’est effectuée avant d’utiliser les données saisies. C’est le meilleur moyen de causer des bugs voir même des failles de sécurité.

# Coulée de lave 
Du code encore immature est mis en production. De fait, cela va fortement compliquer les évolutions futures car on va devoir partir sur un socle (= la lave solidifiée) inadapté. Cela se produit souvent lorsque ce qui était initialement un POC se retrouve à devoir partir en production “en l’état”.

# Reinvent the Wheel
En particulier si c’est mal réinventé :D Attention, je ne dis pas qu’il ne faut jamais le faire, mais il est nécessaire de bien réfléchir et d’avoir une vue la plus exhaustive de l’état de l’art.
 
# Architecture As Requirements
Concevoir une architecture par simple préférence ou parce qu’elle est nouvelle, alors qu’il n’y en a pas le besoin ou l’intérêt.

# Swiss Army Knife
Il s’agit d’un produit excessivement complexe dont l’auteur a voulu le faire matcher avec le maximum de situation possible. A l’usage, il s’avère le plus souvent difficile et son fonctionnement est le plus souvent obscur et mal maitrisé.

# Évitez les antipatterns grâce à une meilleure gestion des systèmes

Il est possible d'éviter d'ajouter des antipatterns à votre codebase en étant plus cohérent et vigilant dans la gestion de votre système. Plus précisément, vous devriez :

- Réviser fréquemment le code : tout comme les écrivains ont besoin d'éditeurs pour vérifier que leur travail ne contient pas de fautes de frappe ou de grammaire, les développeurs de logiciels ont besoin de réviser leur code pour détecter et corriger les erreurs de syntaxe et les défaillances, optimiser la qualité du code et proposer de meilleures solutions aux problèmes récurrents. Il est toujours utile de demander à une tierce personne de vérifier votre travail, car elle remarquera des éléments qui vous ont échappé, ce qui vous aidera à perfectionner votre code.

- Effectuer des refactorisations de code: ce processus permet d'apporter des ajustements qui renforceront le cadre et la structure de votre code sans avoir d'incidence sur les attentes des utilisateurs quant au fonctionnement du logiciel. La refactorisation peut vous aider à simplifier la structure de votre code. Ainsi, il sera plus facile pour vos successeurs de comprendre comment le code a été conçu et d'ajouter de nouvelles caractéristiques et fonctionnalités au code de manière plus efficace.

- Mettez l'accent sur l'aspect visuel : nous sommes nombreux à mieux comprendre et retenir les informations lorsque celles-ci nous sont présentées visuellement. Lucidchart dispose d'une variété de modèles préconçus qui peuvent vous aider à visualiser l'ensemble de votre système, ce qui facilite la cartographie des flux de travail, l'analyse des processus, la recherche d'idées pour apporter des améliorations et la collaboration entre plusieurs départements et sites géographiques.





# Cours pour apprendre Git et ses bonnes pratiques
# Sommaire
# Git : Historique, commandes de base
## Slide 1

Un problème courant dans la production de données est celui de la conservation d'étapes : on développe souvent des principes de nomenclatures particulièrement personnels qui finissent bien souvent pas rendre l'ensemble d'un dossier illisible. C'est un cas de figure que l'on retrouve souvent avec rapports, mémoires, thèse.

Il est par ailleurs rare de s'en tenir à un système stable, à un ou plusieurs..

## Slide 2

C'est d'ailleurs dans le nombre que cette gestion devient bien complexe : plus de personnes travaillent sur le même document ou projet et plus la capacité à casser un processus est probable. Imaginez quand en plus il s'agit d'une base de code qui est censé continuer à fonctionner comme un ensemble.

## Slide 2bis

À partir de ces documents donc, d'après vous, quels besoins éprouvent les utilisateur-rice-s ?
    - Comprendre les versions
    - Pouvoir revenir en arrière, avoir une "trace"
    - Pouvoir avoir une collaboration simple

## Slide 3

- Donner les réponses

## Slide 4

Le versionnage est un processus essentiel de la gestion de données et de documents numériques quand la majorité de votre travail se passe sur plate-forme informatique.

Il existe bien sûr des outils de sauvegarde distante, mais il ne couvrent que peu les points évoqués plus haut, à savoir la capacité de revenir en arrière ainsi que la traçabilité. Ce n'est pas le coeur de leur fonctionnalité.

Sans ignorer par ailleurs le fait que vous êtes dépendant-e-s du bon vouloir des serveurs : aucune archive n'est disponible localement.

Dans ce contexte, des logiciels de versionnages se mettent en place. Les plus anciens sont SVN, que vous avez sûrement déjà croisé en tombant sur un site tel que SourceForge pour télécharger un logiciel. 

Git lui est né en 2005 pour aider à développer le noyau Linux. Il est sous licence libre.

## Slide 5

Les principes généraux de git sont assez simple : on travaille dans un dossier qui, avec ses sous-dossiers, constitue un dépôt, ou repository.

On remarquera qu'à la racine de ce dépôt se trouve un dossier caché nommé ".git" qui, en fait, contient l'intégralité des archives du dépôt.

Contrairement à Dropbox et consorts, les modifications sont archivées par acte volontaire humain. Ces modifications sont appelées "commit" (valider, engager). Ces ensembles de modifications sont porteuses d'un message qui est obligatoire. Elles sont aptes à comporter des modifications sur plusieurs fichiers, et ces fichiers doivent être ajoutés explicitement : on peut enregistrer ainsi des modifications sur un fichier A sans enregistrer les prémices de modifications sur un fichier B.

## Slide 6

On distingue trois "états" des fichiers :

- Un état de travail : on modifie, mais rien n'est communiqué à l'entrepôt git.
- Un état intermédiaire, d'enregistrement en cours : on ajoute des fichiers, mais les fichiers ne sont pas enregistrés en *commit*.
- Un état d'archivage : l'ensemble des modifications sont archivées.

Pour utiliser une métaphore discutable, pensez à un déménagement : le working directory, c'est votre habitation. Vous allez déplacez les cartons dans votre camion à déménagement : tant que le camion n'est pas parti, il est possible de prioriser l'une ou l'autre des pièces à déménager : c'est la *staging area*. Une fois le camion parti et arrivé dans votre nouvelle habitation, le carton est disponible, mais commit : vous n'allez pas lui faire faire le chemin inverse.

## Slide 7

On peut s'en sortir sur git sans grandes difficultés avec quelques commandes de base :

- `git init` crée un dépôt dans le dossier courant
- `git add` ajoute un fichier dans la staging area, `git add -A` ajoute tous les fichiers nouveaux, modifiés et supprimés dans la staging area
- `git commit -m "Message du commit"` enregistre le commit avec un  message
- `git log` affiche l'histoire du repository
- `git diff` affiche la différence entre l'état archivé et l'état actuel.
- `git status` affiche le statut actuel du dépôt

## Slide 8 

En cas de difficultés avec les couleurs; remarquez qu'il est possible de les changer.

## Slide 9

La qualité des messages d'archivage est primordiale : faites-y attention. Il est important dans un historique de savoir où retourner.

## Slide 10

Faire une démo (essayer de faire deviner les commandes)

- `cd dev`
- `mkdir notes-du-cours`
- `cd notes-du-cours`
- `git init`
- `ls -la`
- `gedit cours1.md`
    - Copier les notes jusqu'ici
- `ls -la`
- `git status`
- `git diff`
    - Slide 9
- `git add cours1.md`
- `git status`
- `git diff` # faire remarquer qu'il n'y a pas de diff puisqu'il n'y a encore rien d'enregistré dans l'archive
- `git commit -m "Premières notes du cours"`
    - Slide 10
- `git log`
- `git status`
- `git diff`
- `gedit cours1.md`
    - Ajouter les notes précédentes
- `git status`
- `git diff`
- `git add cours1.md`
- `git status`
- `git diff`
- `git commit -m "Ajout de notes oubliées pour le cours 1"`
- `git status`
- `git diff`
- `git log` # faire remarquer les noms de commits (ne pas utiliser le terme hash)
- Copier ou télécharger l'image [blanc.png](https://ponteineptique.github.io/cours-git/cours-1/images/blanc.png)
- `git add blanc.png`
- `git commit -m "Ajout de l'image blanche"`
- Copier ou télécharger l'image [blanc1.png](https://ponteineptique.github.io/cours-git/cours-1/images/blanc1.png) en la renommant blanc
- git diff
- `git add blanc.png`
- `git commit -m "correction de l'image blanche"`

## Slide 11

- Tenter la même chose avec une image blanche et une image blanche avec un carré noire
        -> Parler des limitations pour les fichiers compilés !

# Les branches
## Slide 1

Les branches permettent d'avoir des états parallèles d'un même dépôt, une sorte de "sauvegarder sous" sur l'ensemble d'un dossier et des ses sous-dossiers. La différence, c'est qu'il existe tout un système pour fusionner ces versions entre elles.

Ces "sauvegarder sous" sont utiles, car ils permettent de travailler, en simultanée, sur des problèmes différents. Prenons par exemple une situation simple (dessin au tableau): 

1. j'ai une application web qui traite des données, 
2. deux collègues
3. on doit pour la semaine prochaine corriger deux problèmes distincts : 
    a. un problème de performance dans la communication avec la base de données, 
    b. le redesign des menus.
4. les deux collègues pourraient travailler sur les mêmes dossiers, mais séparer leur travail permettra de conserver :
    1. une forme de linéarité
    2. éviter des conflits entre leurs modifications durant leur travail
    3. ajoutera par exemple la capacité de changer, pour déboguer, l'affichage pour l'un, les données reçues pour l'autre.

Généralement, la branche principale s'appelle la branche *master*. Les autres branches ont des noms libres. Cependant, il arrive souvent de retrouver les branches suivantes : 
    - *dev* pour une version de développement qui diffère d'une version stable en master (on ne fournira sur la master que des corrections de bug tandis que l'oncontinuera à travailler à l'ajout de nouvelles fonctionnalités sur la *dev* pour la prochaine grande version)
    - *docs*, *doc* pour la documentation quand cela s'avère nécessaire.

On recommande généralement de faire une branche = une tache (soit un bug, une nouvelle fonctionnalité, etc.)

## Slide 2

```bash

git branch resume
git checkout resume
# Télécharger https://services.github.com/on-demand/downloads/fr/github-git-cheat-sheet.pdf
git status
git add github-git-cheat-sheet.pdf
git commit -m "Ajout de la cheatsheet de github"
git status
git log
git checkout master
# Regarder le dossier (ls -la)
git status
git log
git checkout dev
gedit cours1.md # Ajouter l'adresse que l'on a utilisé pour le téléchargement
git diff
git status
git add cours1.md
git commit -m "Ajout de l'adresse d'origine du document aux notes du cours"
git status
git checkout master
# Regarder le dossier et cours1.md
git log
git merge resume
# Regarder le dossier et cours1.md
git log
```

# Git : Serveur distant
## Slide 1

Avec les branches, nous avons vu la capacité de travailler sur des versions alternatives à notre version principale, des sortes d'enregistrer sous. Si l'on compare ce que l'on a vu avec les capacités d'un Dropbox ou d'un Google Drive, quelle fonctionnalité est manquante ?

## Slide 2

Heureusement, des entreprises et des structures publiques fournissent des services de ce type. Git peut être utilisé avec des serveurs distants. Il s'agit ensuite de trouver la version qui vous convient, avec les outils qui l'accompagnent. On distingue deux grands concurrents : Github et Gitlab. L'avantage de Gitlab sur github est le caractère en partie OpenSource du logiciel qui le fait tourner (cela veut donc dire qu'on peut l'installer et donc répliquer l'infrastructure sur son propre serveur). L'avantage de github sur gitlab est son adoption par les développeur-ses et son âge.

## Slide 3

Faire un dessin permettant de faire comprendre

- *Remote* : Serveur distant permettant la synchronisation manuelle de votre dépôt
- *origin* : Nom du serveur principal, un peu comme master est la branche principale. Pour l'instant, nos serveurs n'en ont pas
- *push* : Envoyez les modifications effectuées sur un serveur donné.
- *pull* : Retrouvez les informations depuis un serveur donné
- *clone* : Copie sur votre PC d'un dépôt trouvé en ligne
- *fork* : Dérivé d'un dépôt d'un-e autre développeur-se
- *upstream* : Par convention, nom d'un second serveur, généralement le serveur source du *fork*

## Slide 7

- Cloner le repository de cours
- Essayer de faire une modification
- La commit
- La push
- Est-ce que cela marche ? (Note: pour moi, cela marche, pour eux, non)

## Slide 2

Faire lire la chose aux élèves

Les issues, appelées aussi ticket ou bug, représentent un espace de conversation entre les développeur-se-s d'un projet, voire entre celles-ci et les utilisateurs-rices du projet. Elles permettent :

- d'établir des missions,
- relever des bugs qui seraient apparus,
- répondre à des questions quant à une base de code

L'utilisation d'issues, même dans le cadre de développement solitaire, permet de réaliser une liste de choses à faire, de consigner des problèmes ou des idées d'améliorations. Très rapidement dans le cadre de développement logiciel, il est important d'ouvrir ces tickets afin de suivre sa progression. Par ailleurs, il y a un côté rassurant au fait de fermer des tickets et de les marquer comme résolus.

Lors de l'ouverture d'une issue sur github lié à un bug, il y a un certain nombre de bonnes pratiques qu'il faut essayer de suivre :

- Il faut essayer au mieux d'expliquer le contexte du bug, voire de donner un maximum d'information pour reproduire le bug étape par étape.
- Si le bug concerne des fichiers que vous possédez, il faut fournir le fichier. Si une partie du fichier seulement fait boguer le logiciel et si il le bug se produit en supprimant le reste, il est important de supprimer le reste afin de ne pas conduire les développeuses-rs à avoir à comprendre l'intégralité du fichier
- quoiqu'il arrive, on décrit au mieux le problème, même pour soi-même. Il faut garder en tête le concept de "moi du futur", cette sorte d'alter ego qui ne comprendra pas ce que vous avez aujourd'hui noté dans un ticket et qui se mettra plus que vraisemblablement en colère.

## Slide 3

Lorsque l'on demande une nouveauté, par exemple un nouvel ensemble de données ou une nouvelle fonctionnalité, il faut décrire le plus précisément possible ce que l'on veut, afin de pouvoir s'en occuper ultérieurement ou transférer cette charge à un-e collègue.

On peut aussi ouvrir un ticket dans le cadre d'une discussion, généralement une question à propos d'un morceau de code qui n'est pas très compréhensible. Il faut bien sûr rester cordial, que cela soit en tant qu'interlocuteur-rice du côté développement, ou en tant que discutant-e.

## Slide 4

Sur github, les tickets peuvent être attribués par les développeur-se-s des repository. Cela veut dire qu'il est possible d'assigner la gestion d'un ticket à une ou plusieurs personnes. On peut bien sûr s'autoattribuer une issue. Il faut faire attention à la violence symbolique que peut représenter une telle action : bien qu'il soit important de partager la charge, il est recommandé d'être sûr d'avoir communiqué sur les responsabilités de chacun-e lors des premières discussions avant d'assigner quelqu'un-e à une mission.

Les issues peuvent être catégorisées en labels. Une série existe par défaut et contient par exemple "bug", "enhancement", "question", etc. Leur utilisation est recommandée pour pouvoir facilement, visuellement, trier l'ensemble des issues.

Enfin, afin de faciliter la planification de votre travail, github fournit deux autres outils : les projets et les milestones. Les deux permettent de regrouper des issues, avec pour les milestones une focalisation certaine sur des dates limites de rendu.

## Slide 5

Voici la page des issues du code du front-end de Github. Je permets de noter ici que frontend est à comprendre dans le sens de "qui est vu par le client" et non comme pour les frameworks "qui est compilé par le client".

Essayons de voir rapidement ce qui se passe ici :
- déjà, on voit rapidement l'importance des labels : on compte 5 bugs.
- Toutes les issues ont été ouvertes par la même personne, on est face à un développement plus que solitaire ici. Par ailleurs, on remarque que la dernière issue ouverte est la n°951.
- beaucoup de problèmes ou d'améliorations concernent l'interface pour les administrateurs-rices.
- un problème est marqué comme ayant une haute priorité (en bas 879).
- un est marqué comme tech-deb, raccourci pour technical debt.

Le terme "technical debt" est dérivé de la méthode agile de management et de développement. Il s'agit d'un problème avec lequel on peut vivre, mais qui coûte, d'où le nom de dette. Je vous laisse à ce sujet lire les pages anglaise et française de Wikipédia à ce sujet.

## Slide 6

On est ici devant un repository de textes et de métadonnées sur ces textes. Il s'agit du corpus original latin du Perseus project.

Que pouvez-vous dire sur ce repository ?

- Ensemble d'identifiants
- Moins d'utilisation des labels
- Plusieurs utilisateurs (3)
- Grandes discussions (jusque 22)

## Slide 7

Discuter de l'issue avec les étudiant-e-s

Que pouvez-vous me dire sur cette issue ?

## Slide 8

Pourquoi cette issue est-elle mauvaise ?

Concernait des identifiants doublons sur certains fichiers. Mais aucun listé correctement.

## Slide 9

- Les données de https://github.com/chartes/elec vous intéressent. Mais vous aimeriez changer une partie des données : ne conserver que les testaments de poilu et supprimer les éléments qui ne correspondent pas à vos besoins.
- À ce moment-là, on va réaliser un fork du repository sur son propre compte. On obtient ainsi les droits d'écritures sur le repository tout en gardant l'ensemble de son historique. On travaille sur ce repository ensuite localement, comme on travaillerait avec n'importe quel repository.
- Si l'on fait des modifications sur un dépôt d'une autre personne, il est plus respectueux de faire un fork que de télécharger et de créer un nouveau dépôt.

## Slide 10

La contribution et le travail en équipe sont au centre de l'utilisation d'outils tels que github. Si d'une part il est important de protéger son code en écriture et d'empêcher ainsi les externes d'écrire sur votre repository, il est aussi important de pouvoir recevoir des propositions de changement.

Ces propositions de changement sur github sont appelées des *pull requests*. Un-e utilisateur-rice produit des commits sur un fork, pour corriger des coquilles ou améliorer la documentation par exemple, et ouvre un ticket *pull request*. Les gestionnaires du repository ensuite entrent dans une discussion ouverte avec cette personne jusqu'à fusion (*merge*) de cette pull request ou son refus. 

**À voir plus tard ?** Il existe par ailleurs trois types de merge : les merge normaux, les squash et les rebases.

## Slide 11

Lire la proposition

## Slide 1

Quand on développe avec une équipe, quels risques encoure-t-on ?

## Slide 2

Les risques principaux dans la collaboration sont:
- l'introduction d'un bug par un-e collègue
- l'introduction d'une régression, c'est à dire un retour en arrière sur certaines portions de code qui peuvent entraîner un bug
- la multiplication des efforts : plusieurs personnes tentent de régler le même problème
- la mauvaise gestion ou correction d'un bug

## Slide 3

Les solutions sont bien évidemment les pull requests : même dans une situation de travail sur un seul repository à plusieurs, il est important de ne pas faire de merge locales sur la master, mais de proposer ces changements à vos collègues à travers l'usage de pulls requests internes.

Une autre solution complémentaire est l'usage d'outils d'intégration continue qui surveille et évalue les modifications de code.

## Slide 4

L'intégration continue sert entre autres à lancer une batterie de tests développés par l'équipe de développement. Ces tests visent à vérifier le bon fonctionnement d'une base de code. Il est recommandé d'écrire un ensemble de tests génériques pour des applications, puis, lorsque des utilisations font émerger des bugs particuliers, d'écrire de nouveaux tests qui permettent de vérifier qu'un bug ne se reproduira pas plus tard.

Exemple : J'ai une application web qui fonctionne très bien, avec une batterie de tests qui vérifie que tout fonctionne. Cette application web permet d'afficher des fichiers TEI en html. Une utilisatrice se rend compte du non-affichage des titres imbriqués dans des divs de deuxième niveau. En corrigeant le bug, j'écris un nouveau test qui vérifiera que l'on n’introduira pas de régression plus tard.

Par ailleurs, l'intégration continue permet aussi de vérifier de manière décentralisée et ouverte (au moins aux collègues) que ces tests fonctionnent bien. Il est important de mettre à disposition ces résultats sur des environnements neutres. Cela permet d'éviter des situations où un-e collègue lancerait ses tests incorrectement sur sa machine.

Généralement, ces outils notifient l'ensemble de l'équipe et commentent les pull requests avec un statut qui informe du succès ou de l'échec des tests.

L'un des principes phares de l'intégration continue est qu'un bug trouvé tôt est un bug qui coûte moins cher. 

Enfin, il arrive que, pour certains logiciels ou corpus, l'intégration continue intègre une partie de compilation ou d'export. Le service sera alors responsable de la transformation des ressources à chaque exécution.

## Slide 5

Regarder l'image

## Slide 6

Les tests sont des éléments essentiels du développement informatique. Ils permettent de s'assurer de la solidité de votre application.

On distingue plusieurs types de test : 
- les tests dits unitaires : on vérifie qu'un morceau de code particulier a un résultat correct. On exécute ces morceaux de codes hors contexte. Par exemple, si j'ai deux fonctions, une pour afficher la page web et l'autre pour importer des données, je vais tester chacune de ces fonctions individuellement.
- les tests d'intégrations : on vérifie qu'un ensemble de blocs fonctionnent bien ensemble. Généralement, en développement web, cela se traduit par la simulation d'action sur une page web en vérifiant le résultat.
- etc.

Cela dit, écrire des tests représente une très grande augmentation du temps de travail. Je compte environ une heure de test et de documentation minimum par heure de programmation. Mais un code testé vous signale tout de suite si un changement opéré sur votre application provoque des bugs, et où. Dans le cadre d'applications importantes de valorisation, il peut être extrêmement important d'utiliser de telles ressources.

## Slide 7

Dans certains cas, on peut parler de Test Driven Development, ou développement à partir de tests.

L'objectif n'est non pas d'écrire des tests a posteriori, mais de les écrire avant d'écrire son propre code. Cela signifie que :
- votre architecture est claire, pensée et solide
- vous connaissez les utilisations de chacun de vos blocs

Pour prendre un exemple, lorsque l'on écrit son XML en utilisant un schéma RelaxNG ou équivalent, on a écrit sa batterie de tests en amont puisque le schéma a été prévu d'abord.

Prendre l'image, essayer de montrer la différence avec du TDD.

# Bonnes pratiques
## Quelles bonnes pratiques

Si le développement et la gestion d'un projet vous semblent être l'apanage des futures ingénieures, conservatrices et développeuses qui sont là, sachez bien qu'aujourd'hui, on demande aux chercheurs et chercheuses de savoir gérer leur projet. Plus encore, savoir gérer un projet, y compris personnel, est primordial si vous souhaitez être assuré de sa fonctionnalité et de son expansion dans un futur plus ou moins proche.

Il n'y a pas grand-chose à dire à part lister ces bonnes pratiques. Pour chacune de ces bonnes pratiques, je vous laisserai poser des questions le cas échéant.

## Former et se former

Que vous soyez développeuse, ingénieure, conservatrice, etc, la formation technique, si vous persistez dans le numérique, est primordial. Les technologies changent vite, très vite. Je ne parle pas d'apprendre de nouveaux langages toutes les semaines, je n'en connais moi-même que 5 ou 6 et n'en utilisent qu'un ou deux quotidiennement. 

Mais se former aux évolutions techniques, faire de la veille sur ce qui peut changer, en utilisant twitter ou reddit par exemple, est primordial dans nos métiers.

## Ne jamais travailler sur master

Que l'on soit seul ou à plusieurs, travailler sur le master signifie que votre changement sera plus ou moins définitif, sauf à passer un mauvais quart d'heure à produire une régression dans les commits.

Évitez donc.

## Une issue = une branche = une pull request

Bien que cela ne soit pas toujours aussi simple et aussi bien découpé, il faut au maximum essayer de respecter cela. On ne sait jamais quelle réception aura sa pull request, et il est plus que probable quand on essaie de corriger trop de choses à la fois que certaines ne soient pas acceptées par vos collègues.

Autres choses : on ne fusionne pas sa propre pull request (sauf quand on travaille seul bien sûr) et quoiqu'il arrive, on attend toujours les résultats de l'intégration continue.

## Une fonction : + d'un test

Toute fonction codée doit être vérifiée par au moins un test. Je vous laisse vous intéresser aux principes du *coverage*, notamment en python et langage de programmation. Certains outils vous permettent en effet de vérifier, au lancement des tests, quelles lignes de codes sont exécutées et lesquelles ne le sont jamais. Cela permet de se protéger pour partie d'oublis dans les tests.

## Ne pas développer ce qui existe déjà

Il faut éviter un maximum de réinventer la roue. Cela dit, cela ne veut pas dire que ce qui existe est forcément mieux. Faites très attention à la tentation constante des CMS par exemple. Les CMS vous offrent une solution rapide, mais sont par exemple de piètres outils quand il s'agit de conservation des données.

## Améliorer, contribuer

Poser des questions, ouvrir des bugs, proposer des corrections, aider à documenter. Autant de moyens de contribuer à des projets open source. 

Je me permets de noter que dans le cadre du devoir, je vous conseille d'ouvrir des issues si des morceaux de documentations n'étaient pas clairs.

## Toujours penser à votre moi du futur

Je vous ai parlé de ce concept. Je le remets là. Si vous ouvrez un bug en disant "la page X bugue" sans plus de détails, c'est comme noté sur votre mémoire de 100 pages en couverture "faute d'orthographe" sans plus de précision. Imaginez passer 1 mois et retomber sur cette note manuscrite.

## Mettez-vous d'accord sur les bonnes pratiques

Les bonnes pratiques, certaines sont communes, certaines sont différentes. La première chose que vous devez faire dans un projet une fois le projet établi, c'est établir la liste des choses à faire et ne pas faire. Après quelques projets avec une même équipe, tout cela roulera tranquillement.

## Indenter

Écrire du code propre, indenter. Il y a deux ans, j'avais réservé 2 points sur 10 sur la propreté du code sur un devoir. Il est insupportable de lire un code qui est mal écrit. Vous n'oseriez pas rendre une réponse d'appel à projets sur des serviettes de fast food ? N'osez pas rendre du code bien espacé.

## Documenter

Documenter cela signifie :
- expliquer pourquoi vous avez écrit certaines lignes de code
- à quoi servent vos fonctions et variables
- comment installer votre logiciel ou site
- comment utiliser vos outils
- mettre des messages de commits clairs.

La documentation est certainement la chose la plus difficile à faire, car en tant que producteur et productrice, nous connaissons notre code. Je recommande ici de trouver des camarades avec qui partager vos repository et essayer de lire et critiquer la documentation de l'autre.

## Documenter

Pour finir, voici un exemple de ce qu'il ne faut pas faire : écrire en documentation quelque chose qui n'aide en rien à la compréhension.
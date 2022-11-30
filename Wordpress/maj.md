# Mettre à jour WordPress tout simplement

Si il est très simple d’installer WordPress, le passage et la mise à jour d’une version WordPress à une autre, implique toujours pour certains une grande crainte…

Nous allons voir dans cet article, pourquoi et comment mettre à jour WordPress tout en respectant les principes de précaution, les différentes méthodes et enfin la possibilité de revenir à la version antérieure en cas de problème…

![](https://wpformation.com/wp-content/uploads/2014/09/bug-mise-a-jour-wordpress.jpg)

Pourquoi faut-il mettre à jour son site WordPress ?

Le principe des numéros de version de WordPress va déjà vous éclairer, actuellement nous en sommes à la version 6.1.1. Que signifient ces numéros ?

    6 : Version de votre WordPress
    1 : Modifications intermédiaires
    1 : Corrections mineures et correctifs de sécurité

Depuis la version 3.7, les mises à jour automatiques de WordPress s’appliquent. Par défaut ce paramètre va s’appliquer aux mises à jour mineures ou celles corrigeant des failles de sécurité. Les fichiers de traduction seront aussi automatiquement poussés par le nouveau système.

Attention !!! Par défaut, chaque site WordPress active les mises à jour automatiques pour les versions de base mineures (pour passer de la 5.5.2 à la 5.5.3 par exemple) et les fichiers de traduction. A noter que depuis la version WordPress 5.6, cette dernière active par défaut les mises à jour majeures automatiques. Vous pouvez cependant désactiver cette fonctionnalité depuis votre menu Tableau de bord >> Mises à jour afin de n’appliquer que les mises à jour mineures.

![](https://wpformation.com/wp-content/uploads/2014/09/Mises-a-jour-de-WordPress.jpg)

Vous l’avez compris, c’est simplement du bon sens, appliquez à minima les mises à jour mineures afin de limiter les éventuelles failles de sécurité.

![](https://wpformation.com/wp-content/uploads/2014/09/mettre-a-jour-wordpress-securite.jpg)

## Avant de mettre à jour WordPress /!\

Les précaution d’usage avant de mettre à jour WordPress sont bien trop souvent négligées… Combien de fois avons nous perdu des données par manque de précaution, et bien pour WP c’est la même chose, changer de version n’est pas sans risque alors autant être prévoyant:

- Avant de commencer, il est préférable de contrôler la pages des pré-requis pour vous assurer que votre hébergement dispose des versions PHP et MySQL nécessaires et à jour (si vous n’êtes pas sûr, demandez à votre hébergeur).
- Une chose primordiale : la sauvegarde ! Ça paraît tellement évident, mais est ce que vous le faites? Il faut donc effectuer la sauvegarde de vos fichiers ainsi que de votre Base de données. Pour ce faire, il existe plusieurs plugins de sauvegarde automatisés. Enfin, votre hébergeur est censé sauvegarder votre contenu toutes les 24h00 avec un processus de restauration variant d’un hébergeur à un autre.
- Vérifiez si votre thème WordPress est compatible avec cette mise à jour. Sur les premium notamment, les développeurs annoncent toujours la compatibilité de leur thème et la version de WordPress. Si ce n’est pas le cas, attendez un peu car souvent les mises à jour de thèmes suivent celles de WordPress.
- Désactiver les plugins. Oui, on l’oublie trop souvent mais certains plugins pourraient poser des problèmes lors de l’installation, je pense principalement aux plugins de cache mais ils ne sont pas les seuls. Pour s’éviter ce type de problème, désactivez-les tous!

![](https://wpformation.com/wp-content/uploads/2014/09/que-faire-avant-de-mettre-a-jour-WordPress.jpg)

## Comment procéder à la mise à jour de WordPress ?

La mise à jour automatique

C’est de loin la plus simple, Pour mette à jour WordPress automatiquement, il vous suffit de :

- Lancer la mise à jour : Tableau de bord > Mises à jour > Mettre à jour automatiquement
- Patientez le temps que le processus suive son cours et hop, votre WordPress est à jour !

> Si cette mise à jour ne fonctionne pas, c’est certainement  que votre version PHP n’est pas à jour (actuellement WP 5 nécessite la version PHP 7.3 minimum) ou bien encore que les droits d’écriture sur votre serveur ne sont pas bien réglés (valeurs par défaut 755 et 644). Plus d’informations sur le Codex WordPress.

## Conclusion mise à jour …

Une nouvelle version de WordPress fait souvent suite à de nombreuses versions “beta”, il arrive parfois qu’une version majeure soit immédiatement suivie d’une version mineure corrigeant quelques bugs. Pour autant, les versions mises en ligne ont été testé et sont souvent sans risque.

En cas de problème, n’oubliez pas non plus que ce dernier peut tout aussi bien venir de votre hébergement, de vos plugins ou encore même de votre thème. Alors restez calme et patient, il y aura toujours de l’aide via la communauté WordPress.

## Comment mettre à jour correctement son Thème WordPress ?

Parmi les mesures de sécurité évidentes pour WordPress, il y a celle, primordiale, de rester à jour !

Quand il s’agit de mettre à jour WordPress ou ses plugins, c’est plutôt facile via notre admin et rares sont ceux qui rechignent, en revanche il y a une mise à jour que beaucoup considèrent comme facultative, voire périlleuse: La mise à jour de leur thème WordPress !

Ne pas mettre son thème à jour, c’est une erreur et pour plusieurs raisons :

- Le thème peut contenir une faille de sécurité
- Le thème peut ne plus être compatible avec certains plugins
- Le thème peut ne plus être compatible avec la dernière version de WordPress
- Vous ne bénéficierez pas des dernières fonctionnalités du thème

Que votre thème soit gratuit ou premium, il faut absolument le mettre à jour ! Si vous savez déjà installer un thème, voyons comment le mettre à jour…

![](https://wpformation.com/wp-content/uploads/2016/06/mettre-a-jour-son-theme-wordpress.jpg)

## Mettre à jour un thème WordPress !

Avant de procéder, comme pour toute modification majeure, n’oubliez surtout pas de sauvegarder votre WordPress, on est jamais assez prudent.

La mise à jour d’un thème WordPress est une tâche critique de la routine de maintenance de votre site. Voici sommairement comment mettre à jour votre thème dans WordPress :

- Si votre thème n’a pas de personnalisation, allez à : Apparence > Thèmes > Mettre à jour maintenant sur votre thème actif.
- Si votre thème comporte du code personnalisé, sa mise à jour avec les dernières versions écrasera toutes vos personnalisations. Pour mettre à jour un thème personnalisé en toute sécurité, et puisque vous êtes un lecteur assidu, vous aurez également prévu un thème enfant pour y placer, en toute sécurité, vos modifications CSS ;)

## Mettre à jour un thème du répertoire WordPress

Si vous avez installé un thème gratuit ou freemium depuis WordPress.org, c’est très simple !

Rendez-vous dans votre Admin WordPress, puis dans Tableau de bord >> Mises à jour et vous verrez le thème qu’il faut mettre à jour.

Un clic et le tour est joué !

WordPress télécharge depuis la source le thème au format ZIP, le décompresse, l’installe puis enfin il retire l’ancienne version.

## Mettre à jour d’un thème premium

Si la mise à jour d’un thème du répertoire WordPress est extrêmement facile et sans effort, pour les thèmes premium en revanche, il en va autrement. Cela dépendra également de la plateforme où vous avez acheté le thème.

## Mettre à jour un thème de chez Themeforest

Si vous avez acheté votre thème chez Themeforest, commencez par télécharger et installer le plugin Envato WordPress Toolkit Master (souvent fourni avec les fichiers du thème).

![](https://wpformation.com/wp-content/uploads/2016/06/mise-a-jour-10-1024x512.jpg)

Une fois installé, rendez-vous sur votre compte Themeforest pour récupérer votre clé API.

![](https://wpformation.com/wp-content/uploads/2016/06/mise-a-jour-7-1024x741.jpg)

Muni de votre clé, remplissez les informations demandées par le plugin Envato WordPress Toolkit, à savoir votre nom d’utilisateur Themeforest et la clé API récupérée ci-dessus. Vous pouvez aussi choisir de ne pas sauvegarder automatiquement la version précédente (Backup Information >> Skip Theme Backup) lors de la mise à jour.

![](https://wpformation.com/wp-content/uploads/2016/06/mise-a-jour-8-1024x445.jpg)

C’est fait, vous avez maintenant accès à tous les thèmes que vous avez acheté sur la plateforme Themeforest et vous pouvez les mettre à jour en un clic.

![](https://wpformation.com/wp-content/uploads/2016/06/mise-a-jour-9-1024x492.jpg)

## Mettre à jour un thème de chez ElegantThemes

Toutes les plateformes de thèmes, dignes de ce nom, proposent des mises à jour à l’aide d’un plugin dédié ou directement via leurs thèmes. ElegantThemes ne déroge pas à la règle.

Connectez-vous à votre compte et récupérez votre clé API personnelle.

![](https://wpformation.com/wp-content/uploads/2016/06/updates-1.png)

Ensuite, cela dépendra du thème. Si vous utilisez l’excellent thème DIVI, cela se passe directement dans les réglages de ce dernier depuis l’option Updates.

![](https://wpformation.com/wp-content/uploads/2016/06/updates-3.png)

Si vous utilisez un autre thème, installez leur plugin ElegantThemes Updater. Une fois ce dernier installé vous aurez accès aux mises à jour de leurs thèmes depuis votre admin WordPress.

![](https://wpformation.com/wp-content/uploads/2016/06/update-3.jpg)

## La méthode manuelle via FTP

Si votre thème ne dispose pas d’une option de mise à jour directe, il faudra recourir à la méthode manuelle. Rassurez-vous, c’est à peine plus long que les méthodes décrites ci-dessus.

Pour mettre à jour manuellement, il vous faudra vos accès FTP (rapprochez-vous de votre hébergeur si vous ne les avez pas/plus). Il faut également télécharger la toute dernière version du thème directement depuis la plateforme ou vous l’avez acheté. Une fois téléchargé, décompressez-le sur votre ordinateur.

Connectez-vous à votre FTP et faites tout simplement glisser le dossier du thème de votre PC (à gauche sur l’image) vers le répertoire /wp-content/themes/ en écrasant le contenu précédent.

![](https://wpformation.com/wp-content/uploads/2016/06/mise-a-jour-theme-wordpress.gif)

> Si vous souhaitez conserver par sécurité l’ancienne version, il vous suffit, avant le glisser/déposer via Filezilla, de renommer l’ancienne version du thème en old_twentytwelve et ensuite de procéder à la mise à jour. Ainsi, en cas de problème, vous aurez toujours la version précédente à disposition.

> Non, en procédant de la sorte vous ne perdrez pas les réglages de votre thème, en effet ces derniers sont stockés dans la base de données. En revanche, si vous avez modifié des fichiers du thème (PHP, CSS) sans utiliser de thème enfant alors ces modifications seront perdues.

Voilà cet article est terminé ! Vous avez maintenant à votre disposition, plusieurs méthodes pour mettre à jour très simplement votre thème WordPress.


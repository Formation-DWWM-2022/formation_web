# Prenez en main Elementor et designez votre page d’accueil

- [ELEMENTOR : Comment l’utiliser pour créer un site WordPress ? (2020) - Tuto FR](https://youtu.be/ctpCTo-Fc9Y)
- [ELEMENTOR : Formation / tutoriel 100% gratuit sur WordPress](https://youtu.be/f7V5D2zxfjI)
- [WordPress Elementor : Le tutoriel ultime (et gratuit) | Formation 2021/2022 en français](https://youtu.be/_LixFHi9SKs)
- [Elementor ou Divi : Quel est le meilleur constructeur de page WordPress ?](https://www.youtube.com/watch?v=vSXl8NtIG4Y)
- [Tutoriel Full Site Editing : Le futur de WordPress ?](https://youtu.be/p_0xWlMVYD4)

La page d’accueil ainsi que les autres pages importées via le site de démo sont déjà créées avec Elementor. Pour les éditer avec Elementor, il suffit donc de visiter la page que vous souhaitez éditer et de cliquer sur “Modifier avec Elementor” dans la top bar d’administration.

Si la page n’est pas encore construite avec Elementor (typiquement, si vous en créez une nouvelle), éditez-la normalement depuis le dashboard et cliquez sur le bouton bleu “Modifier avec Elementor”.

Visitez maintenant votre page d’accueil et cliquez sur “Edit with Elementor”.

La page se divise alors en deux.

- Sur la gauche, vous disposez d’une colonne contextuelle dédiée aux fonctionnalités Elementor.
- Sur la droite, vous voyez le rendu de votre page.

![](https://user.oc-static.com/upload/2021/04/14/1618411884011_12.jpg)

Cette combinaison est très pratique, car, un peu comme dans le customizer, toutes les modifications que vous ferez sur la page se verront instantanément dans la zone de prévisualisation !

La colonne de gauche dispose de deux panneaux principaux.

- Le premier, affiché par défaut et accessible via l’icône présentant 6 petits carrés en haut à droite, liste les modules disponibles pour créer votre page. Vous pouvez ajouter ces modules à votre page en glissé-déposé.
- Le second est le panneau contextuel d’édition des modules, colonnes ou sections. Pour l’afficher, cliquez sur le crayon bleu au survol d’un module.

## Personnalisez le hero de votre page d’accueil

Nous allons commencer par modifier la première section de la page, aussi appelée “hero”. C’est la section la plus importante, car elle va donner la première impression au visiteur. Il faut donc qu’elle soit impactante, que le message soit clair et qu’elle propose un “appel à l’action” (“call to action”) clair.

### Modifiez le titre

- Cliquez simplement sur le titre principal “DISCOVER YOUR POTENTIAL​” dans la section de prévisualisation (à droite).
- Vous pouvez modifier le texte directement dans la zone de prévisualisation, ou dans le champ dédié dans la colonne de gauche, qui affiche maintenant les options d’édition et de personnalisation du module sélectionné.
- Modifiez le contenu avec “Créateur de sites web à croquer !” et sélectionnez “p” (paragraphe) dans le champ “Balise HTML”.
- Cliquez sur l’onglet “Style” puis sur “Typographie”, et sélectionnez la taille de 60 px et le poids de 900.

#### Modifiez le sous-titre

Le sous-titre est actuellement composé d’un widget “texte”.

- Faites un clic droit sur le sous-titre dans la zone de prévisualisation et cliquez sur “Effacer”.
- Cliquez ensuite sur l’icône composée de 9 carrés en haut à droite de la colonne de gauche, c’est l’icône d’accès aux widgets Elementor. C’est le bouton permettant d’accéder à la liste des modules Elementor.
- Glissez-déposez le module “Titrage” dans la zone où était situé le sous-titre.
- Remplacez le contenu par “Agence WordPress à Bordeaux : création de sites, identité graphique, référencement naturel”.
- Cliquez sur l’icône d’alignement “centré” et sélectionnez “H1” dans le champ “Balise HTML”.
- Dans l’onglet “Style”, choisissez la couleur “blanc”, cliquez sur “Typographie” et choisissez la taille 21 qui permet d’aligner à peu près la largeur des deux titres.

> Il existe différents niveaux de titres en HTML. Bien comprendre ces niveaux est essentiel pour optimiser son référencement naturel. H1 : titre de la page, doit être unique et doit contenir l’expression de recherche principale sur laquelle on souhaite positionner le site. Il est essentiel de faire en sorte que les titres contiennent les mots-clés sur lesquels on cherche à se positionner en SEO, les titres ayant le plus de “poids” SEO étant évidemment ceux de plus haut niveau. C’est la raison pour laquelle nous avons passé le premier titre qui n’est pas optimisé SEO en “p”, et le sous-titre qui contient les termes SEO cibles en “H1”.

### Modifiez le master visuel

Nous allons maintenant modifier l’image de fond de la section. Techniquement, il s’agit d’une “background image”. Cela veut dire que l’image n’est pas affichée via un widget dédié, mais qu’elle s’affiche en arrière-plan de la section.

La section Elementor est délimitée par un rectangle bleu. Pour la modifier, survolez-la et cliquez sur l’onglet bleu contenant 6 petits points en haut de la section.

> Elementor fonctionne avec des sections (délimitées en bleu) contenant des colonnes (délimitées en gris) pouvant elles-mêmes contenir des composants. Parmi ces composants, il y a le composant “Section interne” qui permet d’insérer une section contenant elle-même des colonnes, ce qui permet d’avoir des sous-colonnes pour réaliser des mises en page complexes. Il faut bien comprendre ce fonctionnement pour pouvoir réaliser des designs complexes.

La colonne de gauche affiche maintenant les options “Mise en page” de la section. Je vous invite à les explorer, mais ce ne sont pas elles qui nous intéressent pour l’instant.

- Cliquez sur l’onglet “Style” de la colonne de gauche. Vous voyez maintenant les options d’arrière-plan avec l’image que nous souhaitons modifier.
- Cliquez dessus puis sur “Téléverser des fichiers” et téléversez le master visuel défini précédemment.

L’image de fond est bien remplacée !

> Vous noterez que vous avez aussi la possibilité de mettre une vidéo en arrière-plan. Cela peut être très esthétique en termes de rendu, mais alourdit beaucoup la page.C’est donc à utiliser avec parcimonie et en faisant bien attention à utiliser un fichier vidéo optimisé (éviter YouTube).

> Si vous avez besoin de vidéos de fond pour vos sections, je vous conseille l’excellent site coverr.co qui propose de nombreuses vidéos de qualité utilisables gratuitement.

Vous remarquerez en revanche qu’elle est grisée. C’est parce qu’il y a un “overlay” en transparence de noir par-dessus notre image. Cet overlay sert en général à améliorer la lisibilité du texte par-dessus une image, mais il peut aussi être utilisé à des fins esthétiques ; c’est ce que nous allons faire ici.

Les options de l’image d’arrière-plan sont déjà configurées, mais il est important de les connaître :

- Position : permet de définir comment est “calée” l’image d’arrière-plan par rapport au bloc qui la contient (en haut, à gauche, centrée…).  
- Fichier joint : permet de définir si l’image doit bouger avec le reste du contenu au scroll, ou au contraire rester fixe en arrière-plan.
- Répété : permet de définir si l’image doit être répétée, dans le cas où elle ne remplirait pas l’espace du bloc.
- Taille : permet de définir la taille de l’image par rapport au bloc la contenant. L’option la plus utilisée est “couvrir”, ce qui veut dire que l’image va couvrir tout l’espace du bloc (elle sera donc cropée si elle n’a pas le même ratio). Attention à utiliser une image d’une taille suffisante si vous utilisez cette option, sinon le rendu sera pixellisé !

Scrollez dans la colonne de gauche et cliquez sur “Superposition d’arrière-plan”. Vous voyez alors la couleur noire qui est choisie. Plutôt que d’utiliser une teinte unique, nous allons définir une superposition en dégradé de couleurs :

- Cliquez sur l'icône “dégradé” à côté de l’icône “couleur” représentée par un pinceau.
- Cliquez ensuite sur la couleur noire et baissez la transparence à zéro.
- C’est déjà beaucoup mieux !
- On s’aperçoit en revanche que le jaune en haut est très clair et que cela va nuire à la lisibilité du menu blanc en haut de page.
- Nous allons donc modifier l’angle du dégradé pour que le jaune clair soit en bas.
- Saisissez 30 à la place de 180 dans le champ “angle”.

Nous allons maintenant encore améliorer notre hero en ajoutant une forme de séparation en bas de la section.

- Scrollez toujours dans la colonne de gauche et cliquez sur “Forme de séparation”.
- Cliquez sur “Bas” et sélectionnez “vague”.

Plutôt sympa, non ?

En revanche, la section s’arrête maintenant juste en dessous de la banane, ce qui n’est pas très esthétique.

- Cliquez sur “Mise en page” dans la section de gauche et augmentez le champ “Hauteur minimum” à 715 px.

Modifiez le style et la couleur des boutons

Les boutons carrés ne vont maintenant plus très bien avec le reste du design. Nous allons arranger cela.

- Sélectionnez maintenant le bouton de gauche dans la section de prévisualisation.
- Cliquez sur “Style” dans la colonne de gauche.
- Mettez 40 dans le champ “Rayon de bordure”.
- Cliquez maintenant sur “Couleur de l’arrière-plan” et sélectionnez le bleu de notre palette.
- Cliquez ensuite sur l’onglet “Au survol”, cliquez sur “Couleur de l’arrière-plan”, sélectionnez le bleu de notre palette et baissez l’opacité à environ ⅔.
- Cliquez maintenant sur l’onglet “Contenu” en haut de la colonne de gauche, saisissez le texte “En savoir plus” à la place de “Learn more” et saisissez “#ensavoirplus” dans le champ “Lien”.
- Ce type de lien s’appelle une ancre et va permettre de scroller au niveau de la section ayant l’ID “ensavoirplus” au clic sur le bouton (ce n’est pas la peine d’essayer, elle n’est pas encore définie !).

> Les ancres HTML sont des types de liens spécifiques permettant de scroller jusqu’à un élément HTML, ou une section, dans le cas d’Elementor, ayant un identifiant (ID) spécifique. Elementor propose aussi un module "Ancre de menu" permettant d'ajouter simplement l'élément jusqu'auquel on veut scroller au clic.

Une des fonctionnalités très pratiques d’Elementor est la possibilité de copier le design d’un élément pour l’appliquer à un autre.

Nous allons donc le faire ici pour designer le deuxième bouton.

- Faites un clic droit sur le bouton que nous venons de designer et sélectionnez “Copier”.
- Cliquez à nouveau au même endroit pour “lâcher” le bouton qui s’est collé à votre souris.
- Faites maintenant un clic droit sur le deuxième bouton et sélectionnez “Coller le style”.
- Le style a bien été copié, mais le bouton est maintenant à droite !
- Sélectionnez le bouton, puis dans Alignement, cliquez sur l’icône “justifié à gauche” pour le repositionner correctement.
- Changer le texte par “Nous contacter” et le lien par “#contact”.
- Allez dans “Style” et changez la couleur d’arrière-plan et la couleur d’arrière-plan au survol, avec le rose clair.

### Ajoutez des animations sur les boutons

Elementor offre la possibilité d’ajouter très simplement de petites animations sur les widgets utilisés. Nous allons en ajouter sur les boutons pour qu’ils apparaissent en slidant de part et d’autre au chargement de la page.

Pour cela :

- sélectionnez le bouton de gauche, cliquez sur “Avancé” dans la colonne de gauche et sélectionnez “Fade in left” dans la section “Animations” ;
- sélectionnez le bouton de droite, cliquez sur “Avancé” dans la colonne de gauche et sélectionnez “Fade in right” dans la section “Animations”.

> Attention : les animations peuvent donner une touche sympathique à une page, mais en abuser fait carrément amateur et nuit à la lisibilité. À utiliser avec modération !

Ça y est, notre hero est fini ! Passons maintenant à la première section de la page.

## Personnalisez le contenu de la page

Scrollez dans la zone de prévisualisation et cliquez sur le titre.

### Modifiez le titre

Changez le contenu par “Création de sites WordPress”. Conservez le titre en “H2”, puisqu’il contient bien des expressions de recherche sur lesquelles nous souhaitons nous positionner. Après quelques tests, nous choisissons le style suivant :

- Couleur : le bleu de notre palette.
- Taille de police : 32 px.
- Poids de la police : 600.

### Définissez le style par défaut des titres H2

Plutôt que de paramétrer à chaque fois ces valeurs dans Elementor, paramétrez-les comme valeurs par défaut dans les options de votre thème. Cela vous permettra de ne pas avoir à les appliquer à chaque fois que vous créerez un titre de niveau 2 (H2), et si jamais vous devez les modifier dans le futur, de le faire en une seule fois plutôt que d’avoir à repasser sur tous les titres du site !

- Notez les valeurs souhaitées, puis rétablissez les valeurs sur “Par défaut” dans Elementor.
- Retournez dans le customizer >> Typographie >> H2.
- Insérez les valeurs notées plus haut et publiez.

> Attention : pour que ces nouveaux paramètres soient pris en compte dans Elementor, il faut actualiser la page d’édition Elementor, bien entendu après avoir enregistré les derniers changements.

### Modifiez les blocs “Services”

- Cliquez sur l’icône d’affichage des modules et glissez-déposez le module Titrage en haut de la première colonne.
- Remplacez le texte par “Sites vitrines”, choisissez la balise HTML “H3”, centrez l’alignement, passez la couleur en blanc, et dans typographie, passez en majuscules, taille 26 px.
- Supprimez le bloc “Boîte d’icône” situé en dessous.
- Sélectionnez la colonne en cliquant sur l’icône grise en haut à gauche du bloc.
- Dans Style, mettez une image en arrière-plan et paramétrez un dégradé de couleurs.
- Dans Avancé, paramétrez une marge de 5 px à gauche et à droite, et une marge interne de 120 px en haut et en bas.
- Dupliquez deux fois le bloc ainsi obtenu et supprimez les 2 anciens blocs.
- Remplacez les textes, images d’arrière-plan et dégradé pour correspondre au rendu souhaité.

### Marges internes et marges externes

> Deux concepts essentiels en webdesign sont les marges externes (margin, en anglais) et les marges internes (padding, en anglais). Il est essentiel de bien les maîtriser afin de laisser respirer les contenus.

![](https://user.oc-static.com/upload/2021/04/01/1617282961243_image21.png)

### Personnalisez la deuxième section

Sélectionnez la section. Passez la largeur du contenu à 720 px. Changez l’image de fond avec l’image suivante dont vous aurez tout d’abord changé l’orientation en mode paysage (cf. remarque ci-dessous) : <https://unsplash.com/photos/Km8L8QoJIq8>

### Important : éditer une image dans WordPress

WordPress offre la possibilité d’effectuer des modifications simples sur une image directement depuis le dashboard, sans avoir à passer par un éditeur externe comme PhotoShop ou Gimp.

Pour cela :

- Rendez-vous dans la rubrique “Médias” du dashboard.
- Cliquez sur l’image que vous souhaitez modifier et cliquez sur “Modifier l’image” sous la zone de prévisualisation.
- Vous pouvez alors effectuer des rotations ou des symétries en cliquant sur les icônes correspondantes, ou encore recadrer l’image en sélectionnant la zone souhaitée sur la prévisualisation, puis en cliquant sur l’icône de recadrage.
- Sauvegardez ensuite vos modifications en cliquant sur “Enregistrer”.
- Ça y est, l’image est modifiée et vous pouvez l’insérer où vous le souhaitez, via l’éditeur classique ou le page builder de votre choix.
- Paramétrez la forme de séparation “vague” en haut et en bas de la section.
- Paramétrez 120 px de marge intérieure en haut et en bas.
- Supprimez la deuxième colonne de la section.
- Sélectionnez la première colonne.
- Paramétrez un fond blanc en opacité 90 %.
- Passez le titre en bleu, “h3” taille 32 px.
- Supprimez les images des composants “Boîte d’image” dans la colonne.
- Insérez les contenus souhaités dans les zones de texte.
- Ajoutez un composant “Section interne” dans la colonne et ajoutez une colonne pour en avoir 3.
- Glissez chaque composant “Boîte d’image” dans une colonne différente.

### Personnalisez les sections 3, 4 et 5

Modifiez enfin les sections 3, 4 et 5 par vous-même pour les faire ressembler au site créé par nos soins, et supprimez les sections restantes.

## Adaptez le design pour tous les écrans

Avant de passer à la suite, nous allons voir une fonctionnalité essentielle d’Elementor et d’OceanWP : la possibilité de facilement adapter le design à différentes tailles d’écran.

Pour cela, cliquez sur l’icône "écran" de la colonne de gauche en mode édition avec Elementor, et sélectionnez l’icône "mobile". La zone de prévisualisation passe instantanément en mode mobile, et vous allez constater de nombreuses choses à optimiser pour ce format : taille de police, marges, alignement des éléments, etc.

Au clic sur un widget, vous allez pouvoir changer les paramètres avec l’icône bleue “mobile” à gauche spécifiquement pour mobile. Repassez donc sur la page pour corriger tous ces aspects et enregistrez.

### Faites de même avec la version iPad

Vous pouvez aussi changer les paramètres de typographie OceanWP (entre autres) de la même façon dans le customizer. Je vous invite donc à configurer les valeurs par défaut pour les tailles de corps de texte et de titres sur mobile dans le customizer, afin qu’elles soient automatiquement appliquées partout.

> Elementor dispose de nombreuses fonctionnalités et options que nous n’avons pas le temps de passer en revue dans ce cours. Si vous souhaitez en savoir plus, je vous invite à regarder les vidéos officielles sur la page YouTube d’Elementor (en anglais) ou de vous abonner au groupe Facebook français Fans d’Elementor qui diffuse de nombreux tutoriaux en français, et dont les membres ne sont jamais avares de conseils !

Nous vous laissons le soin de créer les autres pages de votre site et de les ajouter au menu.

À noter qu’en plus des pages du site de démo déjà importées, vous pouvez :

- importer des templates de pages et de sections gratuits proposés par Elementor, en cliquant sur l’icône "dossier" depuis Elementor ;
- importer des centaines de templates de pages gratuits via l’extension Envato Elements.

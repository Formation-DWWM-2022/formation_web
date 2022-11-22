# Intégrez des fonctionnalités complémentaires grâce aux extensions

La première fonctionnalité que nous allons ajouter est un formulaire de contact, indispensable pour faciliter l’efficacité de son site pour récupérer des demandes clients.

Pour cela, nous allons utiliser WP Forms, l’extension qui a été installée par défaut lors de l’import du site de démo OceanWP.

Cette extension développée est en effet particulièrement simple d’utilisation et enregistre automatiquement les soumissions des formulaires en base de données. Cela est très important, car il n’est pas rare que les notifications e-mails ne fonctionnent pas ou passent en spam. Je ne vous souhaite vraiment pas de devoir expliquer à un client que toutes les demandes de contact prospects des dernières semaines ont été perdues à cause d’un problème de configuration d’e-mails.

> Il existe de nombreuses autres extensions permettant de créer des formulaires de contact. On citera en particulier : Contact Form 7 : la préférée des développeurs, car gratuite, très flexible, et permettant de nombreuses intégrations. Elle est cependant un peu moins simple d’utilisation ou Gravity Forms : cette extension est premium, mais offre de très nombreuses possibilités grâce à une interface complète, mais simple d’utilisation, et de très nombreux addons permettant des intégrations poussées avec d’autres plugins.

### Création du formulaire

- Rendez-vous dans la rubrique “WP Forms” depuis le dashboard WordPress.
- Cliquez sur “Nouveau”.
- Saisissez “contact” comme nom pour notre formulaire et sélectionnez le modèle “Formulaire de contact simple”.
- Vous pouvez maintenant ajouter des champs en les faisant glisser depuis la colonne de gauche, et les réorganiser en glissé-déposé dans la zone de prévisualisation du formulaire à droite. Plutôt simple, non ?
- Cliquez sur un champ dans la zone de prévisualisation à droite pour modifier les options du champ. Vous pouvez ainsi rendre le champ obligatoire, modifier le libellé du champ, etc.

### Réglages du formulaire

Cliquez maintenant sur l’onglet “Réglages” dans le menu de gauche.

Modifiez les libellés de la section générale au besoin, puis cliquez sur “Notifications”. C’est là que vous pouvez régler les paramètres d’envoi d’e-mails pour être averti qu’une demande de contact a été effectuée.

La configuration des e-mails repose sur des balises qui permettent d’utiliser des valeurs dynamiques dépendant des valeurs saisies dans le formulaire, ou paramétrées dans le site. Ici, la demande est configurée pour envoyer l’ensemble des champs (balise {all_fields}) à l’adresse e-mail de l’administrateur du site telle que configurée dans Réglages >> Général (balise {admin_e-mail}). Vous pouvez cliquer sur les liens “balises intelligentes” pour voir la liste des balises disponibles.

Cliquez enfin sur “Confirmation” pour configurer le message de réponse automatique qui sera envoyé à l’e-mail du visiteur, et enregistrez le formulaire en cliquant sur “Enregistrer” en haut à droite.

### Insertion du formulaire dans la page

Pour insérer une fonctionnalité dans un article ou une page, la solution historique et la plus répandue est l’utilisation de “shortcodes” (ou “codes courts”, en français).

> Important : les shortcodes sont des codes simples à utiliser pouvant contenir des variables. Ils sont interprétés dynamiquement lors de la génération de la page pour être remplacés par le bloc de la fonctionnalité à laquelle ils sont associés.

Pour obtenir le shortcode WP Forms, cliquez sur “Embed” en haut. Le shortcode obtenu devrait ressembler à : [wpforms id="437" title="false" description="false"].

Les paramètres sont :

- id : l’identifiant du formulaire devant être affiché.
- title : valeur true ou false pour choisir d’afficher ou non le titre du formulaire.
- description : valeur true ou false pour choisir d’afficher ou non la description du formulaire.

Vous pouvez les modifier tout en faisant bien attention d’utiliser l’ID d’un formulaire existant, sans quoi rien ne s’affichera !

Si vous souhaitez intégrer le shortcode dans une page éditée avec l’éditeur classique, il suffit de le coller dans la zone de contenu.

Dans notre cas, la page est éditée avec Elementor ; retournez donc maintenant sur votre page d’accueil et cliquez sur “Éditez avec Elementor”.

- Ajoutez une nouvelle section en cliquant sur l’icône “plus” sur fond rose en bas de page.
- Choisissez “Pleine largeur” comme largeur de contenu.
- Cliquez sur l’icône d’accès aux modules Elementor dans la colonne de gauche et cherchez “Code court”.
- Glissez le composant dans la section que vous venez de créer, collez le code court copié précédemment et cliquez sur “Appliquer”.

Ça y est ! Votre formulaire est intégré sur votre page.

La majorité des plugins génèrent aussi des widgets, pas au sens d’Elementor, mais au sens de WordPress. Heureusement, ceux-ci sont utilisables directement dans la majorité des page builders, dont Elementor :

- Cliquez sur l’icône d’accès aux modules Elementor.
- Cherchez “WP forms” et glissez le module dans la section souhaitée.
- Utilisez le menu contextuel pour choisir le formulaire souhaité.

## Ajoutez un pop-up d’inscription à une newsletter

La seconde fonctionnalité que nous souhaitons ajouter est un pop-up s’affichant automatiquement pour inviter à s’inscrire à notre newsletter. Cette pratique est parfois ennuyeuse et il ne faut pas en abuser, mais elle permet de récupérer les adresses e-mail de prospects et de maintenir le contact avec son audience.

> Ce type de composant n’est pas limité à la constitution d’une base pour sa newsletter, et peut aussi être utilisé pour proposer un audit de site gratuit ou participer à un concours, etc.

Pour ajouter cette fonctionnalité, nous allons utiliser le plugin Hustle développé par la société WPMUDEV, un des gros acteurs de l’écosystème WordPress.

Installez le plugin depuis le dashboard WordPress dans Plugins >> Ajouter.

Une fois activé, le plugin vous propose de choisir le type de fonctionnalité souhaitée.

- Choisissez “Popup”.
- Rentrez le nom “Newsletter”.
- Cliquez sur “Show GDPR checkbox” pour être en règle avec la législation européenne et passez le texte en français, en prenant garde à ne pas supprimer le lien vers la politique de confidentialité.
- Cliquez sur “Add e-mail collection to this pop-up” pour activer la fonctionnalité d’intégration avec les outils de newsletter.
- Sélectionnez Mailchimp et cliquez sur “Edit form” pour passer les labels du formulaire en français.
- Cliquez sur “Preview” à gauche pour vérifier que le pop-up s’affiche bien comme souhaité.
- Cliquez sur “Continue”, et à nouveau sur “Continue” sur la page suivante (n’hésitez cependant pas à jouer avec les options de design).
- Cliquez ensuite sur “Show after certain time” et saisissez 5 s pour n’afficher le formulaire qu’après un certain temps passé sur la page.
- Cliquez sur “Publish” et visitez votre site. Le pop-up devrait bien s’afficher !

Maintenant que nous avons mis en place ces fonctionnalités complémentaires, nous allons travailler sur des fonctionnalités avancées qui ne sont pas toujours indispensables, mais qui vous permettront de passer au niveau supérieur en termes de création de site.

## Configurez une page d’attente personnalisée

Nous avons vu précédemment comment demander aux moteurs de recherche de ne pas indexer le site web, ce qui permet d’éviter que des visiteurs tombent dessus pendant les développements.

Cela ne s’avère parfois pas suffisant, et certains clients souhaitent que le site soit totalement inaccessible au public jusqu’au lancement.

Deux solutions s’offrent à vous pour faire cela :

- utiliser une extension spécialisée comme “Maintenance”, mais les options sont assez limitées ;
- utiliser Elementor qui permet de créer une page totalement personnalisée.

Pour cela, nous allons créer un modèle Elementor.

- Rendez-vous dans le dashboard WordPress et cliquez sur Elementor >> Mes modèles.
- Cliquez sur “Ajoutez un nouveau”, sélectionnez le type “Page” et appelez-le “Attente”.
- Insérez un modèle de page et personnalisez-le, ou créez votre page de toutes pièces et publiez-la.
- Retournez dans le dashboard WordPress et cliquez sur Elementor >> Outils.
- Sélectionnez l’onglet “Maintenance”, sélectionnez “Arrive bientôt” et choisissez le modèle “Attente” que vous venez de créer.

Et voilà, seuls les utilisateurs connectés à WordPress seront capables d’accéder au site !

## Créez un header ou un footer personnalisé avec Elementor et OceanWP

OceanWP dispose d’une fonctionnalité très intéressante permettant de créer son en-tête ou son pied de page avec Elementor. Cela permet de créer des designs complexes et originaux qui auraient été impossibles à créer avec les seules options du customizer.

Attention, cependant, ces options peuvent sembler limitées, mais permettent aussi de ne pas faire n’importe quoi et de rester dans les standards. Soyez donc vigilant si vous utilisez cette option !

Voici les étapes pour créer un header ou un footer personnalisé :

- Depuis le dashboard WordPress, cliquez sur “Theme Panel >> Ma bibliothèque”.
- Cliquez sur “Ajoutez un nouveau”.
- Saisissez le titre “Header” et choisissez le layout “100 % pleine largeur” dans les options OceanWP.
- Cliquez sur "Éditez avec Elementor” et créez votre header personnalisé. À noter que le menu doit être inséré à l’aide du widget “Menu personnalisé”.
- Publiez le modèle et retournez dans le dashboard WordPress.
- Cliquez sur Apparence >> Personnaliser pour ouvrir le customizer.
- Dans “En-tête”, sélectionnez “En-tête personnalisé” et sélectionnez le modèle “Header” que nous venons de créer.

Et voilà, vous disposez d'un en-tête sur mesure pour votre site !

Le même processus est applicable pour le pied de page en créant un autre modèle et en l’appliquant dans la section “Widgets de pied de page” du customizer.

> La version pro d’Elementor (payante) permet de gérer l’intégralité du site (header, footer, template d’articles, templates d’archives, etc.) via des modèles Elementor. Le thème n’est alors quasiment plus utilisé, Elementor a d’ailleurs lancé un thème minimaliste dédié à cet usage, Hello Theme.

## Ajoutez des CSS personnalisés

Elementor et OceanWP sont très flexibles, mais il peut arriver qu’ils n’offrent pas les options de personnalisation de design que l’on souhaiterait.

Il est possible de contourner le problème en ajoutant des règles CSS personnalisées dans la section “CSS et JS personnalisés” du customizer.

### Identifiez proprement le composant que l’on souhaite personnaliser

S’il s’agit d’un composant Elementor, vous pouvez attribuer une classe CSS au composant souhaité dans l’onglet “Avancé” de la colonne de droite, ce qui va nous permettre de le cibler très facilement, par exemple “ma_classe_personnalisee”.

S’il ne s’agit pas d’un composant Elementor, il va falloir utiliser l’inspecteur de votre navigateur web pour cibler le composant souhaité.

![](https://user.oc-static.com/upload/2021/04/14/16184119473639_13.png)

Pour cela :

- Ouvrez la page souhaitée dans votre navigateur, faites un clic droit sur le composant souhaité et cliquez sur “Inspecter”.
- Sélectionnez le bon élément HTML dans la zone de gauche, puis copiez le code utilisé pour le cibler dans la colonne de droite.
- Par exemple, pour un lien du menu OceanWP : #site-navigation-wrap.dropdown-menu >li >a.
- Rendez-vous dans le customizer dans la section “CSS et JS personnalisés”.
- Collez la classe que vous avez attribuée dans Elementor (“.ma_classe_personnalisee”) ou le code CSS copié depuis l’inspecteur précédemment, puis ajoutez la règle CSS souhaitée. Par exemple :

```css
.ma_classe_personnalisee{
  color:red;
}
```

## Créez des types de contenus personnalisés

Si vous souhaitez créer des sites un peu plus complexes, il vous faudra certainement créer des types de contenu personnalisés.

Par exemple, si vous souhaitez créer un site d’annonces de voitures d’occasion, il vous sera nécessaire de créer un type de contenu “voiture” disposant de champs personnalisés comme “Prix neuf”, “Prix de vente”, “Année d’acquisition”, etc.

Pour un site plus simple comme le nôtre, ces custom post types peuvent servir à créer des types de contenus comme des testimoniaux, ou encore des portfolios pour présenter nos réalisations.

Cette fonctionnalité était auparavant réservée à des personnes maîtrisant un minimum le code, mais elles sont maintenant beaucoup plus accessibles. Nous allons ainsi créer un type de contenu de type “Portfolio” pour présenter nos réalisations.

Il existe de nombreuses extensions permettant de créer des types de contenus personnalisés sans coder. Nous allons choisir “CPT UI” qui est gratuite et simple d’utilisation.

- Installez-la depuis le dashboard WordPress.
- Dans le dashboard, cliquez sur CPT UI >> Add / edit Post Types.
- Saisissez :
  - “Portfolio” dans le champ Post Type Slug ;
  - “Portfolios” dans le champ “Plural label” ;
  - “Portfolio” dans le champ “Singular label”.
- Cochez la case “Built-in Categories” en bas de page.
- Cliquez sur “Add post type”.

Vous constaterez alors qu’une nouvelle rubrique “Portfolios” apparaît dans le menu du dashboard WordPress !

Créez maintenant quelques contenus de type portfolio depuis cette section. N’oubliez pas de mettre l’image de la réalisation souhaitée en “Image à la une” et de lui appliquer les catégories correspondant au type de réalisation (logo, site web, plaquette…).

> J’ai maintenant des contenus de type “Portfolio”, mais comment les afficher ?

Le module “Posts” qui permet d’afficher une liste de posts n’est accessible qu’en version pro. :-/ Heureusement, des addons Elementor proposent cette fonctionnalité dans leur version gratuite.

C’est en particulier le cas de “Livemesh Addons for Elementor”. Rendez-vous dans “Extensions”, cliquez sur “Ajouter” et installez cet addon.

Une fois l’extension activée, retournez dans l’édition de la page avec Elementor et insérez le widget “Posts Grid” de la section “Livemesh Addons”.

Dans le champ “Post type”, supprimez “Articles” et ajoutez “Portfolios”.

Dans le champ “Taxonomies”, sélectionnez le type de réalisation souhaité (par exemple “Logos”).

Et voilà, les dernières réalisations de type logo s’affichent automatiquement ! N’hésitez pas à jouer avec les autres options pour en affiner la présentation.

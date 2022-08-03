# Data Scientist vs Data Analyst vs Data Engineer : quelles différences ?

- Data Scientist vs Data Analyst vs Data Engineer : quelles différences ? : <https://youtu.be/mEZIHFxUFEc>
- DATA Scientist : quotidien, salaire, parcours | Pool : <https://youtu.be/efEW5oVudas>
- DATA Analyst : quotidien, salaire, parcours |
Welcome to the Jungle Studio : <https://youtu.be/PSFK8Ru7uKA>
- DATA Engineer : quotidien, salaire, parcours |
Welcome to the Jungle Studio : <https://youtu.be/k8KryZxmn0A>

Être data scientist est considéré comme l’un des meilleurs métiers du 21ème siècle mais on s’aperçoit vite qu’il existe un grand nombre d’autres métiers comme Data Analyst ou Data Engineer. Quelles sont les différences entre Data Scientist vs Data Analyst vs Data Engineer ? Quel métier préférer lorsqu’on veut travailler en Data Science ou en Machine Learning ?

Le Data Analyst est celui qui va permettre d’orienter la stratégie d’une entreprise grâce à son analyse des données. Il va créer des tableaux mais également des graphiques et des diaporamas pour illustrer comme les données peuvent répondre à tel ou tel problème d’entreprise. Le Data Analyst va avoir un véritable impact sur l’entreprise. Il va utiliser des outils comme Excel et Powerpoint mais également R.

Le métier de Data Scientist a de nombreuses différences avec le Data Analyst. Il va procéder à une analyse des données plus poussée. Il va utiliser des outils mathématiques et scientifiques comme les algorithmes de Machine Learning, les modèles de Deep Learning ou les réseaux neuronaux. Le Data Scientist va créer une solution data qui va permettre d’obtenir des recommendations ou améliorer un produit par exemple. Il va utiliser R et Python mais également du SQL pour collecter les données pour faire de la Data Science.

Le Data Engineer va aider le Data Analyst et le Data Scientist en s’occupant de la collecte des données ainsi que de leur stockage. Il doit s’assurer que les données soient dans le bon format et qu’elles soient facilement accessibles. Le Data Engineer va utiliser SQL comme le Data Scientist mais il va aussi utiliser des outils plus techniques comme Spark.

Je vous conseille de travailler en tant que Data Engineer si vous êtes organisé, si vous souhaitez gérer des systèmes complexe de données. Vous devriez faire Data Analyst si vous avez facilement une vue d’ensemble d’un problème d’entreprise et vous arrivez à le diviser en petits problèmes data. Je vous conseille enfin de travailler en tant que Data Scientist comme métier si vous voulez avoir des missions similaires à celles du Data Engineer et du Data Analyst mais également si vous souhaitez travailler sur des modèles de Machine Learning ou de Deep Learning.

# Trouvez votre véritable passion dans le domaine des données

La science des données est devenue l'une des professions les plus en vogue ces dernières années. Une forte demande sur le marché, une rémunération lucrative, un gros chèque et un titre de poste sexy rendent les nouveaux diplômés ou ceux qui recherchent un changement de carrière désireux de se lancer dans ce domaine. Cependant, les titres de poste et la répartition du travail dans une équipe de données peuvent prêter à confusion. « J'aime jouer avec les données », « Je suis une personne axée sur les données » ne suffisent pas pour vous trouver la carrière la plus appropriée dans le domaine des données. Le pire scénario pourrait être de perdre beaucoup de temps à postuler à des emplois qui ne vous conviennent pas du tout ou à décrocher un emploi qui vous intéressait mais qui ne vous intéresse pas et qui finit par perdre la passion.

Il m'a fallu du temps pour vraiment comprendre les différences entre chaque rôle dans une équipe de données. Il y a eu 2 erreurs que j'ai commises lorsque j'ai postulé pour la première fois à des emplois dans ce domaine.

La première est que j'ai postulé pour tous les emplois qui contiennent des "données" dans le titre, simplement parce que je ne connaissais pas les différences et que je pensais "je vais d'abord entrer dans ce domaine et tout s'arrangera". Ingénieur de données, architecte de données, analyste commercial, analyste de données, scientifique de données, analyste de l'intelligence d'affaires, maître de données, gourou des données, etc. Tant que le rôle a quelque chose à voir avec les données, il figure sur ma liste de candidatures. C'était long, extrêmement inefficace et sans but.

La deuxième erreur est de ne pas savoir ce que je veux vraiment faire des données. Au départ, je pensais que j'allais être un scientifique des données parce que j'aime les données et c'est le titre le plus sexy. Après avoir commencé à travailler sur de vrais projets, j'ai réalisé que ce que j'aimais vraiment était d'analyser des données, de découvrir des informations et de contribuer aux décisions commerciales, qui relèvent davantage d'un analyste de données.

Cette histoire vise à vous aider à comprendre ce que chacun des 3 rôles fait dans une équipe de données, et donc, espérons-le, à vous aider à découvrir ce qui vous passionne vraiment.

Pour illustrer ce que fait chaque rôle dans une équipe, nous devons d'abord comprendre le parcours des données depuis leur génération jusqu'à leur présentation aux décideurs de l'entreprise. Prenons l'exemple d'un site Web de commerce électronique et parcourons le parcours des données à partir d'une vue de 30 000 pieds.

## Un voyage de données

Lorsque vous accédez à un site Web et parcourez la marchandise, tous vos comportements sont suivis et surveillés. Quels produits avez-vous parcourus, comment vous avez passé votre souris sur la page, combien de temps vous êtes resté sur le site, quel a été votre parcours utilisateur, ce que vous avez acheté, combien vous avez dépensé, etc. Ces informations (données) sont enregistrées et envoyées à un lieu, généralement un nuage. Il peut être hébergé par un fournisseur comme AWS, Azure, GCP, etc., ou des serveurs sur site.

![](https://miro.medium.com/max/1400/1*IYpN5l6-9u0ZcpEvJjj_6g.png)

A ce stade, les données sont souvent stockées sous une forme très brute, voire non structurée. Pour rendre ces données disponibles pour être interrogées, nous devons les déplacer vers une base de données. Il existe de nombreux types de bases de données avec différentes caractéristiques, utilisations et capacités parmi lesquelles choisir en fonction de vos demandes. Le nettoyage et la transformation des données se produiraient également à ce stade. Par exemple, transformer la structure des données en format tabulaire, aplatir les données au format JSON, agrégation basée sur la logique métier, validation des données, etc.

Ce processus est ce que nous avons appelé ETL, extraire (du cloud), transformer (les données), charger (dans une base de données). (L'infrastructure moderne favorise l'ELT, c'est-à-dire la transformation des données après les avoir chargées dans une base de données. Nous aborderons cela dans une autre histoire.)

Le but de cette étape est de fournir aux consommateurs de données une collection de données propres, validées et utilisables.

![](https://miro.medium.com/max/1400/1*j2Yd_jwaT0BZti8KNw7ziA.png)

Maintenant, les données utilisables se trouvent dans la base de données. Il y a 2 choses principales que nous pouvons faire à ce sujet. Analysez les données et trouvez des informations pour prendre des décisions commerciales ou utilisez les données comme matériaux pour créer des produits fascinants tels que l'apprentissage automatique, l'apprentissage en profondeur, la PNL, le système de recommandation, etc.

![](https://miro.medium.com/max/1400/1*Nlg9DUyxoAv19vVvyu8ALQ.png)

# Missions de chaque rôle

## Analyste de données

Les analystes de données font partie des consommateurs de données. Un analyste de données répond à des questions sur le présent telles que : que se passe-t-il maintenant ? Quelles sont les causes ? Pouvez-vous me montrer XYZ ? Que devrions-nous faire pour éviter/réaliser l'ABC ? Quelle est la tendance depuis 3 ans ? Notre produit se porte-t-il bien ?

Repensons ce que sont les données. Les données sont quelque chose qui a déjà eu lieu. Une décision basée sur les données signifie que nous examinons ce qui s'est déjà passé, en interprétons les informations, puis passons à l'étape suivante en fonction de cela. Le travail d'un analyste de données comprend 3 parties principales :

1. Comprendre les métriques/le problème métier, c'est-à-dire poser les bonnes questions.
2. Découvrez les réponses ou plus d'informations à partir des données.
3. Communication. Cela inclut la création de tableaux de bord avec des visualisations appropriées et leur explication d'une manière facile à comprendre pour les parties prenantes non techniques.

Exigences en matière de compétences

1. SQL : Ceci est essentiel pour que tous les rôles liés aux données interagissent avec les bases de données.
2. Visualisation des données : le plus important est de savoir comment visualiser les données de manière appropriée, plutôt que l'outil que vous utilisez. La plupart des entreprises disposent d'outils de Business Intelligence sous licence tels que Power BI, Tableau, Looker, Qlik, etc. Vous n'avez pas besoin de savoir comment les utiliser tous. Si vous comprenez les concepts de base de l'analyse de données, il ne devrait pas vous falloir longtemps pour en maîtriser l'un.
3. Connaissance du domaine : Je dirais que la connaissance du domaine est beaucoup plus critique pour un analyste de données que pour d'autres rôles. A quoi correspondent les métriques ? Comment les métriques interagissent-elles les unes avec les autres ? Quels sont les déménageurs d'aiguille? Ces types de connaissances du domaine sont nécessaires pour poser les bonnes questions, pour être en mesure de découvrir des informations et de contribuer aux décisions commerciales.

## Scientifique des données

Les data scientists sont un autre consommateur de données. Au lieu de répondre à des questions sur le présent, ils essaient de trouver des modèles dans les données et de répondre aux questions sur l'avenir, c'est-à-dire la prédiction. Cette technique existe en fait depuis longtemps. Vous devez en avoir entendu parler, ça s'appelle des statistiques. L'apprentissage automatique et l'apprentissage en profondeur sont les 2 façons les plus populaires d'utiliser la puissance des ordinateurs pour trouver des modèles dans les données. Les scientifiques des données créent également des produits basés sur ces prédictions. Par exemple, un système de recommandation prédit ce que vous aimez, un système de classement prédit l'ordre de popularité, la PNL prédit ce que signifie une phrase. Les scientifiques des données créent ces produits non pas pour aider à prendre des décisions commerciales, mais pour résoudre des problèmes commerciaux.

La meilleure façon de décrire un data scientist est quelqu'un qui "utilise les données pour résoudre les problèmes de l'entreprise". Cela peut être n'importe quoi, selon la taille de l'entreprise. Vous verrez peut-être un scientifique des données occuper de nombreux postes d'analyste et d'ingénieur dans une petite startup. Dans une grande entreprise, ils sont plus susceptibles de se concentrer sur ce dont nous venons de parler.

Exigences en matière de compétences :

1. SQL : Ceci est essentiel pour que tous les rôles liés aux données interagissent avec les bases de données.
2. Statistiques/Mathématiques : Vous devez maîtriser les connaissances en statistiques telles que les théories derrière chaque méthode d'apprentissage automatique, les probabilités, etc. pour résoudre des problèmes plus complexes. Cette partie est assez académique et théorique, c'est pourquoi la plupart des rôles de data scientist nécessiteraient une maîtrise ou un doctorat.
3. Compétences en programmation : Pour appliquer des connaissances statistiques pour résoudre des problèmes du monde réel, vous devez vous doter de compétences en programmation. Les modèles de formation, l'écriture d'algorithmes, la création de produits de nouvelle génération se font tous sur un ordinateur portable. La science des données est une matière qui combine l'informatique et les statistiques. Actuellement, Python et R sont les langages de programmation les plus populaires.
4. Développement de logiciels : comme tout autre ingénieur, les compétences en développement de logiciels sont essentielles pour coopérer avec d'autres parties prenantes. Le workflow Git, CI/CD, DevOps, etc. sont tous de base dans l'arsenal d'un data scientist.

## Ingénieur de données

Comment les analystes de données et les scientifiques obtiennent-ils les données ? Comment les données proviennent-elles du comportement des utilisateurs vers la base de données ? Comment s'assurer que les données sont responsables ? La réponse est les ingénieurs de données. Les consommateurs de données ne peuvent pas effectuer leur travail sans que les ingénieurs de données mettent en place toute la structure. Ils construisent des pipelines de données pour ingérer les données des appareils des utilisateurs vers le cloud puis vers la base de données. Pour le dire simplement, tout ce qui arrive aux données avant d'atteindre la base de données est pris en charge par les ingénieurs de données.

Un ingénieur de données se soucie le plus de :

1. Comment ingérer des données provenant de sources disparates vers une seule destination pour que les analystes et les scientifiques puissent les consommer.
2. Assurez-vous que le pipeline de données, le stockage et la structure des données sont optimisés et les plus rentables pour l'entreprise.
3. Assurez-vous que les données utilisées par les analystes et les scientifiques sont les plus à jour, validées et responsables. Ils ne prendront pas de mauvaises décisions parce que les données sont incorrectes.

Exigences en matière de compétences

1. SQL : De plus, un ingénieur de données doit comprendre les tenants et les aboutissants de chaque base de données différente, quand utiliser laquelle, quels sont leurs avantages. Parfois besoin de connaître les commandes DBA (administration de base de données) telles que la surveillance des accès des membres de l'équipe, l'écriture de procédures, la maintenance de schémas pour optimiser les performances de la base de données.
2. Cloud computing : comme la quasi-totalité des données se trouve désormais sur le cloud, du stockage à la base de données en passant par l'entreposage, les ingénieurs doivent être très familiarisés avec la technologie du cloud computing. AWS (Amazon), Azure (Microsoft) et GCP (Google) sont les 3 services cloud les plus populaires du marché. Cela inclut également l'application de l'informatique parallèle (Hadoop, Spark) et du big data.
3. Développement de logiciels : Identique à ce qui précède.

# Sommaire

Pour utiliser une phrase pour résumer chaque rôle,

- Les décisions commerciales sont prises par des analystes de données.

- Les data scientists résolvent les problèmes des entreprises.

- Les ingénieurs de données permettent aux analystes de données et aux scientifiques d'effectuer leur travail.

![](https://miro.medium.com/max/1400/1*kg0eNJcKFkqpvu4gdTbddQ.png)

Bien que la situation réelle varie dans différentes entreprises en fonction de la taille et de la structure organisationnelle, les principaux objectifs de chaque rôle ne doivent pas être trop éloignés de ce dont nous venons de parler. Il est peu probable de voir un analyste de données jouer avec AWS et configurer des pipelines de données et un ingénieur de données créer des tableaux de bord dans Looker. Un scientifique des données, cependant, pourrait faire n'importe quoi. Dans sa vidéo, Joma explique assez bien à quoi ressemblerait l'organisation à différentes échelles d'entreprises. Il donne également un aperçu assez clair de l'histoire de la science des données et de ce qu'est réellement la science des données.

Enfin, la meilleure chose que je recommanderais fortement de faire est au lieu de simplement regarder les titres, de regarder attentivement la description de poste, pour vraiment comprendre ce que ce rôle fait dans leur entreprise et si ces travaux quotidiens répondent à vos attentes.

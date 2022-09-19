# UML 2 -  De l'apprentissage à la pratique
## Vidéo simples et efficace

> freeCodeCamp.org [eng]

UML Diagrams Full Course (Unified Modeling Language) : <https://youtu.be/WnMQ8HlmeXc>

## Support de cours

- Learn UML2.* in simple terms :  <https://github.com/imalitavakoli/learn-uml2>
- laurent-audibert.developpez.com : <https://laurent-audibert.developpez.com/Cours-UML/>
- [Memento UML 2.5](./lecture/MémentoUML2.5.pdf)
- [Langage UML PDF](./lecture/3-UML.pdf)
- [Les cahiers du programmeur - UML 2 - Modéliser une application web par Pascal Roques](./lecture/UML_2_ModeliserUneApplicationWeb.pdf)
- [UML 2 par la pratique](./lecture/Roques06.pdf)

# StarUML

StarUML est un outil de génie logiciel dédié à la modélisation UML et édité la la société coréenne MKLabs.
<https://staruml.io/>

# Introduction

Pour faire face à la complexité croissante des systèmes d’information, de nouvelles méthodes et
outils ont été créées. La principale avancée des quinze dernières années réside dans la
programmation orientée objet (P.O.O.).

Face à ce nouveau mode de programmation, les méthodes de modélisation classique (telle
MERISE) ont rapidement montré certaines limites et ont dû s’adapter.

De très nombreuses méthodes ont également vu le jour comme Booch, OMT ...

Dans ce contexte et devant le foisonnement de nouvelles méthodes de conception « orientée objet »,
l’Object Management Group (OMG) a eu comme objectif de définir une notation standard utilisable
dans les développements informatiques basés sur l’objet. C’est ainsi qu’est apparu UML (Unified
Modified Language « langage de modélisation objet unifié »), qui est issu de la fusion des méthodes
Booch, OMT (Object Modelling Technique) et OOSE (Object Oriented Software Engineering).

Issu du terrain et fruit d'un travail d'experts reconnus, UML est le résultat d'un large consensus. De
très nombreux acteurs industriels de renom ont adopté UML et participent à son développement.

En l'espace d'une poignée d'années seulement, UML est devenu un standard incontournable.

Ceci nous amène à nous questionner sur :

- les apports réels d’UML dans la modélisation
- la place des méthodes dites « traditionnelles » telle que MERISE.

UML est en effet apparu très tardivement, car l’approche objet se pratique depuis de très
nombreuses années déjà.

Simula, premier langage de programmation à implémenter le concept de type abstrait à l'aide de
classes, date de 1967 ! En 1976 déjà, Smalltalk implémente les concepts fondateurs de l'approche
objet : encapsulation, agrégation, héritage. Les premiers compilateurs C++ datent du début des
années 80 et de nombreux langages orientés objets "académiques" ont étayé les concepts objets
(Eiffel, Objective C, Loops...).

Il y donc déjà longtemps que l'approche objet est devenue une réalité. Les concepts de base de
l'approche objet sont stables et largement éprouvés. De nos jours, programmer "objet", c'est
bénéficier d'une panoplie d'outils et de langages performants. L'approche objet est une solution
technologique incontournable. Ce n'est plus une mode, mais un réflexe quasi-automatique dès lors
qu'on cherche à concevoir des logiciels complexes qui doivent "résister" à des évolutions
incessantes.

Toutefois, l’approche objet n’est pas une panacée :

- Elle est moins intuitive que l'approche fonctionnelle.
- Malgré les apparences, il est plus naturel pour l'esprit humain de décomposer un problème
informatique sous forme d'une hiérarchie de fonctions atomiques et de données, qu'en terme
d'objets et d'interaction entre ces objets. Or, rien dans les concepts de base de l'approche objet ne dicte comment modéliser la
structure objet d'un système de manière pertinente. Quels moyens doit-on alors utiliser
pour mener une analyse qui respecte les concepts objet ? Sans un cadre méthodologique
approprié, la dérive fonctionnelle de la conception est inévitable...
- L'application des concepts objet nécessite une très grande rigueur.
Le vocabulaire précis est un facteur d'échec important dans la mise en oeuvre d'une
approche objet (risques d'ambiguïtés et d'incompréhensions). Beaucoup de développeurs
(même expérimentés) ne pensent souvent objet qu'à travers un langage de programmation.
Or, les langages orientés objet ne sont que des outils qui proposent une manière particulière
d'implémenter certains concepts objet. Ils ne valident en rien l'utilisation de ces moyens
techniques pour concevoir un système conforme à la philosophie objet.
Connaître C++ ou Java n'est donc pas une fin en soi, il faut aussi savoir se servir de ces
langages à bon escient. La question est donc de savoir "qui va nous guider dans l'utilisation
des concepts objet, si ce ne sont pas les langages orientés objet ?".
Enfin, comment comparer deux solutions de découpe objet d'un système si l'on ne dispose
pas d'un moyen de représentation adéquat ? Il est très simple de décrire le résultat d'une
analyse fonctionnelle, mais qu'en est-il d'une découpe objet ?

Pour remédier à ces inconvénients majeurs de l'approche objet, il faut donc :

1. un langage (pour s'exprimer clairement à l'aide des concepts objets)
Le langage doit permettre de représenter des concepts abstraits (graphiquement par
exemple), limiter les ambiguïtés (parler un langage commun, au vocabulaire précis,
indépendant des langages orientés objet), faciliter l'analyse (simplifier la comparaison et
l'évaluation de solutions).
2. une démarche d'analyse et de conception objet

Une démarche d’analyse et de conception objet est nécessaire afin de ne pas effectuer une analyse
fonctionnelle et se contenter d'une implémentation objet, mais penser objet dès le départ, définir les
vues qui permettent de décrire tous les aspects d'un système avec des concepts objets.

Il faut donc disposer d'un outil qui donne une dimension méthodologique à l'approche objet et
qui permette de mieux maîtriser sa richesse.

La prise de conscience de l'importance d'une méthode spécifiquement objet ("comment structurer
un système sans centrer l'analyse uniquement sur les données ou uniquement sur les traitements,
mais sur les deux"), ne date pas d'hier. Plus de 50 méthodes objet sont apparues durant le milieu des
années 90 (Booch, Classe-Relation, Fusion, HOOD, OMT, OOA, OOD, OOM, OOSE...). Aucune
ne s'est réellement imposée.

L'absence de consensus sur une méthode d'analyse objet a longtemps freiné l'essor des technologies
objet. Ce n'est que récemment que les grands acteurs du monde informatique ont pris conscience de
ce problème. L'unification et la normalisation des méthodes objet dominantes (OMT, Booch et
OOSE) ne datent que de 1995. UML est le fruit de cette fusion.

UML, ainsi que les méthodes dont il est issu, s'accordent sur un point : une analyse objet passe par
une modélisation objet.

![](https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Uml_diagram-fr.png/800px-Uml_diagram-fr.png)

# Pourquoi réaliser une conception UML de votre application web ?

Il y a plusieurs raisons qui expliquent pourquoi il est indispensable d’utiliser l’UML dans la modélisation d’une application web et son architecture.

En effet, la première raison est qu’il permet de façon simple de représenter tous les éléments nécessaires au bon fonctionnement de l’application web. Il peut y avoir plusieurs modèles d’UML pour les différentes parties de la plateforme en ligne. En effet, un modèle peut être conçu pour les fonctionnalités et un autre pour la technique et le développement. Avec l’UML on peut travailler aussi sur l’expérience utilisateur : ergonomie, web design, performance du site, etc. Les documents produits à partir des modèles d’UML serviront aux différents corps de métiers en charge de monter le projet d’application. Dès lors, le document devient universel car il facilite l’avancement du site et sa compréhension. De plus, si vous tentez de réaliser votre application à partir d’un langage de type PHP, qui est orienté objet, alors l’UML est idéal pour vous, car il est alors facile de représenter son utilisation à partir de la modélisation.

La deuxième raison est qu’il nécessite moins de temps. En effet, utiliser l’UML, c’est gaspiller moins de temps et donc d’argent. Si vous décidez de réaliser un document dense sous forme écrite, la tâche peut devenir contraignante et fastidieuse car il faut rédiger énormément et veiller à se relire régulièrement. Le texte est susceptible de ne pas être compris par tous les membres du projet et donc ralentir la productivité de chacun. Il est parfois compliqué de trouver de l’inspiration pour écrire et cela fait encore perdre du temps. Donc, opter pour de la modélisation graphique est une bonne solution.

La troisième raison est qu’il permet de relier, de manière très simple, les attentes et demandes des clients à plus tard ce qu’on va appeler le code de l’application et tous les aspects du développement. On peut dire que c’est un intermédiaire entre le client et la future application. Il permet alors de modéliser ce que veut le client et ce qui est nécessaire pour lui dans son utilisation du logiciel en ligne.

Donc, c’est pour toutes ces raisons qu’il est intéressant de choisir ce type d’outil pour concevoir son application web à destination des internautes.


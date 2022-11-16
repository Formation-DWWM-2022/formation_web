# Qu'est-ce que la preuve d'enjeu ou proof-of-stake (PoS) ?

La preuve d'enjeu, de l'anglais proof-of-stake (PoS), est un procédé permettant à quelqu'un de démontrer son implication dans un système crypto-économique par le biais d'un algorithme de signature, dans le cadre de l'accès à un privilège. Ce moyen intervient généralement dans le modèle de consensus des systèmes distribués qui gèrent une unité de compte numérique : les validateurs sont alors sélectionnés selon le nombre d'unités en leur possession ou selon un autre paramètre lié.

La preuve d'enjeu est souvent décrite comme du « minage virtuel » car les jetons numériques jouent le même rôle que l'énergie électrique dans la preuve de travail. Ainsi, dans de nombreuses cryptomonnaies, la probabilité de valider un bloc est proportionnelle au nombre de jetons en possession du validateur.

Pour les inciter à sécuriser le système, les validateurs sont récompensés par l'émission de nouveaux jetons et par les frais de transaction : on appelle cela le staking. De plus, les validateurs ne sont pas appelés des mineurs, mais des forgeurs.

![](https://cryptoast.fr/wp-content/uploads/2018/06/proof-of-stake-crypto-blockchain.jpg.webp)

- [Le Proof of Stake expliqué : le Consensus Écologique (preuve d’enjeu)](https://youtu.be/LZ2wS7axvS4)
- [La PREUVE D'ENJEU, c'est quoi ? #EOS](https://youtu.be/KHvnvVovXxs)
- [Crypto Education - Qu'est-ce que le Proof of Stake](https://youtu.be/bIrZ7uRbSmU)
- [Comprendre le PROOF OF STAKE](https://youtu.be/G4Vk54gZ5eY)

## D'où vient la preuve d'enjeu ?

Le concept de preuve d'enjeu utilisé au sein d'un système distribué est apparu assez tôt. En 1998, Wei Dai imaginait ainsi b-money, un modèle où chaque serveur devait déposer un certain montant de b-money sur un compte spécial pour participer aux opérations du réseau. Dans ce modèle, ce montant servait de garantie pour pénaliser le serveur en cas de mauvaise conduite.

Malgré cette conceptualisation précoce, il a fallu attendre l'apparition de Bitcoin (et de la preuve de travail) pour que la mise en application d'un système de preuve d'enjeu soit envisagée. Bitcoin montrait en effet qu'un système décentralisé reposant sur une sécurité économique était viable.

Le terme proof-of-stake a été introduit par Sunny King et Scott Nadal en août 2012 dans le livre blanc de PPCoin. PPCoin, aujourd'hui connu sous le nom de Peercoin, était aussi le premier système de cryptomonnaie à utiliser de manière pratique la preuve d'enjeu : il mettait en effet en place un modèle hybride combinant énergie électrique et âge des pièces (preuve de conservation) pour sa validation.

Par la suite, bon nombre de cryptomonnaies ont implémenté la preuve d'enjeu. NXT, lancé en 2013, a été l'un des premiers systèmes à utiliser un modèle pur de preuve d'enjeu. En 2014, Dash a innové grâce à son modèle de masternodes requérant la possession de 1000 DASH, qui permettait d'apporter des fonctionnalités supplémentaires à la cryptomonnaie.

En 2015 Ethereum était lancé : même si la plateforme fonctionne toujours grâce au minage, il est prévu depuis son lancement qu'elle transitionne vers un modèle de preuve d'enjeu. L'algorithme aujourd'hui envisagé est appelé Casper.

## Fonctionnement et variantes de la preuve d'enjeu

Les modèles de validation par preuve d'enjeu sont divers, et il est difficile de les présenter tous au sein de cet article. Nous nous concentrerons donc ici sur l'algorithme de Nakamoto par preuve d'enjeu, une transposition de l'algorithme de consensus de Bitcoin pour la preuve d'enjeu. Cet algorithme se base sur une chaîne de blocs qui sont ajoutés régulièrement par les validateurs.

Le fonctionnement de cet algorithme consiste à reproduire le minage de manière virtuelle. À chaque fois qu'un bloc doit être créé, un protocole de génération aléatoire est utilisé pour sélectionner un validateur selon le nombre de jetons qu'il a mis en séquestre. La validateur sélectionné regroupe alors toutes les nouvelles transactions et construit le nouveau bloc en y incluant l'identifiant du bloc précédent (pour lier les deux blocs entre eux). Puis, il signe ce bloc à l'aide d'un algorithme de signature numérique pour prouver qu'il est bien le propriétaire de son compte. Enfin, il publie son bloc publiquement pour que les autres membres du réseau puissent s'assurer de sa validité.

Notez que, si le validateur ne produit pas de bloc dans un intervalle de temps donné, alors un deuxième validateur est sélectionné de la même manière, et ainsi de suite.

Tout comme pour Bitcoin, l'algorithme de consensus se base sur le principe de la chaîne la plus longue : la chaîne comportant le plus grand nombre de blocs est considérée comme valide. Ainsi, lorsqu'un conflit apparaît sur le réseau (création de ce qu'on appelle un fork ou un embranchement), la situation est résolue par ce principe, ce qui permet aux membres du réseau de se mettre d'accord sur la « bonne » chaîne.

![](https://cryptoast.fr/wp-content/uploads/2020/06/pos-blockchain-fork-green-red-768x307.png.webp)

## Le problème du « rien à perdre » (nothing at stake)

Une application naïve de la preuve d'enjeu pour sélectionner la chaîne la plus longue ne fonctionne pas. En effet, cette implémentation crée un problème appelé le problème du « rien à perdre », ou "nothing at stake" problem en anglais.

Dans le modèle de la preuve de travail, un mineur investit de l'énergie électrique pour valider un bloc. Si un embranchement se produit et que le bloc est invalidé, alors cette énergie investie est perdue et ne peut pas être réutilisée sur l'autre branche.

En revanche, dans le modèle de la preuve d'enjeu, les forgeurs n'investissent pas d'énergie pour valider un bloc et se contentent de signer ce dernier. Ils ont donc la possibilité, dans le cas d'un embranchement, de valider des blocs sur plusieurs branches à la fois sans dépense d'énergie supplémentaire. Autrement dit, ils n'ont rien à perdre. Pire : les validateurs sont incités économiquement à le faire sur toutes les branches existantes, comme le montre le schéma ci-dessous.

![](https://cryptoast.fr/wp-content/uploads/2020/06/pos-nasp-vote-on-both-768x316.png.webp)

L'algorithme est donc inapplicable, puisqu'il est possible que le réseau ne parvienne jamais à un consensus. Néanmoins, il existe un moyen pour remédier à ce problème du « rien à perdre » : faire usage d'un système de pénalités. Celui-ci exige que la validateur bloque un dépôt de garantie (dans la cryptomonnaie du réseau), dépôt qui sert à payer une pénalité en cas de participation à plusieurs branches, ou de participation à une mauvaise branche. C'est dans cet esprit qu'a été développé l'algorithme Slasher par exemple.

## Les variantes de la preuve d'enjeu

Le critère permettant de sélectionner un validateur n'est pas forcément le nombre de jetons qu'il possède (preuve de possession), et d'autres variables qui en dérivent peuvent être utilisées. Les modèles de PoS obtenus sont ainsi très divers. On retrouve notamment :

- La preuve de conservation (proof-of-hold, PoH) : la probabilité d'être sélectionné dépend de « l'âge des pièces » (coin age), métrique qui est le résultat de la multiplication entre valeur d'un UTXO et du temps durant lequel elle n'a pas bougé. Ce modèle est couplé à la preuve de travail dans Peercoin.
- La preuve de vélocité (proof-of-velocity, PoV), qui est l'inverse de la PoH et se base sur les transactions effectuées avec les fonds. Elle est utilisée notamment par Reddcoin. La limite de cette technique est que cela incite les potentiels validateurs à réaliser de nombreuses transactions inutiles et, ce faisant, à créer des embouteillages sur le réseau.
- La preuve d'importance (proof-of-importance, PoI) : mise en place dans le protocole NEM, cette preuve combine la possession de jetons XEM avec un système de réputation.
- La preuve de service (proof-of-service, PoSe). Il s'agit du modèle utilisé pour inciter les masternodes de Dash à garantir les transactions InstantSend, à gérer le mélange de dashs via PrivateSend et à empêcher les attaques des 51 % de la part des mineurs.
- La preuve d'enjeu déléguée (delegated proof-of-stake, DPoS) : la probabilité de validation dépend non plus seulement du nombre de jetons que le forgeur possède, mais aussi du nombre jetons qui leur a été délégué par vote. Plusieurs plateformes de contrats autonomes utilisent ce modèle car ce dernier permet d'exiger une certaine performance des validateurs. Notez que ce type de preuve d'enjeu permet aussi l'utilisation d'algorithmes de consensus traditionnels (moins robustes mais plus efficaces que l'algorithme de Nakamoto) : Neo se sert ainsi d'une variante de PBFT appelée dBFT pour parvenir à un consensus sur le réseau.

## Autres usages de la preuve d'enjeu

La preuve d'enjeu n'est pas uniquement utilisée pour assurer la participation au consensus sur le réseau. Elle peut aussi intervenir dans le cadre de la gouvernance interne d'une cryptomonnaie, où un système de vote pondéré à la possession de jetons permet d'aboutir à des décisions sur l'avenir de cette cryptomonnaie. Dash, Tezos et EOS ont ainsi un tel modèle de gouvernance intégré à leur protocole. De même, on peut considérer toutes les DAO utilisant un jeton particulier en tant qu'action utilisent une forme de preuve d'enjeu.

## Quelles sont les forces et les faiblesses de la preuve d'enjeu ?

La preuve d'enjeu se distingue des autres méthodes utilisées dans les systèmes distribués, que sont la preuve de travail (proof-of-work), où la sélection des validateurs se fait par rapport à la consommation d'énergie, et la preuve d'autorité (proof-of-authority), où la liste des validateurs est définie à l'avance.

Les algorithmes de consensus se basant sur la preuve d'enjeu présente donc des bénéfices par rapport à ses concurrents, mais aussi des inconvénients.

## Avantages du consensus par preuve d'enjeu

Les aspects positifs de la preuve d'enjeu sont :

- Une consommation d'énergie réduite par rapport à la preuve de travail. Cela permet une sécurisation du système pour un coût faible, ce qui autorise notamment la cryptomonnaie sous-jacente à avoir une politique monétaire peu inflationniste, voire pas du tout. Cette consommation d'énergie peu importante permet aussi de réduire l'impact écologique du système.
- La résistance aux attaques des 51 %. Si la distribution initiale des jetons est correcte, il est difficile pour un acteur unique de réunir plus de la moitié des jetons pour réaiser une réorganisation de la chaîne. De plus, si une telle attaque devait avoir lieu, cela réduirait la valeur du système, et par conséquent le prix du jeton accumulé par l'attaquant. L'attaquant n'est donc clairement pas incité à réaliser ce type d'opération.

## Inconvénients du consensus par preuve d'enjeu

Les aspects négatifs de la preuve d'enjeu sont :

- La complexité des algorithmes qui en dérivent, notamment induite par la résolution du problème du « rien en jeu » (nothing at stake). Cette complexité rend les modèles plus difficiles à analyser que celui de la preuve de travail.
- La subjectivité de la chaîne de blocs : puisque la preuve se base sur des données internes, un nouveau nœud qui se synchronise avec le réseau peut être trompé par un attaquant en suivant une chaîne artificielle plus longue, plutôt que celle que le réseau considère comme valide.
- Une moins bonne résistance à la censure à long terme que la preuve de travail : la preuve d'enjeu étant interne, il est impossible de se libérer à la censure d'un consortium d'acteurs sans hard fork de la chaîne. Ce défaut est accentué par la concentration des jetons sur les plateformes d'échange et autres crypto-banques.

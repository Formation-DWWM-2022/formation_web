# Smart Contract, vers la sécurisation et l’automatisation des obligations contractuelles

Un smart contract, traduit en français par contrat intelligent ou contrat autonome, est un programme ou code informatique dont l’exécution ne nécessite pas l’intervention d’un tiers de confiance. Dans le contexte de la blockchain, il s’agit d’un programme qui s’active automatiquement sur un réseau distribué lorsque certaines conditions sont remplies sur le registre partagé.

Les smart contracts ont été conceptualisés par Nick Szabo à partir de 1994, mais il a fallu attendre 2009 et Bitcoin pour voir leur première implémentation dans un système viable. Ces contrats autonomes sont aujourd'hui largement mis en application sur la plateforme spécialisée Ethereum, lancée en 2015 à cet effet.

![](https://cryptoast.fr/wp-content/uploads/2018/06/smart-contract-blockchain-crypto.jpg.webp)

- [💡 Un SMART CONTRACT c'est QUOI ?](https://youtu.be/fChbMGRnCf8)
- [Qu'est-ce qu'un Smart contract ?](https://youtu.be/vQTs7NmTDa8)
- [Initiation à la création d'un smart contract sur la blockchain Ethereum](https://youtu.be/2v6ittLS-6s)

## Origine des smart contracts

Le concept de smart contract a été formalisé par l'informaticien, juriste et cryptographe américain Nick Szabo. Dans son premier écrit public sur le sujet en 1994, ce dernier décrivait cela comme « un protocole de transaction informatisé qui exécute les termes d’un contrat ». Il a par la suite affiné son idée dans des écrits divers comme Smart Contracts: Building Blocks for Digital Markets en 1996 ou Formalizing and Securing Relationships on Public Networks en 1997.

Le terme « smart contract », inventé par Szabo lui-même, est un peu déroutant, car un smart contract n'est pas vraiment intelligent, ni vraiment un contrat au sens juridique, mais est un programme qui s'exécute selon des conditions simples. Szabo a façonné cette expression pour la communication : le mot smart en anglais est en effet régulièrement utilisé pour appuyer sur le côté astucieux et évolutif d'une nouvelle technologie. Un téléphone multifonction est ainsi appelé un smartphone en anglais comme en français. Une carte à puces est une smart card, on parle de smart city pour une ville connectée, de smart bombs pour des bombes guidées, etc.

Bien qu'il ait attiré l'attention de nombreux cypherpunks dans les années 1990, le concept de smart contract n'a pas été implémenté car aucune technologie ne permettait alors de le mettre en application de manière suffisamment robuste. Il a fallu attendre l'émergence de la technologie blockchain avec l'apparition de Bitcoin en 2009 pour que l'idée soit réellement mise en œuvre : bien que sa capacité à gérer des contrats soit limitée, ce dernier constitue en effet un système de monnaie programmable.

La véritable révolution arrive en 2015 avec le lancement d'Ethereum, qui permet de construire des contrats autonomes plus complexes, notamment en utilisant un langage de programmation spécifique appelé Solidity. Ce dernier permet aux développeurs d'écrire des processus évolués dans un court laps de temps.

Cette émergence a permis à beaucoup d'autres plateformes basées sur le même modèle d'apparaître, comme Tezos, Cardano, EOS, NEO ou TRON. La montée en puissance de ces protocoles a permis à l'idée du contrat intelligent de renaître pour automatiser et améliorer de nombreux processus. Un contrat intelligent permet de se passer d'intermédiaire, et donc de tiers de confiance pour réaliser certaines clauses prévues dans le contrat.

## Qu'est-ce qu'un smart contract ?

Les smart contracts, sont des programmes informatiques qui s'exécutent sans l'intervention d'un tiers de confiance, généralement sur une blockchain comme celle d'Ethereum. Ils sont constitués de clauses, qui sont les conditions qui doivent être remplies pour qu'une partie du contrat soit appliquée. Ces conditions sont définies préalablement par le créateur du contrat et sont écrites de manière immuable sur la blockchain. Le contrat peut alors être automatiquement déclenché lorsque certaines conditions sont remplies sur la chaîne. Contrairement à un contrat traditionnel, aucune tierce partie ne va procéder à la réalisation du contrat, tout est automatisé.

Sur la blockchain Ethereum, créée par Vitalik Buterin, un smart contract est identifié par une adresse publique par exemple 0x5C69bEe701ef814a2B6a3EDD4B1652CB9cc5aA6f. En plus de gérer des transactions en éthers, cette adresse contient du code et des données, nécessaires au bon fonctionnement du programme. Contrairement à un compte classique qui demande à une personne de signer les transactions, un contrat va réagir tout seul aux différentes interactions, de manière autonome.

![](https://cryptoast.fr/wp-content/uploads/2020/05/uniswap-v2-factory-contract.png.webp)

Par exemple, une loterie peut être mise en place par le biais d'un smart contract : une personne déploie le contrat à une adresse, et chacun peut alors acheter un ticket en interagissant avec le contrat. Deux clauses peuvent être implémentées :

- Si, à une date donnée, le solde du compte dépasse un certain montant, alors celui-ci est envoyé à un participant choisi au hasard.
- Sinon, les participants sont remboursés.

Ce n'est qu'un exemple et les possibilités offertes par les contrats autonomes sont bien plus vastes que cela : représentation et transferts d'actifs (tokens, actes de propriétés, etc.), jeux en tous genres, services d'échanges décentralisés, prêts, organisations autonomes décentralisées, etc.

Notez au passage que les smart contracts forment la base de ce qu'on appelle les applications décentralisées ou DApps.

![](https://coinacademy.fr/wp-content/uploads/2021/11/comment-les-contrats-intelligents-fonctionnent-infographie-fonctionnement-des-termes-predefinis-declenchant-l-execution-et-le-216350795-2-1024x512.jpg.webp)

## Les frais de transaction “Gas Fees”

Le “Gas” fait référence aux frais de transaction nécessaires pour compenser l'énergie du calcul essentielle à la validation par les nœuds du réseau.

Tout comme Satoshi Nakamoto l'avait théorisé et appliqué à son protocole du Bitcoin, il est nécessaire de les rémunérer afin d'assurer leur intérêt à sécuriser le réseau. Car les mineurs réalisent les tâches importantes de vérification et de traitement des transactions sur le réseau, mais peuvent également le corrompre et l'attaquer. Il était donc indispensable de les rémunérer pour assurer le fonctionnement et la sécurité des réseaux.

La limite de gas représente la quantité maximale de gas que vous êtes prêt à dépenser pour une transaction. Cependant, si la “limite de gas” est trop basse, un mineur peut choisir d'ignorer ces transactions ce qui implique une fluctuation des frais en fonction de l'offre et de la demande. Sur le réseau Ethereum par exemple, les frais s'effectuent avec la cryptomonnaie native d'Ethereum, l'éther $ETH.

Les prix du gas sont indiqués en gwei : 1 gwei = 1 nanoETH = 0,000000001 ETH (10 -9 ETH).

Note : les frais de transactions sont un élément de concurrence majeur sur le marché des crypto monnaies. Ethereum est particulièrement visée pour ses frais de transaction très élevés et fait l'œuvre de nombreuses critiques. Les développeurs mettent donc en œuvre de nombreuses solutions pour résoudre ce problème.

## Quel langage de programmation ?

Chaque blockchain permettant de gérer des contrats autonomes possède ce qu'on appelle une machine virtuelle (virtual machine), qui fonctionne simultanément sur chaque ordinateur du réseau et qui interprète les différentes transactions. Les contrats sont donc interprétés de la même manière par tous les nœuds et il est donc nécessaire d'avoir un langage pour les communiquer entre les différentes machines.

Comme on l'a dit plus haut, les premiers contrats ont été déployés sur la blockchain de Bitcoin. Cela a pu se faire car Bitcoin est un système de monnaie programmable dans lequel toutes les transactions sont des contrats : grâce à un langage, nommé simplement Script, une pièce de bitcoin peut être bloquée sous certaines conditions prédéfinies. Typiquement, la plupart des fonds sont bloqués à une adresse par un script du genre :

DUP HASH160 <adresse> EQUALVERIFY CHECKSIG

Néanmoins, la machine virtuelle de Bitcoin n'est pas Turing-complète et est volontairement limitée à des opérations procédurales. Il est par exemple impossible d'y effectuer des boucles et de pratiquer la récursivité avec le langage Script. C'est la raison pour laquelle a été créé Ethereum : pour constituer un ordinateur mondial polyvalent et décentralisé qui permette d'exécuter une extrême diversité de contrats autonomes.

La machine virtuelle d'Ethereum (Ethereum Virtual machine ou EVM) a donc été pensée pour être quasi Turing-complète : il est possible d'y effectuer des boucles et des récursions, mais elle est limitée par un système de gaz pour ne qu'un contrat ne puisse pas tourner à l'infini et paralyser le réseau. Elle se base sur un bytecode similaire au Script de Bitcoin. Néanmoins la plupart des contrats sont généralement écrits dans un langage de plus haut niveau, qui est compilé en bytecode, ce qui facilite grandement la tâche du développeur. Le plus répandu est le langage Solidity, un langage inspiré de Javascript, créé en 2014 à l'initiative de Gavin Wood et régulièrement mis à jour depuis.

Voici un exemple simple de contrat écrit en Solidity (exemple tiré de Mastering Ethereum). Il s'agit d'un système de « robinet » (faucet) qui donne des éthers (ETH) gratuitement à celui qui en fait la demande au contrat :

```
pragma solidity ^0.4.19;

contract Faucet
    {

    // Fonction donnant des ETH
    function withdraw(uint withdraw_amount) public
    {

        // Montant de retrait limité à 0.1 ETH
        require(withdraw_amount <= 100000000000000000);

        // Send the amount to the address that requested it
        msg.sender.transfer(withdraw_amount);
    }

    // Le contrat accepte les paiements entrants (renflouement)
    function () public payable {}

}
```

Bitcoin et Ethereum ne sont pas les seuls protocoles à supporter les smart contracts : quasiment tous les systèmes de cryptomonnaie ont des capacités de programmation, à l'exception de quelques systèmes comme Monero.

## Quelle est l'utilité des contrats intelligents ?

Bien qu'ils ne soient pas encore exploités à leur plein potentiel, les contrats autonomes sont utiles pour toutes sortes de choses. Les usages actuels sont multiples et divers, mais ils vont la plupart du temps se rapprocher du domaine financier.

Voici quelques exemples d'applications de smart contracts :

- Les comptes multisignatures : ceux-ci permettent la mise en place de comptes joints nécessitant plusieurs signatures pour procéder à des transferts.
- Le dépôt fiduciaire (escrow payment en anglais), permettant la mise sous séquestre de fonds en attente de l'envoi différé d'un bien. Ce type de contrat est par exemple mis en application par la plateforme d'achat / vente pair-à-pair LocalCryptos.
- Les canaux de paiement, qui donnent à deux utilisateurs la possibilité d'effectuer des micropaiements entre eux. C'est sur ces canaux que se base le réseau Lightning.
- La représentation d'actifs sur une chaîne de blocs par un jeton (ou token) : c'est ce qu'on appelle la tokénisation. Celle-ci peut concerner les biens fongibles (comme les stablecoins qui sont adossés à des monnaies fiat) ainsi que les biens non fongibles (comme par l'exemple de l'immobilier avec RealT).
- Les levées de fonds, qui reposent la plupart du temps sur la prévente d'un jeton numérique ayant une utilité future. On parle d'Initial Coin Offering (ICO), d'Initial Exchange Offering (IEO) ou de Security Token Offering (STO) selon le contexte et la nature du jeton.
- Les échanges décentralisés de crypto-actifs. Cela peut concerner les crypto-monnaies se trouvant sur des chaînes différentes (via des atomic swaps) ou des cryptos se trouvant sur la même chaîne (Uniswap, Kyber Network, Binance DEX, etc.)
- Le prêt décentralisé, avec Maker et Compound par exemple.
- Le marché prédictif avec Augur.
- Les organisation autonomes décentralisées, comme Maker DAO ou Moloch DAO.

Notez que plupart de ces exemples peuvent être catégorisés comme appartenant à la finance décentralisée.

Il existe également beaucoup d'autres cas d'usage qui n'ont pas encore été complètement exploités. On peut citer :

- Le notariat, permettant d'automatiser des processus comme les actes de naissance, les passassions de propriété, etc.
- L'assurance : une conduite lors d'un temps clair et sur une route dégagée donnerait une compensation différente d'une conduite de nuit sur une route cabossée.
- La chaîne logistique (supply chain) : en fonction des commandes de ses clients, une entreprise commanderait automatiquement le nombre de pièces nécessaires à la réalisation de tel ou tel produit.

Ces exemples demanderaient l'existence de ce qu'on appelle des oracles qui s'assureraient de rentrer les données du monde réel sur la chaîne de blocs. Cela pose la question de la fiabilité : est-ce qu'on peut faire confiance à un oracle pour son application décentralisée ? Aujourd'hui, des systèmes d'oracles existent, mais ils demandent à être améliorés.

![](https://coinacademy.fr/wp-content/uploads/2021/11/1_bTiqPvb975TdbD6bJr6ovw-3-765x1024.jpeg.webp)

Plus qu'un simple moyen d'échange, les smart contracts sont des transporteurs d'informations, et peuvent donc jouer un rôle majeur dans les stratégies économiques, logistiques et organisationnelles des entreprises :

- Sécuriser un accord grâce à l’immutabilité et la transparence de la blockchain
- Limiter les coûts intermédiaires, comme les notaires ou les avocats, pour l’élaboration, le suivi et la passation d’un contrat
- Réduire les risques d’erreurs et d’interprétations
- Simplifier les transactions entre différents acteurs
- Automatiser les obligations contractuelles, telles que le paiement. Cela permet d’éliminer les risques d’impayés, par un transfert automatique des fonds, qui auront été placés sous séquestre par exemple

## Quels sont les risques ?

Comme dans toute chose dans l'informatique, le risque principal avec les smart contracts est le risque de piratage.

Puisque le code est publié sur la chaîne, il est possible pour un pirate d'identifier ses faiblesses et de les exploiter. Cela a déjà eu lieu à de multiples reprises sur Ethereum, et ceci pour des montants extrêmement élevés : le cas le plus connu est le piratage du contrat de TheDAO le 17 juin 2016, qui avait permis à quelqu'un de s'emparer de 3,6 millions d'éthers, soit plus de 150 millions de dollars à l'époque. Cette affaire a conduit à la scission entre Ethereum (ETH) et Ethereum Classic (ETC) : Ethereum a en effet fait le choix d'annuler le transfert pour rembourser les investisseurs de TheDAO, alors que Ethereum Classic a préféré suivre le principe de l'immuabilité.

Ainsi, avant de procéder au déploiement sur le réseau, il faut s'assurer que tout fonctionne bien dans le code qu'on a écrit, car il est impossible (en principe) de modifier ou d'arrêter un contrat si on ne l'a pas programmé pour. Il existe des moyens de mitiger le risque de piratage, dont notamment :

- L'utilisation de standards vérifiés et testés par la communauté, par exemple le standard ERC-20 qui est largement utilisé pour créer de nouveaux jetons sur Ethereum.
- Le recours à des audits auprès de cabinets spécialisés.

## Quelle valeur juridique pour les smart contracts ?

Une erreur commune que font beaucoup de débutants, est de croire qu'un contrat intelligent est un contrat au sens juridique. Or ce n'est pas le cas ! Il s'agit simplement de programmes informatiques fonctionnant sur des systèmes distribués, qui appliquent des clauses définies préalablement, d'où l'analogie avec les contrats.

Les smart contracts n'ont pour l'instant aucune valeur juridique. Si, d'une manière ou d'une autre, les fonds de votre contrat se font siphonner par un pirate, il n'y a aucun recours possible car ce n'est pas considéré comme un vol.

Néanmoins, il est possible qu'à l'avenir (et avec la maturation des différents protocoles crypto-économiques) les systèmes juridiques reconnaissent la validité des informations situées sur certaines chaînes. En réalité, l'idée n'est pas d'adapter les différentes blockchains au système juridique existant, mais de faire reposer, à terme, tout le système juridique sur ces blockchains.

De plus, même si les systèmes de gouvernance des blockchains peuvent parfois réparer une faute comme ça a été le cas pour le piratage de TheDAO qui avait été annulé sur Ethereum, il faut préciser que de telles mesures ne peuvent avoir lieu que lorsque la sécurité de la chaîne est en jeu (ici 4,5 % des éthers volés). De cette manière, le gel accidentel de plus de 500 000 ETH (150 millions de dollars) du contrat de Parity en novembre 2017 n'a pas été suffisamment important pour inverser le processus.

![](https://coinacademy.fr/wp-content/uploads/2021/11/1_cVeTQYLF5Z35yGoZ23Sfmw-3.png)

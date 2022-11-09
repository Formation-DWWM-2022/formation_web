# Créer sa cryptomonnaie

Vous suivez probablement l'actualité de la cryptomonnaie, leur nombre explose. La majorité d'entre elles sont ce que l'on appelle vulgairement sur la toile des "shit coins, des crypo tokens de niveau 2 qui se reposent sur une infrastructure Blockchain existante et qui sont rattachés à aucun projet solide.

Je me suis demandé quelle était la complexité de créer une nouvelle cryptomonnaie sur la toile. C'est en regardant deux vidéos sur le sujet que je me suis rendu compte que le sujet était relativement accessible à tout geek qui se respecte et ceci sans un budget d'investissement important.

## Crypto monnaie ou Crypto token ?

Avant toute chose, on distingue les "Coins" et les "Tokens" sur la toile. Les Coins s'appuient sur un réseau qui leur est dédié (niveau 1), les tokens sont des micrologiciels que l'on appels "Smart Contract" (niveau 2) qui s'appuient sur des réseaux de blockchain de niveau 1.

Sachez qu'il est relativement complexe de créer une blockchain de zéro et qu'il est bien plus simple de définir un SmartContract sur une blockchain existante. L'avantage est que vous pouvez démarrer votre projet sans aucun investissement de départ, contrairement à une blockchain un premier niveau où des de serveurs sont nécessaires pour assurer l'intégrité des données de la blockchain.

## Créer une nouvelle blockchain

Créer une nouvelle blockchain signifie partir de zéro, pour concevoir un système totalement inédit et créer votre propre coin. Pour cela, vous aurez besoin de compétence en code, puisqu’il faudra écrire ligne par ligne la blockchain, et vous devrez disposer de :

- Un ordinateur suffisamment puissant
- D’un serveur personnalisé
- D’un espace de stockage suffisant

La problématique principale d’une telle entreprise vient du fait qu’il faille sécuriser le blockchain, ce qui n’est pas à la portée de tous. Vous trouverez des tutoriels et des guides d’accompagnement pour réaliser cette chaîne de blocs mais gardez en tête que cette solution requiert tout de même des compétences de base en coding/en informatique.

## Effectuer un fork

Le fork – ou division – permet de lancer un token en se basant sur un blockchain déjà existant. Il s’agira de récupérer le code en Open source (sur Github) puis de le modifier pour créer votre propre cryptomonnaie. Par exemple, le Bitcoin a connu des fork, qui ont donné naissance aux Litecoin, Bitcoin Cash, Bitcoin Gold ou encore Bitcoin Diamond.

C’est une solution plus accessible pour créer une cryptomonnaie, qui nécessite toute de même de savoir modifier un code existant.  

## Créer une crypto monnaie en externalisant la procédure

A défaut de connaissances approfondies sur la technologie blockchain, il est possible de créer une crypto monnaie en recourant à certaines plateformes spécialisées.

Pour les entreprises spécialisées, il suffit de quelques jours, voire quelques heures, pour mettre sur pied une crypto monnaie qui correspond aux spécificités définies par le client.

En compensation, ce dernier doit débourser une somme dont le montant varie en fonction des spécificités retenues. Ces acteurs spécialisés de la création de crypto monnaies sont des entreprises de type Blockchain-as-a-Service (BaaS).

## Exemple de Crypto token , avant toute chose, il vous faut des tokens BNB

Dans cet exemple je vais donc créer un token qui s'appuie sur le réseau Binancial. Celui-ci est similaire au réseau Ethereum, il a comme principal avantage d'avoir des coûts de transaction acceptables.

Pour créer un Smart Contract sur le réseau BNC, il faut 5€ de tokens BNB que vous pouvez aguerrir sur la platforme Binancial, une plateforme de tradding qui est propriétaire du BNC.

Ce solde vous permettra de financer la création et la publication de votre crypto token. Lors de la publication de mon SmartContract, le réseau BNC m'a demandé 0.00444925 BNB. Équivalent à 2,33€ à l'heure où j'écris cet article.

## Installez et configurez le plugin Metamask

Une fois les 3€ de tokens BNB acquis, vous devez les transmettre de votre wallet Binancial à un Wallet sur votre navigateur.

Une fois le plugins Metamask installé à votre navigateur, vous devez le configurer pour qu'il puisse se connecter au réseau BNC. Pour cela vous devez saisir les données suivantes dans les paramètres de réseau de Metamask.

![](https://www.geeek.org/content/images/2021/11/bnc-network-metamask.png)

Dès cette opération réalisée, Metamask va vous créer une adresse sur le réseau BNC, à partir de ce moment vous pouvez transmettre du BNC de votre wallet Binancial à votre Wallet dans Metamask au travers de la fonction "Transfer".

## Développer votre smart contract

L'étape suivante consiste à développer le Smart Contract qui édifiera les règles de fonctionnement de votre crypto token. Pour cela vous pouvez vous appuyer sur le logiciel en ligne Remix qui permet de développer des Smart Contracts et de les publier des réseaux tels que Ethereum, BNC ... sans devoir installer aucun logiciel sur son PC.

Afin d'éviter de perdre du temps, vous pouvez reprendre le code partagé par Julien Klepatch qui définit le fonctionnement simpliste d'une cryptomonnaie.

![](https://www.geeek.org/content/images/2021/11/remix-create.png)

Créez un nouveau fichier Token.sol dans l'espace Remix et copiez/coller les lignes suivantes :

```
pragma solidity ^0.8.2;

contract Token {
    mapping(address => uint) public balances;
    mapping(address => mapping(address => uint)) public allowance;
    uint public totalSupply = 1000000 * 10 ** 18;
    string public name = "Geeek";
    string public symbol = "GEK";
    uint public decimals = 18;
    
    event Transfer(address indexed from, address indexed to, uint value);
    event Approval(address indexed owner, address indexed spender, uint value);
    
    constructor() {
        balances[msg.sender] = totalSupply;
    }
    
    function balanceOf(address owner) public returns(uint) {
        return balances[owner];
    }
    
    function transfer(address to, uint value) public returns(bool) {
        require(balanceOf(msg.sender) >= value, 'balance too low');
        balances[to] += value;
        balances[msg.sender] -= value;
       emit Transfer(msg.sender, to, value);
        return true;
    }
    
    function transferFrom(address from, address to, uint value) public returns(bool) {
        require(balanceOf(from) >= value, 'balance too low');
        require(allowance[from][msg.sender] >= value, 'allowance too low');
        balances[to] += value;
        balances[from] -= value;
        emit Transfer(from, to, value);
        return true;   
    }
    
    function approve(address spender, uint value) public returns (bool) {
        allowance[msg.sender][spender] = value;
        emit Approval(msg.sender, spender, value);
        return true;   
    }
}

```

Dans cet exemple, 3 lignes sont à modifier :

- Le nombre de Tokens distribuable par celui-ci (totalSupply: ligne n°6)
- Le nom du jeton (name: ligne n°7)
- Son nom raccourci (symbol: ligne n°8)

## Publier votre Smart Contract

Le code ci-dessous modifié dans un fichier "token.sol" sur la plateforme Remix, vous pouvez essayer de le compiler. Celui-ci vous retournera deux petits Warning.

![](https://www.geeek.org/content/images/2021/11/remix-compilation.png)

Une fois la compilation réalisée, vous pouvez le diffuser sur le réseau BNC.
Pour cela, sélectionnez l'environnement "Inject Web3" en vous assurant que Metamask est bien initialisé. Sélectionnez le nom du fichier que vous souhaitez publier. Lorsque vous appuierez sur le bouton "Déploy", Metamask vous demandera une confirmation de l'opération de publication.

Cette opération vous coutera quelques miettes de BNB : 0.0044 BNB soit 2€ environ

![](https://www.geeek.org/content/images/2021/11/remix-publish.png)

Cette opération créera un Wallet en ligne que vous pourrez vérifier sur le site BSCan. Voici un exemple de la cryptomonnaie Geeek que j'ai créé pour cet article.

<https://bscscan.com/token/0x296e563737ceeb8d9018de2a1023fddc4e27f9d5>

![](https://www.geeek.org/content/images/2021/11/BscScan.png)

## Transmettez les premiers tokens à votre Wallet

Une fois la publication faite, vous pouvez générer vos premiers crypto tokens et vous les transmettre à votre Wallet Metamask.

Cette opération se fait directement depuis le logiciel Remix au travers d'une commande assez exotique qui consiste à transmettre un volume de token vers votre wallet.
Il suffit pour cela de saisir l'adresse de votre wallet dans le champ "Transfert", y ajouter une virgule, puis le nombre de token à transmettre vers votre wallet. Dans mon exemple, j'ai transmis 1 000 000 de tokens à mon wallet Metamask.

![](https://www.geeek.org/content/images/2021/12/transfert-remix.png)

## Rendez visible votre cryptomonnaie sur Pancake Swap

Pour permettre à des personnes tierces d'acheter votre cryptomonnaie, vous devez maintenant la mettre en vente sur une plateforme de swapping pour permettre à quiconque d'en acheter.

Pour réaliser cette opération, vous devez créer ce que l'on appelle un pool sur une plateforme de swap, dans notre cas, le BNC, la plateforme de swap officielle de Binancial est Pancakeswap.

Pour créer un pool, vous devez tout d'abord ajouter de la liquidité sur la plateforme de Swap. Cela consiste à partager un volume de token de votre nouvelle cryptomonnaie avec un volume de tokens du réseau BNB.

C'est le volume de tokens BNB que vous positionnerez qui définira le prix d'achat du token.

![](https://www.geeek.org/content/images/2021/12/liquidity-pancakeswap.png)

Une fois cette liquidité ajoutée, vous pouvez la transformer en pool pour la rendre accessible à d'autres acteurs de la plateforme.

![](https://www.geeek.org/content/images/2021/12/pool-pancakeswap.png)

<https://pancakeswap.finance/info/pool/0xce1272f1807f571295c5aec7231b42e7d2ca3a94>

## Pourquoi créer sa propre cryptomonnaie ?

La décision de créer sa propre cryptomonnaie n’est pas à prendre à la légère et mieux vaut vous poser les bonnes questions avant de vous lancer dans une telle entreprise.

Si vous estimez que vous avez besoin d’éliminer les intermédiaires pour vos transactions, que de multiples participants ont la possibilité de modifier les données, que vous cherchez à créer un environnement de travail sécurisé avec des utilisateurs qui ne s’accordent pas forcément une confiance mutuelle, ou encore que vous recherchez l’anonymat des données, alors vous pourrez profiter des avantages d’une crypto, comme :

- La réduction des coûts de transaction lors des opérations financières
- Une prévention des fraudes / arnaques
- L’augmentation de l’efficacité par la rapidité et la sécurité du service
- Un service totalement transparent
- La possibilité de réaliser des Contrats-intelligents
- L’augmentation de la sécurisation des données

De plus, créer une cryptomonnaie peut être une solution pour gagner de l’argent, si vous tradez cette devise virtuelle. Le marché des cryptomonnaies est volatile et il est fréquent que certaines devises connaissent une envolée de leur cour, suite à une décision, une bonne promotion ou une mention de celle-ci par un influenceur crypto. Ce qui nous amène à la dernière étape de la création d’une cryptomonnaie : comment la faire connaître ?

## Comment promouvoir sa crypto après création ?

S’il est possible de faire parler de votre crypto via différents outils du net, le succès de cette devise ne dépend que de sa communauté. Il faut que votre monnaie attire les utilisateurs afin d’être pérenne et la meilleure option pour parvenir à cette fin est de réaliser une « Initial Coin Offering » (ICO).

C’est une opération de levée de fonds, à laquelle participe des investisseurs. Ils vont acquérir des Tokens de votre crypto contre des cryptos existantes -principalement du Bitcoin et des ETH – qui leur permettront ensuite d’utiliser votre crypto, de prendre part aux décisions du blockchain ou de vendre/acheter avec cette devise.

On parle d’early-adopters, pour ces investisseurs qui croient dans le potentiel d’une crypto naissante et qui vont donc s’impliquer dans le développement du projet et dans les améliorations de ses fonctionnalités, en espérant pouvoir gagner gros dans un futur plus ou moins proche.

C’est une étape cruciale, qui permet à une crypto de sortir du lot. On rappelle que plus de 5 000 cryptos sont disponibles sur les marchés et que certaines disparaissent aussi vite qu’elles ont été créées. Il est donc nécessaire d’évaluer les risques, les coûts, et de ne pas négliger la communication (via les réseaux sociaux notamment) et cet ICO qui s’apparente à du crowdfunding de crypto.

## Qui crée la crypto monnaie ?

La crypto monnaie est créée, de base, par une ou plusieurs personnes qui utilisent leurs capacités informatiques (et/ou les méthodes évoquées dans cet article) pour lancer des Coins.

Mais ce sont ensuite les Mineurs qui vont s’activer à résoudre les calculs les plus complexes sur la blockchain pour créer de nouvelles unités de crypto. Cela permet par exemple d’accroître le nombre de Bitcoin en circulation, jusqu’à ce que le total prévu soit atteint. Ce n’est pas identique pour toutes les cryptos, car certaines ne sont pas limitées, mais le principe de minage est similaire.

Contrairement aux monnaies Fiat, qui peuvent être créées de nulle part par les institutions financières, les monnaies décentralisées que sont les cryptomonnaies dépendent des utilisateurs.

## Conclusion

J'espère que cet article vous aura permis de mieux connaitre le fonctionnement des Crypto Tokens et la manière dont ils sont créés et partagés. L'opération est finalement assez simple même pour un néophyte comme moi.

Et si vous ne savez pas quoi faire pendant vos prochaines longues soirées d'hiver, Coinbase offre pas moins de 100$ de cryptomonnaie en répondant à quelques questions sur leur site !

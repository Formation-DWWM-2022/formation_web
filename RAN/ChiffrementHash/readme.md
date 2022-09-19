# Cryptographie, chiffrement et hachage : comment ça marche ?

La sécurité et l’efficacité sont deux paramètres très importants dans les systèmes de communication et vous devez avoir entendu parler des termes, cryptage et hachage. Peu importe, ces deux termes peuvent être une source de confusion, mais ce cours cherche à dissiper toute confusion en donnant un aperçu complet des deux.

Historiquement, la cryptologie correspond à la science du secret, c'est-à-dire au chiffrement. Aujourd'hui, elle s’est élargie au fait de prouver qui est l'auteur d'un message et s'il a été modifié ou non, grâce aux signatures numériques et aux fonctions de hachage.

![](https://www.cnil.fr/sites/default/files/styles/contenu-generique-visuel/public/thumbnails/image/1_usages_0.png?itok=0IZNGUET)

Étymologiquement, la cryptologie est la science du secret. Elle réunit la cryptographie (« écriture secrète ») et la cryptanalyse (étude des attaques contre les mécanismes de cryptographie).

La cryptologie ne se limite plus aujourd’hui à assurer la confidentialité des secrets. Elle s’est élargie au fait d’assurer mathématiquement d’autres notions : assurer l’authenticité d’un message (qui a envoyé ce message ?) ou encore assurer son intégrité (est-ce qu’il a été modifié ?).

Pour assurer ces usages, la cryptologie regroupe quatre principales fonctions : le hachage avec ou sans clé,  la signature numérique et le chiffrement. 

Pour expliquer la cryptologie, nous utiliserons dans nos exemples les personnages traditionnels en cryptographie : Alice et Bob.

# Pourquoi la cryptologie existe-t-elle ?
1. Pour assurer l’intégrité du message : le hachage

La cryptologie permet justement de détecter si le message, ou l’information, a été involontairement modifié. Ainsi, une « fonction de hachage » permettra d’associer à un message, à un fichier ou à un répertoire, une empreinte unique calculable et vérifiable par tous. Cette empreinte est souvent matérialisée par une longue suite de chiffres et de lettres précédées du nom de l’algorithme utilisé, par exemple « SHA2» ou « SHA256 ».

Il ne faut pas confondre le chiffrement, qui permet d’assurer la confidentialité, c’est-à-dire que seules les personnes visées peuvent y avoir accès (voir « Pour assurer la confidentialité du message »), et le hachage qui permet de garantir que le message est intègre, c'est-à-dire qu’il n’a pas été modifié.

## Le hachage, pour quoi faire ?
Pour sauvegarder vos photos sur votre espace d’hébergement (de type « cloud » par exemple) et  vérifier que votre téléchargement s’est bien déroulé ?
Pour sychroniser vos dossiers et détecter ceux qu’il faut sauvegarder à nouveau et ceux qui n’ont pas été modifiés ?

Il existe aussi des « fonctions de hachage à clé » qui permettent de rendre le calcul de l’empreinte différent en fonction de la clé utilisée. Avec celles-ci, pour calculer une empreinte, on utilise une clé secrète. Pour deux clés différentes l’empreinte obtenue sur un même message sera différente. Donc pour qu’Alice et Bob calculent la même empreinte, ils doivent tous les deux utiliser la même clé.

C’est parmi ces fonctions de hachage à clé que l’on trouve celles utilisées pour stocker les mots de passe de façon sécurisée.

## Le hachage à clé, pour quoi faire ?

Votre service préféré reconnait votre mot de passe quand vous vous connectez ?
Vous voulez pouvoir détecter si quelqu’un modifie des documents sans vous le dire ?

![](https://www.cnil.fr/sites/default/files/thumbnails/image/2_hachage.png)

En règle générale, le hachage aura les attributs suivants:

- Une entrée donnée qui est connue, doit toujours produire une sortie connue.
- Une fois que le hachage a été fait, il devrait être impossible de passer de la sortie à l’entrée.
- Différentes entrées multiples devraient donner une sortie différente.
- Modifier une entrée devrait signifier un changement dans le hachage.

2. Pour assurer l’authenticité du message : la signature

Au même titre que pour un document administratif ou un contrat sur support papier, le mécanisme de la « signature » - numérique - permet de vérifier qu’un message a bien été envoyé par le détenteur d’une « clé publique ». Ce procédé cryptographique permet à toute personne de s’assurer de l’identité de l’auteur d’un document et permet en plus d’assurer que celui-ci n’a pas été modifié.

## La signature numérique, pour quoi faire ?
Vous voulez garantir être l’émetteur d’un courriel ?
Vous voulez vous assurer qu’une information provient d’une source sûre ?

Pour pouvoir signer, Alice doit se munir d’une paire de clés :

- l’une, dite « publique », qui peut être accessible à tous et en particulier à Bob qui est le destinataire des messages qu’envoie Alice ; 
- l’autre, dite « privée », qui ne doit être connue que d’Alice.

En pratique, Alice génère sa signature avec sa clé privée qui n’est connue que d’elle. N’importe quelle personne ayant accès à la clé publique d’Alice, dont Bob, peut vérifier la signature sans échanger de secret.

![](https://www.cnil.fr/sites/default/files/thumbnails/image/3_integrite_0.png)

3. Pour assurer la confidentialité du message : le chiffrement

Le chiffrement d’un message permet justement de garantir que seuls l’émetteur et le(s) destinataire(s) légitime(s) d’un message en connaissent le contenu. C’est une sorte d’enveloppe scellée numérique. Une fois chiffré, faute d'avoir la clé spécifique, un message est inaccessible et illisible, que ce soit par les humains ou les machines.

Le chiffrement n’est pas une science nouvelle, Jules César l’utilisait déjà pour adresser ses messages secrets. Le cryptage a surtout été utilisé par les armées pour adresser des messages qui ne devaient pas être compris par les ennemis. Le cryptage s’est perfectionné au fil du temps et les Allemands avaient créé la fameuse machine Enigma servant à chiffrer et déchiffrer les messages. Aujourd’hui il existe beaucoup d’application de messageries cryptées, l’informatique permettant de crypter très facilement. De même, lorsque vous êtes sur un site Internet en HTTPS les données que vous faites transiter sur le web, sont cryptées et en cas d’interception, elles ne pourront pas être lues. La science du chiffrement, s'appelle la cryptographie. A l'opposé, la science qui consiste à casser le chiffrement s'appelle la cryptanalyse. 

## Le chiffrement, pour quoi faire ?
Vous voulez vous assurer que seul le destinataire ait accès au message ?
Vous souhaitez envoyer ces informations sous enveloppe numérique et non lisible par tous comme sur une carte postale ?

Il existe deux grandes familles de chiffrement : le chiffrement symétrique et le chiffrement asymétrique.

Le chiffrement symétrique permet de chiffrer et de déchiffrer un contenu avec la même clé, appelée alors la « clé secrète ». Le chiffrement symétrique est particulièrement rapide mais nécessite que l’émetteur et le destinataire se mettent d’accord sur une clé secrète commune ou se la transmettent par un autre canal. Celui-ci doit être choisi avec précautions, sans quoi la clé pourrait être récupérée par les mauvaises personnes, ce qui n’assurerait plus la confidentialité du message. 

Le chiffrement asymétrique suppose que le (futur) destinataire est muni d’une paire de clés (clé privée, clé publique) et qu’il a fait en sorte que les émetteurs potentiels aient accès à sa clé publique. Dans ce cas, l’émetteur utilise la clé publique du destinataire pour chiffrer le message tandis que le destinataire utilise sa clé privée pour le déchiffrer.

Parmi ses avantages, la clé publique peut être connue de tous et publiée. Mais attention : il est nécessaire que les émetteurs aient confiance en l’origine de la clé publique, qu’ils soient sûrs qu’il s’agit bien de celle du destinataire.

Autre point fort : plus besoin de partager une même clé secrète ! Le chiffrement asymétrique permet de s’en dispenser. Mais il est malheureusement plus lent.

Pour cette dernière raison, il existe une technique combinant chiffrements « symétrique » et « asymétrique », mieux connue sous le nom de « chiffrement hybride ».

Cette fois, une clé secrète est déterminée par une des deux parties souhaitant communiquer et celle-ci est envoyée chiffrée par un chiffrement asymétrique. Une fois connue des deux parties, celles-ci communiquent en chiffrant symétriquement leurs échanges. Cette technique est notamment appliquée lorsque vous visitez un site dont l’adresse débute par « https ».

![](https://www.cnil.fr/sites/default/files/thumbnails/image/4_confidentialite.png)

# Quelle est la différence entre le hachage et le cryptage ?

Le hachage est utilisé pour valider l’intégrité du contenu en détectant toutes les modifications et ensuite les modifications apportées à une sortie de hachage. Le cryptage code les données dans le but principal de préserver la confidentialité et la sécurité des données. Il nécessite une clé privée pour le texte crypté de la fonction réversible en texte brut.

En bref, le cryptage est une fonction bidirectionnelle qui inclut le cryptage et le décryptage tandis que le hachage est une fonction à sens unique qui transforme un texte brut en un résumé unique qui est irréversible.

Le hachage et le cryptage sont différents mais ont aussi quelques points communs. Ils sont tous les deux idéaux pour gérer les données, les messages et les informations dans les systèmes informatiques. Ils transforment ou modifient les données dans un format différent. Bien que le cryptage soit réversible, le hachage n’est pas le cas. Les améliorations futures sont très cruciales étant donné que les attaquants ne cessent de changer de tactique. Cela implique qu’une méthode de hachage et de cryptage à jour est plus acceptable dans les systèmes informatiques modernes.
 
# La différence entre fonction de Hachage (Hash) et Chiffrement (Encryption)

D’abord, il faut qu’on explique les deux brièvement.

En général, une fonction de hachage convertit “irréversiblement” les données de tailles arbitraires aux données de tailles fixes. De l’autre côté, il y a le chiffrement, qui convertit les données dans une autre forme, tout en permettant de retrouver les données originales avec la clé de chiffrement correspondante.

Concrètement, il y a des différences majeures:

1. Si on fait le hachage d’un fichier texte de 300 pages, la fonction de hachage pourra retourner une suite de 32 caractères par exemple. De même si on hache un seul caractère, on obtiendra également une suite de 32 caractères. La longueur des données passées en entrée et qui vont être hachées n’influence en rien la longueur de la valeur retournée par la fonction de hachage. En fait la longueur de la valeur retournée par la fonction de hachage dépend de la fonction elle-même. Par contre la valeur retournée sera totalement différente même si un seul caractère d’un fichier de 10 000 000 de caractères est modifié. On comprend alors l’utilité de cette fonction qui permet de retourner une signature ou une empreinte unique d’un fichier. 

2. Normalement, les tailles des données converties par une certaine fonction de hachage ne changent jamais. Mais celles obtenues par chiffrement sont souvent (pas toujours) proportionnelles aux tailles des données originales. Par exemple, si on utilise la fontion de hachage de Python pour convertir les deux chaînes de caractères, “Microsoft” et “Google”:

```python
In [22]: hash("Microsoft")
Out[22]: 467753631682903773

In [23]: hash("Google")
Out[23]: -201064995106876445
```

Les tailles de résultats sont les mêmes. 

4. Mais, si on utilise l’implémentation du chiffrement RSA 

```python
In [37]: (pubkey, privkey) = rsa.newkeys(512)

In [38]: rsa.encrypt("Microsoft", pubkey)
Out[38]: '\x97\xf3\xae\xf5\xea\xb5\xb9;0\x8b1xCW\xd0\xca\xd8\x07i\xf3$T\x00T\x9c\n\x88\x96Zo\x87M\x9d\x90\xe3S\xb7\xd2\xbdj><*\xadt\x15\xacz\x8e\x95\xfe|,\xdf\xfe\xd2tA<\xa8\x8fA\xee\x1e'

In [39]: rsa.encrypt("Google", pubkey)
Out[39]: "\x1b\xe4B\x82XU\xcc\xbd\x08c\x1fQ\xfbi\xd8\x19A\xf1\x18\xd1r{\xe1=\x87\xbe\xc0\xfe/\xe9\x10\x91B\x86\xc6e\xd7J!\x8e\xb5n2'v\xeb|?\x86C\xa0J~\x14\xca\x8e'\xd5G\xa3Y.\x83S"
```

5. Un algorithme de hachage est irréversible. Au contraire, celui de chiffrement est réversible. C’est-à-dire qu’il n’existe pas de façon de reconvertir les résultats générés par une fonction de hachage aux chaînes de caractères originales, pourtant on peut déchiffrer les codes avec la clé de chiffrement correspondante.

```python
In [40]: rsa.decrypt("\x1b\xe4B\x82XU\xcc\xbd\x08c\x1fQ\xfbi\xd8\x19A\xf1\x18\xd1r{\xe1=\x87\xbe\xc0\xfe/\xe9\x10\x91B\x86\xc6e\xd7J!\x8e\xb5n2'v\xeb|?\x86C\xa0J~\x14\xca\x8e'\xd5G\xa3Y.\x83S", privkey)
Out[40]: 'Google'

In [41]: rsa.decrypt("\x97\xf3\xae\xf5\xea\xb5\xb9;0\x8b1xCW\xd0\xca\xd8\x07i\xf3$T\x00T\x9c\n\x88\x96Zo\x87M\x9d\x90\xe3S\xb7\xd2\xbdj><*\xadt\x15\xacz\x8e\x95\xfe|,\xdf\xfe\xd2tA<\xa8\x8fA\xee\x1e", privkey)
Out[41]: 'Microsoft'
```

6. L'utilisation principale de la fonction de hachage est donc la comparaison. C'est pourquoi elle est souvent utilisée pour chiffrer des mots de passe d’où la confusion entre hachage et cryptage, certains imaginent à tord que le mot de passe est crypté et que l’on peut récupérer le mot de passe en le décryptant et ainsi vérifier sa validité. Dans les faits, une fois le mot de passe saisi, on le hache et on compare le résultat avec celui se trouvant dans la base de données et si les deux signatures sont identiques, c'est que le mot de passe est valide

7. Il faut savoir quand même que certaines fonctions de hachage retournent la même empreinte pour des données différentes, c'est ce qu'on appelle la collision. C'est le cas pour le MD5 et ces fonctions ne doivent pas être utilisées pour hacher des mots de passe, elles restent par contre valables pour signer des documents. En effet, si on veut modifier discrètement un document par exemple, on n'a aucune chance d'obtenir la même signature, seul un texte totalement aléatoire et ne voulant rien dire, pourrait éventuellement retourner la même signature. 

# Peut-on récupérer un texte haché ? 

En théorie, NON. En théorie, car il n'existe pas de fonction qui à partir du texte haché, retourne le texte original. Une fois haché, il est impossible de créer une fonction permettant de récupérer le texte original. Si on parle d'empreinte, c'est parce qu'on peut comparer le résultat du hachage à l'empreinte d'un être humain. Si vous récupérez une empreinte sur une scène de crime, vous ne pouvez retrouver celui qui a laissé l'empreinte que si son empreinte est stockée dans la base de données. Pour un texte haché c'est exactement la même chose. En effet en admettant que l'on connaisse la fonction ayant servie à hacher un mot de passe, on créé une table qui d'un côté stocke un texte et de l'autre côté stocke son hachage. On stocke ainsi plusieurs millions voir plusieurs milliards de possibilités. Il suffit ensuite de rechercher dans la table, le hachage d'un mot de passe pour vérifier s'il se trouve dans la table et s'il existe une correspondance, alors on récupère le texte associé et on a ainsi trouvé le mot de passe.

D'où l'importance de choisir un mot de passe sécurisé car si votre mot de passe est 1234 ou admin ou Michel ou azerty ou password, ce mot de passe sera récupéré en moins de un dixième de seconde car vous pouvez être sûr qu'il se trouve dans la table.

Pour contrer ce genre d'attaque il existe ce qu'on appelle le [salage](https://fr.wikipedia.org/wiki/Salage_(cryptographie)). Le salage consiste à ajouter un texte au mot de passe avant de le hacher et rend ce genre d'attaque plus difficile à opérer. Malheureusement pour vous, c'est le site qui ajoute ou pas un sel au mot de passe, voire qui hache ou pas, le mot de passe. Il existe encore des sites qui stockent les mots de passe en clair d'où l'importance de ne pas saisir le même login et le même mot de passe pour tous les sites. Car si c'est le cas et qu'un site peu sécurisé se fait pirater sa base, le pirate aura à la fois votre login et votre mot de passe et il pourra aller sur Amazon, vous risquez alors de voir votre compte en banque vidé. Et ne pensez pas que les sites de banque sont sécurisés, la Banque de France utilisait le mot de passe 123456 pour un de ses systèmes informatiques, ça laisse [rêveur](https://www.lesechos.fr/2012/09/le-code-dacces-de-la-banque-de-france-etait-123456-379930). 

# Sécurité : Chiffrer, garantir l’intégrité ou signer 

Les fonctions de hachage permettent d’assurer l’intégrité des données. 

Les signatures numériques, en plus d’assurer l’intégrité, permettent de  vérifier l’origine de l’information  et son authenticité. 

Enfin, le chiffrement, parfois improprement appelé cryptage, permet de garantir la confidentialité d’un message.


## Les précautions élémentaires
Utiliser un algorithme reconnu et sûr, par exemple, les algorithmes suivants :
- SHA-256, SHA-512 ou SHA-3 comme fonction de hachage ;
- HMAC utilisant SHA-256, bcrypt, scrypt ou PBKDF2 pour stocker les mots de passe;
- AES ou AES-CBC pour le chiffrement symétrique ;
- RSA-OAEP comme défini dans PKCS#1 v2.1 pour le chiffrement asymétrique ;
- enfin, pour les signatures, RSA-SSA-PSS comme spécifié dans PKCS#1 v2.1.

Utiliser les tailles de clés suffisantes, pour AES il est recommandé d’utiliser des clés de 128 bits et, pour les algorithmes basés sur RSA, des modules et exposants secrets d’au moins 2048 bits ou 3072 bits, avec des exposants publics, pour le chiffrement, supérieurs à 65536.

Protéger les clés secrètes, au minimum par la mise en œuvre de droits d’accès restrictifs et d’un mot de passe sûr.

Rédiger une procédure indiquant la manière dont les clés et certificats vont être gérés en prenant en compte les cas d’oubli de mot de passe de déverrouillage.

## Ce qu’il ne faut pas faire

Utiliser des algorithmes obsolètes, comme les chiffrements DES et 3DES ou les fonctions de hachage MD5 et SHA1.

Confondre fonction de hachage et chiffrement et considérer qu’une fonction de hachage seule est suffisante pour assurer la confidentialité d’une donnée. Bien que les fonctions de hachages soient des fonctions « à sens unique », c’est à dire des fonctions difficiles à inverser, une donnée peut être retrouvée à partir de son empreinte. Ces fonctions étant rapides à utiliser, il est souvent possible de tester automatiquement toutes les possibilités et ainsi de reconnaître l’empreinte.


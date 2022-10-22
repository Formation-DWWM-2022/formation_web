# Mots de passe

![](https://academy.avast.com/hubfs/New_Avast_Academy/how_to_create_a_strong_password_academy/Academy-How-to-create-a-strong-password-Hero.jpg)

- Comment créer un bon mot de passe ? https://youtu.be/jgjbW1eXMjg

# Mise en situation

Une date de naissance comme mot de passe bancaire ? ou un mot de passe unique pour l'ensemble de ses comptes en ligne ? Beaucoup de personnes sont conscientes que leur politique de gestion de mots de passe présente des failles, mais elles ne savent pas nécessairement comment y remédier.

Il existe quelques méthodes assez simples pour construire des mots de passe compliqués et pour vérifier que les mots de passe que l'on utilise ne sont pas trop faciles à deviner.

Par exemple la méthode diceware permet de créer des mots de passe à la fois longs et faciles à apprendre. La liste OWASP contient quand à elle les 10.000 mots de passe les plus fréquents, ceux qu'ils faut éviter d'utiliser donc.

    Une application avec les plus hautes normes de sécurité reste fragile sans une bonne politique de gestion des mots de passe.

# Identifier un mauvais mot de passe

Il existe plusieurs types de mauvais mots de passe et il est important de savoir les identifier pour les éviter :

- Les dates de naissance ou autre information facilement trouvable, par exemple : DiDiEr121287.
- Un mot de passe unique pour tous les services.
- Un mot de passe au schéma identifiable comme FRAMATEAM123azerty pour un compte sur le site framateam.org. Un attaquant comprendra que votre mot de passe framapiaf.org est FRAMAPIAF123azerty (ou quelque chose de ressemblant).
- Un mot de passe trop simple, par exemple : mickey (il s'agit de l'un des 10 000 mots de passe les plus courants).

# Attention

Il existe des listes des mots de passe courants comme la liste maintenue par l'OWASP Foundation : 10k-worst-passwords.txt.
En haut de cette dernière sont présents des mots de passe tels que :

- password
- football
- jennifer

Ces listes sont très utilisées par les cybercriminels.

# [Les 20 premiers mots de passe de la liste OWASP](https://github.com/OWASP/passfault/blob/master/wordlists/wordlists/10k-worst-passwords.txt)

# Trouver un bon mot de passe

Il existe plusieurs méthodes pour trouver un bon mot de passe :
1. Méthode des premières lettres

Il s'agit de transformer une citation en mot de passe. Par exemple : "« un tiens vaut mieux que deux tu l'auras »" donnera 1tvMq2tL'a. Il faut veiller à ne pas utiliser que des minuscules pour compliquer la tache d'un attaquant.

Ici, toutes les lettres dont la position est un multiple de 4 sont des majuscules.

2. Méthode phonétique

Il s'agit de retranscrire une phrase phonétiquement. Par exemple : "« j'ai acheté huit cd pour cent euros cet après-midi »" donnera ght8CD%E7am.

Les lettres en majuscule sont ici celle dont la prononciation représente le mot complet ("« E »" pour "« euro »" et "« CD »" qui est transparent).

3. Diceware

Cette dernière méthode est très utilisée pour construire des phrases secrètes. Le mot de passe sera une phrase composée de plusieurs mots. Pour choisir chacun des mots il faut lancer 5 dés à 6 faces et mettre les résultats côte à côte. Puis il faut se munir d'une liste diceware qui propose 66666 mots. Dans cette liste, chaque résultat possible des 5 dés correspond à un mot.

Il en existe pour beaucoup de langues différentes, par exemple la liste de Matthieu Weber référencée sur Wikipédia propose 66666 mots en français.

Si l'on souhaite un mot de passe de 6 mots et qu'on obtient les résultats suivants: 16665; 15653; 56322; 35616; 65224. En se référant à la liste ci-dessus, on obtiendra le mot de passe suivant : "« cajous bordes set juge verte »".

Ce mot de passe n'est pas trop compliqué à retenir car il contient une liste de mots très simples mais il est pour autant très robuste.

# Un bon mot de passe ne suffit pas..

Pour compléter un bon mot de passe il reste nécessaire d'avoir d'autres pratiques rigoureuses qui permettront de conserver la sécurité de votre politique de gestion de mot de passe.

1. Toujours changer le mot de passe initial

Il est absolument nécessaire de changer le mot de passe reçu initialement à la création d'un compte même si celui-ci semble aléatoire. D'une part, il arrive que certains éditeurs de matériel électronique fournisse un mot de passe identique pour chaque produit. D'autre part il est possible que le mail transmettant ce mot de passe ait été intercepté ou que ce mail soit récupéré lors d'une future fuite de données.
Conseil

2. Une mot de passe doit rester confidentiel

Le propriétaire du compte doit être le seul à le posséder, même l'administrateur réseau ne doit pas le connaître (d'où la nécessité de modifier le mot de passe initial). Il est aussi préférable de ne pas enregistrer son mot de passe sur un support informatique non chiffré comme un fichier texte ou un mail brouillon.

3. Changement régulier de mots de passe

Changer régulièrement de mot de passe permet de conserver un niveau de sécurité optimal. Si un mot de passe a fuité sans qu'on le sache, un changement régulier de mot de passe pourrait vous protéger de toute attaque. À noter que cela n'est pas vrai pour des mots de passe qui ne sont pas sujet aux fuites, par exemple le mot de passe de son ordinateur personnel.

4. Sensibiliser ses collaborateurs

Il est nécessaire de veiller à ce que tous les acteurs d'un projet aient une bonne politique de gestion de mots de passe afin que le projet soit protégé. Il suffit qu'un seul des comptes soit compromis pour qu'un attaquant accède et nuise aux données de tous.

5. Pour gérer ses mots de passe il est conseillé d'utiliser un gestionnaire de mot de passe, comme par exemple KeePass ou Bitwarden

# Quelles sont les exigences d’un mot de passe fort ?

Comme expliqué plut haut, les attaques par force brute utilisent une combinaison de caractères après l’autre pour finalement générer celle que vous avez choisie comme mot de passe. Voici comment vous préserver de cette technique :

- Utilisez 15-20 caractères ou plus. Plus un mot de passe est long, plus il est fort. Chaque caractère supplémentaire augmente les combinaisons potentielles de mot de passe, ce qui prolonge considérablement le temps nécessaire à une attaque par force brute.
- Utilisez plusieurs types de caractères. Ce n’est pas pour rien que de plus en plus d’organisations exigent des mots de passe composés de lettres majuscules et minuscules ainsi que de symboles et de chiffres. Lorsque vous incluez tous les types de caractères possibles, vous maximisez le nombre de possibilités par caractère, ce qui rend votre mot de passe plus difficile à pirater.
- Évitez les caractères de substitution courants. Les pirates programment leur logiciel de cracking pour qu’il tienne compte des échanges de caractères typiques (comme « 0 » lieu de « O »). « 410|\|3 » est aussi facile à craquer que « ALONE », et donc le leet speak n’est pas non plus une bonne solution.
- Évitez les suites de touches de clavier. Les chemins de clavier faciles à mémoriser (comme azerty ou qsdf) ne sont pas plus difficiles à pirater que des mots ordinaires. Ce type de mot de passe est loin d’être sûr.

# Utilisez des phrases de passe

Vous pouvez déjouer les attaques par dictionnaire en évitant les mots de passe simples et faciles à deviner. Associez plusieurs mots pour créer des phrases de passe extra-longues, très résistantes aux attaques par dictionnaire et aux tentatives standard d’attaque par force brute.

Lorsque vous créez une phrase de passe, assurez-vous que les mots qui la composent n’ont pas de lien évident entre eux. Les logiciels de piratage peuvent deviner des mots apparentés, mais vous pouvez les contrer avec des mots aléatoires.

![](https://academy.avast.com/hs-fs/hubfs/New_Avast_Academy/how_to_create_a_strong_password_academy/01-strong-password.png?width=1980&name=01-strong-password.png)
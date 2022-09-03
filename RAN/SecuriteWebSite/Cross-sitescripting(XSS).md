## Cross-site scripting (XSS)

- Tout SAVOIR sur la faille XSS : https://youtu.be/Bkg7JoBs2ac 

Dans la nuit de samedi 22 à dimanche 23 juillet 2015, le site jeuxvideo.com n’était pas du tout dans son état normal. La plupart des pages étaient remplies d’images parodiques, voire pornographiques. Ce grand site de jeux vidéos français était la victime d’une attaque aussi simple que courante.

À ce moment-là, n’importe qui postant un commentaire sur le site pouvait la déclencher. Autant te dire que personne s’est gêné. Les dev en charge de fermer la faille ont dû passer un mauvais moment.

![](https://nerdcoremovement.com/wp-content/uploads/NUP_172825_1162.jpg)

Pour comprendre ce qui s’est passé, mettons-nous en situation.

## XSS stocké

On parle d’une attaque XSS. Et plus précisément, pour le cas de jeuxvideo.com, une attaque XSS stockée.

Si tu donnes le pouvoir aux utilisateurs de ton site de poster du contenu, par exemple via une section commentaire, tu t’exposes à cette faille. Comme précédemment, regardons l’attaque en action pour mieux la comprendre.

Prenons l’exemple de Marc. Marc veut exprimer son amour pour ton site. Il va rentrer un commentaire dans ton formulaire de commentaire et déclencher un flow d’actions simples et sans danger :

![](https://i.imgur.com/0x2w9YO.png)

Marc est bienveillant. Il rentre un commentaire normalement. Ce qui va le stocker dans la base de données du site. La page est rafraichie et son commentaire -désormais stocké dans la base de données- va s’afficher pour tout le monde sur la page.

Encore une fois, un utilisateur qui te veut du mal va faire les choses différemment.

C’est le cas de Darlene. Elle veut tester si tu t’es protégé ou pas contre le XSS.

![](https://i.imgur.com/xQgaZ9r.png)

Darlene se rend compte que tu n’as mis aucune protection. Elle est très déçue de ton travail.

![](https://giffiles.alphacoders.com/206/206747.gif)

Comme tu peux le voir, l’attaque est très simple. Comme précédemment, le commentaire est stocké -cette fois avec la balise de script- dans la base de données. Quand la page se rafraichit, la balise script est alors interprétée par le navigateur qui ouvre une pop-up Javascript d’alert pour tout le monde.

Et si une alert passe, ça veut dire que n’importe quel script Javascript passe.

Inutile de t’expliquer le potentiel dévastateur ici. Du vol de session à la redirection vers de faux sites pour faire de l’hameçonnage. C’est la porte ouverte à toutes les fenêtres.

Voilà à quoi ressemblait une des attaques faites sur le site jeuxvideos.com lors de cette fameuse soirée.

![](https://img.lemde.fr/2015/08/23/0/0/831/156/664/0/75/0/6027dd0_8060-111ntxt.png)

## XSS réfléchi

Pour l’attaque XSS réfléchie, c’est le même principe. Sauf que le script n’est pas stocké dans la base de données. Il est passé directement dans l’URL.

Imagine que ton site permet de faire une recherche. Cette recherche passe une requête HTTP GET et un paramètre d’URL. Dans cette page tu affiches le résultat de la recherche, mais aussi le terme recherché.

Dans un monde idéal, ça se passe de cette façon dans ton site.

![](https://i.imgur.com/lfbzERx.png)

Lors d’une attaque XSS réfléchie, l’attaquant va tenter d’injecter du site directement dans la requête de cette façon.

![](https://i.imgur.com/gGgqivw.png)

L’attaquant n’a plus qu’à envoyer le lien -avec l’injection de script dans l’url- à quelqu’un. La personne clique dessus et se fait attaquer via ton site. En général, l’attaquant va utiliser des sites de minification d’url comme bit.ly pour cacher un petit peu son attaque dans le lien de base.

Et pour te donner une idée de la créativité des hackers autour de cette attaque [voici une liste d’attaques XSS recensée par l’OWASP](https://cheatsheetseries.owasp.org/cheatsheets/XSS_Filter_Evasion_Cheat_Sheet.html). Ils ont beaucoup d’imagination. Il nous faut une solution globale.

## Atténuation

Pour se protéger de cette attaque, la principale solution est d’échapper toutes balises HTML qui pourraient venir du client. Voir carrément supprimer toutes balises quand c’est possible.

Tout ce qui vient du client doit être traité comme du texte, sinon c’est la catastrophe.

Tu peux aussi regarder du côté des Content-Security-Policy pour interdire tout script inline et qui ne vient de ton propre domaine. Mais c’est une mesure en plus. Ce n’est pas en remplacement de la première.

Le plus tu auras de protection, le mieux ça sera.

![](https://www.observeit.com/wp-content/uploads/2017/10/DDOS.jpg)

Il y a un dernier type d’injection XSS via le DOM. J’ai décidé de pas t’en parler ici car elle n’est pas sur le podium. Par contre, j’ai une recommandation pour toi en fin d’article avec toutes les attaques possibles dedans.

Avant ça, passons à la troisième attaque la plus commune sur les Internets.
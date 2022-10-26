# La clé USB qui va griller votre ordinateur

- Je DÉTRUIS un PC avec une CLÉ USB ! (Test USB Killer) https://www.youtube.com/watch?v=_0OdWuFbfsk
- USBKill V4 testing compilation https://www.youtube.com/watch?v=I6bRoSK39io

Après avoir lu un article sur un voleur qui a grillé son ordinateur en insérant dedans une clé USB qu’il venait de piquer à quelqu’un dans le métro, le bidouilleur Dark Purple a eu l’envie de créer lui aussi sa propre clé de [destruction massive](https://kukuruku.co/hub/diy/usb-killer).

![](https://kukuruku.co/uploads/images/00/00/01/2015/03/10/0db61675db.gif.pagespeed.ce.SKktw3CChS.gif)

Évidemment, ce n’est pas si simple qu’il y parait, car les ports USB embarquent des protections contre les survoltages, les soucis d’électricité statique ainsi que des diodes Transil pour déconnecter proprement le circuit en cas de pépin.

Pour contourner toutes ces protections, Dark Purple a intégré dans son schéma un convertisseur DC-DC inversé qui récupère le jus du port USB pour charger un condensateur capable d’emmagasiner jusqu’à -110 V . Dès que tout est chargé, le convertisseur se coupe et un transistor décharge le condensateur sur les connecteurs du port USB. Une fois que c’est déchargé, le convertisseur se remet en route et récupère le jus renvoyé par le port USB pour ensuite le renvoyer encore et encore et encore jusqu’à ce que l’ordinateur rende l’âme à cause du voltage élevé et du courant fort qui sont capables de griller les fameuses diodes Transil et ensuite faire frire des composants plus sensibles comme le CPU (Processeur de la machine).

![](https://korben.info/app/uploads/2015/03/x35f4eb29b923.jpg.pagespeed.ic_.xafh6o4gsk23.jpg)

Voici à quoi ça ressemble une fois mis sous la forme d’une clé USB.

En effet, comme les contrôleurs USB récents sont intégrés directement dans le CPU, rien de plus direct et efficace.

Par conséquent, méfiez-vous la prochaine fois que vous trouverez une clé USB par terre… Cela pourrait être un piège très désagréable.

## Comment tout détruire avec une clé USB ?

Si vous n’avez pas encore mis de résine dans vos ports USB, voici une petite news qui devrait vous faire changer d’avis. On le sait tous, les ports USB sont des nids à microbes… On peut se choper un malware (souvenez-vous de Stuxnet) et cela même si l’ordinateur est en air gap (non connecté au réseau), ou si l’intrus utilise une clé genre Rubber Ducky, il peut tranquillement faire sa vie sur l’ordinateur de la victime sans laisser aucune trace.

Puis en début d’année, on a vu apparaitre l’USB Killer, une clé capable de cramer les composants d’un ordinateur. C’était déjà impressionnant et voici que Dark Purple, son créateur nous propose l’USB Killer 2.0.

![](https://korben.info/app/uploads/2015/10/d356d546d74e445583988307e9854190-650x542.jpg)

Encore plus puissante et plus dévastatrice que la première version. En effet, là ou la V1.0 se contentait de charger dans un condo -110 V pour tout relâcher d’un coup dans la machine et recommencer encore et encore jusqu’à ce plus rien ne réponde, la version 2.0 d’USB Killer emmagasine -220 V qui sont relâchés d’un coup, ce qui grille à coup sûr l’ordinateur, le téléphone (s’il supporte l’OTG), la télévision ou de tout type d’appareil avec un port USB. Et comme pour la première version, si le port USB continue de fonctionner, le processus recommence jusqu’à ce que tout soit mort.

En gros, avec cette clé diabolique, vous faites passer un ordinateur de vie à trépas en quelques secondes.

![](https://youtu.be/_TidRpVWXBE)

FEAR !!!!

Bon, par contre, l’histoire ne dit pas où s’en procurer une…En tout cas, je ne le répèterai jamais assez, faites gaffe avec vos ports USB.

## Fabriquer une clé USB Killer pour moins de 3$

Vous vous souvenez de mon chapitre sur l’USB Killer ? Cette clé USB qui ressemble à n’importe quelle autre et [qui est vendue ici](https://usbkill.com/) pour la modique somme de 50 €, permet, une fois insérée dans un port USB, de griller l’appareil qui se trouve derrière.

Ainsi, en la branchant sur un ordinateur, en moins d’une seconde ou deux, on peut le détruire totalement. C’est moche et illégal si vous « testez » sur du matériel qui ne vous appartient pas.

Le maker Kedar Nimbalkar a réalisé une vidéo où il explique comment obtenir exactement le même résultat avec un ioniseur USB vendu à moins de 3$ sur Gearbest et Amazon.

Cet appareil est un purificateur d’air USB dans lequel se cache un condensateur qui est utilisé pour stocker l’électricité électrostatique récupérée à partir des ions de l’air. Il suffit alors de recâbler le condensateur au bon endroit pour en faire une arme de destruction massive.

![](https://youtu.be/82-MDymVkps)

Malin et tellement simple !

Par contre, attention si vous voulez tester le truc sans risque, Kedar explique aussi comment faire un testeur. Autrement, vous cramerez votre matos.

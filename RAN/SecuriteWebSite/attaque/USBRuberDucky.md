# USB Rubber Ducky – Le canard hacker

- Présentation de L'USB Rubber Ducky (Clé USB de HACK) <https://www.youtube.com/watch?v=NYjIQoB-01o>

Je viens de découvrir un petit périphérique USB baptisé USB Rubber Ducky qui va vous permettre de jouer au petit hacker ou de rendre fous vos amis.

Alors comment ça fonctionne ? Et bien il s’agit d’une clé USB qui a la particularité de se comporter exactement comme un clavier dès que vous la branchez. Mais pas n’importe quel clavier…. Un clavier qui écrira tout seul le code que vous lui aurez dit d’écrire à l’avance.

Comme n’importe quel clavier, Ducky est reconnu par les OS modernes (Linux, Mac et Windows) et profite de cette confiance aveugle qu’on les OS en les claviers afin de balancer des payloads à la vitesse hallucinante de mille mots par seconde.

![](https://youtu.be/sbKN8FhGnqg)

Quand je dis payload, je parle bien évidemment de scripts que vous pouvez créer vous-même ou récupérer sur le net. Pour vous aider à mieux comprendre l’intérêt de la chose, il suffit simplement de jeter [un œil à ces scripts](https://github.com/hak5darren/USB-Rubber-Ducky/wiki/Payloads).

Par exemple, il y en a un qui permet d’insérer une backdoor (sous OSX), de faire du DNS poisoning en local, de récupérer la config WiFi d’un Windows, de souhaiter Joyeux Noël, de faire tourner l’affichage, de récupérer le profil d’un utilisateur sur un FTP de votre choix, de créer un réseau WiFi sur la machine visée et même d’injecter un binaire.

Il existe des dizaines de scripts disponibles un peu partout sur la toile, qui seront exécutés sur la machine visée. D’ailleurs, le langage n’est pas très complexe et ressemble à du basic.

Évidemment, vous l’aurez compris, USB Rubber Ducky fonctionne uniquement si l’utilisateur a oublié de bloquer sa session. Ce qui est très souvent le cas.

![](https://korben.info/app/uploads/2013/10/ducky3.jpeg)

Avec un petit script bien pensé, il suffit que vous vous leviez 1 minute de votre chaise, pour que votre voisin de table récupère des données, un accès distant ou des mots de passe en quelques secondes simplement en insérant sa clé Ducky dans le port USB de votre machine. Hop, ni vu ni connu, j’t’embrouille !

Il faut vraiment concevoir Ducky comme un clavier. Si vous pouvez faire une manip avec un clavier, Ducky peut le faire à votre place à la vitesse de l’éclair.

Top !

Ducky est [en vente ici](https://hakshop.myshopify.com/products/usb-rubber-ducky).

## Comment se protéger des attaques par clé HID (Rubber Ducky)

![](https://korben.info/app/uploads/2020/03/4_35611eac-0b76-4cdb-a716-b37665b26bd9_2000x.jpg)

Et bien pour contrer cette attaque, Google a mis au point un outil nommé [ukip pour « USB Keystroke Injection Protection »](https://github.com/google/ukip) capable de mesurer la vitesse d’entrée des touches afin de déterminer si cela provient d’une attaque ou si c’est entré par un être humain.

Ukip propose 2 modes : Un mode monitor qui permet de surveiller et logger l’attaque, mais pas de l’intercepter. Et un mode hardening qui va immédiatement bloquer l’attaque. Par défaut c’est le mode hardening qui tourne.

Si cela vous intéresse, par exemple pour sécuriser une machine nomade type ordinateur portable sur laquelle quelqu’un pourrait insérer une clé HID. Par contre, c’est un système qui fonctionne sur une détection comportementale, donc ce n’est pas fiable à 100%. Il est préférable de coupler cette sécurité avec une autre type USB Guard.

Merci Google !

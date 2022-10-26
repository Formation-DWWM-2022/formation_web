## CSRF

On finit sur la fameuse attaque de falsification de demande intersite ou cross-site request forgery (CSRF).

Cette fois le principe n’est pas d’injecter du code mais de faire des requêtes HTTPs à la place de la victime. En passant par un site tiers, l’attaquant peut faire faire des actions sur ton site à toi. Et la victime en question n’est même pas au courant que ça se fait !

Dernier petit dessin pour expliquer tout ça.

![](https://i.imgur.com/TzvZzm0.png)

1. : Un internaute visite un site tenu par un hacker. Sur ce site, des requêtes HTTP faites par l’attaquant sont en place. Ça peut être tout verb HTTP. Les plus courantes avec cette attaque sont le GET, POST et PUT.

2. : Ces requêtes sont alors lancées sur ton site, la cible de l’attaque. Involontairement, c’est donc le visiteur -via le site du hacker- qui fait des requêtes chez toi.

3. : Les requêtes arrivent alors sur ton site, et sans protection, elles provoqueront des actions. La gravité de ces actions va être selon ce qu’il est possible de faire sur ton site avec des requêtes HTTP.

Tu peux faire confiance au hacker en question pour trouver des choses intéressantes à faire. Ce sont des pros pour taper là ou ça fait mal. Ils le font avec beaucoup de discrétion.

![](https://cdn.player.one/sites/player.one/files/styles/scale_lg/public/2017/12/14/irving-mr-robot.jpg)

## Atténuation

La première chose à faire est de suivre les principes REST. Un GET ne devrait en aucun cas provoquer des changements de status sur ton site. C’est une satanerie de faire ça. Donc en arrêtant les sataneries, tu vas éviter toute une partie des attaques CSRF.

Pour les autres verbes HTTP, ça demande un peu plus de travail.

D’abord, il faut que tu implémentes des cookies anti-CSRF. Tu as sûrement déjà vu ce genre de choses en inspectant le code de formulaires sur des sites. Ça ressemble à ça.
```html
<form action="/update_profile" method="POST">
  <input type="text" name="name" />
  <input type="submit" value="Submit" />
  <!-- Anti-CSRF -->
  <input type="hidden" name="token_csrf" value="48rtyu9962dd4s3assa" />
</form>
```

Le token CSRF que tu vois est généré de façon random par le serveur web et intégré au formulaire au moment de la création de ce dernier. Quand le formulaire est soumis, si le serveur web ne reconnait pas le token, la requête est refusée. C’est efficace pour bloquer la plupart des attaques. Mais c’est pas assez. Il faut ajouter une dernière protection.

Il faut faire en sorte que toutes tes requêtes aient bien l’attribut SameSite: Strict ou SameSite: Lax dans le Set-Cookie. La plupart des navigateurs récents sont en Lax de base, mais pas tous. Et surtout les navigateurs plus vieux ne sont pas protégés du tout. Cette configuration sur les cookies va te permettre de restreindre quel domaine peut faire des requêtes sur ton domaine.

- En Lax, seules les requêtes GET d’autres domaines peuvent faire des requêtes chez toi. Et c’est pas un problème si tu respectes les principes REST comme vu précédemment.
- En Strict, aucune requête qui ne vient pas de ton propre domaine ne peut faire des requêtes chez toi.
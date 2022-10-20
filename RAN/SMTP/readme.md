# Qu'est-ce que le Simple Mail Transfer Protocol (SMTP) ?

- Email Smtp Pop3 Imap: Comment Ça Marche? https://youtu.be/M7GbQ7R0GkU
- SMTP, POP, IMAP et MAPI pour les débutants https://youtu.be/CFx2K1rDfGU

Le Simple Mail Transfer Protocol (SMTP, protocole simple de transfert de courrier) est une norme technique de transmission du courrier électronique (également appelé e-mail) sur un réseau. Comme d'autres protocoles de mise en réseau, le SMTP permet aux ordinateurs et aux serveurs d'échanger des données indépendamment de leurs équipements physiques ou logiciels sous-jacents. Tout comme l'utilisation d'une forme d'adressage uniformisée sur une enveloppe permet au service postal de fonctionner, le SMTP normalise la manière dont les e-mails circulent entre l'expéditeur et le destinataire. La transmission du courrier électronique à grande échelle devient alors possible.

Le SMTP constitue un protocole de transmission d'e-mails, pas de réception. Ainsi, si le service postal dépose le courrier dans une boîte aux lettres, le destinataire doit toujours aller relever le courrier dans cette dernière. De manière similaire, le SMTP transmet un e-mail au serveur d'un fournisseur de messagerie, mais le destinataire doit utiliser des protocoles distincts pour récupérer l'e-mail au sein du serveur afin de pouvoir le lire.

# Comment fonctionne le SMTP ?

Tous les protocoles de mise en réseau suivent une procédure prédéfinie en matière d'échange de données. Le SMTP définit une procédure d'échange de données entre un client de courrier électronique et un serveur de messagerie. Le client de courrier électronique désigne l'interface qui permet à un utilisateur d'interagir avec l'application de bureau ou web utilisée par ce dernier pour lire et envoyer des e-mails. Un serveur de messagerie est un ordinateur spécialisé dans l'envoi, la réception et le transfert d'e-mails. Les utilisateurs n'interagissent pas directement avec ces serveurs.

Vous trouverez ci-dessous un résumé des événements qui se déroulent entre le client de courrier électronique et le serveur de messagerie pour qu'un e-mail puisse être envoyé :

- Ouverture de la connexion SMTP : comme le SMTP utilise le Transmission Control Protocol (TCP, protocole de contrôle de transmissions) en tant que protocole de transport, cette première étape commence par une connexion TCP entre le client et le serveur. Le client de courrier électronique démarre ensuite le processus d'envoi de l'e-mail par l'exécution d'une commande « Hello » spécialisée (HELO ou EHLO, décrite ci-dessous).
- Transfert des données de l'e-mail : le client envoie une série de commandes au serveur, accompagnées du contenu de l'e-mail en lui-même, c'est-à-dire l'en-tête de l'e-mail (incluant notamment la destination et la ligne d'objet), le corps de l'e-mail et les éventuels composants supplémentaires.
- Exécution du Mail Transfer Agent : le serveur exécute un programme nommé Mail Transfer Agent (MTA, agent de transfert de courrier). Le MTA vérifie le domaine de l'adresse e-mail du destinataire et, s'il diffère de celui de l'expéditeur, interroge le DNS (Domain Name System, système de nom de domaine) pour trouver l'adresse IP du destinataire. La procédure revient un peu à la recherche du code postal d'un destinataire par les services postaux.
- Fermeture de la connexion : le client avertit le serveur une fois la transmission des données terminée et ce dernier met fin à la connexion. À ce stade, le serveur ne reçoit plus de données supplémentaires relatives à l'e-mail de la part du client, sauf si le client établit une nouvelle connexion SMTP.

Ce premier serveur de messagerie ne constitue généralement pas la destination finale de l'e-mail. Après réception de l'e-mail de la part du client, le serveur répète cette procédure de connexion SMTP avec un autre serveur de messagerie. Ce deuxième serveur fait de même, jusqu'à ce que l'e-mail atteigne finalement la boîte de réception de destination, sur un serveur de messagerie contrôlé par le fournisseur de courrier électronique du destinataire.

Comparons ce processus à la manière dont un courrier circule entre l'expéditeur et le destinataire. Le facteur ne transporte pas directement une lettre de l'expéditeur à son destinataire. Il rapporte tout d'abord la lettre à son bureau de poste. Le bureau de poste envoie ensuite la lettre à un bureau situé dans une autre ville, qui la renvoie vers un autre bureau, puis un autre, et ainsi de suite, jusqu'à ce la lettre atteigne sa destination. De même, les e-mails se rendent d'un serveur à l'autre par l'intermédiaire du protocole SMTP, jusqu'à ce qu'ils atteignent la boîte de réception du destinataire.

# Qu'est-ce qu'une enveloppe SMTP ?

L'« enveloppe » SMTP désigne l'ensemble d'informations que le client de courrier électronique envoie au serveur de messagerie quant à l'endroit d'où l'e-mail provient et à sa destination. L'enveloppe SMTP est distincte de l'en-tête et du corps de l'e-mail. Elle reste par ailleurs invisible aux yeux du destinataire de l'e-mail.
Que sont les commandes SMTP ?

Les commandes SMTP sont des instructions textuelles prédéfinies permettant d'expliquer à un client ou un serveur ce qu'il doit faire et de quelle manière traiter les données qui accompagnent l'e-mail. Vous pouvez les considérer comme des boutons sur lesquels le client peut appuyer afin de s'assurer que le serveur accepte les données de manière appropriée.

- HELO/EHLO : ces commandes permettent de dire « Hello » (Bonjour) et de démarrer la connexion SMTP entre le client et le serveur. La forme « HELO » constitue la version de base de cette commande, tandis que la forme « EHLO » désigne un type spécialisé et spécifique au SMTP.
- MAIL FROM : cette commande annonce au serveur de qui provient l'e-mail. Si Alice tentait ainsi d'envoyer un e-mail à son ami Bob, le client pourrait envoyer la commande « MAIL FROM:<alice@exemple.com> ».
- RCPT TO : cette commande dresse la liste des destinataires de l'e-mail. Un client peut envoyer cette commande à plusieurs reprises si l'e-mail a plusieurs destinataires. Dans l'exemple ci-dessus, le client de courrier électronique d'Alice enverrait « RCPT TO:<bob@exemple.com> ».
- DATA : cette commande précède le contenu de l'e-mail, comme dans l'exemple ci-dessous :

```
DATA
Date : Lundi 4 avril 2022
De : « Alice » alice@exemple.com
Objet : Œufs Bénédicte en cocotte
Pour : « Bob » bob@exemple.com

Salut Bob,
J'apporterai la recette des œufs Bénédicte en cocotte vendredi.
— Alice
.
```

- RSET : cette commande réinitialise la connexion et supprime l'ensemble des informations préalablement transférées, sans mettre fin à la connexion SMTP. La commande RSET est utilisée lorsque le client a envoyé des informations incorrectes.
- QUIT : cette commande met fin à la connexion.

# Qu'est-ce qu'un serveur SMTP ?

Un serveur SMTP désigne un serveur de messagerie capable d'envoyer et de recevoir des e-mails à l'aide du protocole SMTP. Pour démarrer le processus d'envoi d'un e-mail, les clients de courrier électronique se connectent directement au serveur SMTP du fournisseur de messagerie. Un serveur SMTP exécute plusieurs programmes différents :

- Mail Submission Agent (MSA, agent d'envoi de courrier) : le MSA reçoit les e-mails envoyés par le client de courrier électronique.
- Mail Transfer Agent (MTA, agent de transfert de courrier) : le MTA transfère les e-mails au serveur suivant dans la chaîne de transmission. Comme décrit plus haut, il peut, si nécessaire, interroger le DNS pour trouver l'enregistrement DNS MX (Mail eXchange, échange de courrier) du domaine du destinataire.
- Mail Delivery Agent (MDA, agent de livraison de courrier) : le MDA reçoit les e-mails envoyés par les MTA et les stocke dans la boîte de réception du destinataire.

# Quel port le protocole SMTP utilise-t-il ?

Dans l'univers de la mise en réseau, le port désigne le point virtuel de réception des données réseau. Vous pouvez le considérer comme le numéro d'appartement dans l'adresse d'un courrier postal. Les ports aident les ordinateurs à trier et transmettre les données réseau vers les applications appropriées. Les mesures de sécurité réseau, comme les pare-feu, peuvent bloquer les ports non utilisés afin d'empêcher l'envoi et la réception de données malveillantes.

Historiquement, le SMTP n'utilisait que le port 25. Ce port est toujours employé aujourd'hui par le protocole, mais ce dernier peut également utiliser les ports 465, 587 et 2525.

- Le port 25 est principalement utilisé pour les connexions entre serveurs SMTP. Les pare-feu des réseaux des utilisateurs finaux bloquent souvent ce port de nos jours, car les spammeurs tentent de s'en servir de manière abusive pour envoyer de grandes quantités de contenu indésirable.
- Le port 465 était autrefois attitré à l'usage SMTP avec chiffrement Secure Sockets Layer (SSL). Le SSL a depuis été remplacé par le protocole Transport Layer Security (TLS) et les systèmes de messagerie modernes n'utilisent plus ce port. Il n'apparaît plus guère que dans les systèmes plus anciens (obsolètes).
- Le port 587 constitue désormais le port par défaut pour l'envoi d'e-mails. Les communications SMTP effectuées via ce port utilisent le chiffrement TLS.
- Le port 2525 n'est pas officiellement associé au SMTP, mais certains services de courrier électronique proposent la transmission SMTP via ce port en cas de blocage des ports mentionnés ci-dessus.

# SMTP et IMAP/POP

Les protocoles IMAP (Internet Message Access Protocol) et POP (Post Office Protocol) servent à transmettre un e-mail à sa destination finale. Pour permettre à l'utilisateur de lire un e-mail, le client de courrier électronique doit récupérer ce dernier auprès du dernier serveur de messagerie de la chaîne. À cette fin, le client a recours au protocole IMAP ou POP plutôt qu'au SMTP.

Pour comprendre la distinction entre les protocoles SMTP et IMAP/POP, pensez à la différence entre une pièce de bois et une corde. Une pièce de bois peut servir à pousser un objet vers l'avant, mais pas à le tirer vers soi. Une corde peut servir à tirer un objet vers soi, mais ne peut pas le pousser vers l'avant. De manière analogue, le SMTP « pousse » un e-mail vers un serveur de messagerie, tandis que les protocoles IMAP et POP permettent de le « tirer » vers l'application de l'utilisateur afin de terminer la transmission.

# Qu'est-ce que l'Extended SMTP (ESMTP) ?

L'Extended Simple Mail Transfer Protocol (ESMTP) constitue une version du protocole qui étend les capacités initiales de ce dernier, en permettant l'envoi de pièces jointes et l'utilisation du TLS, parmi d'autres fonctionnalités. La plupart des clients et des services de courrier électronique utilisent l'ESMTP, pas le SMTP classique.

L'ESMTP dispose de commandes supplémentaires, notamment la commande « EHLO », permettant l'envoi d'un message « extended hello » (salutation élargie) afin d'activer l'utilisation du ESMTP au début de la connexion.

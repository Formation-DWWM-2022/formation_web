# Proton VPN server

1. Inscrivez vous sur un VPN (ex : Pronton VPN - free plan)
https://account.protonvpn.com/signup?plan=free&billing=1&minimumCycle=1&currency=EUR&language=en

2. Utilisez un adresse mail anonyme pour votre inscription : https://yopmail.com/fr/ 

3. Connectez vous à votre Dashboard VPN : account.protonvpn.com/login

4. Trouvez vos identifiants OpenVPN

5. Connectez-vous au tableau de bord Proton VPN et cliquez sur l’onglet Compte. Vous verrez ici vos deux types d’identifiants.

Les identifiants Proton VPN Login sont utilisés dans nos applications.  OpenVPN / IKEv2 Username est utilisé sur les connexions manuelles. Veuillez donc configurer les identifiants OpenVPN selon vos préférences car vous devrez les utiliser pour établir une connexion VPN.

![](https://protonvpn.com/support/wp-content/uploads/2019/09/openvpn-creds-1536x727.png)

6. Sélectionnez Téléchargements sur dans la barre de navigation de gauche
   
7. Sélectionnez les fichiers de configuration OpenVPN dans la barre de navigation de gauche et choisissez :
  - Plate-forme : La bonne plate-forme pour votre appareil (CECI EST IMPORTANT, sinon vous pourriez être vulnérable aux fuites DNS)
  - Protocole : UDP (recommandé) / utiliser TCP si vous rencontrez des vitesses VPN lentes (cela utilise le port 443)

![](https://protonvpn.com/support/wp-content/uploads/2017/07/openvpn-1-2048x1051.png)

8. Cliquez ensuite sur les boutons de téléchargement du ou des serveurs que vous souhaitez télécharger.
   
![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-1.png)

# Configuration du VPN Proton à l’aide de l’interface graphique OpenVPN

1. Téléchargez et installez le bon fichier d’installation OpenVPN GUI pour votre PC à partir [d’ici](https://openvpn.net/community-downloads/).  

2. Exécutez l’interface graphique OpenVPN. Une icône s’affichera dans la zone de notification de votre barre des tâches Windows (vous devrez peut-être cliquer sur la flèche Afficher les icônes cachées pour la voir). Cliquez avec le bouton droit de la souris sur l’icône et allez à Importer le fichier…

![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-2.png)

3. Naviguez jusqu’à l’endroit où vous avez téléchargé le fichier de configuration OpenVPN (probablement votre dossier Téléchargements), sélectionnez-le et cliquez sur Ouvrir.

![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-3.png)

Cliquez sur OK dans le message Fichier importé avec succès. 

4. Cliquez avec le bouton droit de la souris sur l’icône GUI OpenVPN dans votre zone de notification.

![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-4.png)

Vous pouvez importer jusqu’à 50 profils OpenVPN dans l’interface graphique OpenVPN. Si vous avez importé plusieurs profils, cliquez avec le bouton droit de la souris sur l’icône de l’interface graphique OpenVPN dans votre zone de notification.

![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-5.png)

5. Entrez votre nom d’utilisateur et votre mot de passe OpenVPN (pas votre nom d’utilisateur et votre mot de passe de compte — voir ci-dessus).

![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-6.png)

Les mots de passe OpenVPN sont très sécurisés (c.-à-d. longs), nous vous recommandons donc de cocher la case Enregistrer le mot de passe pour vous connecter facilement à chaque fois. Cliquez sur OK. 

Une notification Windows vous avertira lorsque la connexion est établie avec succès et l’icône GUI OpenVPN dans votre zone de notification deviendra verte.

![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-7.png)

Pour vous déconnecter du VPN, cliquez avec le bouton droit de la souris sur l’icône GUI OpenVPN dans votre zone de notification Déconnecter (ou cliquez avec le bouton droit sur l’icône GUI OpenVPN dans votre zone de notification, placez le curseur sur le profil que vous êtes connecté à Déconnecter si vous avez importé plusieurs profils).

![](https://protonvpn.com/support/wp-content/uploads/2017/07/windows-ovpn-8.png)

# Docker + TOR browser

1. Ouvrir votre invite de commande en administrateurs

```
docker run -d -p 5800:5800 domistyle/tor-browser
```

> http://localhost:5800/
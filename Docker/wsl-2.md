# Installer WSL 2 sous Microsoft Windows 10 / Windows 11 pour profiter de Linux ou Docker ?
Pour profiter de Linux sous Windows 10 ou Windows 11, vous devez activer WSL (Windows subsystem for linux). Il s’agit d’un sous système qui vous permet de faire tourner des applications ou des distribution Linux comme Ubuntu, Fedora, Docker …etc.

Ca fonctionne très bien et c’est encore mieux que de passer par Virtualbox ou VMWare. Microsoft a d’ailleurs prochainement prévu le support des interfaces graphiques GUI dans WSL2.

## Linux ou windows ?

Ainsi, grace à WSL 1 ou WSL 2, plus besoin de choisir entre une distribution Linux ou Windows. Vous aurez le meilleur des 2 mondes. Un bon vieux Windows pour les jeux et un Linux pour la bidouille. L’objectif de cette nouvelle version WSL2 est de faciliter l’utilisation du sous-système Windows pour Linux 2 en mode natif sur ces plateformes. Sachez que La condition requise pour Windows Subsystem Linux est que Windows soit installé en tant que système d’exploitation 64 bits.

## Comment activer windows subsystem for linux ?

Pour cela, ouvrez un PowerShell en mode Administrateur.

![](https://korben.info/app/uploads/2020/06/lancer-powershell.jpg)

Et entrez la commande suivante pour activer la VMP (Virtual Machine Platform) :

```
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all
```

![](https://korben.info/app/uploads/2020/06/wsl-powershell.jpg)

Et redémarrez la machine.

## Quelle version de WSL ? Faut-il choisir WSL 1 ou WSL 2 ?

A ce stade, vous avez WSL 1.0 donc vous pouvez installer une distribution Linux, par exemple un Ubuntu ou une Debian via le Microsoft Store et ainsi profiter facilement des mises à jour. Mais nous, on va aller plus loin, parce qu’on est des dingues !

![](https://korben.info/app/uploads/2020/06/ubuntu-store-windows-1.jpg)

L’objectif est de basculer en WSL 2 qui apporte une véritable virtualisation de Linux sous Windows.

## Comment passer de wsl 1 à wsl 2 ?

Relancez à nouveau Powershell en administrateur et entrez la commande suivante :

```
dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all
```
![](https://korben.info/app/uploads/2020/06/powershell-virtualmachineplatform.jpg)

Et on re-reboot ! Ah Ah !

# Comment installer linux sur windows 10 / Windows 11 ? Le tutoriel !

Ensuite, vous devrez installer au moins une distrib Linux via le Microsoft Store. Lancez ensuite ce Linux et si vous avez une erreur qui vous dit ceci :

```
WSL 2 nécessite une mise à jour de son composant noyau. Pour plus d'informations, visitez https://aka.ms/wsl2kernel
```

Il vous suffit d’installer le noyau Linux, made By Microsoft, [que vous pouvez trouver ici](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi).

![](https://korben.info/app/uploads/2020/06/noyau-linux-wsl2.jpg)

Relancez la distrib Linux et tout devrait bien se passer.

Pour activer WSL 2 par défaut, entrez la commande suivante dans votre PowerShell :

```
wsl --set-default-version 2
```

![](https://korben.info/app/uploads/2020/06/wsl-set-version.jpg)

Mais pour savoir si vos Linux embarqués dans Windows sont bien en WSL 2, entrez la commande suivante:

```
wsl --list --verbose
```

![](https://korben.info/app/uploads/2020/06/korben20200417144706-109.jpg)

Si ce n’est pas le cas, vous pouvez les convertir à WSL 2 avec la commande suivante :

```
wsl --set-version NOMLINUX
```

Par exemple, chez moi, pour Ubuntu, ça donne ça :

```
wsl --set-version ubuntu 2
```

![](https://korben.info/app/uploads/2020/06/korben20200417144706-115.jpg)

Et voilà c’est converti pour fonctionner avec WSL2.

Bref, WSL 2 est fonctionnel sous Windows
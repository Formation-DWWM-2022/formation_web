### Commandes PowerShell

## Bases 👌

Rêgles générales :
--le premier mot est le nom de la commande
--les mots précédés d'un tiret (exemple: -Name) sont là pour indiquer que le mot suivant est un parametre et à quoi il sert
--Appuyer sur "Tab" permet de voir les différentes commandes possibles

1. Ouvrir Powershell
`WIN + X` puis `I`

2. Ourvir Powershell en tant qu'administrateur
`WIN + X` puis `A`

3. Réutiliser une commande précédente
`UP`

Il est possible de modifier l'apparence du Terminal (police, couleurs etc) en faisant un clic droit
puis en choisissant "Propriétés".

## Naviguer

"cd" veut dire "Change Directory" (changer de dossier)

1. Rentrer dans un dossier
`cd nomdudossier`

2. Sortir du dossier actuel
`cd ..`

3. Revenir à la racine du disque
`cd\`

4. Vider le Terminal
`clear` ou `cls`

## Manipulation

1. Créer un dossier
`mkdir nom_du_dossier` ("make directory")

2. Créer un fichier
`New-Item mon_fichier.txt`
Version complete
`New-Item -Path "chemin" -Name "nom_du_fichier" -ItemType "type_de_fichier"`

On peut créer plusieurs fichiers d'un seul coup
`New-item -Path "chemin vers fichier1", "chemin_vers_fichier2"`

3. Créer un fichier avec du texte
`New-Item mon_fichier.txt -value "Je suis un texte !"`

4. Voir le contenu d'un dossier
`Get-ChildItem nom_du_dossier` ou `dir nom_du_dossier`

On peut même filtrer les résultats:
`Get-ChildItem | Where { $_.Name -like "*coucou*"}` (<- ne retourne que les fichiers contenant "coucou" dans leur nom)

Exclure certains fichiers
`Get-ChildItem -Exclude *.jpg` (<-retourne tous les fichiers du dossier SAUF les images en .jpg)

Préciser 
`Get-ChildItem -Path "C:\users\desktop\*" -Include *.jpg, *.md` (<- ne retourne QUE les fichiers au format .jpg ou .md)

5. Supprimer un fichier
`Remove-Item nom_du_fichier.txt`
Demander une confirmation avant la suppression
`Remove-Item nom_du_fichier.txt -Confirm`
Supprimer un dossier et tout son contenu
`Remove-Item nom_du_dossier -Recurse`

6. Copier un fichier
`copy-item nom_du_fichier.txt -destination un_autre_dossier`

7. Déplacer un fichier
`move-item nom_du_fichier.txt -destination un_autre_dossier`

8. Executer un fichier ou ouvrir un dossier
`Invoke-Item nom_du_fichier.txt`

9. Voir le contenu d'un fichier
`Get-Content -Path "chemin_vers_le_fichier"`
ou
`Get-Content nom_du_fichier` (<- ne marche que si le fichier est dans le dossier actif du terminal)

10. N'afficher que certaines lignes du fichier
`Get-Content "chemin" -TotalCount 5` (affiche les 5 premières lignes)
`Get-Content "chemin" -Tail 5` (afficher les 5 dernières lignes)


11. Obtenir des informations sur un fichier
`Get-Item nom_du_fichier`
On peut préciser les infos que l'on veut
`Get-Item nom_du_fichier | Select-Object Name, CreationTime, LastAccessItem, LastWriteTime` (<- retourne le nom, la date de création, la date du dernier accès à ce fichier et la date de la dernière modification)

12. Filtrer les resultats avant d'afficher les infos.
`Get-Item *.exe | Select-Object Name, CreationTime`

## Processus

1. Voir tous les processus
`Get-Process`

2. "Tuer" un processus
`Stop-Process -name nom_du_processus`
ou
`Stop-Process -id numero_du_processus`

3. Obtenir un processus spécifique
`Get-process -Name "nom_du_process"`

4. Obtenir uniquement les processus "gourmands" (ici, ceux qui utilisent 100mo de RAM minimum)
`Get-Process | Where-Object { $_.WorkingSet -ge 100000000}`

5. Générer un tableau aux colonnes personalisées
`Get-Process | Format-Table Name, StartTime` (<- ici on affiche que le nom du process et l'heure à laquelle il a été lancé)


## Aide

1. Connaitre toutes les commandes
`Get-Command`
 Une commande est toujours composé d'un "Verbe" (action) et d'un "Nom".
 Par exemple "Get-command sert à récupérer (Get) toutes les commandes (command).
 On peut chercher une commandes avec un verbe ou un nom précis en utilisant ces parametres
 `Get-Command -Verb Get` toutes les commandes qui "récupèrent" quelque chose
 `Get-Command -Noun Service` toutes les commandes qui utilisent un "Service"

 Variante, rechercher une commande avec un mot clé (entre *asterix*)
 `Get-Command -Name *terme_de_recherche*`
 On peut même filtrer les résultats par type de commande
 `Get-Command -Name *terme_de_recherche* -CommandType Cmdlet` (<- ne trouvera que les "Commandeslet")

 Rechercher par "Module"
 `Get-Command -Module ActiveDirectory   `

2. Connaitre tous les "verbes" d'action
`Get-Verb`

3. Obtenir de l'aide sur une commande
`Get-Help nom_de_commande`

On peut aussi demander un exemple d'utilisation
`Get-Help nom_de_commande -Examples`

Obtenir des informations concernant un parametre de Commande
`Get-Help nom_de_commande -Parameter nom_du_parametre`

Obtenir la version complête de l'aide (avec exemple et parametres décrits)
`Get-Help nom_de_commande -Full`

Variante : ouvrir la documentation dans une fenêtre à part
`help nom_de_commande -Full | Out-GridView`

Accéder directement à la documentation en ligne 💕
`Get-Help nom_de_commande -Online`

4. Obtenir des informations sur les composants (propriétés, méthodes...) d'une Commande
`nom_de_de_commande | Get-Member`

## Test

1. Vérifier qu'un dossier existe
`Test-Path -Path "chemin"`
Retournera "True" ou "False"

2. Tester une connection (faire un "ping") sur une adresse IP
`Test-Connection 1.1.1.1` ou `ping 1.1.1.1`
`Test-Connection 1.1.1.1 -Count 1` tester un certain nombre de fois

3. Trouver l'itinéraire réseau jusqu'à une adresse cible
`Test-Netconnection www.google.com -TracerRoute`

## Services

1. Récupérer tous les Services
`Get-Service`

2. Filtrer les services pour ne récupérer que ceux en cours d'execution
`Get-Service | Where-Object { $_.status -eq "Running"}`

## Drives (Disques durs)

1. Obtenir des infos sur les disques de la machine
`Get-PSDrive`

2. Ne récupérer que les drives liés aux fichiers
`Get-PSDrive -PSProvider FileSystem`

## Date

1. Obtenir la date actuelle
`Get-Date`
Possibilité de formater la date
`Get-Date -Format "yyyy/MM/dd"` (pour avoir la date au format 2020/03/21)
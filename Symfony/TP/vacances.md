# TP : Projet Vacances

> Le but de l'application sera d'être une plateforme où sont enregistrées plusieurs destinations (des villes, des moments, par ex : Paris, Londres, Taj Mahal, Times Square, Valée de Chaudefour...)

> Il y aura une page par ville ou destination

> Les utilisateurs logués pourront ajouter des commentaires et photos sur la destination

> Ils pourront noter sur 5 la destination

> Ils pourront cliquer sur "j'ai visité" : il y aura un compte de visites sur la page d'une destination et la liste des destinations visitées

> On peut éventuellement mettre un maximum d'informations sur la page de l'utilisateur : récupérer les photos et commentaires postés par exemple

> Page d'accueil : caroussel avec les 5 villes les plus visitées

## Modèle de données

> `Destination` : ville, monument, évenèment... à visiter
```
Destination
---
name
country
description
type
```

> `Type` : type ou catégorie d'une destination (ville, monument, évènement...)
```
Type
---
name
```

> `Review`: avis avec photo (nullable) sur une `Destination`

```
Review
---
content
notation
photo
```

> `User`

```
User
---
email
photo
pseudo
password
```

## Relations

- `User` OneToMany `Review`
- `User` ManyToMany `Destination`
- `Review` ManyToOne `Destination`
- `Destination` ManyToOne `Type`

## Actions

#### CreerDestination
Un `User` créée une nouvelle `Destination`

#### VisiteDestination
Un `User` possède une nouvelle `Destination`

#### AjouterReview
Un `User` créée une nouvelle `Review` sur une `Destination` et possède une nouvelle `Destination` si il ne l'avait pas déjà

#### ListeDestinations
Liste des `Destination` visitées par le `User`

#### ListeReview
Liste des `Review` visitées par le `User`


## Pages et rôles
> Il y aura un système d'authentification et de rôles.

- CRUD `Destination` (UD : `ROLE_ADMIN`)
- CRUD `Review` (UD : `ROLE_ADMIN` + `User` propriétaire)
- CRUD `Type` (CUD : `ROLE_ADMIN`)
- CRUD `User` (UD : `ROLE_ADMIN`)

## Idées

- Caroussel en page d'accueil avec les 5 destinations les plus visitées
- Étoiles de notation sur 5
- Page profil public, un utilisateur logué peut voir les profils des autres utilisateurs
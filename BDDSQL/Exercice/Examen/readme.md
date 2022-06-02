# Bonus
1. Qu'est-ce que le projet « UNIX » et qui est 'Brian Kernighan' ? (+0.5 pts)
2. Coder l’entier 2397 successivement en base 2, 8 et 16. (+0.5 pts)

# Question de cours :
1. Qu'est ce qu'une "Clé primaire" ? une "Cardinalités" ? une "SGBD" ?
2. Quand doit-on ajouter des "Clés étrangère" ?
3. Quelle problème pose la "Redondance" et comment le résoudre ?
4. A quoi sert "l'Union" entre 2 tables ?
5. Comment s'appelle le "langage graphique utilisé pour la conception de programmes informatiques" ?

# Sujet 1: Gestion d’une PME

Soit une PME spécialisée dans la mise à disposition des employés pour le compte ses clients. Chaque intervention donne lieu à un contrat avec le client.
Les principales informations du contrat sont:

- La description de l’intervention
- La date du début de l’intervention
- La qualification précise de chaque intervenant (il existe une vingtaine de qualifications possibles)qualifications possibles)
- Le nombre d’employé prévu pour x jours

A chaque qualification correspond un tarif journalier. La PME s’accorde en interne une certaine souplesse sur la détermination précise de la qualification de son personnel en procédant de la manière suivante:
- Chaque personne possède a priori une qualification de base.
- A chaque intervention il est possible de réajuster la qualification. La qualification d’intervention est déterminée pour un contrat donné.

# Sujet 2 : Examens

- Les Examens nationaux sont gérés par l'Inspection Académique et
concernent les élèves de cette académie. Les élèves doivent
obligatoirement remplir un dossier d'inscription numéroté avant le 31 décembre de l'année scolaire en cours. Ce dossier comprend le nom, la date de naissance, l’établissement de l’élève et le nom de l'examen. Un établissement est défini par son code, son nom, son adresse et la ville.

- Chaque examen, comprend une série d'épreuves qui lui est propre, chacune dotée d'un coefficient. Chaque épreuve d'examen se déroule donc à la même date dans toute l’académie.donc à la même date dans toute l’académie.

- La gestion de ces examens comprend aussi la convocation d'une dizaine d'enseignants de l'académie à la commission de rédaction du sujet de chaque épreuve. Cette commission se réunit à l'inspection académique au plus tard 2 mois avant la date de l'épreuve. Les corrections ont lieu le lendemain de l'épreuve. Un enseignant est connu par son matricule, son nom, son téléphone, adresse, ville et son établissement.

- La centralisation des notes de l'élève est faite sur un bordereau transmis au jury chargé d'examiner l'admission définitive du candidat.

# Sujet 3 : Appel d’offre

- Quand le service production souhaite trouver un fournisseur pour un nouveau produit, il fait une demande auprès du service achats. Celui-ci crée le produit et saisit les caractéristiques du produit puis des caractéristiques de l’appel d’offres : N° offre, Date offre, Date clôture offre, Quantité du produit dans l’offre, N° Produit et nom du produit. L’appel d’offres est lancé généralement par voie de presse spécialisée.

- Le service achat reçoit alors régulièrement des offres fermes de fournisseurs. Dés réception de ces offres les caractéristiques du fournisseur sont saisies dans une table
fournisseur (N°, nom, Adresse, CP, Ville).

- Quand la date de dépouillement de l’appel d’offre est atteinte, et si des offres fermes ont été reçues, le service achats examine ces offres.

- Le service achats choisit la meilleure proposition (qui n’est pas forcément la moins• Le service achats choisit la meilleure proposition (qui n’est pas forcément la moins chère, car il tient compte aussi de la réputation du fournisseur) et informe le
directeur d’usine du fournisseur choisi parmi la liste des fournisseurs possibles.

- Après accord de celui-ci (dans le cas contraire, le service des achats fait une autre proposition au directeur d’usine que nous ne traiterons pas dans l’exercice), le service achats informe les candidats à l’appel d’offres par une lettre de refus ou par une lettre d’acceptation accompagné d’un contrat à signer pour le fournisseur choisi. Les caractéristique du contrat sont saisit dans une table contrat où on trouve le Numéro du contrat, la date du contrat, Quantité négociée et une signature d’acceptation ou de refus.

- Le service achat informe alors le service production du choix du fournisseur. Le produit est alors disponible à la commande. Ceci se traduit par une saisie du prix unitaire du produit dans la table produit.
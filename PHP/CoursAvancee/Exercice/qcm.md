# Exercice : un système de QCM

## Description :
Vous aurez besoin de trois classes :
- Qcm
- Question
- Reponse

Je vous le rappelle, aucune de ces trois classes ne doit hériter d'une autre : on ne peut parler d'héritage exclusivement quand, avec une classe A et B, on peut dire que B est un A. Or ici une réponse n'est pas une question, une question n'est pas un Qcm.

## Fonctionnalités requises
- Ajouter une question
    - Pouvoir ajouter les réponses possibles à une question ;
    - Pouvoir définir la bonne réponse comme telle ;
- Pouvoir définir les explications de la correction d'une question.
- Pouvoir définir plusieurs appréciations en fonction de la note (sur vingt) obtenue ;


À la fin, il doit être possible de faire ceci pour générer un Qcm :

```php	
<?php
$qcm = new Qcm();
 
$question1 = new Question('Et paf, ça fait ...');
$question1->ajouterReponse(new Reponse('Des mielpops'));
$question1->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE));
$question1->ajouterReponse(new Reponse('Des actimels'));
$question1->setExplications('Et oui, la célèbre citation est « Et paf, ça fait des chocapics ! »');
$qcm->ajouterQuestion($question1);
 
$question2 = new Question('POO signifie');
$question2->ajouterReponse(new Reponse('Php Orienté Objet'));
$question2->ajouterReponse(new Reponse('ProgrammatiOn Orientée'));
$question2->ajouterReponse(new Reponse('Programmation Orientée Objet', Reponse::BONNE_REPONSE));
$question2->setExplications('Sans commentaires si vous avez eu faux :-°');
$qcm->ajouterQuestion($question2);
 
$qcm->setAppreciation(array('0-10' => 'Pas top du tout ...',
                            '10-20' => 'Très bien ...'));
$qcm->generer();
```

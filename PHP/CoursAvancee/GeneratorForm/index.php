<?php
include 'Form.php';

// On instancie le formulaire
$form = new Form();

// On ajoute chacune des parties qui nous intéressent
$form->debutForm()
    ->ajoutLabelFor('email', 'Email')
    ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
    ->ajoutLabelFor('password', 'Mot de passe')
    ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
    ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
    ->finForm();

$loginForm = $form->create();
echo $loginForm;

if (Form::validate($_POST, ['email', 'password'])) {
    var_dump("ajout d'annonce");
}

/* ------------------------------------------------------ */

class FormCitation
{
    static function buildAddCitation(): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'add')
            ->ajoutLabelFor('citation', 'Citation')
            ->ajoutInput('text', 'citation', ['id' => 'citation', 'class' => 'form-control'])
            ->ajoutLabelFor('auteur', 'Auteur')
            ->ajoutInput('text', 'auteur', ['id' => 'auteur', 'class' => 'form-control'])
            ->ajoutBouton('Ajouter', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }
}

$formCitation = FormCitation::buildAddCitation();
echo $formCitation->create();
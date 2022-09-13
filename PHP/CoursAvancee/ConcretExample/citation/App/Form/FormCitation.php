<?php

namespace App\Form;

use App\Service\Form;

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

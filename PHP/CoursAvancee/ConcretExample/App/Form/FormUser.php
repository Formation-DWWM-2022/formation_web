<?php

namespace App\Form;

use App\Entity\Sport;
use App\Entity\User;
use App\Service\Form;
use App\Service\Token;

class FormUser
{
    static function buildLoginUser(): Form
    {
        $form = new Form();
        $form->debutForm()
            ->ajoutLabelFor('design', 'Design')
            ->ajoutInput('text', 'design', ['id' => 'design', 'class' => 'form-control'])
            ->ajoutBouton('Ajouter', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }

    static function buildRegisterUserForm(): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'user/register')
            ->ajoutLabelFor('mail', 'Mail')
            ->ajoutInput('email', 'mail', ['id' => 'mail', 'class' => 'form-control'])
            ->ajoutBouton('Envoi', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }

    static function buildNewPasswordUserForm(): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT.'user/new-password')
            ->ajoutLabelFor('password_current', 'Current Password')
            ->ajoutInput('password', 'password_current', ['id' => 'password_current', 'class' => 'form-control'])
            ->ajoutLabelFor('password_new', 'New Password')
            ->ajoutInput('password', 'password_new', ['id' => 'password_new', 'class' => 'form-control'])
            ->ajoutLabelFor('password_new_again', 'New Password Again')
            ->ajoutInput('password', 'password_new_again', ['id' => 'password_new_again', 'class' => 'form-control'])
            ->ajoutInput('hidden', 'token', ['id' => 'hidden', 'class' => 'form-control', 'value' => Token::generate()])
            ->ajoutBouton('Change Password', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }

    public static function buildDeleteFormWithUser(User $user) : Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'admin/user/delete/' . $user->getId())
            ->ajoutBouton('Delete', ['class' => 'btn btn-danger'])
            ->finForm();
        return $form;
    }

    public static function buildUpdateFormWithUser(User $user): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'admin/user/update/' . $user->getId())
            ->ajoutLabelFor('nom', 'Nom')
            ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control', 'value' => $user->getNom()])
            ->ajoutBouton('Modifier', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }
}

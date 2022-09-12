<?php

namespace App\Form;

use App\Entity\Departement;
use App\Entity\Sport;
use App\Entity\User;
use App\Repository\SportRepository;
use App\Service\Form;
use App\Service\Token;

class FormUser
{
    static function buildRegisterForm(array $sports, array $niveau): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'user/register')
            ->ajoutLabelFor('nom', 'Nom')
            ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control'])
            ->ajoutLabelFor('prenom', 'Prénom')
            ->ajoutInput('text', 'prenom', ['id' => 'prenom', 'class' => 'form-control'])
            ->ajoutLabelFor('departement', 'Département')
            ->ajoutSelect('departement', Departement::getDepartement(), ['id' => 'departement', 'class' => 'form-control'])
            ->ajoutLabelFor('mail', 'Mail')
            ->ajoutInput('email', 'mail', ['id' => 'mail', 'class' => 'form-control'])
            ->ajoutLabelFor('sport', 'Sport')
            ->ajoutSelect('sport', $sports, ['id' => 'sport', 'class' => 'form-control'])
            ->ajoutLabelFor('niveau', 'Niveau')
            ->ajoutSelect('niveau', $niveau, ['id' => 'niveau', 'class' => 'form-control'])
            ->ajoutBouton('Envoi', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }

    static function buildLoginUserForm(): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'user/login')
            ->ajoutLabelFor('mail', 'Mail')
            ->ajoutInput('email', 'mail', ['id' => 'mail', 'class' => 'form-control'])
            ->ajoutBouton('Envoi', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }

    static function buildNewPasswordUserForm(): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'user/new-password')
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

    public static function buildDeleteFormWithUser(User $user): Form
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

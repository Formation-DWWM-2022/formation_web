<?php

namespace App\Controller\Back;

use App\Entity\User;
use App\Form\FormUser;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\ViewBack;
use App\Validator\Validation;

class UserController
{
    use ViewBack;

    private IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function invoke(): string
    {
        return $this->render(
            SITE_NAME . ' - User',
            'back/pages/user/index.php',
            [
                'users' => $this->userRepository->findAll()
            ]);
    }

    public function getUserById($params)
    {
        $user = $this->userRepository->findById($params);
        return $this->render(
            SITE_NAME . ' - User: ' . $user->getNom(),
            'back/pages/user/show.php',
            [
                'formDeleteUser' => FormUser::buildDeleteFormWithUser($user),
                'formUser' => FormUser::buildUpdateFormWithUser($user),
                'Users' => $this->userRepository->findAll()
            ]);
    }

    public function deleteUserById($params)
    {
        $user = $this->userRepository->findById($params);
        $this->userRepository->remove($user);
        Redirect::to('admin/user');
    }

    public function updateUserById($params)
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('nom')->value(Input::get('nom'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $user = $this->userRepository->findById($params);
                $user->setNom(Input::get('nom'));
                $this->userRepository->update($user);
                Redirect::to('admin/user');
            }
        }
    }

    public function addUser()
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('nom')->value(Input::get('nom'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $nom = Input::get('nom');
                $user = new User($nom);
                $this->userRepository->add($user);
                Redirect::to('admin/user');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - Add User: ',
                'back/pages/user/new.php',
                [
                    'formUser' => FormUser::buildRegisterUserForm(),
                ]);
        }
    }
}

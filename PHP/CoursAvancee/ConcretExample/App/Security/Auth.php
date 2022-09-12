<?php

namespace App\Security;

use App\Entity\User;
use App\Form\FormUser;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\Session;
use App\Service\Token;
use App\Service\View;
use App\Validator\Validation;
use Exception;

class Auth
{
    use View;

    private IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    static function isLogin()
    {

    }

    function getUpdatePassword()
    {
        return $this->render(
            SITE_NAME . ' - New Password',
            'front/pages/new-password.php',
            [
                'formUser' => FormUser::buildNewPasswordUserForm()
            ]);
    }

    function postUpdatePassword(): string
    {
        var_dump($_POST);
        return 'New Password';
    }

    function getRegister(): string
    {
        return $this->render(
            SITE_NAME . ' - Register',
            'front/pages/register.php',
            [
                'formUser' => FormUser::buildRegisterUserForm()
            ]);
    }

    function postRegister(): void
    {
        if (Input::exists()) {
            $val = new Validation();
            $val->name('mail')->value(Input::get('mail'))->required();
            if ($val->isSuccess() && Validation::is_email(Input::get('mail'))) {
                var_dump($_POST);
                $user = $this->userRepository->findByMail(Input::get('mail'));
                if ($user) {
                    Session::addMessage('success', 'You have been login successfully ! ' . $user->getNom());
                } else {
                    $user = new User(Input::get('mail'));
                    try {
                        $this->userRepository->add($user);
                        Session::addMessage('success', 'You have been registered and can now log in!');
                        Redirect::to('/');
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                }
            } else {
                foreach ($val->getErrors() as $error) {
                    Session::addMessage('error', $error);
                }
            }
        }
        Redirect::to('/');
    }
}

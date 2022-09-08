<?php

namespace App\Security;

use App\Entity\User;
use App\Form\FormUser;
use App\Repository\IUserRepository;
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

    public function __construct(IUserRepository  $userRepository)
    {
        $this->userRepository = $userRepository;
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
            if (Token::check(Input::get('token'))) {
                $val = new Validation;
                $val->name('mail')->value(Input::get('name'))->pattern('email')->required();
                if ($val->isSuccess()) {
                    $user = new User();
                    try {
                        $this->userRepository->add($user);
                        Session::addMessage('success', 'You have been registered and can now log in!');
                        Redirect::to('/');
                    } catch(Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    foreach ($val->getErrors() as $error) {
                        Session::addMessage('error', $error);
                    }
                }
            }
        }
        Redirect::to('/');
    }
}

<?php

namespace App\Security;

use App\Entity\Niveau;
use App\Entity\Pratique;
use App\Entity\Sport;
use App\Entity\User;
use App\Form\FormSport;
use App\Form\FormUser;
use App\Repository\IPratiqueRepository;
use App\Repository\ISportRepository;
use App\Repository\IUserRepository;
use App\Repository\PratiqueRepository;
use App\Repository\SportRepository;
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
    private ISportRepository $sportRepository;
    private IPratiqueRepository $pratiqueRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->sportRepository = new SportRepository();
        $this->pratiqueRepository = new PratiqueRepository();
    }

    function getRegister(): string
    {
        $sports = $this->sportRepository->fetchAllForSelect();
        $niveau = Niveau::getNiveau();
        return $this->render(
            SITE_NAME . ' - New Register',
            'front/pages/register.php',
            [
                'formSport' => FormSport::buildCreateFormInUserRegister(),
                'formUser' => FormUser::buildRegisterForm($sports, $niveau)
            ]);
    }

    public function addSport()
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $design = Input::get('design');
                $sport = new Sport($design);
                try {
                    $found = $this->sportRepository->findByDesign(Input::get('design'));
                    Session::addMessage('danger', 'Sport found in database');
                } catch (Exception $e) {
                    $this->sportRepository->add($sport);
                    Session::addMessage('success', 'Sport added successfully');
                }
            }
        }
        Redirect::to('user/register');
    }

    function postLogin(): void
    {
        if (Input::exists()) {
            $val = new Validation();
            $val->name('mail')->value(Input::get('mail'))->required();
            if ($val->isSuccess() && Validation::is_email(Input::get('mail'))) {
                $user = $this->userRepository->findByMail(Input::get('mail'));
                if ($user) {
                    Session::addMessage('success', 'You have been login successfully ! ' . $user->getNom());
                    Session::put(SESSION_NAME, $user->getId());
                } else {
                    Redirect::to('user/register');
                }
            } else {
                foreach ($val->getErrors() as $error) {
                    Session::addMessage('error', $error);
                }
            }
        }
        Redirect::to('/');
    }


    function getUpdatePassword(): string
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

    public function postRegister()
    {
        if (Input::exists()) {
            $val = new Validation();
            $val->name('nom')->value(Input::get('nom'))->pattern('alpha')->required();
            $val->name('prenom')->value(Input::get('prenom'))->pattern('alpha')->required();
            $val->name('departement')->value(Input::get('departement'))->pattern('alphanum')->required();
            $val->name('mail')->value(Input::get('mail'))->required();
            $val->name('sport')->value(Input::get('sport'))->pattern('int')->required();
            $val->name('niveau')->value(Input::get('niveau'))->pattern('alpha')->required();
            if ($val->isSuccess() && Validation::is_email(Input::get('mail'))) {
                $user = $this->userRepository->findByMail(Input::get('mail'));
                if ($user) {
                    Session::addMessage('danger', 'User found in database');
                } else {
                    $user = new User(Input::get('mail'));
                    $user->setNom(Input::get('nom'));
                    $user->setPrenom(Input::get('prenom'));
                    $user->setDepartement(Input::get('departement'));
                    try {
                        $user = $this->userRepository->add($user);
                        $pratique = new Pratique($user->getId(), (int)Input::get('sport'), Input::get('niveau'));
                        $this->pratiqueRepository->add($pratique);
                        Session::addMessage('success', 'You have been registered and can now log in! ' . $user->getMail());
                        Redirect::to('/');
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                }
            } else {
                foreach ($val->getErrors() as $error) {
                    Session::addMessage('danger', $error);
                }
            }
        }
        Redirect::to('/');
    }

    public static function isAuthenticated(): bool
    {
        return false;
    }
}

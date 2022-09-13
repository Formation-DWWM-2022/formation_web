<?php
include_once 'User.php';
include_once 'IUserRepository.php';
include_once 'UserRepository.php';

class UserController
{
    private UserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function addUser($params)
    {
        $user = new User($params['username'], $params['password']);
        $this->userRepository->add($user);
    }

    public function getUser($params): User
    {
        return $this->userRepository->findByUsername($params['username']);
    }

    public function changePassword($params)
    {
        $user = $this->getUser($params);
        $user->changePassword($params['oldPassword'], $params['newPassword']);
        $this->userRepository->update($user);
    }
}

<?php
include_once 'IUserRepository.php';

class UserRepository implements IUserRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(User $user)
    {
        $stmt = $this->connection->prepare("INSERT INTO user (username, password, first_name, last_name) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getFirstName(), $user->getLastname()]);
        $stmt = null;
    }

    public function findByUsername($username): User
    {
        $stmt = $this->connection->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $arr = $stmt->fetch();
        if (!$arr) {
            exit('No rows');
        }
        $stmt = null;

        $user = new User($arr['username'], $arr['password']);
        $user->setId($arr['id']);
        $user->setFirstName($arr['first_name']);
        $user->setLastName($arr['last_name']);
        return $user;
    }

    public function update(User $user)
    {
        $stmt = $this->connection->prepare("UPDATE user SET password=?");
        $stmt->execute([$user->getPassword()]);
        $stmt = null;
    }

    public function remove(User $user)
    {
        // Create prepared statement for DELETE
    }
}

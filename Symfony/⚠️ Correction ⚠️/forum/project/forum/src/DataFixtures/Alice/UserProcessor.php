<?php

/*
 * (c) Benjamin Georgeault <https://www.drosalys-web.fr/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures\Alice;

use App\Entity\User;
use Fidry\AliceDataFixtures\ProcessorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class UserProcessor
 *
 * @author Benjamin Georgeault
 */
class UserProcessor implements ProcessorInterface
{

    private UserPasswordHasherInterface $encoder;

    /** @var string[] */
    private array $encodedPasswords;

    /**
     * UserProcessor constructor.
     * @param UserPasswordHasherInterface $encoder
     */
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
        $this->encodedPasswords = [];
    }

    /**
     * @inheritDoc
     */
    public function preProcess(string $id, $object): void
    {
        if (!$object instanceof User) {
            return;
        }

        if (null !== $password = $object->getPassword()) {
            $object->setPassword($this->encodePassword($password));
        }
    }

    /**
     * @param string $password
     * @return string
     */
    private function encodePassword(string $password): string
    {
        if (!array_key_exists($password, $this->encodedPasswords)) {
            $this->encodedPasswords[$password] = $this->encoder->hashPassword(new User(), $password);
        }

        return $this->encodedPasswords[$password];
    }

    public function postProcess(string $id, object $object): void
    {
        // TODO: Implement postProcess() method.
    }
}

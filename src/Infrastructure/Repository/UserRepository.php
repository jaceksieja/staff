<?php

namespace App\Infrastructure\Repository;

use App\Domain\User\Model\UserInterface;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Infrastructure\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(UserInterface $user): UserInterface
    {
        $this->_em->persist($user);

        return $user;
    }

    public function findById(string $id): ?UserInterface
    {
        return $this->find($id);
    }

    public function findByLoginCanonical(string $login): ?UserInterface
    {
        return $this->findOneBy(['loginCanonical' => $login]);
    }
}

<?php

namespace App\Infrastructure\Entity;

use App\Domain\User\Model\Position;
use App\Domain\User\Model\UserInterface;
use App\Infrastructure\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'app_user')]
class User extends \App\Application\Model\User  implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?string $id = null;

    #[ORM\Column(length: 255)]
    protected string $login;

    #[ORM\Column(length: 255, unique: true)]
    protected string $loginCanonical;

    #[ORM\Column(length: 255)]
    protected string $password;

    #[ORM\Column(type: 'string', enumType: Position::class)]
    protected Position $position;

    #[ORM\Column(length: 255)]
    protected string $phoneNumber;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $reqresInId = null;

    public function getId(): ?string
    {
        return $this->id;
    }
}

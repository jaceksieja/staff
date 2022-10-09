<?php

namespace App\Tests\Application\Validation;

use App\Application\Canonicalizer;
use App\Application\Validation\UniqueLoginValidatorConstraint;
use App\Domain\User\Model\UserInterface;
use App\Infrastructure\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Application\Validation\UniqueLoginValidatorConstraint
 */
class UniqueLoginValidatorConstraintTest extends TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testValidationScenarios(mixed $login, bool $expectedResult): void
    {
        $repository = $this->createMock(UserRepository::class);
        $user = $this->createMock(UserInterface::class);

        $repository->method('findByLoginCanonical')->willReturnCallback(
            static function ($value) use ($user) {
                return match ($value) {
                    'loginexists' => $user,
                    'loginnotexists' => null,
                };
            }
        );
        $constraint = new UniqueLoginValidatorConstraint(
            $repository,
            new Canonicalizer()
        );
        $result = ($constraint)($login);

        self::assertEquals($expectedResult, $result);
    }

    public function scenarios(): \Generator
    {
        yield ['loginNotExists', true];
        yield ['loginExists', false];
    }
}

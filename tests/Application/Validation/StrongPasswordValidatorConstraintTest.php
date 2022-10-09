<?php

namespace App\Tests\Application\Validation;

use App\Application\Validation\StrongPasswordValidatorConstraint;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Application\Validation\StrongPasswordValidatorConstraint
 */
class StrongPasswordValidatorConstraintTest extends TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testValidationScenarios(mixed $password, bool $expectedResult): void
    {
        $constraint = new StrongPasswordValidatorConstraint();
        $result = ($constraint)($password);

        self::assertEquals($expectedResult, $result);
    }

    public function scenarios(): \Generator
    {
        yield ['Zaq1@wsx', true];
        yield ['Zaq1@ws', false];
        yield ['qwertyuiop', false];
    }
}

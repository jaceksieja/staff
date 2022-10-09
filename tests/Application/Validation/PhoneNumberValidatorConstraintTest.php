<?php

namespace App\Tests\Application\Validation;

use App\Application\Validation\PhoneNumberValidatorConstraint;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Application\Validation\PhoneNumberValidatorConstraint
 */
class PhoneNumberValidatorConstraintTest extends TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testValidationScenarios(mixed $number, bool $expectedResult): void
    {
        $constraint = new PhoneNumberValidatorConstraint();
        $result = ($constraint)($number);

        self::assertEquals($expectedResult, $result);
    }

    public function scenarios(): \Generator
    {
        yield ['+48 123 456 789', true];
        yield ['+48 123456789', false];
        yield ['+48123456789', false];
        yield ['+55123456789', false];
        yield ['+55 123', false];
        yield ['48 123 456 789', false];
        yield [null, false];
        yield [123, false];
    }
}

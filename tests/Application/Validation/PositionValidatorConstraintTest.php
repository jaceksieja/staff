<?php

namespace App\Tests\Application\Validation;

use App\Application\Validation\PositionValidatorConstraint;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Application\Validation\PositionValidatorConstraint
 */
class PositionValidatorConstraintTest extends TestCase
{
    /**
     * @dataProvider scenarios
     */
    public function testValidationScenarios(mixed $position, bool $expectedResult): void
    {
        $constraint = new PositionValidatorConstraint();
        $result = ($constraint)($position);

        self::assertEquals($expectedResult, $result);
    }

    public function scenarios(): \Generator
    {
        yield ['developer', true];
        yield ['DEVELOPER', true];
        yield ['CEO', false];
    }
}

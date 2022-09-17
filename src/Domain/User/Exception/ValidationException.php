<?php

namespace App\Domain\User\Exception;

class ValidationException extends \DomainException
{
    public function __construct(
        array $details
    ) {
        parent::__construct('Validation exception');
    }
}

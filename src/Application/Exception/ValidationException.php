<?php

namespace App\Application\Exception;

class ValidationException extends \DomainException
{
    public function __construct(
        private array $details
    ) {
        parent::__construct('Validation exception.');
    }

    public function getDetails(): array
    {
        return $this->details;
    }
}

<?php

namespace App\Application\Integration\ReqresIn\EmailResolver;

class LoginToEmailTransformer implements EmailResolverInterface
{
    public const EMAIL_DOMAIN = 'company.com';

    public function __invoke(string $login): string
    {
        return sprintf('%s@%s', $login, self::EMAIL_DOMAIN);
    }
}

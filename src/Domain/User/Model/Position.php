<?php

namespace App\Domain\User\Model;

enum Position: string
{
    case DEVELOPER = 'developer';
    case HR = 'hr';
    case MANAGER = 'manager';
    case TESTER = 'tester';
}

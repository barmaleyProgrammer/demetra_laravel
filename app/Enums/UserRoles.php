<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum UserRoles: string
{
    use EnumTrait;

    case ADMIN = 'admin';

    case EDITOR = 'editor';

    case USER = 'user';
}

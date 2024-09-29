<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use Illuminate\Support\Facades\Auth;
final class RoleEnum extends Enum
{
    const ADMINISTRATOR = 'Administrator';
    const USER = 'User';

    public static function roles()
    {
        $roles = [
            'Administrator',
            'User',
        ];
        return $roles;
    }
}

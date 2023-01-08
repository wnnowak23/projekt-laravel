<?php

namespace App\Enums;

class UserRole 
{
        const ADMIN = 'admin';
        const USER = 'user';
        const MODERATOR = 'moderator';

        const TYPES = [
            self::ADMIN,
            self::USER,
            self::MODERATOR,

        ];

}
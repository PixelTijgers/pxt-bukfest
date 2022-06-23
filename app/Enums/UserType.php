<?php

// Enum Namespacing.
namespace App\Enums;

enum UserType: string
{

    // Here we define the user types.
    case SuperAdmin = 'superadmin';
    case Admin = 'admin';
    case Moderator = 'moderator';
    case Editor = 'editor';
    case User = 'user';
    case Demo = 'demo';
}

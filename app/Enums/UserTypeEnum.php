<?php

namespace App\Enums;

enum UserTypeEnum: string
{
    case Admin = 'admin';
    case Organization = 'organization';
}

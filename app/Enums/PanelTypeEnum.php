<?php


namespace App\Enums;

/**
 * Enum create for especification type users in seeders, factories and method canAccessPanel User model
*/
enum PanelTypeEnum: string
{
    case ADMIN  =   "admin";
    case APP    =   "app";
}

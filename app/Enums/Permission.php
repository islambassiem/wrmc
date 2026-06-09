<?php

declare(strict_types=1);

namespace App\Enums;

enum Permission: string
{
    case CATEGORY_CREATE = 'create_category';
    case CATEGORY_UPDATE = 'update_category';
    case CATEGORY_DELETE = 'delete_category';
}

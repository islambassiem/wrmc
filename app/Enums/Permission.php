<?php

declare(strict_types=1);

namespace App\Enums;

enum Permission: string
{
    case CATEGORY_VIEW_ALL = 'view_all_category';
    case CATEGORY_CREATE = 'create_category';
    case CATEGORY_UPDATE = 'update_category';
    case CATEGORY_DELETE = 'delete_category';

    case POST_CREATE = 'create_post';
    case POST_UPDATE = 'update_post';
    case POST_DELETE = 'delete_post';
}

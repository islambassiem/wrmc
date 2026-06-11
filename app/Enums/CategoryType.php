<?php

declare(strict_types=1);

namespace App\Enums;

enum CategoryType: string
{
    case POST = 'post';
    case SERVICE = 'service';
}

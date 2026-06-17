<?php

namespace App\Models;

use App\Enums\PostStatus;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'title',
    'slug',
    'body',
    'status',
    'created_by',
    'updated_by',
])]
/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $status
 * @property int $created_by
 * @property int $updated_by
 */
class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    public function casts(): array
    {
        return [
            'status' => PostStatus::class,
            'body' => 'string',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

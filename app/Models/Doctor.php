<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\DoctorFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'slug',
    'title',
    'email',
    'mobile_phone',
    'office_phone',
    'bio',
    'image',
    'education',
    'board_certifications',
    'field_of_expertise',
    'years_of_experience',
    'quote',
    'created_by',
    'updated_by',
])]
/**
 * @property int $id
 */
class Doctor extends Model
{
    /** @use HasFactory<DoctorFactory> */
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'joining_date' => ['nullable', 'date'],
            'resignation_date' => ['nullable', 'date'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'mobile_phone' => ['nullable', 'string', 'max:255'],
            'office_phone' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'image', 'mimetypes:image/png,image/jpeg,image/webp', 'max:2048'],
            'education' => ['nullable', 'string', 'max:255'],
            'board_certifications' => ['nullable', 'string', 'max:255'],
            'field_of_expertise' => ['nullable', 'string', 'max:255'],
            'years_of_experience' => ['nullable', 'integer'],
            'quote' => ['nullable', 'string', 'max:255'],
        ];
    }
}

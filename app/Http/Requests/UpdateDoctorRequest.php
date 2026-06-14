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
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile_phone' => ['required', 'string', 'max:255'],
            'office_phone' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string'],
            'image' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
            'board_certifications' => ['required', 'string', 'max:255'],
            'field_of_expertise' => ['required', 'string', 'max:255'],
            'years_of_experience' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:255'],
        ];
    }
}

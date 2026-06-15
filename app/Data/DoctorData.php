<?php

declare(strict_types=1);

namespace App\Data;

use Carbon\CarbonImmutable;
use Illuminate\Http\UploadedFile;

class DoctorData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public ?string $title,
        public ?string $email,
        public ?CarbonImmutable $joining_date,
        public ?CarbonImmutable $resignation_date,
        public ?string $mobile_phone,
        public ?string $office_phone,
        public ?string $bio,
        public ?UploadedFile $image,
        public ?string $education,
        public ?string $board_certifications,
        public ?string $field_of_expertise,
        public ?int $years_of_experience,
        public ?string $quote,

    ) {
        //
    }
}

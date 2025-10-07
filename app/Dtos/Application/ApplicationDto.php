<?php

namespace App\Dtos\Application;

use Propaganistas\LaravelPhone\PhoneNumber;
use App\Http\Requests\EndUser\Application\ApplicationRequest;

final readonly class ApplicationDto
{
    public function __construct(
        public string $contactEmail,
        public PhoneNumber $contactPhone,
        public string $birthDate,
        public string $gender,
        public string $country,
        public ?string $comments,
        public array $files
    ) {
    }

    public static function fromRequest(ApplicationRequest $request): self
    {
        return new self(
            contactEmail: $request->post('contact_email'),
            contactPhone: new PhoneNumber($request->post('contact_phone')),
            birthDate: $request->post('birth_date'),
            gender: $request->post('gender'),
            country: $request->post('country'),
            comments: $request->post('comments'),
            files: $request->file('files', []),
        );
    }
}

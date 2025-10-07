<?php

namespace App\Http\Requests\EndUser\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File as FileRule;
use Illuminate\Validation\Rule;
use App\Enums\Gender;

class ApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // ---------------  \\
            'contact_email' => "required|email",
            'contact_phone' => "required|numeric|phone:LENIENT",
            // ---------------  \\
            'birth_date' => "required|date",
            'gender' => ["required", Rule::enum(Gender::class)],
            // ---------------  \\
            'country' => "required|string|max:120",
            'comments' => "nullable|string|max:100",
            // ---------------  \\
            'files' => "nullable|array|max:10",
            'files.*' => [
                'required',
                'file',
                FileRule::types(['jpg', 'jpeg', 'png', 'webp', 'pdf'])->max('5mb')
            ],
        ];
    }
}



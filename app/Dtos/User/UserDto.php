<?php

namespace App\Dtos\User;

use App\Http\Requests\EndUser\Auth\RegisterRequest;

final readonly class UserDto{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ){}
    public static function fromRegisterRequest(RegisterRequest $request): self
    {
        return new self(
            $request->name,
            $request->email,
            $request->password,
        );
    }
}
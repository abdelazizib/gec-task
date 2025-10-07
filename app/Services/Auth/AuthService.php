<?php


namespace App\Services\Auth;

use App\Models\User;
use App\Dtos\User\UserDto;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    // ---------------  \\
    public function __construct(
        private readonly User $userModel
    ) {
    }
    // ---------------  \\
    public function register(UserDto $data)
    {
        return $this->userModel->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
        ]);
    }
    // ---------------  \\
    public function login($email, $password): bool
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }
}
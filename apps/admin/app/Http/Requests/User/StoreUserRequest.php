<?php

declare(strict_types=1);

namespace App\Admin\Http\Requests\User;

use App\Common\Models\User;
use App\Common\Traits\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreUserRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:200'],
            'last_name' => ['nullable', 'string', 'max:200'],
            'email' => ['required', Rule::email(), Rule::unique(User::class, 'email')],
            'password' => $this->passwordRules(),
        ];
    }
}

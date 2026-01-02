<?php

declare(strict_types=1);

namespace App\Admin\Http\Requests\Auth;

use App\Common\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

final class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            /** @example admin@admin.com */
            'email' => ['required', 'string', 'email', Rule::exists(User::class, 'email')],
            /** @example admin123 */
            'password' => ['required', 'string'],
        ];
    }



    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            $email = $this->string('email');
            $password = $this->string('password');
            $user = User::query()->where('email', $email)->first();

            if ($user === null || ! Hash::check($password, $user->password)) {
                $validator->errors()->add('email', 'EmailHandlerInvalid');
            }
        });
    }
}

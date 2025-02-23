<?php

namespace App\Http\Requests\Tenant\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Closure;

final class ProfilePasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password_current' => ['required', 'min:4', 
                function (string $attribute, mixed $value, Closure $fail) {
                    $isPasswordCurrent = Hash::check($value, auth()->user()->password);

                    if (! $isPasswordCurrent) {
                        $fail('A senha atual <strong>não é válida!</strong>');
                    }
                },
            ],
            'new_password' => ['required', 'min:4', 'max:191',
                function (string $attribute, mixed $value, Closure $fail) {
                    $isEqualPasswordCurrent = Hash::check($value, auth()->user()->password);
                    if ($isEqualPasswordCurrent) {
                        $fail('A nova senha <strong>não pode ser igual</strong> a senha atual.');
                    }
                },
            ],
            'new_password_confirmation' => [
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($this->new_password !== $this->new_password_confirmation) {
                        $fail('A nova senha informada e a senha de confirmação <strong>não conferem!</strong>');
                    }
                },
            ],
        ];
    }

    public function attributes(): array
    {
       return [
           'password_current' => '<strong>senha atual</strong>',
           'new_password' => '<strong>nova senha</strong>',
       ];
    }

    public function message(): string
    {
        return 'Senha <strong>atualizada</strong> com sucesso!';
    }
}

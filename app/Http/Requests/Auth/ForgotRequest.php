<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class ForgotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'messageSuccess' => ['nullable', 'max:191'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'messageSuccess' => 'A redefinição de senha foi enviada para o seu endereço de email',
            'messageError' => 'E-mail não encontrado!',
        ]);
    }

    public function error(): RedirectResponse
    {
        return redirect()
            ->route('forgot.password')
            ->withInput($this->all())
            ->withError('E-mail não encontrado!');
    }

    public function success(): RedirectResponse
    {
        return redirect()
            ->route('forgot.password')
            ->withSuccess('A redefinição de senha foi enviada para o seu endereço de email');
    }
}

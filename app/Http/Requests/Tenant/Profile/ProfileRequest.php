<?php

namespace App\Http\Requests\Tenant\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

final class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'max:191'],
            'phone' => ['nullable', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id()), 'max:191'],
            'avatar' => ['nullable', File::image()->max('200kb')],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '<strong>nome</strong>',
            'phone' => '<strong>nº de contato</strong>',
            'email' => '<strong>email</strong>',
            'avatar' => '<strong>foto de perfil</strong>',
        ];
    }

    public function payload(): array
    {
        $data = [
            'name' => trim(mb_strtoupper($this->name)),
            'email' => trim(mb_strtolower($this->email)),
            'phone' => $this->phone,
        ];

        if ($this->hasFile('avatar')) {
            $user = Auth::user();
            $path = 'professionals';
            $fileName = Str::random(32).'.'.$this->avatar->extension();
            $filePath = $this->avatar->storeAs($path, $fileName, 'public');

            if ($this->has('avatar') && $user->profile_photo) {
                Storage::delete($user->profile_photo);
            }

            $data['profile_photo'] = $filePath;
        }
    
        return $data;
    }

    public function message(): string
    {
        return "Perfil <strong>atualizado</strong> com sucesso!";
    }
}

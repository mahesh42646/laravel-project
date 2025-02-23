<?php

namespace App\Http\Requests\Tenant\Professional;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

final class ProfessionalRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'name' => ['required', 'max:191'],
                'cpf' => ['required', 'max:50'],
                'nickname' => ['required', 'max:100'],
                'gender_id' => ['required', 'integer'],
                'schooling_id' => ['nullable', 'integer'],
                'occupation_id' => ['nullable', 'integer'],
                'phone' => ['required', 'max:50'],
                'role_id' => ['required', 'integer'],
                'email' => ['required', 'max:100',
                    Rule::unique('users')->where(
                        fn (Builder $query) => $query->where('tenant_id', session('tenant_id'))
                    ),
                ],
                'avatar' => ['nullable', File::image()->max('200kb')],
            ];
        }

        return [
            'name' => ['required', 'max:191'],
            'cpf' => ['required', 'max:50'],
            'nickname' => ['required', 'max:100'],
            'gender_id' => ['required', 'integer'],
            'schooling_id' => ['nullable', 'integer'],
            'occupation_id' => ['nullable', 'integer'],
            'phone' => ['required', 'max:50'],
            'role_id' => ['required', 'integer'],
            'email' => ['required', 'max:100', 
                Rule::unique('users')
                    ->where(fn (Builder $query) => $query->where('tenant_id', session('tenant_id')))
                    ->ignore($this->professional->id)
            ],
            'avatar' => ['nullable', File::image()->max('200kb')],
            'is_active' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '<strong>nome completo</strong>',
            'cpf' => '<strong>CPF</strong>',
            'nickname' => '<strong>nome social</strong>',
            'gender_id' => '<strong>gênero</strong>',
            'schooling_id' => '<strong>escolaridade</strong>',
            'occupation_id' => '<strong>cargo/função</strong>',
            'phone' => '<strong>telefone</strong>',
            'role_id' => '<strong>perfil de acesso</strong>',
            'email' => '<strong>e-mail</strong>',
            'password' => '<strong>senha</strong>',
            'avatar' => '<strong>foto de perfil</strong>',
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.size' => 'O campo CPF deve conter 11 dígitos',
            'phone.size' => 'O campo telefone deve conter 11 dígitos',
        ];
    }

    public function payload(): array
    {
        $data = [
            'name' => trim(mb_strtoupper($this->name)),
            'cpf' => $this->cpf,
            'nickname' => $this->nickname,
            'gender_id' => $this->gender_id,
            'schooling_id' => $this->schooling_id,
            'occupation_id' => $this->occupation_id,
            'phone' => $this->phone,
            'role_id' => $this->role_id,
            'email' => trim(mb_strtolower($this->email)),
        ];

        if ($this->isMethod('POST')) {
            $data['created_by'] = Auth::id();
            $data['tenant_id'] = session('tenant_id');
        }

        if ($this->isMethod('PUT')) {
            $data['updated_by'] = Auth::id();
            $data['is_active'] = $this->is_active;
        }

        if ($this->avatar) {
            $path = 'professionals/' . date('Y');
            $fileName = Str::random(32).'.'.$this->avatar->extension();
            $filePath = $this->avatar->storeAs($path, $fileName, 'public');

            if ($this->isMethod('PUT') && $this->professional?->profile_photo) {
                Storage::delete($this->professional->profile_photo);
            }

            $data['profile_photo'] = $filePath;
        }

        return $data;
    }

    // protected function prepareForValidation(): void
    // {
    //     $this->merge([
    //         'name' => trim(mb_strtoupper($this->name)),
    //         'role_name' => trim(mb_strtoupper($this->role_name ?: '')),
    //         'email' => trim(mb_strtolower($this->email)),
    //         'created_by' => auth()->id(),
    //     ]);
    // }

    public function message(): string
    {
        return $this->isMethod('POST')
            ? "Profissional <strong class='text-uppercase'>{$this->name}</strong> cadastrado com sucesso!"
            : "Profissional <strong class='text-uppercase'>{$this->name}</strong> alterado com sucesso!";
    }
}

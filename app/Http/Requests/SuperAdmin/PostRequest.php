<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

final class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:191'],
            'content' => ['required', 'max:16000000'],
            'status' => ['required', 'integer'],
            'registered_at' => ['required', 'date'],
            'hour' => ['required', 'size:5'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg,svg,webp', 'max:4048'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'título',
            'content' => 'conteúdo',
            'status' => 'status',
            'registered_at' => 'data da publicação',
            'hour' => 'hora da publicação',
            'image' => 'foto de capa',
        ];
    }

    public function payload(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'content' => $this->input('content'),
                'status' => $this->status,
                'registered_at' => "{$this->registered_at} {$this->hour}:00",
                'image' => $this->getImagePath(),
            ];
        }

        $data = [
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->input('content'),
            'status' => $this->status,
            'registered_at' => "{$this->registered_at} {$this->hour}:00",
        ];
        
        if ($this->image) {
            $data['image'] = $this->getImagePath();
        }

        return $data;
    }

    public function message(): string
    {
        return match (true) {
            $this->isMethod('POST') => "Postagem <strong>CADASTRADA</strong> com sucesso!",
            default => "Postagem <strong>ALTERADA</strong> com sucesso!",
        };
    }

    private function getImagePath(): string
    {
        if ($this->image) {
            $imagePath = $this->image->storeAs(
                path: 'posts/'.date('Y'),
                name: Str::random(32).'.'.$this->image->extension(), 
                options: 'public',
            );

            return $imagePath;
        }

        return '';
    }
}

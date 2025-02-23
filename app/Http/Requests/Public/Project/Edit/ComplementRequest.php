<?php

namespace App\Http\Requests\Public\Project\Edit;

use App\Models\Customer\Customer;
use Illuminate\Foundation\Http\FormRequest;

final class ComplementRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'media_id' => ['required', 'integer'],
                'link' => ['required', 'max:191'],
                'description' => ['required', 'max:191'],
            ];
        }

        return [];
    }

    public function attributes(): array
    {
        return [
            'media_id' => '<strong>tipo de link</strong>',
            'link' => '<strong>link</strong>',
            'description' => '<strong>descrição do link</strong>',
        ];
    }

    public function payload(): array
    {
        return [
            'media_id' => $this->media_id,
            'link' => $this->getUrl(),
            'description' => $this->description,
            'customer_id' => $this->customer_id,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }

    private function getUrl(): string
    {
        $link = $this->link;

        if (! str_contains($link, 'https://')) {
            return "https://{$link}";
        }

        return $link;
    }

    public function updateSessionFromUserAuthenticated(): void
    {
        $customerId = $this->customer_id;
        $customer = Customer::findOrFail($customerId);
        session()->put("customer_auth_{$customerId}", $customer);
    }

    public function message(): string
    {
        return ($this->isMethod('POST')) 
            ? "Mídia social <strong>salva</strong> com sucesso!"
            : "Mídia social <strong>removida</strong> com sucesso!";
    }
}

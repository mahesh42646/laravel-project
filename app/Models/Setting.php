<?php

namespace App\Models;

use App\Http\Requests\Setting\SettingRequest;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'name',
        'cpf',
        'cnpj',
        'phone',
        'photo',
    ];

    // ACCESSORS

    protected function document(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                match (true) {
                    isset($this->cnpj) => "CNPJ: {$this->cnpj}",
                    isset($this->cpf) => "CPF: {$this->cpf}",
                    default => '00.000.000/0001-00',
                }
        );
    }

    protected function logoPath(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                $this->photo 
                    ? asset("storage/{$this->photo}")
                    : asset('assets/images/logo.webp')
        );
    }

    // METHODS

    public static function saveImage(Setting $setting, SettingRequest $request): string|null
    {
        if ($request->hasFile('logo')) {
            $path = 'settings';
            $fileName = Str::random(32).'.'.$request->logo->extension();
            $filePath = $request->logo->storeAs($path, $fileName, 'public');

            if ($request->has('logo') && $setting->photo) {
                Storage::delete($setting->photo);
            }

            return $filePath;
        }

        return $setting->photo;
    }
}

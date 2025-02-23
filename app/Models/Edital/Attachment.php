<?php

namespace App\Models\Edital;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Attachment extends Model
{
    protected $table = 'edital_attachments';

    protected $fillable = [
        'name',
        'path',
        'edital_id',
    ];

    // ACCESSORS

    protected function filePath(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                match (true) {
                    (! $this->path) => asset('assets/images/users/no-photo.webp'),
                    default => asset("storage/{$this->path}"),
                }
        );
    }

    // METHODS

    public static function saveImage(Request $request): string
    {
        $filePath = '';

        if ($request->new_photo) {
            $filePath = $request->new_photo->storeAs(
                path: 'editals', 
                name: Str::random(32).'.'.$request->new_photo->extension(), 
                options: 'public',
            );
        }
        
        return $filePath;
    }

    public static function updateImage(Request $request, Edital $edital): string|null
    {
        if ($request->hasFile('photo_update')) {
            $path = 'editals';
            $fileName = Str::random(32).'.'.$request->photo_update->extension();
            $filePath = $request->photo_update->storeAs($path, $fileName, 'public');

            if ($request->has('photo_update') && $edital->photo) {
                Storage::delete($edital->photo);
            }

            return $filePath;
        }

        return $edital->photo;
    }

    // RELATIONSHIPS

    public function edital(): BelongsTo
    {
        return $this->belongsTo(
            related: Edital::class,
            foreignKey: 'edital_id',
        );
    }
}

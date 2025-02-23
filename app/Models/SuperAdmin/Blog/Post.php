<?php

namespace App\Models\SuperAdmin\Blog;

use App\Enums\SuperAdmin\PostStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'status',
        'registered_at',
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'status' => PostStatusEnum::class,
    ];

    // ACCESSORS

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->image
                    ? asset("/storage/{$this->image}")
                    : asset("images/errors/not-image.jpg");
            }
        );
    }

    // METHODS

    public static function search(string|null $value): array
    {
        $payloads = [];
        $posts = DB::select(
            "SELECT id, title, registered_at, status
            FROM posts
            WHERE (posts.title LIKE '%{$value}%') 
            LIMIT 25"
        );

        foreach ($posts as $post) {
            $payloads[] = [
                'id' => $post->id,
                'title' => $post->title,
                'status' => PostStatusEnum::tryFrom($post->status)->getLabel(),
                'registered_at' => date('d/m/Y H:i', strtotime($post->registered_at)),
                'route' => [
                    'show' => route('dash.posts.show', $post->id),
                    'edit' => route('dash.posts.edit', $post->id),
                ],
            ];
        }

        return $payloads;
    }
}

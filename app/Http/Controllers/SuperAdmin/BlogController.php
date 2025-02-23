<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Enums\SuperAdmin\PostStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\PostRequest;
use App\Models\SuperAdmin\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('super-admin.dash.posts.index', [
            'posts' => Post::paginate(25),
        ]);
    }

    public function create(): View
    {
        return view('super-admin.dash.posts.create', [
            'statuses' => PostStatusEnum::cases()
        ]);
    }

    public function store(PostRequest $request): RedirectResponse
    {
        Post::create($request->payload());

        return redirect()
            ->route('dash.posts.index')
            ->withSuccess($request->message());
    }

    public function edit(Post $post): View
    {
        return view('super-admin.dash.posts.edit', [
            'post' => $post,
            'statuses' => PostStatusEnum::cases()
        ]);
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->payload());

        return redirect()
            ->route('dash.posts.index')
            ->withSuccess($request->message());
    }

    public function show(Post $post): View
    {
        return view('super-admin.dash.posts.show', [
            'post' => $post,
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'posts' => Post::search($request->name)
        ]);
    }

    public function attachFile(Request $request): JsonResponse
    {
        $filePath = '';

        if ($request->file) {
            $filePath = $request->file->storeAs(
                path: 'posts/'.date('Y'),
                name: Str::random(32).'.'.$request->file->extension(), 
                options: 'public',
            );
        }

        return response()->json([
            'url' => asset('/storage') . "/{$filePath}"
        ]);
    }
}

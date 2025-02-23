<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Edital\Edital;
use App\Models\SuperAdmin\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('landing-page.index');
    }

    public function contact(): View
    {
        return view('landing-page.contact');
    }

    public function edital(Request $request): View
    {
        if ($request->buscar) {
            return view('landing-page.edital', [
                'editals' => Edital::with('tenant')
                    ->where('name', 'like', '%' . $request->buscar . '%')
                    ->orWhereHas('tenant', function ($query) use ($request) {
                        $query->whereHas('city', function ($builder) use ($request) {
                            $builder->where('name', 'like', '%' . $request->buscar . '%');
                        });
                    })
                    ->orderBy('status')
                    ->paginate(15),
            ]);
        }

        return view('landing-page.edital', [
            'editals' => Edital::with('tenant')
                ->orderBy('status')
                ->paginate(15),
        ]);
    }

    public function post(Request $request): View
    {
        if ($request->buscar) {
            return view('landing-page.posts.index', [
                'posts' => Post::where('name', 'like', '%' . $request->buscar . '%')
                    ->orderByDesc('id')
                    ->paginate(15),
            ]);
        }

        return view('landing-page.posts.index', [
            'posts' => Post::orderByDesc('id')->paginate(15),
        ]);
    }

    public function viewPost(string|null $slug): View
    {
        return view('landing-page.posts.show', [
            'post' => Post::firstWhere('slug', $slug),
        ]);
    }
}

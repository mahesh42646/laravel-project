<?php

namespace App\Http\Controllers\Agent\Panel\Profile;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Customer\SocialMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class SocialMediaController extends Controller
{
    public function index(string $token, Request $request): View
    {
        return view('public.panel.profile.social-media', [
            'customer' => Customer::find($request['customer_id']),
            'socialMedias' => Customer::getSocialMedias(),
            'token' => $token,
        ]);
    }

    public function store(string $token, Request $request): RedirectResponse
    {
        $payloads = [];

        foreach ((array) $request->media_ids as $index => $mediaId) {
            $payloads[] = [
                'media_id' => $mediaId,
                'link' => $request->media_links[$index],
                'customer_id' => $request['customer_id'],
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        DB::table('customer_social_medias')->insert($payloads);

        return redirect()
            ->route('public.panel.index', $token)
            ->withSuccess('Mídias sociais <strong>adicionadas</strong> com sucesso!');
    }

    public function destroy(string $token, SocialMedia $media): RedirectResponse
    {
        $media->delete();

        return redirect()
            ->route('public.panel.profile.edit', $token)
            ->withSuccess('Mídia social <strong>removida</strong> com sucesso!');
    }
}

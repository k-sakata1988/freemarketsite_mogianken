<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * 新規ユーザー登録後のHTTPレスポンスを作成します。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request): Response
    {
        // 登録後にプロフィール設定画面へリダイレクトします
        // '/profile-settings' の部分は、実際のプロフィール設定画面のURIに合わせて変更してください。
        return redirect()->intended('/mypage/profile');
        
        // もし、APIリクエスト（wantsJson()）の場合はJSONレスポンスを返すようにしたい場合は、
        // 以下のように記述することもできます。
        /*
        return $request->wantsJson()
                    ? response()->json(['registered' => true])
                    : redirect()->intended('/profile-settings');
        */
    }
}
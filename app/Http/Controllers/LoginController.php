<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([ // 入力内容のチェック
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) { // ログイン試行
            if ($request->user('admin')?->admin_level == 1) { // 管理権限レベルが0でないか
                $request->session()->regenerate(); // セッション更新
                return redirect()->intended(RouteServiceProvider::ADMIN_HOME);// ダッシュボードへ
            } 
            elseif ($request->user('admin')?->admin_level == 2){ // 管理権限レベルが1かどうか
                $request->session()->regenerate(); // セッション更新
                return redirect()->intended(RouteServiceProvider::ADMIN_for_MANAGER); // ダッシュボードへ
            }
            else {
                Auth::guard('admin')->logout(); // if文でログインしてしまっているので、ログアウトさせる
                $request->session()->regenerate(); // セッション更新
                return back()->withErrors([ // 権限レベルが0の場合
                    'error' => 'You do not have permission to log in.',
                ]);
            }
        }

        return back()->withErrors([ // ログインに失敗した場合
            'error' => 'The provided credentials do not match our records.',
        ]);

        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}

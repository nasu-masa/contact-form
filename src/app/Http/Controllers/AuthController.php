<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //画面表示用
    public function index() {
        return view('index');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }

    //新規登録用
    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login');
    }
    //ログイン処理
    public function loginPost(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials)){
            return redirect('/')->with('status', 'ログインに成功しました'); //ログイン成功したらリダイレクト
        };

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが違います',
        ]);
    }

    //ログアウト
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
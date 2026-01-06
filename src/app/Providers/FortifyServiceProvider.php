<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //ServiceProviderが読み込まれるときに実行されるメソッド
        //Fortifyの設定はここに書く
        Fortify::createUsersUsing(CreateNewUser::class);

        //「ユーザー登録画面としてどの Blade を使うか」を指定
        //`/register` にアクセスしたときに `auth/register.blade.php` を表示する
        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        //「login」という名前のレート制限（回数制限）を設定する。
        //ログイン試行の回数を制御するための設定。
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

        // **1分間に10回までログイン試行を許可する**という設定。
        // 制限のキーは「メールアドレス + IPアドレス」。
        // 不正ログイン対策としてよく使われる。
            return  Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * user_type = 1 means employee.
         */

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->where('user_type', 1)->first();

            if ($user &&
                Hash::check($request->password, $user->password) &&
                ($user->employee->authorized_to_log_in == 1)) {
                return $user;
            }
        });
    }
}

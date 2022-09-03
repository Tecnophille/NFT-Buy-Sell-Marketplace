<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (file_exists(storage_path('installed'))) {
            if (function_exists('bcscale')) {
                bcscale(8);
            }
            Validator::extend('strong_pass', function($attribute, $value, $parameters, $validator) {
                return is_string($value) && preg_match('/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', $value);
            });
            $this->app->bind('CoinApiService', function ($app, $parameters) {
                $className = 'App\Http\Services\\' . $parameters[0];
                $coinType = strtoupper($parameters[1]);
                $user = env($coinType . "_USER");
                $pass = env($coinType . "_PASS");
                $host = env($coinType . "_HOST");
                $port = env($coinType . "_PORT");
                if($parameters[0] == 'CoinPaymentsApiService'){
                    return new $className($coinType);
                }
                return new $className($user, $pass, $host, $port, $coinType);
            });

            $adm_setting = allsetting();
            $mail_driver = isset($adm_setting['mail_driver']) ? $adm_setting['mail_driver'] : env('MAIL_DRIVER');
            $mail_host = isset($adm_setting['mail_host']) ? $adm_setting['mail_host'] : env('MAIL_HOST');
            $mail_port = isset($adm_setting['mail_port']) ? $adm_setting['mail_port'] : env('MAIL_PORT');
            $mail_username = isset($adm_setting['mail_username']) ? $adm_setting['mail_username'] : env('MAIL_USERNAME');
            $mail_password = isset($adm_setting['mail_password']) ? $adm_setting['mail_password'] : env('MAIL_PASSWORD');
            $mail_encryption = isset($adm_setting['mail_encryption']) ? $adm_setting['mail_encryption'] : env('MAIL_ENCRYPTION');
            $mail_from_address = isset($adm_setting['mail_from_address']) ? $adm_setting['mail_from_address'] : env('MAIL_FROM_ADDRESS');

            config(['mail.driver' => $mail_driver]);
            config(['mail.host' => $mail_host]);
            config(['mail.port' => $mail_port]);
            config(['mail.username' => $mail_username]);
            config(['mail.password' => $mail_password]);
            config(['mail.encryption' => 'tls']);
            config(['mail.address,address' => $mail_from_address]);
        }

    }
}

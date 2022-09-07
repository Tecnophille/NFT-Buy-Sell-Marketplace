<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class InstallerController extends Controller
{
    public function updateVersion()
    {
        try {
            Artisan::call('migrate', ['--force'=> true]);
            return $this->updateCommand();

        } catch (\Exception $e) {
            return redirect()->back()->with('dismiss', __('Update is not done.'));
        }
    }

    public function updateCommand()
    {
        try {
            Artisan::call('update:version');
            $installedLogFile = storage_path('installed');

            $dateStamp = date('Y/m/d h:i:sa');

            if (! file_exists($installedLogFile)) {
                $message = trans('ZaiInstaller successfully INSTALLED on ').$dateStamp."\n";

                file_put_contents($installedLogFile, $message);
            }
            return redirect('/');

        } catch (\Exception $e) {
            return redirect()->back()->with('dismiss', __('Updatation failed!'));
        }
    }

    public function finalizeInstall(Request $request)
    {
        if($this->saveENV($request)) {
            Artisan::call("optimize:clear");
            if (!$this->checkDatabaseConnection($request)) {
                return redirect()->back()->withErrors('Database credential is not correct!');
            }else {
                $response = $this->installApplication();
                if($response['success']){
                    return Redirect::to('/');
                }else{
                    return redirect()->back()->withErrors($response['message']);
                }
            }
        }else {
            return redirect()->back()->withErrors('env not updated');
        }

    }

    public function saveENV(Request $request)
    {
        $env_val['APP_KEY'] = 'base64:'.base64_encode(Str::random(32));
        $env_val['APP_URL'] = $request->app_url;
        $env_val['DB_HOST'] = $request->db_host;
        $env_val['DB_DATABASE'] = $request->db_name;
        $env_val['DB_USERNAME'] = $request->db_user;
        $env_val['DB_PASSWORD'] = $request->db_password;
        $env_val['MAIL_HOST'] = $request->mail_host;
        $env_val['MAIL_PORT'] = $request->mail_port;
        $env_val['MAIL_USERNAME'] = $request->mail_username;
        $env_val['MAIL_PASSWORD'] = $request->mail_password;

        return $this->setEnvValue($env_val);

    }

    public function setEnvValue($values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }

    private function checkDatabaseConnection($request)
    {
        try{

            $settings = config("database.connections.mysql");
            DB::purge('mysql');
            config([
                'database' => [
                    'default' => 'mysql',
                    'connections' => [
                        'mysql' => array_merge($settings, [
                            'driver' => 'mysql',
                            'host' => $request->db_host,
                            'port' => '3306',
                            'database' => $request->db_name,
                            'username' => $request->db_user,
                            'password' => $request->db_password,
                        ]),
                    ],
                ],
            ]);
            Artisan::call("optimize:clear");
            DB::connection()->getPDO();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function installApplication()
    {
        return $this->seeding();
    }

    private function seeding()
    {
        try {
            $db_version = allsetting('version');
            $app_title = allsetting('app_title');
            if($db_version != false) {
                Artisan::call('update:version');
            }else {
                if($app_title != false) {
                    Artisan::call('update:version');
                }else {
                    Artisan::call('migrate', ['--force'=> true]);
                    Artisan::call('db:seed', ['--force' => true]);
                    Artisan::call('update:version');
                }
            }
            $installedLogFile = storage_path('installed');
            $dateStamp = date('Y/m/d h:i:sa');
            if (! file_exists($installedLogFile)) {
                $message = trans('ZaiInstaller successfully INSTALLED on ').$dateStamp."\n";
                file_put_contents($installedLogFile, $message);
            }
            return [ 'success' => true, 'message' => ''];
        } catch (\Exception $e) {
            return [ 'success' => false, 'message' => __('Installation failed!')];
        }
    }
}

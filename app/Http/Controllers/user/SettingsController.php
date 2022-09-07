<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function settings()
    {
        $data['user'] = User::whereId(Auth::id())->first();
        $data['title'] = __('main.Settings');
        $data['menu'] = 'settings';
        return view('user.pages.settings', $data);
    }

    public function enableGoogle2FA(Request $request)
    {
        $user = User::whereId(Auth::id())->first();
        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');

        // Add the secret key to the registration data
        $data['google2fa_secret'] = $google2fa->generateSecretKey();

        // Save the registration data to the user session for just the next request
        $request->session()->flash('2fa_secret', $data['google2fa_secret']);

        // Generate the QR image. This is the image the user will scan with their app
        // to set up two factor authentication
        $data['QR_Image'] = $google2fa->getQRCodeInline(
            allsetting()['app_title'],
            $user->email,
            $data['google2fa_secret']
        );
        $data['title'] = __('QR Code For Google 2FA');
        $data['menu'] = 'settings';
        return view('user.pages.qr-view', $data);
    }

    public function completeGoogle2FA()
    {
        $user = User::whereId(Auth::id())->first();
        $update = $user->update([
            'g2f_enabled' => '1',
            'google2fa_secret' => session('2fa_secret'),
        ]);
        if(!empty($update)) {
            return redirect()->route('settings')->with('success', __('Two factor authentication is enabled!'));
        }
        return redirect()->route('settings')->with('dissmiss', __('Something went wrong!'));
    }

    public function disableGoogle2FA()
    {
        $user = User::whereId(Auth::id())->first();
        $update = $user->update([
            'g2f_enabled' => '0',
        ]);
        if(!empty($update)) {
            return redirect()->route('settings')->with('success', __('Two factor authentication is disabled!'));
        }
        return redirect()->route('settings')->with('dissmiss', __('Something went wrong!'));
    }
}

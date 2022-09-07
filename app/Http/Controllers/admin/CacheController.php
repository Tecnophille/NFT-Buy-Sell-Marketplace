<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function __construct()
    {
        $this->settingRepo = new SettingService();
    }
    public function cacheConfiguration()
    {
        $data['title'] = __('CDN Configuration');
        return view('admin.cache.cdn', $data);
    }

    public function updateCDN(Request $request)
    {
        $request->is_cdn = checkBoxValue($request->is_cdn);
        $response = $this->settingRepo->saveCommonSetting($request);
        if ($response['success'] == true) {
            return redirect()->back()->with('toast_success', __('SEO tags updated!'));
        }
        return redirect()->back()->with('toast_error', __('Something went wrong!'));
    }

    public function cacheClear()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('toast_success', __('Application cache cleared!'));
    }
}

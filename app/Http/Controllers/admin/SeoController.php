<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SettingService;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->settingRepo = new SettingService();
    }

    public function seoSettings()
    {
        return view('admin.seo.index');
    }

    public function updateSEO(Request $request)
    {
        $response = $this->settingRepo->saveCommonSetting($request);
        if ($response['success'] == true) {
            return redirect()->back()->with('toast_success', __('SEO tags updated!'));
        }
        return redirect()->back()->with('toast_error', __('Something went wrong!'));
    }
}

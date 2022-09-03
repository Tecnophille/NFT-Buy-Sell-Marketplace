<?php
namespace App\Http\Controllers\admin;
use App\Http\Services\SettingService;
use App\Model\Content;
use App\Model\ContentTranslation;
use App\Model\Setting;
use App\Model\Faq;
use App\Model\Slider;
use App\Model\SliderTranslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * Class SettingsController
 */
class SettingsController extends Controller
{
    public function __construct()
    {
        $this->settingRepo = new SettingService();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminSettings(Request $request)
    {
        if (isset($request->itech) && ($request->itech == 99)) {
            $data['itech'] = 'itech';
        }
        $data['tab']='general';
        if(isset($_GET['tab'])){
            $data['tab']=$_GET['tab'];
        }
        $data['title'] = __('General Settings');
        $data['settings'] = allsetting();
        return view('admin.settings.general', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function adminCommonSettings(Request $request)
    {
        $rules=[];
        if(!empty($request->logo)){
            $rules['logo']='image|mimes:jpg,jpeg,png|max:2000';
        }
        if(!empty($request->favicon)){
            $rules['favicon']='image|mimes:jpg,jpeg,png|max:2000';
        }
        if(!empty($request->login_logo)){
            $rules['login_logo']='image|mimes:jpg,jpeg,png|max:2000';
        }
        if(!empty($request->preloader_logo)){
            $rules['login_logo']='image|mimes:jpg,jpeg,png|max:2000';
        }
        if(!empty($request->coin_price)){
            $rules['coin_price']='numeric';
        }
        if(!empty($request->number_of_confirmation)){
            $rules['number_of_confirmation']='integer';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = [];
            $e = $validator->errors()->all();
            foreach ($e as $error) {
                $errors[] = $error;
            }
            $data['message'] = $errors;
            return redirect()->route('admin_settings', ['tab' => 'general'])->with(['dismiss' => $errors[0]]);
        }
        try {
            if ($request->post()) {
                $response = $this->settingRepo->saveCommonSetting($request);
                if ($response['success'] == true) {
                    return redirect()->route('admin_settings', ['tab' => 'general'])->with('success', $response['message']);
                } else {
                    return redirect()->route('admin_settings', ['tab' => 'general'])->withInput()->with('success', $response['message']);
                }
            }
        } catch(\Exception $e) {
            return redirect()->back()->with(['dismiss' => errorHandle($e->getMessage())]);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function adminSaveEmailSettings(Request $request)
    {
        if ($request->post()) {
            $rules = [
                'mail_host' => 'required'
                ,'mail_port' => 'required'
                ,'mail_username' => 'required'
                ,'mail_password' => 'required'
                ,'mail_encryption' => 'required'
                ,'mail_from_address' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $errors = [];
                $e = $validator->errors()->all();
                foreach ($e as $error) {
                    $errors[] = $error;
                }
                $data['message'] = $errors;
                return redirect()->route('admin_settings', ['tab' => 'email'])->with(['dismiss' => $errors[0]]);
            }
            try {
                $response = $this->settingRepo->saveEmailSetting($request);
                if ($response['success'] == true) {
                    return redirect()->route('admin_settings', ['tab' => 'email'])->with('success', $response['message']);
                } else {
                    return redirect()->route('admin_settings', ['tab' => 'email'])->withInput()->with('success', $response['message']);
                }
            } catch(\Exception $e) {
                return redirect()->back()->with(['dismiss' => $e->getMessage()]);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function adminSavePaymentSettings(Request $request)
    {
        if ($request->post()) {
            $rules = [
                'COIN_PAYMENT_PUBLIC_KEY' => 'required',
                'COIN_PAYMENT_PRIVATE_KEY' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $errors = [];
                $e = $validator->errors()->all();
                foreach ($e as $error) {
                    $errors[] = $error;
                }
                $data['message'] = $errors;
                return redirect()->route('admin_settings', ['tab' => 'payment'])->with(['dismiss' => $errors[0]]);
            }
            try {
                $response = $this->settingRepo->savePaymentSetting($request);
                if ($response['success'] == true) {
                    return redirect()->route('admin_settings', ['tab' => 'payment'])->with('success', $response['message']);
                } else {
                    return redirect()->route('admin_settings', ['tab' => 'payment'])->withInput()->with('success', $response['message']);
                }
            } catch(\Exception $e) {
                return redirect()->back()->with(['dismiss' => $e->getMessage()]);
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminPaymentSetting()
    {
        $data['title'] = __('Payment Method');
        $data['settings'] = allsetting();
        $data['payment_methods'] = paymentMethods();

        return view('admin.settings.payment-method', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePaymentMethodStatus(Request $request)
    {
        $settings = allsetting();
        if (!empty($request->active_id)) {
            $value = 1;
            $item = isset($settings[$request->active_id]) ? $settings[$request->active_id] : 2;
            if ($item == 1) {
                $value = 2;
            } elseif ($item == 2) {
                $value = 1;
            }
            Setting::updateOrCreate(['slug' => $request->active_id], ['value' => $value]);
        }
        return response()->json(['message'=>__('Status changed successfully')]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function slider()
    {
        $slider = Slider::first();
        return view('admin.slider.slider', ['slider' => $slider]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sliderUpdate(Request $request)
    {
        $slider = Slider::whereId($request->slider_id)->first();
        $action = Slider::whereId($slider->id)->update([
            'status' => STATUS_ACTIVE,
        ]);
        if(!empty($action)) {
            foreach (allLanguage() as $al) {
                SliderTranslation::where('locale', $al->prefix)->where('slider_id', $slider->id)->updateOrCreate([
                    'locale' => $al->prefix,
                    'slider_id' => $slider->id,
                ],[
                    'short_description' => is_null($request->input('short_description_'.$al->prefix)) ? $slider->translateOrDefault($al->prefix)->short_description : $request->input('short_description_'.$al->prefix),
                    'long_desc_header' => is_null($request->input('long_desc_header_'.$al->prefix)) ? $slider->translateOrDefault($al->prefix)->long_desc_header : $request->input('long_desc_header_'.$al->prefix),
                    'long_desc_middle' => is_null($request->input('long_desc_middle_'.$al->prefix)) ? $slider->translateOrDefault($al->prefix)->long_desc_middle : $request->input('long_desc_middle_'.$al->prefix),
                    'long_desc_footer' => is_null($request->input('long_desc_footer_'.$al->prefix)) ? $slider->translateOrDefault($al->prefix)->long_desc_footer : $request->input('long_desc_footer_'.$al->prefix),
                ]);
            }
            return redirect()->back()->with('success', __('Slider update successfully!'));
        }
        return redirect()->back()->with('dismiss', __('Something were wrong!'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contents()
    {
        $data['title'] = __('Content Settings');
        $data['contents'] = Content::get();
        return view('admin.settings.contents', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contentsUpdate(Request $request)
    {
        foreach(allLanguage() as $al) {
            ContentTranslation::where('content_id', 1)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 1,
            ],[
                'value' => is_null($request->input('home_famous_title_'.$al->prefix)) ? allcontents('home_famous_title', $al->prefix) : $request->input('home_famous_title_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 2)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 2,
            ],[
                'value' => is_null($request->input('home_famous_content_'.$al->prefix)) ? allcontents('home_famous_content', $al->prefix) : $request->input('home_famous_content_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 3)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 3,
            ],[
                'value' => is_null($request->input('home_latest_title_'.$al->prefix)) ? allcontents('home_latest_title', $al->prefix) : $request->input('home_latest_title_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 4)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 4,
            ],[
                'value' => is_null($request->input('home_latest_content_'.$al->prefix)) ? allcontents('home_latest_content', $al->prefix) : $request->input('home_latest_content_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 5)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 5,
            ],[
                'value' => is_null($request->input('home_explorer_title_'.$al->prefix)) ? allcontents('home_explorer_title', $al->prefix) : $request->input('home_explorer_title_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 6)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 6,
            ],[
                'value' => is_null($request->input('home_explorer_content_'.$al->prefix)) ? allcontents('home_explorer_content', $al->prefix) : $request->input('home_explorer_content_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 7)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 7,
            ],[
                'value' => is_null($request->input('home_footer_title_'.$al->prefix)) ? allcontents('home_footer_title', $al->prefix) : $request->input('home_footer_title_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 8)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 8,
            ],[
                'value' => is_null($request->input('home_footer_content_'.$al->prefix)) ? allcontents('home_footer_content', $al->prefix) : $request->input('home_footer_content_'.$al->prefix),
            ]);
        }
        return redirect()->back()->with('success', __('Content updated!'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function counters()
    {
        $data['title'] = __('Counter Settings');
        $data['settings'] = allsetting();
        return view('admin.settings.counters', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function countersUpdate(Request $request)
    {
        foreach(allLanguage() as $al) {
            ContentTranslation::where('content_id', 9)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 9,
            ],[
                'value' => is_null($request->input('counters_title_'.$al->prefix)) ? allcontents('counters_title', $al->prefix) : $request->input('counters_title_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 10)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 10,
            ],[
                'value' => is_null($request->input('counters_content_one_'.$al->prefix)) ? allcontents('counters_content_one', $al->prefix) : $request->input('counters_content_one_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 11)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 11,
            ],[
                'value' => is_null($request->input('counters_content_two_'.$al->prefix)) ? allcontents('counters_content_two', $al->prefix) : $request->input('counters_content_two_'.$al->prefix),
            ]);

            ContentTranslation::where('content_id', 12)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'content_id' => 12,
            ],[
                'value' => is_null($request->input('counters_content_three_'.$al->prefix)) ? allcontents('counters_content_three', $al->prefix) : $request->input('counters_content_three_'.$al->prefix),
            ]);
        }
        $response = $this->settingRepo->saveCommonSetting($request);
        if ($response['success'] == true) {
            return redirect()->back()->with('success', $response['message']);
        } else {
            return redirect()->back()->withInput()->with('success', $response['message']);
        }
    }
}

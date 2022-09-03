<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageStoreRequest;
use App\Model\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function allLanguages(Request $request)
    {
        $data['title'] = __('All Languages');
        if($request->ajax()) {
            $coin = Language::query();
            return datatables($coin)
                ->addColumn('action', function ($item) {
                    if ($item->prefix != 'en') {
                        return '
                            <div class="activity-icon">
                                <ul>
                                    <li><a href="javascript:void(0)" class="user-list-actions-icon" data-toggle="modal" data-target="#editLanguageModal'.$item->id.'"><i class="fas fa-pencil-alt"></i></a></li>
                                    <li><a href="'.route('admin_language_delete', encrypt($item->id)).'" class="user-list-actions-icon bg-danger delete"><i class="fas fa-trash-alt"></i></a></li>
                                </ul>
                            </div>

                            ';
                    }else {
                        return '<span class="text-success">'.__('Default Language').'</span>';
                    }

                })
                ->editColumn('thumbnail', function($item) {
                    return '<img src="'.asset(IMG_NEWS_PATH.$item->thumbnail).'" class="img-50" />';
                })
                ->rawColumns(['action', 'description', 'thumbnail'])
                ->make(true);
        }
        $data['languages'] = Language::get();
        return view('admin.language.index', $data);
    }

    public function languageUpdate(Request $request, $id)
    {
        $id = decrypt($id);
        $language = Language::whereId($id)->first();
        if(Language::where('prefix', $request->prefix)->exists() && $request->prefix != $language->prefix) {
            return redirect()->back()->with('dismiss', __('Prefix has already assigned!'));
        }
        if(!empty($language)) {
            $update = $language->update([
                'name' => is_null($request->name) ? $language->name : $request->name,
                'prefix' => is_null($request->prefix) ? $language->prefix : $request->prefix,
                'direction' => is_null($request->direction) ? $language->direction : $request->direction,
            ]);

            if(!empty($update)) {
                return redirect()->back()->with('success', __('Language successfully updated!'));
            }
            return redirect()->back()->with('dismiss', __('Something went wrong!'));
        }
        return redirect()->back()->with('dismiss', __('No data found!'));
    }

    public function languageStore(LanguageStoreRequest $request)
    {
        if(Language::where('prefix', $request->prefix)->exists()) {
            return redirect()->back()->with('dismiss', __('Prefix has already assigned!'));
        }

        $store = Language::create([
            'name' => $request->name,
            'prefix' => $request->prefix,
            'direction' => $request->direction,
        ]);

        if(!empty($store)) {
            return redirect()->back()->with('success', __('Language successfully stored!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong!'));
    }

    public function languageDelete($id)
    {
        $id = decrypt($id);
        $delete = Language::whereId($id)->delete();
        if(!empty($delete)) {
            return redirect()->back()->with('success', __('Language successfully deleted!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong!'));
    }
}

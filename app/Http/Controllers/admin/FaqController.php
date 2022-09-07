<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqContentStoreRequest;
use App\Model\Faq;
use App\Model\FaqHead;
use App\Model\FaqHeadTranslation;
use App\Model\FaqTranslation;
use App\Model\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class FaqController
 */
class FaqController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function faqHeading(Request $request)
    {
        $data['title'] = __('Subscriber List');
        if($request->ajax()){
            $data['heading'] = FaqHead::query();
            return datatables()->of($data['heading'])
                ->editColumn('icon',function ($item){
                    return $item->icon;
                })
                ->addColumn('action', function ($item) {
                    return '<a href="'.route('admin_faq_heading_edit', encrypt($item->id)).'" class="user-list-actions-icon"><i class="fas fa-pencil-alt"></i></a>';
                })
                ->rawColumns(['icon', 'action'])
                ->make(true);
        }
        return view('admin.faq.heading.list',$data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function faqHeadingEdit($id)
    {
        $id = decrypt($id);
        $heading = FaqHead::whereId($id)->first();
        return view('admin.faq.heading.edit', ['title' => __('Edit FAQ Heading'), 'heading' => $heading]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function faqHeadingUpdate(Request $request, $id)
    {
        $id = decrypt($id);
        $heading = FaqHead::whereId($id)->first();
        $action = FaqHead::whereId($id)->update([
            'icon' => is_null($request->icon) ? $heading->icon : $request->icon,
        ]);

        if(!empty($action)) {
            foreach (allLanguage() as $al) {
                FaqHeadTranslation::where('faq_head_id', $heading->id)->where('locale', $al->prefix)->updateOrCreate([
                    'locale' => $al->prefix,
                    'faq_head_id' => $heading->id,
                ],[
                    'title' => is_null($request->input('title_'.$al->prefix)) ? $heading->translateOrDefault($al->prefix)->title : $request->input('title_'.$al->prefix),
                ]);
            }
            return redirect()->back()->with('success', __('FAQ Heading successfully updated!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong!'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function faqContent(Request $request)
    {
        $data['title'] = __('FAQ Content List');
        if($request->ajax()){
            $data['content'] = Faq::query();
            return datatables()->of($data['content'])
                ->editColumn('heading',function ($item){
                    return $item->faq_head->title;
                })
                ->addColumn('action', function ($item) {
                    return '
                    <a href="'.route('admin_faq_content_edit', encrypt($item->id)).'" class="user-list-actions-icon"><i class="fas fa-pencil-alt"></i></a>
                    <a href="'.route('admin_faq_content_delete', encrypt($item->id)).'" class="user-list-delete-icon delete"><i class="fas fa-trash"></i></a>
                        ';
                })
                ->rawColumns(['icon', 'action'])
                ->make(true);
        }
        return view('admin.faq.contents.list',$data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function faqContentAdd()
    {
        $headings = FaqHead::get();
        return view('admin.faq.contents.add', ['title' => __('FAQ Content Settings'),'headings' => $headings]);
    }

    /**
     * @param FaqContentStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function faqContentStore(FaqContentStoreRequest $request)
    {
        $action = Faq::create([
            'fh_id' => $request->fh_id,
        ]);
        if(!empty($action)) {
            foreach (allLanguage() as $al) {
                FaqTranslation::create([
                    'locale' => $al->prefix,
                    'faq_id' => $action->id,
                    'question' => is_null($request->input('question_'.$al->prefix)) ? $request->input('question_en') : $request->input('question_'.$al->prefix),
                    'answer' => is_null($request->input('answer_'.$al->prefix)) ? $request->input('answer_en') : $request->input('answer_'.$al->prefix),
                ]);
            }
            return redirect()->back()->with('success', __('FAQ successfully added!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong!'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function faqContentEdit($id)
    {
        $id = decrypt($id);
        $faq = Faq::whereId($id)->first();
        $headings = FaqHead::get();
        return view('admin.faq.contents.edit', ['title' => __('FAQ Content Settings'),'faq' => $faq,'headings' => $headings]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function faqContentUpdate(Request $request, $id)
    {
        $id = decrypt($id);
        $faq = Faq::whereId($id)->first();
        $action = Faq::whereId($id)->update([
            'fh_id' => is_null($request->fh_id) ? $faq->fh_id : $request->fh_id,
        ]);
        if(!empty($action)) {
            foreach (allLanguage() as $al) {
                FaqTranslation::where('locale', $al->prefix)->where('faq_id', $faq->id)->updateOrCreate([
                    'locale' => $al->prefix,
                    'faq_id' => $faq->id,
                ],[
                    'question' => is_null($request->input('question_'.$al->prefix)) ? $faq->translateOrDefault($al->prefix)->question : $request->input('question_'.$al->prefix),
                    'answer' => is_null($request->input('answer_'.$al->prefix)) ? $faq->translateOrDefault($al->prefix)->answer : $request->input('answer_'.$al->prefix),
                ]);
            }
            return redirect()->back()->with('success', __('FAQ successfully added!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong!'));
    }

    public function faqContentDelete($id)
    {
        $id = decrypt($id);
        $delete = Faq::whereId($id)->delete();
        if(!empty($delete)) {
            return redirect()->back()->with('success', __('FAQ successfully deleted!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong!'));
    }
}

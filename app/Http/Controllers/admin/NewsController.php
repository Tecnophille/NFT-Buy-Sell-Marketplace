<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Model\News;
use App\Model\NewsTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class NewsController
 */
class NewsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|mixed
     * @throws \Exception
     */
    public function newsList(Request $request)
    {
        $data['title'] = __('News List');
        if($request->ajax()) {
            $coin = News::query();
            return datatables($coin)
                ->addColumn('title', function($item) {
                    return $item->title;
                })
                ->addColumn('description', function($item) {
                    return $item->description;
                })
                ->addColumn('action', function ($item) {
                    return '
                            <div class="activity-icon">
                                <ul>
                                    <li><a href="'.route('admin_edit_news', encrypt($item->id)).'" class="user-list-actions-icon"><i class="fas fa-pencil-alt"></i></a></li>
                                    <li><a href="'.route('admin_delete_news', encrypt($item->id)).'" class="user-list-actions-icon bg-danger delete"><i class="fas fa-trash-alt"></i></a></li>
                                </ul>
                            </div>

                            ';
                })
                ->editColumn('thumbnail', function($item) {
                    return '<img src="'.asset(IMG_NEWS_PATH.$item->thumbnail).'" class="img-50" />';
                })
                ->rawColumns(['action', 'description', 'thumbnail'])
                ->make(true);
        }
        return view('admin.news.list', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addNews()
    {
        $data['title'] = __('Add News');
        return view('admin.news.add', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeNews(NewsStoreRequest $request)
    {
        if(!empty($request->thumbnail)){
            $thumbnail = uploadimage($request['thumbnail'], IMG_NEWS_PATH);
        }
        $isHotNews = checkBoxValue($request->hot_news);
        $isTrending = checkBoxValue($request->trending_news);
        $action = News::create([
            'thumbnail' => $thumbnail,
            'isHotNews' => $isHotNews,
            'IsTrending' => $isTrending,
        ]);
        if(!empty($action)) {
            foreach (allLanguage() as $al) {
                NewsTranslation::create([
                    'locale' => $al->prefix,
                    'news_id' => $action->id,
                    'title' => is_null($request->input('title_'.$al->prefix)) ? $request->input('title_en') : $request->input('title_'.$al->prefix),
                    'description' => is_null($request->input('description_'.$al->prefix)) ? $request->input('description_en') : $request->input('description_'.$al->prefix),
                ]);
            }
            return redirect()->back()->with('success', __('News Successfully Created!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editNews($id)
    {
        $data['title'] = __('Edit News');
        $id = decrypt($id);
        $data['news'] = News::whereId($id)->first();
        return view('admin.news.edit', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateNews(Request $request, $id)
    {
        $id = decrypt($id);
        $news = News::whereId($id)->first();
        if(!empty($request->thumbnail)){
            $thumbnail = uploadimage($request['thumbnail'], IMG_NEWS_PATH);
        }
        else{
            $thumbnail = $news->thumbnail;
        }
        $isHotNews = checkBoxValue($request->hot_news);
        $isTrending = checkBoxValue($request->trending_news);
        $action = News::whereId($id)->update([
            'thumbnail' => $thumbnail,
            'isHotNews' => $isHotNews,
            'IsTrending' => $isTrending,
        ]);
        if(!empty($action)) {
            foreach (allLanguage() as $al) {
                NewsTranslation::where('locale', $al->prefix)->where('news_id', $news->id)->updateOrCreate([
                    'locale' => $al->prefix,
                    'news_id' => $news->id,
                ],[
                    'title' => is_null($request->input('title_'.$al->prefix)) ? $news->translateOrDefault($al->prefix)->title : $request->input('title_'.$al->prefix),
                    'description' => is_null($request->input('description_'.$al->prefix)) ? $news->translateOrDefault($al->prefix)->description : $request->input('description_'.$al->prefix),
                ]);
            }
            return redirect()->back()->with('success', __('News Successfully Updated!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteNews($id)
    {
        $id = decrypt($id);
        $action = News::whereId($id)->first()->delete();
        if(!empty($action)) {
            return redirect()->back()->with('success', __('News Deleted!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong'));
    }
}

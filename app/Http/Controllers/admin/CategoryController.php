<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Model\Category;
use App\Model\CategoryTranslation;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 */
class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|mixed
     * @throws \Exception
     */
    public function categoryList(Request $request)
    {
        $data['title'] = __('Category List');
        if($request->ajax()) {
            $coin = Category::query();

            return datatables($coin)
                ->addColumn('title', function ($item) {
                    return $item->title;
                })
                ->addColumn('description', function ($item) {
                    return $item->description;
                })
                ->addColumn('action', function ($item) {
                    return '
                            <div class="activity-icon">
                                <ul>
                                    <li>
                                        <a href="'.route('admin_edit_category', encrypt($item->id)).'" class="user-list-actions-icon"><i class="fas fa-pencil-alt"></i></a>
                                    </li>
                                    <li>
                                        <a href="'.route('admin_delete_category', encrypt($item->id)).'" class="user-list-actions-icon bg-danger delete"><i class="fas fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.categories.list', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCategory()
    {
        $data['title'] = __('Add Category');
        return view('admin.categories.add', $data);
    }

    /**
     * @param CategoryStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeCategory(CategoryStoreRequest $request)
    {
        $action = Category::create([
            'status' => STATUS_ACTIVE,
        ]);

        if(!empty($action)) {
            foreach (allLanguage() as $al) {
                CategoryTranslation::create([
                    'locale' => $al->prefix,
                    'category_id' => $action->id,
                    'title' => is_null($request->input('title_'.$al->prefix)) ? $request->input('title_en') : $request->input('title_'.$al->prefix),
                    'description' => is_null($request->input('description_'.$al->prefix)) ? $request->input('description_en') : $request->input('description_'.$al->prefix),
                ]);
            }
            return redirect()->back()->with('success', __('Category Successfully Created!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editCategory($id)
    {
        $data['title'] = __('Edit Category');
        $id = decrypt($id);
        $data['category'] = Category::whereId($id)->first();
        return view('admin.categories.edit', $data);

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCategory(Request $request, $id)
    {
        $id = decrypt($id);
        $category = Category::whereId($id)->first();

        if(!empty($category)) {
            foreach (allLanguage() as $al)
            CategoryTranslation::where('category_id', $category->id)->where('locale', $al->prefix)->updateOrCreate([
                'locale' => $al->prefix,
                'category_id' => $category->id,
            ],
                [
                'title' => is_null($request->input('title_'.$al->prefix)) ? $category->translateOrDefault($al->prefix)->title : $request->input('title_'.$al->prefix),
                'description' => is_null($request->input('description_'.$al->prefix)) ? $category->translateOrDefault($al->prefix)->description : $request->input('description_'.$al->prefix),
            ]);
            return redirect()->back()->with('success', __('Category Successfully Updated!'));
        }
        return redirect()->back()->with('dismiss', __('No data found!'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        $id = decrypt($id);
        $action = Category::whereId($id)->first()->delete();
        if(!empty($action)) {
            return redirect()->back()->with('success', __('Category Deleted!'));
        }
        return redirect()->back()->with('dismiss', __('Something went wrong'));
    }
}

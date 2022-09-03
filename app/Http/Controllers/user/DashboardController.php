<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\Bid;
use App\Model\Deposit;
use App\Model\ResellService;
use App\Model\SellService;
use App\Model\Service;
use App\Model\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $service_sum = Service::where('created_by', Auth::id())->count();
        $purchase_sum = Service::where('buyer_id', Auth::id())->count();
        $deposit_sum = Deposit::where('deposit_by', Auth::id())->sum('doller');
        $withdraw_sum = Withdrawal::where('withdraw_by', Auth::id())->sum('doller');
        return view('user.dashboard', ['title' => __('main.Dashboard'), 'menu' => 'dashboard', 'service_sum' => $service_sum, 'purchase_sum' => $purchase_sum, 'deposit_sum' => $deposit_sum, 'withdraw_sum' => $withdraw_sum]);
    }

    public function userUpload()
    {
        return view('user.pages.upload', ['title' => __('main.Upload')]);
    }

    public function wallets()
    {
        return view('user.pages.wallets', ['title' => __('main.Connect Wallet')]);
    }

    public function purchaseHistory(Request $request)
    {
        if ($request->ajax()) {
            $items = SellService::where('user_id', Auth::id())->with('service')->latest();
            return datatables($items)
                ->addColumn('title', function($data) {
                    return $data->service->title;
                })
                ->addColumn('description', function($data) {
                    return $data->service->description;
                })
                ->addColumn('price_dollar', function($data) {
                    return visual_number_format(bcadd($data->price_amount, $data->service_charge) );
                })
                ->addColumn('price', function($data) {
                    return visual_number_format(bcadd($data->coin_amount, $data->service_charge_coin)).' '.$data->coin_type;
                })
                ->editColumn('thumbnail', function($data) {
                    return '<img src="'.asset(IMG_SERVICE_PATH.$data->service->thumbnail).'" class="img-50" />';
                })
                ->editColumn('action', function($data) {
                    return '<ul class="d-flex justify-content-center align-items-center my-wallet-actions-btn">
                        <li>
                            <a href="'.route('product_view', encrypt($data->service_id)).'" class="btn btn-success" title="Product Link" target="_blank"><i class="fas fa-link"></i></a>
                        </li>'.$this->resellButtonShow($data->service_id).'
                    </ul>';
                })
                ->rawColumns(['action', 'thumbnail', 'description', 'action'])
                ->make(true);
        }
        $services = SellService::where('user_id', Auth::id())->latest()->get();
        return view('user.pages.purchase-history', ['title' => __('main.Purchase History'), 'menu' => 'purchase-history', 'services' => $services]);
    }

    public function resellButtonShow($service_id)
    {
        if (!ResellService::where('past_service_id', $service_id)->exists()) {
            return '<li>
                        <button data-toggle="modal" href="#resellModal'.$service_id.'" class="btn btn-info" title="Resell Product"><i class="fas fa-object-ungroup"></i></button>
                    </li>';
        }
    }

    public function bidHistory(Request $request)
    {
        if ($request->ajax()) {
            $items = Bid::where('user_id', Auth::id())->with('service')->latest();
            return datatables($items)
                ->editColumn('id', function($data) {
                    return $data->transaction_id;
                })
                ->addColumn('title', function($data) {
                    return $data->service->title;
                })
                ->addColumn('description', function($data) {
                    return $data->service->description;
                })
                ->addColumn('price_usd', function($data) {
                    return visual_number_format($data->bid_amount).' (in USD)';
                })
                ->addColumn('highest_bid', function($data) {
                    return visual_number_format(highestBidService($data->service_id)).' (in USD)';
                })
                ->editColumn('thumbnail', function($data) {
                    return '<img src="'.asset(IMG_SERVICE_PATH.$data->service->thumbnail).'" class="img-50" />';
                })
                ->editColumn('status', function($data) {
                    if($data->service->status == SOLD) {
                        return 'Sold';
                    }
                    else {
                        return 'Ongoing';
                    };
                })
                ->addColumn('action', function($data) {

                    if ($data->service->status == SOLD) {
                        return yourbidServiceMessage($data->service_id);
                    }
                    else {
                        $btn = '';
                        $btn = $btn.'
                            <div class="dropdown">
                              <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                              </button>
                              <div class="dropdown-menu top-0 ">
                                <a class="dropdown-item" href="'.route('product_view', encrypt($data->service_id)).'">'.__('Bid Again').'</a>
                              </div>
                            </div>
                           ';
                        return $btn;
                    }
                })
                ->rawColumns(['action', 'thumbnail', 'description'])
                ->make(true);
        }
        $services = Bid::where('user_id', Auth::id())->with('service')->latest()->get();
        return view('user.pages.bid-history', ['title' => __('main.Bidding History'), 'menu' => 'bid-history', 'services' => $services]);
    }


}

@extends('user.master')
@section('title', isset($title) ? $title : __('Marketplace'))
@section('content')
    <!-- Page Banner Area start here  -->
    <section class="page-banner-area p-0" style="background-image: url({{is_null(allsetting()['dashboard_image']) || allsetting()['dashboard_image'] == '' ? cdnAsset(IMG_STATIC_PATH,'page-banner.png') : cdnAsset(IMG_PATH,allsetting()['dashboard_image'])}});">
        <div class="container">
            <!-- Page Banner element -->
            <div class="inner-page-single-dot1 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot1.png')}}" alt="{{__('main.dot')}}"></div>
            <div class="inner-page-single-dot2 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot2.png')}}" alt="{{__('main.dot')}}"></div>
            <div class="inner-page-single-dot3 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot3.png')}}" alt="{{__('main.dot')}}"></div>
            <!-- Page Banner element -->
            <div class="row page-banner-top-space">
                <div class="col-12 col-lg-12">
                    <div class="page-banner-content text-center">
                        <h1 class="page-banner-title">{{__('main.Explore')}}</h1>
                        <p class="page-banner-para">{{__('main.hottest-crypto-assets-text')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner Area end here  -->
    <!-- Page Breadcrumb Area start here  -->
    <section class="breadcrumb-section p-0">
        <div class="container">
            <div class="row">
                <!-- Breadcrumb Area -->
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('login')}}">{{__('main.Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('main.Explore')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumb Area end here  -->
    <!-- northern light carousel Area Start -->
    <section class="northern-light-area place-a-bid-page main-items-area section-t-space section-b-90-space">
        <div class="container">
            <div class="main-items-carousel">
                <div class="main-items-carousel position-relative">
                    <!-- main item slider start -->
                    <div class="main-item">
                        <div class="row">
                            @if ($service->type == 1)
                                <div class="col-12 col-md-12 col-lg-5">
                                    <div class="main-item-content-part">
                                        <h2 class="section-heading">{{$service->title}}</h2>
                                        <div class="main-item-views-love d-flex align-items-center justify-content-between">
                                            <div class="main-item-views-part d-flex align-items-center">
                                                <span>{{__('main.Views:')}} {{$service->views}}</span>
                                                <span>{{__('main.Sell:')}} {{transferCount($service->id)}} {{__('main.Times')}}</span>
                                            </div>
                                            <div class="main-item-love-part">
                                                <button class="color-red" id="like_now"><i class="{{liked($service->id) == 0 ? 'far' : 'fas' }} fa-heart"></i></button> <span class="font-weight-bold color-heading" id="like_count">{{$service->like}}</span>
                                            </div>
                                        </div>
                                        <input type="hidden" id="likeable" value="{{liked($service->id) == 0 ? 1 : 0 }}">
                                        <input type="hidden" value="{{route('service_like_store')}}" id="s-like-store">
                                        <input type="hidden" value="{{route('service_like_delete')}}" id="s-like-remove">
                                        <input type="hidden" value="{{$service->id}}" id="sid">
                                        <!-- Main Item Leftside Box Start -->
                                        <div class="main-item-leftside-box">
                                            <div class="current-bid-box">
                                                <p class="font-weight-bold color-heading">{{__('main.Address:')}}</p>
                                                <a href="{{MINT_URL.$service->mint_address}}" target="_blank">{{$service->mint_address}}</a>
                                                <p class="font-weight-bold color-heading">{{__('main.Price')}}</p>
                                                <div class="bid-price-box">
                                                    <h2>{{visual_number_format($service->price_dollar)}} <span class="bid-small-price">{{__('USD')}}</span></h2>
                                                </div>
                                            </div>
                                            <div class="owner-creator-box">
                                                @if ($service->is_resellable == 1)
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->resell_service->author->photo) ? Avatar::create($service->resell_service->author->first_name.' '.$service->resell_service->author->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->resell_service->author->photo)}}" alt="{{__('main.creator')}}">
                                                        <h6>{{$service->resell_service->author->first_name.' '.$service->resell_service->author->last_name}}</h6>
                                                        <p>{{__('main.Creator')}}</p>
                                                    </div>
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->author->photo) ? Avatar::create($service->author->first_name.' '.$service->author->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->author->photo)}}" alt="{{__('main.creator')}}">
                                                        <h6>{{$service->author->first_name.' '.$service->author->last_name}}</h6>
                                                        <p>{{__('main.Owner')}}</p>
                                                    </div>
                                                @else
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->author->photo) ? Avatar::create($service->author->first_name.' '.$service->author->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->author->photo)}}" alt="{{__('main.creator')}}">
                                                        <h6>{{$service->author->first_name.' '.$service->author->last_name}}</h6>
                                                        <p>{{__('main.Creator')}}</p>
                                                    </div>
                                                @endif
                                                @if (isset($service->buyer_id))
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->buyer->photo) ? Avatar::create($service->buyer->first_name.' '.$service->buyer->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->buyer->photo)}}" alt="{{__('main.owner')}}">
                                                        <h6>{{$service->buyer->first_name.' '.$service->buyer->last_name}}</h6>
                                                        <p>{{__('main.New Owner')}}</p>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                        <!-- Main Item Leftside Box End -->
                                        <!-- Main Item Leftside Box Start -->
                                        <div class="main-item-leftside-box">
                                            <div class="highest-bid-box d-flex align-items-center justify-content-between">
                                                <div class="highest-box-item d-flex align-items-center">
                                                    <img src="{{cdnAsset('assets/user/img/main-item-img/','color-icon.png')}}" alt="{{__('main.bid')}}">
                                                    <div class="highest-box-text">
                                                        <p>{{__('main.Color')}}</p>
                                                        <h6>{{$service->color}}</h6>
                                                    </div>
                                                </div>
                                                <div class="highest-box-item d-flex align-items-center">
                                                    <img src="{{cdnAsset('assets/user/img/main-item-img/','country-icon.png')}}" alt="{{__('main.bid')}}">
                                                    <div class="highest-box-text">
                                                        <p>{{__('main.Origin')}}</p>
                                                        <h6>{{$service->origin}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-item-btn-box">
                                                @if (slodOutMessage($service->id) != 1)
                                                    @if (Auth::check() == true && Auth::user()->role == USER_ROLE_USER )
                                                        @if ($service->created_by == Auth::id())
                                                            <button class="theme-button1 w-100" data-toggle="modal" data-target="#purchaseNotModal">
                                                                {{__('main.Purchase')}}</button>
                                                        @else
                                                            <button class="theme-button1 w-100" data-toggle="modal" data-target="#purchase1Modal">
                                                                {{__('main.Purchase')}}</button>
                                                        @endif
                                                    @else
                                                        <button class="theme-button1 w-100" data-toggle="modal" data-target="#notAuthModal">
                                                            {{__('main.Purchase')}}</button>
                                                    @endif
                                                @else
                                                    <button class="theme-button1 w-100 disabled">
                                                        {{$service->buyer_id == Auth::id() ? __('main.You Buy This Product') :__('main.Stock Out')}}
                                                    </button>
                                                @endif

                                            </div>
                                            <p class="main-item-box-condition text-center">
                                                <span class="font-semi-bold">{{__('main.Transfer History')}}</span>
                                                <span><button data-toggle="modal" href="#transactionHistoryModal{{$service->id}}">{{__('main.Click Here')}}</button></span>
                                            </p>
                                        </div>
                                        <!-- Main Item Leftside Box End -->
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7">
                                    <div class="main-item-img-part position-relative d-flex justify-content-center">
                                        <div class="main-item-img">
                                            <img src="{{cdnAsset(IMG_SERVICE_PATH,$service->thumbnail)}}" alt="{{__('main.item')}}">
                                        </div>
                                        <!-- Main Item upper box start -->
                                        <div class="main-item-upper-box position-absolute w-100 d-flex justify-content-between">
                                            <!-- Main Item upper left -->
                                            <div class="main-item-upper-left">
                                                <span class="badge badge-pill">{{$service->category->title}}</span>
                                                @if($service->is_unlockable == 1)
                                                    <span class="badge badge-pill">{{__('main.Unlockable')}}</span>
                                                @endif
                                            </div>
                                            <!-- Main Item upper right -->
                                        </div>

                                        <!-- Main Item upper box end -->

                                        <!-- Countdown box start -->
                                        <div class="countdown-box position-absolute">
                                            <span class="bg-green time-remaining">{{('main.Expired Date')}}</span>
                                            <div class="countdown">
                                                <input type="hidden" value="{{\Carbon\Carbon::parse($service->expired_at)->format('M j, Y H:i:s')}}" class="expired_time">
                                                <div class="timer-down-wrap"><span class="days">{{__('06')}}</span><span class="timing-title">{{__('main.Days')}}</span></div>
                                                <div class="timer-down-wrap"><span class="hours">{{__('06')}}</span><span class="timing-title">{{__('main.Hrs')}}</span></div>
                                                <div class="timer-down-wrap"><span class="minutes">{{__('35')}}</span><span class="timing-title">{{__('main.Min')}}</span></div>
                                                <div class="timer-down-wrap"><span class="seconds">{{__('54')}}</span><span class="timing-title">{{__('main.Sec')}}</span></div>
                                            </div>
                                        </div>
                                        <!-- Countdown box end -->
                                    </div>
                                </div>
                            @elseif($service->type == 2)
                                <div class="col-12 col-md-12 col-lg-5">
                                    <div class="main-item-content-part">
                                        <h2 class="section-heading">{{$service->title}}</h2>
                                        <div class="main-item-views-love d-flex align-items-center justify-content-between">
                                            <div class="main-item-views-part d-flex align-items-center">
                                                <span>{{__('main.Views:')}} {{$service->views}}</span>
                                                <span>{{__('main.Sell:')}} {{transferCount($service->id)}} {{__('main.Times')}}</span>
                                            </div>
                                            <div class="main-item-love-part">
                                                <button class="color-red" id="like_now"><i class="{{liked($service->id) == 0 ? 'far' : 'fas' }} fa-heart"></i></button> <span class="font-weight-bold color-heading" id="like_count">{{$service->like}}</span>
                                            </div>
                                        </div>
                                        <input type="hidden" id="likeable" value="{{liked($service->id) == 0 ? 1 : 0 }}">
                                        <!-- Main Item Leftside Box Start -->
                                        <div class="main-item-leftside-box">
                                            <div class="current-bid-box">
                                                <p class="font-weight-bold color-heading">{{__('main.Address:')}}</p>
                                                <a href="{{MINT_URL.$service->mint_address}}" target="_blank">{{$service->mint_address}}</a>
                                                <p class="font-weight-bold color-heading">{{__('main.Min Bid Amount')}}</p>
                                                <div class="bid-price-box">
                                                    <h2>{{visual_number_format($service->min_bid_amount) }} <span class="bid-small-price">{{__('USD')}}</span></h2>
                                                </div>
                                            </div>
                                            <div class="owner-creator-box">
                                                @if ($service->is_resellable == 1)
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->resell_service->author->photo) ? Avatar::create($service->resell_service->author->first_name.' '.$service->resell_service->author->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->resell_service->author->photo)}}" alt="{{__('main.creator')}}">
                                                        <h6>{{$service->resell_service->author->first_name.' '.$service->resell_service->author->last_name}}</h6>
                                                        <p>{{__('main.Creator')}}</p>
                                                    </div>
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->author->photo) ? Avatar::create($service->author->first_name.' '.$service->author->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->author->photo)}}" alt="{{__('main.creator')}}">
                                                        <h6>{{$service->author->first_name.' '.$service->author->last_name}}</h6>
                                                        <p>{{__('main.Owner')}}</p>
                                                    </div>
                                                @else
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->author->photo) ? Avatar::create($service->author->first_name.' '.$service->author->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->author->photo)}}" alt="{{__('main.creator')}}">
                                                        <h6>{{$service->author->first_name.' '.$service->author->last_name}}</h6>
                                                        <p>{{__('main.Creator')}}</p>
                                                    </div>
                                                @endif
                                                <div class="owner-box">
                                                    <img src="{{cdnAsset('assets/user/img/main-item-img/','bid-avatar.png')}}" alt="{{__('main.owner')}}">
                                                    <h6>{{highestBidService($service->id)}} {{__('USD')}}</h6>
                                                    <p>{{__('main.Highest Bid')}}</p>
                                                </div>
                                                <div class="owner-box">
                                                    <img src="{{cdnAsset('assets/user/img/main-item-img/','bid-avatar.png')}}" alt="{{__('main.owner')}}">
                                                    <h6>{{countBidService($service->id)}} </h6>
                                                    <p>{{__('main.All Bids')}}</p>
                                                </div>
                                                @if (isset($service->buyer_id))
                                                    <div class="owner-box">
                                                        <img src="{{is_null($service->buyer->photo) ? Avatar::create($service->buyer->first_name.' '.$service->buyer->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$service->buyer->photo)}}" alt="{{__('main.owner')}}">
                                                        <h6>{{$service->buyer->first_name.' '.$service->buyer->last_name}}</h6>
                                                        <p>{{__('main.Owner')}}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Main Item Leftside Box End -->
                                        <!-- Main Item Leftside Box Start -->
                                        <div class="main-item-leftside-box">
                                            <div class="highest-bid-box d-flex align-items-center justify-content-between">
                                                <div class="highest-box-item d-flex align-items-center">
                                                    <img src="{{cdnAsset('assets/user/img/main-item-img/','color-icon.png')}}" alt="{{__('main.bid')}}">
                                                    <div class="highest-box-text">
                                                        <p>{{__('main.Color')}}</p>
                                                        <h6>{{$service->color}}</h6>
                                                    </div>
                                                </div>
                                                <div class="highest-box-item d-flex align-items-center">
                                                    <img src="{{cdnAsset('assets/user/img/main-item-img/','country-icon.png')}}" alt="{{__('main.bid')}}">
                                                    <div class="highest-box-text">
                                                        <p>{{__('main.Origin')}}</p>
                                                        <h6>{{$service->origin}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-item-btn-box">
                                                <!-- If Wallet connected then show it -->
                                                @if (slodOutMessage($service->id) != 1)
                                                    @if (Auth::check() == true && Auth::user()->role == USER_ROLE_USER )
                                                        @if ($service->created_by == Auth::id())
                                                            <button class="theme-button1 w-100" data-toggle="modal" data-target="#purchaseNotModal">
                                                                {{__('main.Place a Bid')}}</button>
                                                        @else
                                                            <button class="theme-button1 w-100" data-toggle="modal" data-target="#purchase1Modal">
                                                                {{__('main.Place a Bid')}}</button>
                                                        @endif
                                                    @else
                                                        <button class="theme-button1 w-100" data-toggle="modal" data-target="#notAuthModal">
                                                            {{__('main.Place a Bid')}}</button>
                                                    @endif
                                                @else
                                                    <button class="theme-button1 w-100 disabled">
                                                        {{$service->buyer_id == Auth::id() ? __('main.You Buy This Product') :__('main.Stock Out')}}
                                                    </button>
                                                @endif

                                            </div>
                                            <p class="main-item-box-condition text-center">
                                                <span class="font-semi-bold">{{__('main.Transfer History')}}</span>
                                                <span><button data-toggle="modal" href="#transactionHistoryModal{{$service->id}}">{{__('main.Click Here')}}</button></span>
                                            </p>
                                        </div>
                                        <!-- Main Item Leftside Box End -->
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7">
                                    <div class="main-item-img-part position-relative d-flex justify-content-center">
                                        <div class="main-item-img">
                                            <img src="{{cdnAsset(IMG_SERVICE_PATH,$service->thumbnail)}}" alt="{{__('main.item')}}">
                                        </div>
                                        <!-- Main Item upper box start -->
                                        <div class="main-item-upper-box position-absolute w-100 d-flex justify-content-between">
                                            <!-- Main Item upper left -->
                                            <div class="main-item-upper-left">
                                                <span class="badge badge-pill">{{$service->category->title}}</span>
                                                @if($service->is_unlockable == 1)
                                                    <span class="badge badge-pill">{{__('main.Unlockable')}}</span>
                                                @endif
                                            </div>
                                            <!-- Main Item upper right -->
                                        </div>
                                        <!-- Main Item upper box end -->
                                        <!-- Countdown box start -->
                                        <div class="countdown-box position-absolute">
                                            <span class="bg-green time-remaining">{{__('main.Expired Date')}}</span>
                                            <div class="countdown">
                                                <input type="hidden" value="{{\Carbon\Carbon::parse($service->expired_at)->format('M j, Y H:i:s')}}" class="expired_time">
                                                <div class="timer-down-wrap"><span class="days">{{__('06')}}</span><span class="timing-title">{{__('main.Days')}}</span></div>
                                                <div class="timer-down-wrap"><span class="hours">{{__('06')}}</span><span class="timing-title">{{__('main.Hrs')}}</span></div>
                                                <div class="timer-down-wrap"><span class="minutes">{{__('35')}}</span><span class="timing-title">{{__('main.Min')}}</span></div>
                                                <div class="timer-down-wrap"><span class="seconds">{{__('54')}}</span><span class="timing-title">{{__('main.Sec')}}</span></div>
                                            </div>
                                        </div>
                                        <!-- Countdown box end -->
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- main item slider end -->
                </div>
            </div>
        </div>
    </section>
    <!-- northern light carousel Area End -->
    <div class="modal fade common-modal" id="transactionHistoryModal{{$service->id}}" tabindex="-1" aria-labelledby="transactionHistoryModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header p-0">
                        <h4 class="withdrawal-header modal-title">{{__('main.Transfer History')}}</h4>
                        <span class="fas fa-close">
                    </span>
                    </div>
                    <div class="modal-body p-0 pt-2 w-ajax-alert">
                        <div class="table-responsive">
                            <table id="serviceList" class="table table-striped table-bordered data-table display responsive">
                                <thead>
                                <tr>
                                    <th class="all">{{__('main.Previous Token')}}</th>
                                    <th class="all">{{__('main.New Token')}}</th>
                                    <th class="none">{{__('main.Transfer Date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(transferHistory($service->id) as $ats)
                                    <tr>
                                        <td><a href="{{MINT_URL.$ats->prev_mint_address}}">{{Str::limit($ats->prev_mint_address, 10, '...')}}</a></td>
                                        <td><a href="{{MINT_URL.$ats->new_mint_address}}">{{Str::limit($ats->new_mint_address, 10, '...')}}</a></td>
                                        <td>{{\Carbon\Carbon::parse($ats->created_at)->format('m-d-Y')}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">{{__('main.No Transfer Found!')}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script src="{{asset('assets/user/js/multi-countdown.js')}}"></script>
@if (Auth::check() && Auth::user()->role == 2)
    <script src="{{asset('assets/user/js/pages/product-view.js')}}"></script>
@endif
@endsection

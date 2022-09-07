@extends('user.master')
@section('title', isset($title) ? $title : __('Marketplace'))
@section('content')
    <!-- Page Banner Area start here  -->
    <div id="filter-url" data-url="{{route('filter_service')}}"></div>
    <section class="page-banner-area p-0" style="background-image: url({{is_null(allsetting()['dashboard_image']) || allsetting()['dashboard_image'] == '' ? cdnAsset(IMG_STATIC_PATH,'page-banner.png') : cdnAsset(IMG_PATH,allsetting()['dashboard_image'])}});">
        <div class="container">
            <!-- Page Banner element -->
            <div class="inner-page-single-dot1 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot1.png')}}" alt="{{__('dot')}}"></div>
            <div class="inner-page-single-dot2 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot2.png')}}" alt="{{__('dot')}}"></div>
            <div class="inner-page-single-dot3 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot3.png')}}" alt="{{__('dot')}}"></div>
            <!-- Page Banner element -->
            <div class="row page-banner-top-space">
                <div class="col-12 col-lg-12">
                    <div class="page-banner-content text-center">
                        <h1 class="page-banner-title">{{__('main.Search your keyword')}}</h1>
                        <div class="section-banner-search">
                            <form method="GET" action="{{route('search_result')}}">
                                <div class="form-group position-relative mb-0">
                                    <input type="search" name="keyword" class="form-control" placeholder="{{__('main.Search here...')}}" value="{{$keyword}}">
                                    <button type="submit" class="position-absolute"><i class="fas fa-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>

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
                            <li class="breadcrumb-item active" aria-current="page">{{__('main.Discover')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumb Area end here  -->
    <!-- Search Page Area start here  -->
    <section class="search-page-area section-t-space section-b-90-space">
        <div class="container">
            <div class="row">
                <!-- Search rightside Area -->
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="search-rightside-area">
                        <!-- Tab Nav -->
                        <div class="artists-nav-wrap d-flex justify-content-between">
                            <ul class="nav nav-tabs tab-nav-list border-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#All" role="tab">{{__('main.Search Result')}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Tab Nav -->
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="top-artist-warp tab-pane active" id="All" role="tabpanel">
                                <div class="row" id="all-service">
                                    <!-- Explore item start -->
                                    @forelse($services as $st)
                                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                            <div class="explore-item">
                                                <div class="artist-img position-relative">
                                                    <img src="{{cdnAsset(IMG_SERVICE_PATH,$st->thumbnail)}}" alt="{{__('main.explore-img')}}" class="img-fluid">
                                                    <div class="artist-overlay position-absolute">
                                                        <div class="price-box-wrap d-flex align-items-center justify-content-between">
                                                            @if ($st->type == 1)
                                                                <div class="bg-green price-btn">{{visual_number_format($st->price_dollar).' '.__('USD')}}</div>
                                                            @else
                                                                <div class="bg-green price-btn">{{__('main.Bid Now')}}</div>
                                                            @endif
                                                            <button class="bg-white add-like"><i class="fas fa-heart"></i></button>
                                                        </div>
                                                        @if ($st->type == 1)
                                                            <a href="{{route('product_view', encrypt($st->id))}}" class="place-a-bid-btn">{{__('main.Purchase Now')}}</a>
                                                        @elseif($st->type == 2)
                                                            <a href="{{route('product_view', encrypt($st->id))}}" class="place-a-bid-btn">{{__('main.Place a Bid')}}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="explore-content">
                                                    <a href="{{route('product_view', encrypt($st->id))}}"><h5 class="font-semi-bold">{{$st->title}}</h5></a>
                                                    <div class="explore-small-box explore-author-wrap d-flex align-items-center justify-content-between">
                                                        <div class="explore-author d-flex align-items-center">
                                                            <img src="{{is_null($st->author->photo) ? Avatar::create($st->author->first_name.' '.$st->author->last_name)->toBase64() : cdnAsset(IMG_USER_PATH,$st->author->photo)}}" alt="{{__('main.avatar')}}">
                                                            <p class="ml-2">{{__('main.By')}} <span>{{$st->author->first_name.' '.$st->author->last_name}}</span></p>
                                                        </div>
                                                        <div class="like-box">
                                                            <i class="far fa-heart"></i> {{$st->like}}
                                                        </div>
                                                    </div>

                                                    <div class="explore-small-box d-flex align-items-center justify-content-between">
                                                        @if ($st->type == 2)
                                                            <p>{{__('main.Highest Bid')}}<span>{{visual_number_format(highestBidService($st->id)).' '.__('USD')}}</span></p>
                                                        @endif

                                                        <p class="font-medium top-artist-stock-qty">{{round($st->available_item)}}
                                                            {{__('main.in stock')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="explore-item">
                                                <h1>{{__('main.No data found!')}}</h1>
                                            </div>
                                        </div>
                                    @endforelse
                                <!-- Explore item end -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content -->
                    </div>
                </div>
                <!-- Search rightside Area -->
            </div>
        </div>
    </section>
    <!-- Search Page Area end here  -->
@endsection
@section('script')
    <script src="{{asset('assets/user/js/pages/search-result.js')}}"></script>
@endsection

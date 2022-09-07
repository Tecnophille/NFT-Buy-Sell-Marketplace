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
                        <h1 class="page-banner-title">{{__('main.Upload Artwork')}}</h1>
                        <p class="page-banner-para">{{__('main.Choose you want your collectible to be one of a kind or if you want to sell one collectible multiple times')}}
                        </p>
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
                            <li class="breadcrumb-item active" aria-current="page">{{__('main.Upload Artwork')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumb Area end here  -->
    <!-- Upload Page Area start here  -->
    <section class="create-new-page-area section-t-space">
        <div class="container">
            {{Form::open(['route' => 'service_store', 'files' => true, 'data-handler'=>"showMessage" ,'class' => 'ajax'])}}
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-7">
                        <!-- Create New Box Start -->
                        <div class="create-new-page-box">
                            <h6 class="create-new-page-box-title font-weight-bold">{{__('main.Item Details')}}</h6>
                            <div class="form-group">
                                <label for="item-name">{{__('main.Service Type')}}</label>
                                <div class="common-radio d-flex align-items-center">

                                    <div class="radiobox-wrap">
                                        <label class="custom-radio" for="type1">
                                            <input id="type1" type="radio" name="type" value="{{FIXED_PRICE}}">

                                            <span class="label-text">
                                                <img src="{{cdnAsset('assets/user/img/upload-img/','1.svg')}}" alt="{{__('main.upload')}}">
                                                {{__('main.Fixed Price')}}
                                            </span>
                                        </label>
                                    </div>

                                      <div class="radiobox-wrap">
                                        <label class="custom-radio" for="type2">
                                            <input id="type2" type="radio" name="type" value="{{BID_PRICE}}">

                                            <span class="label-text">
                                                <img src="{{cdnAsset('assets/user/img/upload-img/','2.svg')}}" alt="{{__('main.upload')}}">
                                                {{__('main.Bid')}}
                                            </span>
                                         </label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item-name">{{__('main.Item name')}}</label>
                                <input type="text" class="form-control" id="item-name" name="title" placeholder="{{__("main.card-logo-text")}}'">
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('main.DESCRIPTION')}}</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="{{__("main.purchasing-you-will-text")}}"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="category">{{__('main.Category')}}</label>
                                        <select class="form-control" id="category" name="category_id">
                                            <option value="">{{__('main.---SELECT A CATEGORY---')}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->translateOrDefault(Session::get('locale'))->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12" id="price-d">
                                    <div class="form-group">
                                        <label for="price">{{__('main.Price')}}</label>
                                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price_dollar" placeholder="{{__('main.Price')}}">
                                    </div>
                                </div>
                                <input type="hidden" value="1" id="available_item" name="available_item">
                                <div class="col-12 col-lg-6 d-none" id="max_bid_d">
                                    <div class="form-group">
                                        <label for="max_bid_amount">{{__('main.Max Bid Amount')}}</label>
                                        <input type="number" step="0.01" min="0" class="form-control" id="max_bid_amount" name="max_bid_amount" value="999999">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 d-none" id="min_bid_d">
                                    <div class="form-group">
                                        <label for="min_bid_amount">{{__('main.Min Bid Amount')}}</label>
                                        <input type="number" step="0.01" min="0" class="form-control" id="min_bid_amount" name="min_bid_amount" value="0.01">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="color">{{__('main.Color')}}</label>
                                        <select class="form-control" id="color" name="color">
                                            <option value="">{{__('main.---SELECT COLOR---')}}</option>
                                            @foreach(colors() as $color)
                                            <option value="{{$color}}">{{$color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="origin">{{__('main.Origin')}}</label>
                                        <select class="form-control" id="origin" name="origin">
                                            <option value="">{{__('main.---SELECT ORIGIN---')}}</option>
                                            @foreach(country() as $origin)
                                                <option value="{{$origin}}">{{$origin}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="video_link">{{__('main.Video Link')}} </label>
                                        <input type="text" class="form-control" id="video_link" name="video_link" placeholder="{{__('main.Video Link')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="video_link">{{__('main.Mint Address')}} </label>
                                        <input type="text" class="form-control" id="mint_address" name="mint_address" placeholder="{{__('main.Mint Address')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="expired_date">{{__('main.Expired Date')}} </label>
                                        <input type="date" class="form-control" id="expired_date" name="expired_date" placeholder="{{__('main.Expired Date')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="expired_time">{{__('main.Expired Time')}} </label>
                                        <input type="time" class="form-control" id="expired_time" name="expired_time" placeholder="{{__('main.Expired Time')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Create New Box End -->
                        <!-- Create New Box Start -->
                        <div class="create-new-page-box">
                            <div class="create-new-page-box-inner d-flex justify-content-between">
                                <div>
                                    <h6 class="create-new-page-box-title font-weight-bold">{{__('main.Unlock once purchased')}}
                                    </h6>
                                    <p>{{__('main.Content will be unlocked after successful transaction')}}
                                    </p>
                                </div>
                                <div>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="is_unlockable">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Create New Box End -->
                        <!-- Create New Box Start -->
                        <div class="ajax-alert">
                        </div>
                        <!-- Create New Box End -->
                        <!-- Create New Box Start -->
                        <div class="create-new-page-box">
                            <div class="create-new-page-box-inner d-flex justify-content-between align-items-center">
                                <div>
                                    <button type="submit" class="theme-button1">{{__('main.Create Item')}}</button>
                                    <button type="button" class="theme-button2" data-toggle="modal" data-target="#mainItemPreviewModal" id="show-prev">
                                        {{__('main.Show Preview')}}</button>
                                </div>
                                <div class="save-or-not-msg" id="file-saved">{{__('main.File Saved !')}}</div>
                            </div>
                        </div>
                        <!-- Create New Box End -->
                    </div>
                    <div class="col-12 col-md-5 col-lg-5">
                        <!-- Create New Box Start -->
                        <div class="create-new-page-box">
                            <h6 class="create-new-page-box-title font-weight-bold">{{__('main.Upload file')}}</h6>
                            <p>{{__('main.Drag or choose your file to upload')}}</p>
                            <div class="form-group custom-file-upload">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input putImage1" id="customFile" name="thumbnail">
                                    <label class="custom-file-label" for="customFile">
                                        <i class="fas fa-cloud-download-alt"></i>
                                        <span class="d-block color-green">{{__('PNG, JPG, GIF. Max 1Gb.')}}</span>
                                        <span class="d-block color-green">{{__('Width: 613px, height: 703')}}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Create New Box End -->
                        <!-- Create New Box Start -->
                        <div class="create-new-page-box">
                            <div class="create-new-page-box-inner d-flex justify-content-between">
                                <div>
                                    <h6 class="create-new-page-box-title font-weight-bold">{{__('main.Preview')}}</h6>
                                </div>
                                <div>
                                    <button type="button" class="color-green show-full-preview" data-toggle="modal" data-target="#mainItemPreviewModal">
                                        {{__('main.Show Full Preview')}}</button>
                                </div>
                            </div>
                            <img src="{{cdnAsset('assets/user/img/main-item-img/','create-new-preview.jpg')}}" alt="{{__('preview')}}" class="img-fluid preview-img" id="target1">
                        </div>
                        <!-- Create New Box End -->
                    </div>
                </div>
            {{Form::close()}}
        </div>
    </section>
    <!-- Upload Page Area end here  -->
@endsection
@section('script')
    <script src="{{asset('assets/user/js/pages/service-create.js')}}"></script>
@endsection

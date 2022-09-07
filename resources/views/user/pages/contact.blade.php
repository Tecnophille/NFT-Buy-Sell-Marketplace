@extends('user.master')
@section('title', isset($title) ? $title : __('Marketplace'))
@section('content')
    <!-- Page Banner Area start here  -->
    <section class="page-banner-area p-0" style="background-image: url({{cdnAsset(IMG_PATH,allsetting()['dashboard_image'])}});">
        <div class="container">
            <!-- Page Banner element -->
            <div class="inner-page-single-dot1 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot1.png')}}" alt="{{__('main.dot')}}"></div>
            <div class="inner-page-single-dot2 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot2.png')}}" alt="{{__('main.dot')}}"></div>
            <div class="inner-page-single-dot3 position-absolute"><img src="{{cdnAsset('assets/user/img/footer-img/','footer-dot3.png')}}" alt="{{__('main.dot')}}"></div>
            <!-- Page Banner element -->
            <div class="row page-banner-top-space">
                <div class="col-12 col-lg-12">
                    <div class="page-banner-content text-center">
                        <h1 class="page-banner-title">{{__('main.Contact Us')}}</h1>
                        <p class="page-banner-para">{{__('main.nft-news-text')}}</p>
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
                            <li class="breadcrumb-item active" aria-current="page">{{__('main.Contact Us')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumb Area end here  -->
    <!-- Contact Page Area start here  -->
    <section class="contact-page-area section-t-space">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 ajax-alert" >
                    <div class="contact-form">
                        {{Form::open(['route' => 'contact_store', 'files' => true, 'data-handler'=>"showMessage" ,'class' => 'ajax'])}}
                            <div class="form-group">
                                <label>{{__('Title')}}</label>
                                <input type="text" class="form-control" name="title" placeholder="{{__('main.Enter title!')}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('Email')}}</label>
                                <input type="text" class="form-control" name="email" placeholder="{{__('main.Enter your email!')}}">
                            </div>
                            <div class="form-group">
                                <label for="contact_message">{{__('main.Can you give us more details?')}}</label>
                                <textarea class="form-control" id="contact_message" name="message" rows="3" placeholder="{{__('main.Add any additional information we can use to help you')}}"></textarea>
                            </div>
                            <div class="form-group custom-file-upload">
                                <label>{{__('main.Attach files (optional)')}}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                                    <label class="custom-file-label" for="customFile">
                                        {{__('main.Drag & drop a file to attach it, or')}}
                                        <span class="d-block color-green">{{__('main.browse for a file...')}}</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="theme-button1">{{__('main.Send us a message')}} <i class="fas fa-arrow-right"></i></button>
                        {{Form::close()}}
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="contact-right-side">
                        <img src="{{cdnAsset('assets/user/img/contact-img/','contact-img.png')}}" alt="{{__('main.contact')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

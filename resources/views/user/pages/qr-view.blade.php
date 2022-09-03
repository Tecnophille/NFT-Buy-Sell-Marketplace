@extends('user.master')
@section('title', isset($title) ? $title : __('Marketplace'))
@section('content')
    @include('user.components.dashboard-breadcumb')
    <section class="profile-page-area section-t-space section-b-90-space">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="search-sidebar-wrap user-profile-sidebar-wrap">
                        @include('user.components.user-sidebar')
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="search-rightside-area">
                        <h4>{{__('main.QR Code Generate')}}</h4>
                        <div class="my-2">
                            <b class="font-18">{{__('main.Setup Google Authenticator')}}</b>
                            <p class="mb-2">{{__('main.Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code')}} {{ $google2fa_secret }}</p>
                            <div>
                                {!! $QR_Image !!}
                            </div>
                            <p>{{__('main.You must set up your Google Authenticator app before continuing. You will be unable to login otherwise')}}</p>
                            <form action="{{route('complete_google_2fa')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success py-1 px-2">{{__('main.Complete 2FA Authentication')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

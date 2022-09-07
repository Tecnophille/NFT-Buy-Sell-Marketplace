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
                        <h4>{{__('main.Two Factor Authentication')}}</h4>
                        @if ($user->g2f_enabled == 1)
                            <div class="text-center my-2">
                                <i class="fa fa-lock font-18"></i><br>
                                <b class="font-18">{{__('main.Two factor authentication is enabled.')}}</b>
                                <p class="mb-2">{{__('main.Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to sign in.')}}</p>
                                <form action="{{route('disable_google_2fa')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger py-1 px-2">{{__('main.Disable two-factor authentication')}}</button>
                                </form>
                            </div>
                        @else
                            <div class="text-center my-2">
                                <i class="fa fa-lock font-18"></i><br>
                                <b class="font-18">{{__('main.Two factor authentication is not enabled yet.')}}</b>
                                <p class="mb-2">{{__('main.Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to sign in.')}}</p>
                                <form action="{{route('enable_google_2fa')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success py-1 px-2">{{__('main.Enable two-factor authentication')}}</button>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

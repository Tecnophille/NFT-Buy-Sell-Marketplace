@extends('user.master')
@section('title', isset($title) ? $title : __('Marketplace'))
@section('content')
    <!--Main Menu/Navbar Area Start -->
    @include('user.components.dashboard-breadcumb')
    <!-- Connect Your Wallet Page Area start here  -->
    <section class="profile-page-area section-t-space section-b-90-space">
        <div class="container">
            <div class="row">
                <!-- Profile Sidebar Area Start -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="search-sidebar-wrap user-profile-sidebar-wrap">
                        <!-- User Dashboard Sidebar Menu Start-->
                    @include('user.components.user-sidebar')
                    <!-- User Dashboard Sidebar Menu End -->
                    </div>
                </div>
                <!-- Profile Sidebar Area End -->
                <!-- Profile rightside Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="search-rightside-area">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="card user-dashboard-page-card mb-3">
                                    <div class="card-header">{{__('main.Deposit')}}</div>
                                    <div class="card-body">
                                        <h1 class="card-title mb-0">{{visual_number_format($deposit_sum)}}</h1>
                                        <div class="user-dashboard-card-icon">
                                            <i class="fas fa-shopping-bag"></i>
                                        </div>
                                    </div>
                                    <a href="{{route('deposit_data')}}" class="card-footer text-muted">
                                        {{__('main.More-Info')}} <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card user-dashboard-page-card mb-3">
                                    <div class="card-header">{{__('main.Withdraw')}}</div>
                                    <div class="card-body">
                                        <h1 class="card-title mb-0">{{visual_number_format($withdraw_sum)}}</h1>
                                        <div class="user-dashboard-card-icon">
                                            <i class="far fa-chart-bar"></i>
                                        </div>
                                    </div>
                                    <a href="{{route('withdraw_data')}}" class="card-footer text-muted">
                                        {{__('main.More-Info')}} <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card user-dashboard-page-card mb-3">
                                    <div class="card-header">{{__('main.Purchase')}}</div>
                                    <div class="card-body">
                                        <h1 class="card-title mb-0">{{$purchase_sum}}</h1>
                                        <div class="user-dashboard-card-icon">
                                            <i class="fas fa-store"></i>
                                        </div>
                                    </div>
                                    <a href="{{route('purchase_history')}}" class="card-footer text-muted">
                                        {{__('main.More-Info')}} <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card user-dashboard-page-card mb-3">
                                    <div class="card-header">{{__('main.Products')}}</div>
                                    <div class="card-body">
                                        <h1 class="card-title mb-0">{{$service_sum}}</h1>
                                        <div class="user-dashboard-card-icon">
                                            <i class="fas fa-box-open"></i>
                                        </div>
                                    </div>
                                    <a href="{{route('my_service_data')}}" class="card-footer text-muted">
                                        {{__('main.More-Info')}} <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile rightside Area -->
            </div>
        </div>
    </section>
    <!-- Connect Your Wallet Page Area end here  -->
@endsection

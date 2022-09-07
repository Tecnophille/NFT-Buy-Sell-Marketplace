@extends('admin.master',['menu'=>'earnings', 'sub_menu'=>'coin_list'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div id="table-url" data-url="{{route('admin_platform_earnings')}}"></div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Earnings')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Earnings')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Earnings')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('user.message')
                    <div class="card">
                        <div class="card-body">
                            <table id="slider" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>{{__('Coin Type')}}</th>
                                    <th>{{__('Full Name')}}</th>
                                    <th>{{__('Earnings')}}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('assets/admin/dist/js/pages/coin/earnings.js')}}"></script>
@endsection

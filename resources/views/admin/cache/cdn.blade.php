@extends('admin.master',['menu'=>'caching', 'sub_menu' => __('cdn')])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('CDN Configuration')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Caching')}}</a></li>
                        <li class="breadcrumb-item active">{{__('CDN')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Cache Configuration')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info" role="alert">
                                <h4 class="alert-heading">{{__('Warning!')}}</h4>
                                <p>{{__('This section is very sensitive. For changing this section you have to require well knowledge about content delivery network. All the changes make effect this application. Be sure you are a technical person.')}}</p>
                                <hr>
                                <p class="mb-0">{{__('All changes may effect the application. It effects for with in couple of minutes. But sometimes it takes more than hours.')}}</p>
                            </div>
                            @include('admin.message')
                            <form method="POST" action="{{route('admin_update_cdn')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">{{__('Site Address')}}</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="cdn_base" placeholder="{{__('Put your domain name like: nftzai.zainikthemes.com')}}" value="{{allsetting()['cdn_base']}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="is_cdn" id="cdnConfigSwitch" {{allsetting()['is_cdn'] == 1 ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="cdnConfigSwitch">{{__('Toggle this icon
                                                for enable/disable Caching')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">{{__('Configure')}}</button>
                            </form>
                            <br>
                            <small class="text-info">{{__('* We are using')}} <a href="https://statically.io/" target="_blank">{{__('Statically')}}</a> {{__('CDN. This will effect all image assets of this application.')}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

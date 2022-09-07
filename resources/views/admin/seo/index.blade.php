@extends('admin.master',['menu'=>'seo'])
@section('title',__('SEO Settings'))
@section('content')
    <section class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{__('SEO')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('SEO Settings')}}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="main-content-inner">
                        <div class="row">
                            <div class="col-12">
                                @include('user.message')
                                <div class="card">
                                    <div class="card-body">
                                        {{Form::open(['route'=>'admin_update_seo'])}}
                                        <input type="hidden" value="" name="slider_id">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <div class="form-label">{{__('Meta Title')}}</div>
                                                        <input type="text" class="form-control" name="meta_title" value="{{allsetting()['meta_title']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <div class="form-label">{{__('Meta Description')}}</div>
                                                        <input type="text" class="form-control" name="meta_description" value="{{allsetting()['meta_description']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <div class="form-label">{{__('Meta Keywords')}}</div>
                                                        <input type="text" class="form-control" name="meta_keywords" value="{{allsetting()['meta_keywords']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <div class="form-label">{{__('Meta Author')}}</div>
                                                        <input type="text" class="form-control" name="meta_author" value="{{allsetting()['meta_author']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <button type="submit" class="btn btn-info">{{__('Update')}}</button>
                                            </div>
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('assets/admin/dist/js/pages/slider/slider.js')}}"></script>
@endsection

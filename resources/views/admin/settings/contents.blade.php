@extends('admin.master',['menu'=>'setting','sub_menu'=>'contents'])
@section('title',__('Contents'))
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="main-content-inner">
                        <div class="row">
                            <div class="col-12 mt-5">
                                @include('user.message')
                                <div class="card">
                                    <div class="card-body">
                                        {{Form::open(['route'=>'admin_contents_update'])}}
                                        <div class="row">
                                            @foreach (allLanguage() as $al)
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Title (Famous Promo)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_famous_title_{{$al->prefix}}" value="{{allcontents('home_famous_title',$al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Content (Famous Promo)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_famous_content_{{$al->prefix}}" value="{{allcontents('home_famous_content', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Title (Latest)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_latest_title_{{$al->prefix}}" value="{{allcontents('home_latest_title', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Content (Latest)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_latest_content_{{$al->prefix}}" value="{{allcontents('home_latest_content', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Title (Explorer)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_explorer_title_{{$al->prefix}}" value="{{allcontents('home_explorer_title', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Content (Explorer)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_explorer_content_{{$al->prefix}}" value="{{allcontents('home_explorer_content', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Title (Footer)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_footer_title_{{$al->prefix}}" value="{{allcontents('home_footer_title', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Content (Footer)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="home_footer_content_{{$al->prefix}}" value="{{allcontents('home_footer_content', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                            @endforeach

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

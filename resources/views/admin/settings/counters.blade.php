@extends('admin.master',['menu'=>'setting','sub_menu'=>'counters'])
@section('title',__('Counters'))
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
                                    <div class="card-body admin-counter-form-wrap">
                                        {{Form::open(['route'=>'admin_counters_update', 'files' => true])}}
                                        <div class="row">
                                            @foreach (allLanguage() as $al)
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Title')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="counters_title_{{$al->prefix}}" value="{{allcontents('counters_title', $al->prefix)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-md-12">
                                                {{-- <div class="form-group"> --}}
                                                    <div class="controls">
                                                        @foreach (allLanguage() as $al)
                                                            <div class="form-label">{{__('Counts')}} ({{$al->name}})</div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control mb-4" name="counters_content_one_{{$al->prefix}}" value="{{allcontents('counters_content_one', $al->prefix)}}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control mb-4" name="counters_content_two_{{$al->prefix}}" value="{{allcontents('counters_content_two', $al->prefix)}}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control mb-4" name="counters_content_three_{{$al->prefix}}" value="{{allcontents('counters_content_three', $al->prefix)}}">
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control mb-4" name="counters_count_one" value="{{allsetting()['counters_count_one']}}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control mb-4" name="counters_count_two" value="{{allsetting()['counters_count_two']}}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control mb-4" name="counters_count_three" value="{{allsetting()['counters_count_three']}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{-- </div> --}}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group choose-img-upload-wrap mb-4">
                                                    <div class="controls">
                                                        <div class="form-label">{{__('Image (One)')}}</div>
                                                        <input type="file" class="form-control" name="counters_img_one">
                                                    </div>
                                                </div>

                                                <div class="form-group admin-inner-pages-thumb">
                                                    <img src="{{asset(path_image().allsetting()['counters_img_one'])}}" alt="img" class="img-fluid">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group choose-img-upload-wrap mb-4">
                                                    <div class="controls">
                                                        <div class="form-label">{{__('Image (Two)')}}</div>
                                                        <input type="file" class="form-control" name="counters_img_two">
                                                    </div>
                                                </div>

                                                <div class="form-group admin-inner-pages-thumb">
                                                    <img src="{{asset(path_image().allsetting()['counters_img_two'])}}" alt="img" class="img-fluid">
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

@extends('admin.master',['menu'=>'setting','sub_menu'=>'slider'])
@section('title',__('Slider'))
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
                                        {{Form::open(['route'=>'admin_slider_update'])}}
                                        <input type="hidden" value="{{$slider->id}}" name="slider_id">
                                        <div class="row">
                                            @foreach (allLanguage() as $al)
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Short Description')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="short_description_{{$al->prefix}}" value="{{$slider->translateOrDefault($al->prefix)->short_description}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Long Description (Header)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="long_desc_header_{{$al->prefix}}" value="{{$slider->translateOrDefault($al->prefix)->long_desc_header}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Long Description (Middle)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="long_desc_middle_{{$al->prefix}}" value="{{$slider->translateOrDefault($al->prefix)->long_desc_middle}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <div class="form-label">{{__('Long Description (Footer)')}} ({{$al->name}})</div>
                                                            <input type="text" class="form-control" name="long_desc_footer_{{$al->prefix}}" value="{{$slider->translateOrDefault($al->prefix)->long_desc_footer}}">
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
@section('script')
    <script src="{{asset('assets/admin/dist/js/pages/slider/slider.js')}}"></script>
@endsection

@extends('admin.master',['menu'=>'category_list'])
@section('title', isset($title) ? $title : '')
@section('style')
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit Category')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Category Management')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Edit Category')}}</li>
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
                            <h3 class="card-title">{{__('Edit Category')}}</h3>
                        </div>
                        <div class="card-body">
                            @include('admin.message')
                            <form method="POST" action="{{route('admin_update_category', encrypt($category->id))}}">
                                @csrf
                                @foreach (allLanguage() as $al)
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('Title')}} ({{$al->name}})</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="title_{{$al->prefix}}" placeholder="{{__('Enter title')}}" value="{{$category->translateOrDefault($al->prefix)->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{__('Description')}} ({{$al->name}})</label>
                                        <textarea id="description" class="form-control"  name="description_{{$al->prefix}}">{{$category->translateOrDefault($al->prefix)->description}}</textarea>
                                    </div>
                                    <hr>
                                @endforeach

                                <button type="submit" class="btn btn-info">{{__('Update Category')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

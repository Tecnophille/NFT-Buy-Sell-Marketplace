@extends('admin.master',['menu'=>'language'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div id="table-url" data-url="{{route('admin_all_languages')}}"></div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('All Languages')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Languages')}}</a></li>
                        <li class="breadcrumb-item active">{{__('All Languages')}}</li>
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
                            <h3 class="card-title float-right"><a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#addLanguageModal"><i class="fa fa-plus"></i> {{__('Add')}}</a></h3>
                        </div>
                        <div class="card-body">
                            @include('admin.message')
                            <div class="table-area">
                                <div class="table-responsive">
                                    {{-- <table id="slider" class="table table-bordered table-striped responsive"> --}}
                                    <table id="slider" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="all">{{__('Name')}}</th>
                                            <th scope="col" class="all">{{__('Prefix')}}</th>
                                            <th scope="col" class="all">{{__('direction')}}</th>
                                            <th scope="col" class="all">{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="addLanguageModal" tabindex="-1" role="dialog" aria-labelledby="addLanguageModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLanguageModalLongTitle">{{__('Add Language')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin_language_store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" value="" name="slider_id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="form-label">{{__('Name')}}</div>
                                                <input type="text" class="form-control" name="name" placeholder="{{__('Language name..')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="form-label">{{__('Prefix')}}</div>
                                                <input type="text" class="form-control" name="prefix" placeholder="{{__('Language prefix')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="form-label">{{__('Direction')}}</div>
                                                <select name="direction" id="direction" class="form-control">
                                                    <option value="">{{__('---SELECT DIRECTION---')}}</option>
                                                    <option value="ltr">{{__('LTR')}}</option>
                                                    <option value="rtl">{{__('RTL')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-info">{{__('* After adding the new language you have to integrate static translations of this app. For this first download this')}}
                                        <a href="{{asset('assets/admin/lang/es.zip')}}" download>{{__('file')}}</a>{{__(" and extract it. Change the folder name 'es to your prefix' and paste it to './resources/lang/'. Then open the 'main.php ' file and update the translation where necessary.")}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($languages as $lang)
        <div class="modal fade" id="editLanguageModal{{$lang->id}}" tabindex="-1" role="dialog" aria-labelledby="editLanguageModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLanguageModalLongTitle">{{__('Edit Languages')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin_language_update', encrypt($lang->id))}}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" value="" name="slider_id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="form-label">{{__('Name')}}</div>
                                                <input type="text" class="form-control" name="name" value="{{$lang->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="form-label">{{__('Prefix')}}</div>
                                                <input type="text" class="form-control" name="prefix" value="{{$lang->prefix}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="form-label">{{__('Direction')}}</div>
                                                <select name="direction" id="direction" class="form-control">
                                                    <option value="">{{__('---SELECT DIRECTION---')}}</option>
                                                    <option value="ltr" {{$lang->direction == 'ltr' ? 'selected' : ''}}>{{__('LTR')}}</option>
                                                    <option value="rtl" {{$lang->direction == 'rtl' ? 'selected' : ''}}>{{__('RTL')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script src="{{asset('assets/admin/dist/js/pages/languages/list.js')}}"></script>
@endsection

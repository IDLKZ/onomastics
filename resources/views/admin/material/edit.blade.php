@extends('layouts.backend.layout')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
        .img-thumbnail img{
            width: 150px!important;
            height: 150px!important;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">add</i>
                    </div>
                    <h4 class="card-title">{{__("content.edit_material")}}</h4>
                </div>
                <div class="card-body ">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-rose">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>
                                    {{$error}}
                                </span>
                            </div>

                        @endforeach
                    @endif
                    <form method="post" action="{{route("admin-material.update",$material->id)}}"  id="js-form" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="form-group bmd-form-group">
                            <label for="title" class="bmd-label-floating">{{__("validation.attributes.title")}}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$material->title}}">
                        </div>


                        <div class="form-group bmd-form-group py-4">
                            <p>{{__("validation.attributes.news_id")}}</p>
                            <select class="form-control w-100 news-select" name="news_id">
                                @if($news->isNotEmpty())
                                    @foreach($news as $news)
                                        @if($news->id == $material->news_id)
                                        <option selected="selected" value="{{$news->id}}">{{$news->title}}</option>
                                        @else
                                        <option value="{{$news->id}}">{{$news->title}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group bmd-form-group">
                            <p class="font-weight-bold">{{__("validation.attributes.img")}}</p>
                            <div class="fileinput2 fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                <div>
                                <span class="btn btn-outline-secondary btn-file">
                                  <span class="fileinput-new btn-rose">{{__("content.select")}}</span>
                                  <span class="fileinput-exists">{{__("content.edit")}}</span>
                                  <input type="file" name="img">
                                </span>
                                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{__("content.delete")}}</a>
                                </div>
                            </div>
                        </div>


                        <div class="card-footer ">
                            <a href="{{route('admin-material.index')}}" class="btn btn-fill btn-default">{{__("content.back")}}</a>
                            <button type="submit" class="btn btn-fill btn-rose ml-auto">{{__("content.edit")}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.fileinput2').fileinput();
            $('.news-select').select2();
        });
    </script>
@endpush


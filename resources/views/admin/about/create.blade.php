@extends('layouts.backend.layout')
@push('styles')
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
                    <h4 class="card-title">{{__("content.create")}}</h4>
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
                    <form method="post" action="{{route("admin-about.store")}}"  id="js-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group bmd-form-group py-4">
                            <select class="form-control w-100" id="category" name="language_id">
                                @if($languages->isNotEmpty())
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group bmd-form-group">
                            <label for="content">{{__("validation.attributes.content")}}</label>
                            <textarea id="content" name="content">

                            </textarea>
                        </div>






                        <div class="card-footer ">
                            <a href="{{route('admin-slider.index')}}" class="btn btn-fill btn-default">{{__("content.back")}}</a>
                            <button type="submit" class="btn btn-fill btn-rose ml-auto">{{__("content.create")}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>    <!-- Latest compiled and minified JavaScript -->

    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endpush


@extends('layouts.backend.layout')
@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
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
                    <h4 class="card-title">Email</h4>
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
                    <form method="post" action="{{route("admin-email.store")}}"  id="js-form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group bmd-form-group">
                            <label for="title" class="bmd-label-floating">{{__("validation.attributes.email")}}</label>
                            <input type="email" class="form-control"  name="email" value="{{old("email")}}">
                        </div>




                        <div class="card-footer ">
                            <a href="{{route('admin-email.index')}}" class="btn btn-fill btn-default">{{__("content.back")}}</a>
                            <button type="submit" class="btn btn-fill btn-rose ml-auto">{{__("content.create")}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


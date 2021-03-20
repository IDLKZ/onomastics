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
                    <h4 class="card-title">{{__("content.create_partners")}}</h4>
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
                    <form method="post" action="{{route("admin-social.store")}}"  id="js-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group py-4">
                            <select class="form-control w-100" id="icon" name="icon">
                                <option value="fab fa-facebook-square"> Facebook</option>
                                <option value="fab fa-instagram-square"> Instagram</option>
                                <option value="fab fa-vk"> VK</option>
                                <option value="fas fa-envelope-square"> Email</option>
                                <option value="fab fa-linkedin"> LinkedIn</option>
                                <option value="fab fa-whatsapp-square"> WhatsApp</option>
                                <option value="fab fa-twitter-square"> Twitter</option>
                                <option value="fab fa-youtube-square"> Youtube</option>

                            </select>


                        </div>

                        <div class="form-group bmd-form-group">
                            <label for="title" class="bmd-label-floating">{{__("validation.attributes.links")}}</label>
                            <input type="text" class="form-control"  name="link" value="{{old("link")}}">
                        </div>




                        <div class="card-footer ">
                            <a href="{{route('admin-dictionary.index')}}" class="btn btn-fill btn-default">{{__("content.back")}}</a>
                            <button type="submit" class="btn btn-fill btn-rose ml-auto">{{__("content.create")}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection



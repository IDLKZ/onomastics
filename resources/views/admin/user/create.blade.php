@extends('layouts.backend.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{route('admin-user.store')}}" id="js-form" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">user</i>
                        </div>
                        <h4 class="card-title">{{__("content.create_user")}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group bmd-form-group">
                            <select class="form-control w-100" id="category" name="role_id">
                                @if($roles->isNotEmpty())
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="form-group bmd-form-group">
                            <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.name")}}</label>
                            <input type="text" name="name" class="form-control" id="exampleTitle">
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="form-group bmd-form-group">
                            <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.email")}}</label>
                            <input type="email" name="email" class="form-control" id="exampleTitle">
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="form-group bmd-form-group">
                            <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.phone")}}</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="form-group bmd-form-group">
                            <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.password")}}</label>
                            <input type="password" name="password" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group bmd-form-group px-2">
                        <p class="font-weight-bold">{{__("validation.attributes.img")}}</p>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 250px; height: 250px; overflow: hidden"></div>
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
                    <div class="form-group bmd-form-group">
                        <div class="col-md-6">
                            <h4 class="title">{{__("validation.attributes.status")}}</h4>
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" name="status">
                                    <span class="toggle"></span>
                                    {{__("validation.attributes.status")}}
                                </label>
                            </div>
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" name="banned">
                                    <span class="toggle"></span>
                                    {{__("validation.attributes.banned")}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin-user.index')}}" class="btn btn-fill btn-default">{{__("content.back")}}</a>
                        <button type="submit" class="btn btn-fill btn-rose ml-auto">{{__("content.create")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js" integrity="sha512-VpQwrlvKqJHKtIvpL8Zv6819FkTJyE1DoVNH0L2RLn8hUPjRjkS/bCYurZs0DX9Ybwu9oHRHdBZR9fESaq8Z8A==" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>

    <script>
        $("#phone").inputmask({"mask": "+9999-999-99-99"});
        $('.fileinput').fileinput();
    </script>

@endpush

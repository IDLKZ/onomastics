@extends("layouts.backend.layout")


@section("content")
<div class="content">
    <div class="row bg-white py-5">
        <div class="col-md-4">
            <img src="{{auth()->user()->img}}" style="width: 100%">
        </div>
        <div class="col-md-8">
            <div class="card-body ">
                <div class="form-group bmd-form-group">
                    <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.name")}}</label>
                    <input type="text" readonly="readonly" class="form-control px-2 py-2" id="exampleTitle" value="{{auth()->user()->name}}">
                </div>
            </div>
            <div class="card-body ">
                <div class="form-group bmd-form-group">
                    <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.email")}}</label>
                    <input type="text" readonly="readonly" class="form-control px-2 py-2" id="exampleTitle" value="{{auth()->user()->email}}">
                </div>
            </div>

            <div class="card-body ">
                <div class="form-group bmd-form-group">
                    <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.phone")}}</label>
                    <input type="text" readonly="readonly" class="form-control px-2 py-2" id="exampleTitle" value="{{auth()->user()->phone}}">
                </div>
            </div>

            <div class="card-body ">
                <div class="form-group bmd-form-group">
                    <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.role_id")}}</label>
                    <input type="text" readonly="readonly" class="form-control px-2 py-2" id="exampleTitle" value="{{auth()->user()->role_id == 1 ? "Админ" : "Редактор"}}">
                </div>
            </div>
            @if(auth()->user()->role_id == 1)
            <div class="text-right">
                <a class="btn btn-warning" href="{{route("admin-user.edit",auth()->id())}}">{{__("content.edit")}}</a>
            </div>
            @endif

        </div>

    </div>
</div>
@endsection

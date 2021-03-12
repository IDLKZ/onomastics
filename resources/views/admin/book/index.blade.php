@extends('layouts.backend.layout')
@push('styles')
    <style>
        .create{
            border-radius: 3px;
            background-color: #999999;
            padding: 15px;
            margin-top: -60px;
            margin-right: 15px;
            float: right;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4);
            background: linear-gradient(60deg, #ec407a, #d81b60);
            background-color: rgba(0, 0, 0, 0);
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">book</i>
                    </div>
                    <h4 class="card-title">{{__("content.books")}}</h4>
                    <a href="{{route('admin-book.create')}}" class="btn btn-primary create">{{__("content.create")}}<div class="ripple-container"></div></a>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        @if($books->isNotEmpty())
            @foreach($books as $item)
                <div class="col-md-4">
                    <div class="card card-product" data-count="10" style="min-height: 500px">
                        <div class="card-header card-header-image" data-header-animation="true">
                            <a href="{{route("admin-book.show",$item->id)}}">
                                <img class="img" src="{{$item->img}}" style="width: 100%;">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-actions text-center">
                                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i>
                                </button>
                                <a href="{{route("admin-book.show",$item->id)}}" type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="{{__("content.show")}}">
                                    <i class="material-icons">art_track</i>
                                </a>
                                <a href="{{route("admin-book.edit",$item->id)}}" type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="{{__("content.edit")}}">
                                    <i class="material-icons">edit</i>
                                </a>
                                <form class="d-inline" method="post" action="{{route("admin-book.destroy",$item->id)}}">
                                    @csrf()
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="{{__("content.delete")}}" aria-describedby="tooltip578362">
                                        <i class="material-icons">close</i>
                                    </button>
                                </form>

                            </div>
                            <h4 class="card-title">
                                <a href="{{route("admin-book.show",$item->id)}}">{{strlen($item->title)>25 ? mb_substr($item->title,0,25) . "...." : $item->title}}</a>
                            </h4>

                        </div>
                        <div class="card-footer">
                            <div class="price">
                                <h4>{{$item->created_at->diffForHumans()}}</h4>
                            </div>
                            <div class="stats">
                                <h4 class="card-category"><i class="material-icons">user</i>{{$item->author_id}} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="d-flex justify-content-center">
                    {{$books->links()}}
                </div>
        @else
            <div class="col-md-12 bg-white">
                <h3 class="text-danger">{{__("content.empty")}}</h3>
                <br>
                <a href="{{route("admin-book.create")}}" class="btn btn-rose">{{__("content.create")}}</a>
            </div>

        @endif
    </div>
@endsection

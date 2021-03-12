@extends('layouts.backend.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info</i>
                    </div>
                    <h4 class="card-title"> {{$book->title}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card px-4 py-4">
                <h2 class="card-title">{{$book->author_id}} - {{$book->title}}</h2>
                <p>{{\Carbon\Carbon::parse($book->created_at)->format("d/m/Y H:i:s")}}</p>

                <div class="row">
                    <div class="col-md-4">
                        <img src="{{$book->img}}" style="width: 100%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-description">
                            {!! $book->description !!}
                        </div>
                        <a class="btn btn-primary" href="{{$book->file}}" target="_blank">{{__("content.read")}}</a>
                    </div>
                </div>

            </div>
            <a class="btn btn-default" href="{{route("admin-book.index")}}">{{__("content.back")}}</a>
        </div>

    </div>
@endsection

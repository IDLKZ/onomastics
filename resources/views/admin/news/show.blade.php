@extends('layouts.backend.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info</i>
                    </div>
                    <h4 class="card-title"> {{$news->title}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card px-4 py-4">
                <h2 class="card-title">{{$news->title}}</h2>
                    <p>{{\Carbon\Carbon::parse($news->created_at)->format("d/m/Y H:i:s")}}</p>
                    <img src="{{$news->img}}">
                <h4 class="card-category">{{$news->subtitle}}</h4>
                <div class="card-description">
                    {!! $news->content !!}
                </div>
                @if($news->links)
                <div class="my-2">
                    <h5>{{__("validation.attributes.links")}}</h5>
                    <ul class="list-group">
                        @foreach($news->links as $link)
                        <li class="list-unstyled">
                            <a href="{{$link}}" target="_blank">
                                {{$link}}
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
                @endif
                <div class="text-right">
                    <h5>{{__("validation.attributes.author_id")}} : {{$news->user->name}}</h5>
                </div>
            </div>
            <a class="btn btn-default" href="{{route("admin-news.index")}}">{{__("content.back")}}</a>
        </div>

    </div>
@endsection

@extends("layouts.frontend.layout")
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{$article->title}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="/">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="{{route("article")}}">{{__("frontend.articles")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{$article->title}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

    </section>

    <section>
        <div class="container">
            <div class="row py-4 my-4">
                <div class="col-md-10 offset-md-1">
                    <h1 class="header-title">
                        {{$article->title}}
                    </h1>
                    <p class="main-subtitle">
                        {{$article->subtitle}}
                    </p>
                    <span class="font-weight-bold">
                        <i class="fas fa-user-circle"></i>{{$article->user->name}}
                        <i class="fas fa-clock"></i>  {{\Carbon\Carbon::parse($article->created_at)->format("d/m/Y H:i:s")}}
                    </span>
                    <div>
                        <img class="w-100" src="{{asset($article->img)}}">
                    </div>
                    <div class="card-blog px-2 py-4">
                        {!! $article->content !!}
                    </div>
                    @if($article->links)
                        <div>
                            {{__("frontend.useful_links")}}
                            <ul class="nav-link">
                                @foreach($article->links as $link)
                                    <li class="nav-link">
                                        <a href="{{$link}}" target="_blank">{{$link}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </section>

    {{--End of News --}}




@endsection



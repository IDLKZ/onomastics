@extends("layouts.frontend.layout")
@push("styles")
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@endpush
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1 class="main-title">
                            {{$news->title}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="#">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="{{route("news")}}">{{__("frontend.news")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{$news->title}}</li>
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
                        {{$news->title}}
                    </h1>
                    <p class="main-subtitle">
                        {{$news->subtitle}}
                    </p>
                    <span class="font-weight-bold">
                        <i class="fas fa-user-circle"></i>{{$news->user->name}}
                        <i class="fas fa-clock"></i>  {{\Carbon\Carbon::parse($news->created_at)->format("d/m/Y H:i:s")}}
                    </span>
                    <div>
                        <img class="w-100" src="{{asset($news->img)}}">
                    </div>
                    <div class="card-blog px-2 py-4">
                        {!! $news->content !!}
                    </div>
                    @if($news->links)
                    <div>
                        {{__("frontend.useful_links")}}
                        <ul class="nav-link">
                            @foreach($news->links as $link)
                            <li class="nav-link">
                                <a href="{{$link}}" target="_blank">{{$link}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($news->materials)
                    <div class="fotorama d-flex justify-content-center"  data-navposition="bottom" data-nav="true">
                        @foreach($news->materials as $material)
                            <img src="{{$material->img}}">
                        @endforeach
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </section>

    {{--End of News --}}




@endsection
@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endpush

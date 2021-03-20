@extends("layouts.frontend.layout")
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{__("frontend.articles")}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="/">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{__("frontend.articles")}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

    </section>

    {{--End of News --}}
    @if($articles->isNotEmpty())
        <section class="my-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center my-2 py-4">
                        <h1 class="main-title font-weight-bold">{{__("frontend.article_title")}}</h1>
                        <p class="main-subtitle">{{__("frontend.article_subtitle")}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($articles as $item)
                        <div class="col-md-4 my-4">
                            <div class="card card-news">
                                <img class="card-img-top" src="{{$item->thumbnail}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title border-left border-danger pl-2">
                                        {{strlen($item->title) > 30 ? \Illuminate\Support\Str::limit($item->title, 25, $end='...') : $item->title}}
                                    </h5>
                                    <div class="my-2">
                                        <i class="fas fa-clock text-dark"></i> {{\Illuminate\Support\Carbon::parse($item->created_at)->format("d-m-Y H:i:s")}}
                                        <i class="fas fa-user-circle text-dark"></i>   {{$item->user->name}}
                                    </div>
                                    <p class="card-text">
                                        {{strlen($item->title) > 50 ? \Illuminate\Support\Str::limit($item->title, 50, $end='...') : $item->title}}

                                    </p>
                                    <a href="{{route("singleArticle",$item->alias)}}" class="btn btn-success">{{__("content.read")}}</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 my-5 d-flex justify-content-center">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </section>

    @else
        <div class="container" style="min-height: 250px">
            <div class="row">
                <div class="col-md-12 p-5">

                    <h1 class="text-danger">
                        {{__("frontend.nothing")}}
                    </h1>
                </div>

            </div>

        </div>
    @endif



@endsection




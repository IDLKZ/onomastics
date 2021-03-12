@extends("layouts.frontend.layout")
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{__("frontend.books")}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="#">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{__("frontend.books")}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

    </section>

    {{--End of News --}}
    @if($books->isNotEmpty())
        <section class="my-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center my-2 py-4">
                        <h1 class="main-title font-weight-bold">{{__("frontend.book_title")}}</h1>
                        <p class="main-subtitle">{{__("frontend.book_subtitle")}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($books as $item)
                        <div class="col-md-4 my-2">
                            <div class="card card-book" style="background: url({{$item->img}}),no-repeat, fixed, center;background-size: cover">
                                <div class="ribbon-wrapper my-2">
                                    <div class="glow">&nbsp;</div>
                                    <div class="ribbon-front">
                                        <a class="text-white">
                                            {{$item->author_id}}
                                        </a>
                                    </div>
                                    <div class="ribbon-edge-topleft"></div>
                                    <div class="ribbon-edge-topright"></div>
                                    <div class="ribbon-edge-bottomleft"></div>
                                    <div class="ribbon-edge-bottomright"></div>

                                </div>
                                <div class="ribbon-wrapper my-2">
                                    <div class="glow">&nbsp;</div>
                                    <div class="ribbon-front">
                                        <a href="{{route("singleBook",$item->alias)}}" class="text-white">
                                            {{$item->title}}
                                        </a>
                                    </div>
                                    <div class="ribbon-edge-topleft"></div>
                                    <div class="ribbon-edge-topright"></div>
                                    <div class="ribbon-edge-bottomleft"></div>
                                    <div class="ribbon-edge-bottomright"></div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 my-5 d-flex justify-content-center">
                        {{$books->links()}}
                    </div>
                </div>
            </div>
        </section>
    @endif



@endsection




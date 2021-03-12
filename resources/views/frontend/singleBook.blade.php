@extends("layouts.frontend.layout")
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{$book->title}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="#">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="{{route("book")}}">{{__("frontend.books")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{$book->title}}</li>
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
                <div class="col-md-12 py-4">
                    <h2>{{$book->author_id}} - {{$book->title}}</h2>
                </div>
                <div class="col-md-4">
                    <img src="{{$book->img}}" style="width: 100%">
                </div>
                <div class="col-md-8">
                    <h4>{{$book->title}}</h4>
                    <div>
                        {!! $book->description !!}
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{$book->file}}" target="_blank">{{__("content.read")}}</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{--End of News --}}




@endsection




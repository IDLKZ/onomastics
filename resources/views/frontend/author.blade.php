@extends("layouts.frontend.layout")
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{__("frontend.authors")}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="#">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{__("frontend.authors")}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

    </section>

    {{--End of News --}}
    @if($authors->isNotEmpty())
        <section class="my-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center my-2 py-4">
                        <h1 class="main-title font-weight-bold">{{__("frontend.authors")}}</h1>
                        <p class="main-subtitle">{{__("frontend.offer_author")}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($authors as $author)
                        <div class="col-md-4">
                            <div class="card profile-card-3">
                                <div class="background-block">
                                    <img src="{{asset("img/bg1.jpg")}}" alt="profile-sample1" class="background"/>
                                </div>
                                <div class="profile-thumb-block">
                                    <img src="{{$author->img}}" alt="profile-image" class="profile"/>
                                </div>
                                <div class="card-content">
                                    <h2>{{$author->name}}</h2>
                                </div>
                                <div class="text-center">

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 my-5 d-flex justify-content-center">
                        {{$authors->links()}}
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

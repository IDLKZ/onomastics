@extends("layouts.frontend.layout")
@section("content")
{{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{__("frontend.team")}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="#">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{__("frontend.about")}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

    </section>

    {{-- About Us --}}
    <section class="py-4">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-12 text-center my-2 py-4">
                    <h1 class="main-title font-weight-bold">{{__("frontend.about_title")}}</h1>
                    <p class="main-subtitle">{{__("frontend.about_subtitle")}}</p>
                </div>
                <div class="row">
                    <div class="col-md-8 px-5 d-flex justify-content-center align-items-center">

                        @if($about)
                            <div>
                                <div class="py-2">
                                    {!! $about->content !!}
                                </div>

                            </div>
                        @else
                            <div>
                                <div class="py-2">
                                    <h3 class="main-title">{{__("frontend.about_us_title")}}</h3>
                                </div>
                                <p class="fs-18 main-subtitle">
                                    {{__("frontend.about_us_subtitle")}}
                                </p>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-4">
                        <lottie-player
                            src="{{asset("/json/about.json")}}" autoplay loop>
                        </lottie-player>

                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--End of About Us--}}
@if($teams->isNotEmpty())
    <hr>
    <section class="my-5">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-12 text-center my-2 py-4">
                    <h1 class="main-title font-weight-bold">{{__("frontend.team")}}</h1>
                    <p class="main-subtitle">{{__("frontend.team_subtitle")}}</p>
                </div>
            </div>
            <div class="row">
                <!--Profile Card 3-->
                @foreach($teams as $team)
                <div class="col-md-4">
                    <div class="card profile-card-3">
                        <div class="background-block">
                            <img src="{{asset("img/bg1.jpg")}}" alt="profile-sample1" class="background"/>
                        </div>
                        <div class="profile-thumb-block">
                            <img src="{{$team->img}}" alt="profile-image" class="profile"/>
                        </div>
                        <div class="card-content">
                            <h2>{{$team->name}}<small>{{$team->position}}</small></h2>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endif



@endsection
@push("scripts")
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@endpush


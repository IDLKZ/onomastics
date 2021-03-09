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
                        <h1>
                            {{__("frontend.galleries")}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="#">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{__("frontend.galleries")}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

    </section>

    {{--End of News --}}
    @if($galleries->isNotEmpty())
        <section class="my-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center my-2 py-4">
                        <h1 class="main-title font-weight-bold">{{__("frontend.gallery_title")}}</h1>
                        <p class="main-subtitle">{{__("frontend.gallery_subtitle")}}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="fotorama"  data-navposition="bottom" data-nav="true">
                        @foreach($galleries as $gallery)
                        <img src="{{$gallery->img}}">
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif



@endsection
@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endpush


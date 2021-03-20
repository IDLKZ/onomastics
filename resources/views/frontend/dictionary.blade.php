@extends("layouts.frontend.layout")
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{__("frontend.dictionary")}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="/">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{__("frontend.dictionary")}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>

    </section>

    {{--End of News --}}
    @if($dictionaries->isNotEmpty())
        <section class="my-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center my-2 py-4">
                        <h1 class="main-title font-weight-bold">{{__("frontend.dictionary")}}</h1>
                        <p class="main-subtitle">{{__("frontend.offer_dictionary")}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>{{__("validation.attributes.img")}}</th>
                                    <th>{{__("validation.attributes.word")}}</th>
                                    <th>{{__("validation.attributes.description")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dictionaries as $dictionary)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td><img src="{{$dictionary->img}}" style="max-height: 130px; max-width: 130px;border-radius: 50%"></td>
                                        <td>{{$dictionary->word}}</td>
                                        <td>{!! $dictionary->description !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $dictionaries->links() !!}
                        </div>
                    </div>
                    <div class="col-md-12 my-5 d-flex justify-content-center">
                        {{$dictionaries->links()}}
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





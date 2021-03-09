@extends("layouts.frontend.layout")
@section("content")
    {{--BreadCrumbs--}}
    <section style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex text-white align-items-center" style="min-height: 350px">
                    <div>
                        <h1>
                            {{__("frontend.contact")}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item fs-18"><a class="text-white" href="#">{{__("frontend.main")}}</a></li>
                                <li class="breadcrumb-item fs-18 active" aria-current="page">{{__("frontend.contact")}}</li>
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
                    <h1 class="main-title font-weight-bold">{{__("frontend.contact_title")}}</h1>
                    <p class="main-subtitle">{{__("frontend.contact_subtitle")}}</p>
                </div>
                <div class="row">
                    <div class="col-md-6 px-5">
                        <form method="post"  id="js-form" >
                            @csrf


                                    <div class="form-group px-2">
                                        <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.name")}}</label>
                                        <input type="text" name="name" class="form-control" id="exampleTitle">
                                    </div>


                                    <div class="form-group px-2">
                                        <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.email")}}</label>
                                        <input type="email" name="email" class="form-control" id="exampleTitle">
                                    </div>


                                    <div class="form-group px-2">
                                        <label for="exampleTitle" class="bmd-label-floating">{{__("validation.attributes.phone")}}</label>
                                        <input type="text" name="phone" class="form-control" id="phone">
                                    </div>

                                    <div class="form-group px-2">
                                        <textarea name="message" rows="5" style="width: 100%">

                                        </textarea>
                                    </div>



                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary ml-auto">{{__("frontend.send")}}</button>

                                    </div>

                        </form>



                    </div>
                    <div class="col-md-6">
                        <lottie-player
                            src="{{asset("/json/contact.json")}}" autoplay loop>
                        </lottie-player>

                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--End of About Us--}}




@endsection
@push("scripts")
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@endpush



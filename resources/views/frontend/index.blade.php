@extends("layouts.frontend.layout")
@push("styles")
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@endpush
@section("content")
{{--Carousel--}}
<section class="overflow-hidden">
    <div class="swiper-container carousel-section">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @if($data["slider"]->isNotEmpty())
                @foreach($data["slider"] as $slider)
                <div class="swiper-slide swiper-bg" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url({{$slider->img}});">
                    <div class="text-white d-flex justify-content-center align-content-center align-items-center vh-100 text-center px-5">
                        <div>
                            <h1 class="ml11 font-weight-bold carousel-h1">
                      <span class="text-wrapper">
                        <span class="line line1"></span>
                        <span class="letters">{{$slider->title}}</span>
                      </span>
                            </h1>

                        </div>

                    </div>
                </div>
                @endforeach


            @else
            <div class="swiper-slide swiper-bg" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg1.jpg');">
                <div class="text-white d-flex justify-content-center align-content-center align-items-center vh-100 text-center px-5">
                    <div>
                        <h1 class="ml11 font-weight-bold carousel-h1">
                      <span class="text-wrapper">
                        <span class="line line1"></span>
                        <span class="letters">{{__("frontend.carousel_info")}}</span>
                      </span>
                        </h1>
                        <div class="px-md-5 px-sm-2 py-2">
                            <div class="input-group d-flex justify-content-center align-items-center">
                                <div class="form-outline md-w-80">
                                    <input type="search" placeholder="{{__("frontend.search")}}" id="form1" class="form-control" />
                                </div>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
            <div class="swiper-slide swiper-bg" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg2.jpg');">
                <div class="text-white d-flex justify-content-center align-content-center align-items-center vh-100 text-center px-5">
                        <div>
                            <h1 class="ml3 carousel-h1">
                                {{__("frontend.carousel_news")}}
                            </h1>
                            <div class="px-md-5 px-sm-2 py-2">
                                <a class="btn btn-success rounded fs-18 mr-2">
                                    <i class="fas fa-newspaper mr-2"></i>
                                    {{__("frontend.news")}}
                                </a>
                                <a class="btn btn-success rounded fs-18 ml-2">
                                    <i class="fas fa-file-signature"></i>
                                    {{__("frontend.articles")}}
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="swiper-slide swiper-bg" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg3.jpg');">
                <div class="text-white d-flex justify-content-center align-content-center align-items-center vh-100 text-center px-5">
                        <div>
                            <h1 class="ml6 carousel-h1">
                                <span class="text-wrapper">
                                    <span class="letters">{{__("frontend.carousel_book")}}</span>
                                </span>
                            </h1>
                            <div class="px-md-5 px-sm-2 py-2">
                                <a class="btn btn-success rounded fs-18 mr-2">
                                    <i class="fas fa-book mr-2"></i>
                                    {{__("frontend.books")}}
                                </a>
                                <a class="btn btn-success rounded fs-18 ml-2">
                                    <i class="fas fa-sort-alpha-up"></i>
                                    {{__("frontend.dictionary")}}
                                </a>
                            </div>
                        </div>




                    </div>
            </div>
                @endif

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
</section>
{{--    End of Carousel  --}}
<section class="py-4 my-4" >
    <div class="container about-us" >
        <div class="row py-2">
                <div class="col-md-12 text-center my-2 py-4">
                    <h1 class="main-title font-weight-bold text-white">{{__("frontend.search")}}</h1>
                </div>

            <form action="{{route("search")}}" style="width: 100%">
                @csrf

                        <div class="col-md-8 offset-md-2 py-2 text-center">
                            <select class="form-control my-2" id="category" name="category">
                                <option value="article">{{__("frontend.articles")}}</option>
                                <option value="news">{{__("frontend.news")}}</option>
                                <option value="book">{{__("frontend.books")}}</option>
                            </select>



                        <input type="search" placeholder="{{__("frontend.search")}}" id="form1" class="form-control my-2" name="search" />


                        <button type="submit" class="btn btn-primary my-2">
                            <i class="fas fa-search"></i>
                            {{__("frontend.search")}}
                        </button>
                        </div>



            </form>




        </div>


    </div>


</section>
{{--Offer--}}
<section>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12 text-center my-2 py-4">
                <h1 class="main-title font-weight-bold">{{__("frontend.offer_title")}}</h1>
                <p class="main-subtitle">{{__("frontend.offer_subtitle")}}</p>
            </div>


            @if($data["advantage"]->isNotEmpty())
                @foreach($data["advantage"] as $advantage)
                <div class="col-md-4 my-2">
                    <div class="card py-2 card-offer" data-aos="zoom-out" data-aos-duration="2000">
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div class="card-round">
                                    <img src="{{$advantage->img}}" width="96px" height="96px">
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text fs-16">{{$advantage->title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            @else
            <div class="col-md-4 my-2">
                <div class="card py-2 card-offer" data-aos="zoom-in-right" data-aos-duration="2000">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <div class="card-round">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text fs-16">{{__("frontend.offer_news")}}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4 my-2">
                <div class="card py-2 card-offer" data-aos="zoom-out" data-aos-duration="2000">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <div class="card-round">
                            <i class="fas fa-file-signature"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-16">{{__("frontend.offer_article")}}</p>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="card py-2 card-offer" data-aos="zoom-in-left" data-aos-duration="2000">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <div class="card-round">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-16">{{__("frontend.offer_book")}}</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card py-2 card-offer" data-aos="zoom-in-left" data-aos-duration="2000">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <div class="card-round">
                            <i class="fas fa-sort-alpha-up"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-16">{{__("frontend.offer_dictionary")}}</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card py-2 card-offer card-offer" data-aos="zoom-out" data-aos-duration="2000">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <div class="card-round">
                            <i class="fas fa-user-circle"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-16">{{__("frontend.offer_author")}}</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card py-2 card-offer" data-aos="zoom-in-left" data-aos-duration="2000">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <div class="card-round">
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-16">{{__("frontend.offer_contact")}}</p>
                    </div>
                </div>
                </div>
            </div>
             @endif

        </div>
    </div>
</section>
{{--End Of Offer--}}


{{-- About Us --}}
<section class="py-4">
    <div class="container about-us">
        <div class="row py-4">
            <div class="col-md-12 text-center my-2 py-4 text-white">
                <h1 class="main-title font-weight-bold">{{__("frontend.about_title")}}</h1>
                <p class="main-subtitle">{{__("frontend.about_subtitle")}}</p>
            </div>
            <div class="row">
                <div class="col-md-8 px-5 d-flex justify-content-center align-items-center">
                    @if($data["about"])
                        <div class="text-white">
                            <div class="py-2">
                                {!! $data["about"]->content !!}
                            </div>

                        </div>
                    @else
                    <div class="text-white">
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

{{--Start Section Of News--}}
<section>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12 text-center my-2 py-4">
                <h1 class="main-title font-weight-bold">{{__("frontend.news_title")}}</h1>
                <p class="main-subtitle">{{__("frontend.news_subtitle")}}</p>
            </div>
            @if($data["news"]->isNotEmpty())
            @foreach($data["news"] as $item)
                <div class="col-md-4 my-4" data-aos="zoom-out">
                    <div class="card card-news">
                        <img class="card-img-top" src="{{$item->img}}" alt="Card image cap">
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
                            <a href="{{route("singleNews",$item->alias)}}" class="btn btn-success">{{__("content.read")}}</a>
                        </div>

                    </div>
                </div>
            @endforeach
            @endif

        </div>
        <div class="row py-4">
            <div class="col-md-12 text-center">
                <a href="{{route("book")}}" class="btn btn-success rounded fs-18 mr-2">
                    <i class="fas fa-newspaper mr-2"></i>
                    {{__("frontend.all_news")}}
                </a>
            </div>
        </div>
    </div>
</section>
{{-- End Of Section Of News   --}}

{{--Section Of Articles--}}
<section class="swiper-bg overflow-hidden" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('/img/bg2.jpg');">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12 text-center my-2 py-4 text-white">
                <h1 class="main-title font-weight-bold">{{__("frontend.article_title")}}</h1>
                <p class="main-subtitle">{{__("frontend.article_subtitle")}}</p>
            </div>
        </div>
        <div class="row">
            <!-- Swiper -->
            @if($data["articles"]->isNotEmpty())
            <div class="col-md-12 overflow-hidden">
                <div class="swiper-container-article">
                    <div class="swiper-wrapper">
                        @foreach($data["articles"] as $item)
                        <div class="swiper-slide col-md-4">
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

                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
             @endif

        </div>
        <div class="row py-4">
            <div class="col-md-12 text-center">
                <a href="{{route("article")}}" class="btn btn-success rounded fs-18 mr-2">
                    <i class="fas fa-file-signature mr-2"></i>
                    {{__("frontend.all_articles")}}
                </a>
            </div>
        </div>

    </div>
</section>
{{--End Of Section Of Articles--}}

{{--Section Of Book--}}
<section>
    <div class="container py-4">
        <div class="row py-4">
            <div class="col-md-12 text-center my-2 py-4">
                <h1 class="main-title font-weight-bold">{{__("frontend.book_title")}}</h1>
                <p class="main-subtitle">{{__("frontend.book_subtitle")}}</p>
            </div>
        </div>
        <div class="row">
            @if($data["books"]->isNotEmpty())
            <div class="col-md-12 overflow-hidden">
                <div class="swiper-container-book">
                    <div class="swiper-wrapper">
                        @foreach($data["books"] as $item)
                        <div class="swiper-slide col-md-4">
                            <div class="card card-book" style="background: url({{$item->img}}),no-repeat, fixed, center;background-size: cover">
                                <div class="ribbon-wrapper my-2">
                                    <div class="glow">&nbsp;</div>
                                    <div class="ribbon-front">
                                        <a href="" class="text-white">
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
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>

                </div>
            </div>
            @endif

        </div>
        <div class="row py-4">
            <div class="col-md-12 text-center">
                <a href="{{route("book")}}" class="btn btn-success rounded fs-18 mr-2">
                    <i class="fas fa-book mr-2"></i>
                    {{__("frontend.all_books")}}
                </a>
            </div>
        </div>



    </div>
</section>
{{--End Of Section Of Book--}}

{{--Partner--}}
<section>
<div class="container">
    <div class="row">
        @if($data["partners"]->isNotEmpty())
        <div class="col-md-12">
            <div class="swiper-container-partner">

                <div class="swiper-wrapper">
                    @foreach($data["partners"] as $partner)
                    <div class="swiper-slide col-md-4" style="min-height: 250px">
                       <img src="{{$partner->img}}" width="100%">
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endif
    </div>
</div>
</section>
{{--    End of Partner--}}

@endsection
@push("scripts")
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
            effect: 'cube',
            speed:600,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        var swiper2 = new Swiper('.swiper-container-article', {
            center:true,
            loop:true,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
            }
        });
        var swiper3 = new Swiper('.swiper-container-book', {
            center:true,
            loop:true,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
            }
        });
        var swiper4 = new Swiper('.swiper-container-partner', {
            loop:true,
            autoplay:{
              delay:2000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
            }
        });
        // // Wrap every letter in a span
        //
        // var textWrapper = document.querySelector('.ml11 .letters');
        // textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");
        //
        // anime.timeline({loop: true})
        //     .add({
        //         targets: '.ml11 .line',
        //         scaleY: [0,1],
        //         opacity: [0.5,1],
        //         easing: "easeOutExpo",
        //         duration: 700
        //     })
        //     .add({
        //         targets: '.ml11 .line',
        //         translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
        //         easing: "easeOutExpo",
        //         duration: 700,
        //         delay: 100
        //     }).add({
        //     targets: '.ml11 .letter',
        //     opacity: [0,1],
        //     easing: "easeOutExpo",
        //     duration: 600,
        //     offset: '-=775',
        //     delay: (el, i) => 34 * (i+1)
        // }).add({
        //     targets: '.ml11',
        //     opacity: 0,
        //     duration: 1000,
        //     easing: "easeOutExpo",
        //     delay: 1000
        // });
        //
        // var textWrapper2 = document.querySelector('.ml3');
        // textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
        //
        // anime.timeline({loop: true})
        //     .add({
        //         targets: '.ml3 .letter',
        //         opacity: [0,1],
        //         easing: "easeInOutQuad",
        //         duration: 600,
        //         delay: (el, i) => 150 * (i+1)
        //     }).add({
        //     targets: '.ml3',
        //     opacity: 0,
        //     duration: 800,
        //     easing: "easeOutExpo",
        //     delay: 800
        // });
        //
        // // Wrap every letter in a span
        // var textWrapper3 = document.querySelector('.ml6 .letters');
        // textWrapper3.innerHTML = textWrapper3.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
        //
        // anime.timeline({loop: true})
        //     .add({
        //         targets: '.ml6 .letter',
        //         translateY: ["1.1em", 0],
        //         translateZ: 0,
        //         duration: 750,
        //         delay: (el, i) => 50 * i
        //     }).add({
        //     targets: '.ml6',
        //     opacity: 0,
        //     duration: 1000,
        //     easing: "easeOutExpo",
        //     delay: 1000
        // });

        AOS.init()




    </script>
@endpush

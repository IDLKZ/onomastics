<section class="footer-section py-5">


    <div class="container">
        <div class="row">
            <div class="col-md-4 text-md-left text-center">
                <a class="navbar-brand text-uppercase font-weight-bold text-white" href="/">ONOMASTICS.KZ</a>
                @if($footer)
                <p class="text-white">
                    {{$footer->title}}
                </p>
                @else
                <p class="text-white">
                {{__("frontend.onomonimcs")}}
                </p>
                @endif
            </div>
            <div class="col-md-4 text-white text-center">
                <p class="font-weight-bold">{{__("frontend.useful_links")}}</p>
                <ul class="list-unstyled ">
                    <li class="nav-item ml-2">
                        <a class="{{ request()->routeIs('main') ? 'nav-link text-success' : 'nav-link' }} fs-14" href="/">{{__("frontend.main")}}</a>
                    </li>
                    <li class="nav-item ml-2 text-white">
                        <a  class="{{ request()->routeIs('about') ? 'nav-link text-success' : 'nav-link' }} fs-14" href="{{route("about")}}">{{__("frontend.about")}}</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a  class="{{ request()->routeIs('news') ? 'nav-link text-success' : 'nav-link' }} fs-14" href="{{route("news")}}">{{__("frontend.news")}}</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a  class="{{ request()->routeIs('article') ? 'nav-link text-success' : 'nav-link' }} fs-14" href="{{route("article")}}">{{__("frontend.articles")}}</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="{{ request()->routeIs('book') ? 'nav-link text-success' : 'nav-link' }} fs-14" href={{route("book")}}>{{__("frontend.books")}}</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="{{ request()->routeIs('gallery') ? 'nav-link text-success' : 'nav-link' }} fs-14" href="{{route("gallery")}}">{{__("frontend.galleries")}}</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="{{ request()->routeIs('contact') ? 'nav-link text-success' : 'nav-link' }} fs-14" href="{{route("contact")}}">{{__("frontend.contact")}}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 text-md-left text-center">
                <p class="font-weight-bold text-white fs-18">{{__("frontend.social")}}</p>
                @if($socials->isNotEmpty())
                    @foreach($socials as $social)
                    <a href="{{$social->link}}" class="text-white"><i class="{{$social->icon}} footer-icon fs-18"></i> </a>
                    @endforeach
                @else
                <a href="" class="text-white"><i class="fab fa-instagram footer-icon fs-18"></i> </a>
                <a href="" class="text-white"><i class="fab fa-facebook-square footer-icon fs-18"></i> </a>
                <a href="" class="text-white"><i class="fab fa-twitter-square footer-icon fs-18"></i> </a>
                <a href="" class="text-white"><i class="fab fa-youtube-square footer-icon fs-18"></i> </a>
                @endif
            </div>



        </div>
    </div>
</section>

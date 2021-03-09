<header class="nav-bar-container">
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark my-navbar">
    <a class="navbar-brand border-success border-left px-2 fs-20 font-weight-bold logo" href="#">Ономастика</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ml-2">
                <a class="{{ request()->routeIs('main') ? 'nav-link active' : 'nav-link' }} fs-14" href="/">{{__("frontend.main")}}</a>
            </li>
            <li class="nav-item ml-2 text-white">
                <a  class="{{ request()->routeIs('about') ? 'nav-link active' : 'nav-link' }} fs-14" href="{{route("about")}}">{{__("frontend.about")}}</a>
            </li>
            <li class="nav-item ml-2">
                <a  class="{{ request()->routeIs('news') ? 'nav-link active' : 'nav-link' }} fs-14" href="{{route("news")}}">{{__("frontend.news")}}</a>
            </li>
            <li class="nav-item ml-2">
                <a  class="{{ request()->routeIs('article') ? 'nav-link active' : 'nav-link' }} fs-14" href="{{route("article")}}">{{__("frontend.articles")}}</a>
            </li>
            <li class="nav-item ml-2">
                <a class="{{ request()->routeIs('book') ? 'nav-link active' : 'nav-link' }} fs-14" href={{route("book")}}>{{__("frontend.books")}}</a>
            </li>
            <li class="nav-item ml-2">
                <a class="{{ request()->routeIs('dictionary') ? 'nav-link active' : 'nav-link' }} fs-14" href="{{route("dictionary")}}">{{__("frontend.dictionary")}}</a>
            </li>
            <li class="nav-item ml-2">
                <a class="{{ request()->routeIs('author') ? 'nav-link active' : 'nav-link' }} fs-14" href="{{route("author")}}">{{__("frontend.authors")}}</a>
            </li>
            <li class="nav-item ml-2">
                <a class="{{ request()->routeIs('gallery') ? 'nav-link active' : 'nav-link' }} fs-14" href="{{route("gallery")}}">{{__("frontend.galleries")}}</a>
            </li>
            <li class="nav-item ml-2">
                <a class="{{ request()->routeIs('contact') ? 'nav-link active' : 'nav-link' }} fs-14" href="{{route("contact")}}">{{__("frontend.contact")}}</a>
            </li>
            <li class="nav-item dropdown fs-14">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__("frontend.languages")}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                     @endforeach
                </div>
            </li>
            <li class="nav-item dropdown fs-14">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__("frontend.cabinet")}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @auth()
                        <a class="dropdown-item" rel="alternate" href="{{ route("adminHome") }}">
                            {{   __("frontend.cabinet") }}
                        </a>
                        <a class="dropdown-item" rel="alternate" href="{{ route("logout") }}">
                            {{   __("frontend.logout") }}
                        </a>
                    @endauth
                    @guest()
                            <a class="dropdown-item" rel="alternate" href="{{ route("login") }}">
                                {{   __("frontend.login") }}
                            </a>
                    @endguest
                </div>
            </li>
        </ul>
    </div>
</nav>
</div>
</header>

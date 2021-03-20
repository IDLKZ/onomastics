<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="https://img.icons8.com/bubbles/2x/user-male.png" />
        </div>
        <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
                {{auth()->user()->name}}
              <span>
                {{auth()->user()->role_id == 1 ? "Администратор" : "Редактор"}}
              </span>
            </a>

        </div>
    </div>
    <ul class="nav">


        <li class="nav-item {{ Request::is('/') ? 'active' : '' }} ">
             <a class="nav-link" href="/">
                  <i class="material-icons">dashboard</i>
             <p> {{__("sidebar.main")}} </p>
           </a>
        </li>
        <li class="nav-item {{ Request::is('admin*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{route("adminHome")}}">
                <i class="material-icons">assignment_ind</i>
                <p> {{__("sidebar.profile")}} </p>
            </a>
        </li>
        @admin
        <li class="nav-item {{ Request::is('admin-user*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{route("admin-user.index")}}">
                <i class="material-icons">supervised_user_circle</i>
                <p> {{__("sidebar.users")}} </p>
            </a>
        </li>
        @endadmin
        <li class="nav-item {{ Request::is('admin-news*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-news.index')}}">
                <i class="material-icons">article</i>
                <p> {{__("sidebar.news")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('/admin-material*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-material.index')}}">
                <i class="material-icons">apps</i>
                <p> {{__("sidebar.materials")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-article*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-article.index')}}">
                <i class="material-icons">bookmark</i>
                <p> {{__("sidebar.articles")}} </p>
            </a>
        </li>
{{--        <li class="nav-item {{ Request::is('admin-dictionary*') ? 'active' : '' }}">--}}
{{--            <a class="nav-link" href="{{route('admin-dictionary.index')}}">--}}
{{--                <i class="material-icons">format_color_text</i>--}}
{{--                <p> {{__("sidebar.dictionaries")}} </p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item {{ Request::is('admin-author*') ? 'active' : '' }}">--}}
{{--            <a class="nav-link" href="{{route('admin-author.index')}}">--}}
{{--                <i class="material-icons">supervised_user_circle</i>--}}
{{--                <p> {{__("sidebar.authors")}} </p>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item {{ Request::is('admin-book*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-book.index')}}">
                <i class="material-icons">bookshelf</i>
                <p> {{__("sidebar.books")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-slider*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-slider.index')}}">
                <i class="material-icons">camera</i>
                <p> Слайдеры </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-about*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-about.index')}}">
                <i class="material-icons">home</i>
                <p> {{__("frontend.about")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-advantage*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-advantage.index')}}">
                <i class="material-icons">home</i>
                <p> {{__("frontend.offer_title")}} </p>
            </a>
        </li>
        @admin
        <li class="nav-item {{ Request::is('admin-gallery*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-gallery.index')}}">
                <i class="material-icons">camera</i>
                <p> {{__("sidebar.gallery")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-partner*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-partner.index')}}">
                <i class="material-icons">supervised_user_circle</i>
                <p> {{__("sidebar.partners")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-team*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-team.index')}}">
                <i class="material-icons">supervised_user_circle</i>
                <p> {{__("sidebar.team")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-email*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-email.index')}}">
                <i class="material-icons">email</i>
                <p> {{__("validation.attributes.email")}} </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-footer*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-footer.index')}}">
                <i class="material-icons">calendar_view_day</i>
                <p> Footer </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin-social*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-social.index')}}">
                <i class="material-icons">camera</i>
                <p> Соц. сеть </p>
            </a>
        </li>
        @endadmin




        <li class="nav-item ">
            <a class="nav-link" href="/logout">
                <i class="material-icons">exit_to_app</i>
                <p> {{__("sidebar.logout")}} </p>
            </a>
        </li>
    </ul>
</div>

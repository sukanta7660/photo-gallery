<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{action('MainController@index')}}">Photo Gallery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{action('MainController@index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(isset(Auth::user()->email))
            <li class="nav-item">
                <a class="nav-link" href="#">{{Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Log In</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
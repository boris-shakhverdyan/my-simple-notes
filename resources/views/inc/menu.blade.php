<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= Request::url() === route("home") || Request::url() === route("home-alt") ? "active" : ""; ?>">
                <a class="nav-link" href="{{ route("home") }}">List</a>
            </li>
            <li class="nav-item <?= Request::url() === route("create") ? "active" : ""; ?>">
                <a class="nav-link" href="{{ route("create") }}">Create</a>
            </li>
            <li class="nav-item <?= Request::url() === route("trash") ? "active" : ""; ?>">
                <a class="nav-link" href="{{ route("trash") }}">Trash</a>
            </li>
            @if(strpos(Request::url(), "/edit/") !== false)
            <li class="nav-item active">
                <a class="nav-link" href="#">Edit</a>
            </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route("home") }}">
            <input class="form-control mr-sm-2" name="search" value="{{ Request::get('search') }}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

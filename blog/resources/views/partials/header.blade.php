
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">BLOG.net</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('posts') }}">Posts</a>
                </li>

                @auth
                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('profile.posts') }}">Meus posts</a>
                </li>

                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('post.create') }}">Criar Post</a>
                </li>

                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('user.show', auth()->user()->id) }}">Profile</a>
                </li>

                @endauth
                @guest
                    <li class="nav-item">
                        <a  class="nav-link" href="{{ route('login.user') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link" href="{{ route('user.create') }}">Criar usuario</a>
                    </li>
                @endguest

            </ul>
            @auth
                <div>
                    <a id="link-logout" class="nav-link" href="{{ route('login.user.destroy') }}"> Logout</a>
                </div>
            @endauth

            @guest
                <form class="d-flex" method="get" action="{{ route('posts') }}">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endguest
        </div>
    </div>
</nav>
<div class="container">
    @auth
        <h5 class="mt-4 mb-3">Olá {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}</h5>
    @endauth
</div>

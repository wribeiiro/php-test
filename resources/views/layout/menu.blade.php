<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-purple">
    <a class="navbar-brand" href="{{url('/dashboard')}}">PHPTest</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{url('/dashboard')}}"> <i class="fa fa-home"></i> Dashboard <span class="sr-only">(curr page)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-calendar"></i> Events
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('events/list')}}"><i class="fa fa-list"></i> List</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('events/add')}}"><i class="fa fa-chart-line"></i> Add</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fab fa-audible"></i> Lectures
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('lectures/list')}}"><i class="fa fa-list"></i> List</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('lectures/add')}}"><i class="fa fa-chart-line"></i> Add</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-astronaut"></i> Speaker
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('speakers/list')}}"><i class="fa fa-list"></i> List</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('speakers/add')}}"><i class="fa fa-chart-line"></i> Add</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> {{session('sessionUser')['username']}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('auth/logout')}}"><i class="fa fa-arrow-left fa-fw"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

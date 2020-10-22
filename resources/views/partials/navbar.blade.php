<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Puskesmas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item {{Request::is('patients') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('patients.index')}}">Pasien</a>
            </li>
            <li class="nav-item  {{Request::is('doctors') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('doctors.index')}}">Dokter</a>
            </li>
            <li class="nav-item  {{Request::is('services') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('services.index')}}">Pelayanan</a>
            </li>

            <li class="nav-item  {{Request::is('employees') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('employees.index')}}">Pegawai</a>
            </li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </li>
            @endauth
            @guest
            <li class="nav-item {{Request::is('login') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            @endguest
        </ul>
    </div>
</nav>

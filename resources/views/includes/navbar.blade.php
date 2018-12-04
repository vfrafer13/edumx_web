<div class="sidebar-wrapper">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text">
            EDUmx
        </a>
    </div>

    <ul class="nav">
        <li
            @if (Request::is('/'))
                class="active"
            @endif
        >
            <a href="{{ url('/') }}">
                <i class="ti-home"></i>
                <p>Inicio</p>
            </a>
        </li>
        <li
            @if (Request::is('courses') || Request::is('courses/*'))
                class="active"
            @endif
        >
            <a href="{{ url('courses') }}">
                <i class="ti-calendar"></i>
                <p>Todos los Cursos</p>
            </a>
        </li>
        <li
            @if (Request::is('user_courses') || Request::is('user_courses'))
                class="active"
            @endif
        >
            <a href="{{ url('user_courses') }}">
                <i class="ti-alarm-clock"></i>
                <p>Mis Cursos</p>
            </a>
        </li>
        <li
            @if (Request::is('Mi Cuenta') || Request::is('users/*'))
                class="active"
            @endif
        >
            <a href="{{ url('/user') }}">
                <i class="ti-pulse"></i>
                <p>Mi Cuenta</p>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="ti-close"></i>
                <p>Salir</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    </ul>
</div>

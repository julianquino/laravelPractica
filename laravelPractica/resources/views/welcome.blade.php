@extends ('layout');

@section ('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/admin/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Sistema de Turnos
            </div>
            @if(Auth::check())
            <div class="title m-b-md">
                Hola, {{ Auth::user()->name}}
            </div>
            @endif
        </div>
    </div>
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
		<h1>Crear Usuario</h1>
        <ul>
            @if($errors->any())
                <h4>Por favor ccorrige los siguientes errore:</h4>
            @endif
        </ul>

		<form method="POST" action="{{ url('users/create') }}">

            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" placeholder="Juan Perez" value="{{old('name')}}">
            @if($errors->has('name'))
                <p>{{ $errors->first('name')}}</p>
            @endif

            <br>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" placeholder="juan@example.com" value="{{old('email')}}">
            @if($errors->has('email'))
                <p>{{ $errors->first('email')}}</p>
            @endif

            <br>
            <label for="contraseña" id="password">Contraseña:</label>
            <input type="password" name="password" placeholder="mayor a 8 caracteres">
            @if($errors->has('password'))
                <p>{{ $errors->first('password')}}</p>
            @endif

			{!! csrf_field() !!}
			<button type="submit">Crear usuario</button>
		</form>
	</body>
</html>
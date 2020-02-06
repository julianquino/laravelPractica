<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viemport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Listado de usuarios - laravelPractica</title>
</head>
<bady>
	<h1>{{ $title }}</h1>
	@if(!empty($users))
		<ul>
			@foreach ($users as $user)
				<li>{{ $user }}</li>
			@endforeach
	</ul>
	@else
		<p>No hay Usuarios registrados</p>
	@endif
</bady>
</html>

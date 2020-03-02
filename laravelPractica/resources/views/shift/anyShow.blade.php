@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Nombre de la turnera: {{$shift->name}}
                </div>
                <div class="card-header">
                    Turno:
                    <h4>{{$shift->prefix}}{{$shift->turn}}</h4>
                </div>

                <div class="col-md-6 offset-md-4">
                	<a class="btn btn-primary btn-lg" href="{{ route('shift.anyShow', [ 'company'=>$company, 'subsidiary'=>$subsidiary, 'shift'=>$shift]) }}" role="button">Actualizar</a>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
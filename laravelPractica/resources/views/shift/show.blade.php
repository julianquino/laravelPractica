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
                @if(Auth::user()->isPermittedEditShift(Auth::user()->company, $shift->subsidiary, $shift))
                    <div class="col-md-6 offset-md-4">
                        <div class="btn-group">
                            <form method="GET" action="{{route('shifts.edit', ['shift'=>$shift->id]) }}" id="edit">
                                <button type="submit" class="btn btn-primary" name="edit">Edit
                                </button>
                            </form>
                            <form method="Post" action="{{ route('shifts.destroy', ['shift'=>$shift->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" name="delete">Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
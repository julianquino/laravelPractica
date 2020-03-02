@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Nombre de sucursal: {{$subsidiary->name}}
                </div>
                <div class="card-header">
                    Descripción de la sucursal: {{$subsidiary->address}}
                 </div>
                <div class="card-header">
                     <a href="{{ route('shifts.index') }}">Ver lista de turnos</a>
                </div> 
                @if(Auth::user()->isPermittedEditSubsidiary(Auth::user()->company, $subsidiary))
                    <div class="col-md-6 offset-md-4">
                        <div class="btn-group">
                            <form method="GET" action="{{ route('subsidiaries.edit', ['subsidiary'=>$subsidiary->id]) }}" id="edit">
                                <button type="submit" class="btn btn-primary" name="edit">Edit
                                </button>
                            </form>
                            <form method="Post" action="{{ route('subsidiaries.destroy', ['subsidiary'=>$subsidiary->id]) }}" id="delete">
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
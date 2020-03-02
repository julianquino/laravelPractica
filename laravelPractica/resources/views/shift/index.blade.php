@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1> lista de todas las turneras </h1>        
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Prefijo</th>
                            <th>Turno</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($subsidiaries as $subsidiary)
                        @foreach ($subsidiary->shifts as $shift)
                            <tr>
                                <td><a href="{{ route('shifts.show', ['shift'=>$shift->id ]) }}"> {{$shift->name}}</td>
                                <td>{{$shift->prefix}}</td>
                                <td>{{$shift->turn}}</td>
                                <td>
                                    @if(Auth::user()->isPermittedEditShift(Auth::user()->company, $shift->subsidiary, $shift))
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
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </table>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <form method="GET" action="{{ route('shifts.create') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar turnera') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
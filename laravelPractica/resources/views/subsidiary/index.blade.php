@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 align="center"> lista de todas las Sucursales </h1>
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>ID_Sucursal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($subsidiaries as $subsidiary)
                        <tr>
                            <td><a href="{{ route('subsidiaries.show', ['subsidiary'=>$subsidiary->id]) }}"> {{$subsidiary->name}}</td>
                            <td>{{$subsidiary->address}}</td>
                            <td>{{$subsidiary->id}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <form method="GET" action="{{ route('subsidiaries.create') }}" id="create">
                                @csrf
                                <button type="submit" form="create" class="btn btn-primary">{{ __('Agregar Sucursal') }}
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
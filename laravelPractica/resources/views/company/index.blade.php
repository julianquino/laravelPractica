@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1> Lista de todas las Compañias </h1>
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre de Compañia</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td><a href="{{ route('companies.show', ['company'=>$company]) }}"> {{$company->name}}</td>
                            <td>{{$company->description}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <form method="GET" action="{{ route('companies.create') }}" id="create">
                            @csrf
                                <button type="submit" form="create" class="btn btn-primary">Agregar Compañia</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
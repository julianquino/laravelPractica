@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img class="card-img-top" style="width:150px; height:150px;" src="{{$company->logo}}">
            <div class="card-body">
                <div class="card-header">
                    Nombre de la Compañia: {{$company->name}}
                </div>
                <div class="card-header">
                    Descripción de la empresa: {{$company->description}}
                </div>
                 <div class="card-header">
                    Propietario: 
                    @if($company->user)
                        {{($company->user->name)}}
                    @else
                        No tiene propietario
                    @endif
                </div>
                <div class="card-header">
                     <a href="{{ route('subsidiaries.index') }}">Ver lista de Sucursales</a>
                </div>
                @if(Auth::user()->isOwnerCompany($company))
                    <div class="card-body">
                        <form method="get" action="{{route('companies.edit',['company'=>$company->id])}}">
                            <button type="submit">Editar</button>
                        </form>
                        
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
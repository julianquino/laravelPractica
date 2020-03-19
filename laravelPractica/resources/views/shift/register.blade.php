@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar turnera') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ Route('shifts.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('nombre de turnera') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefix" class="col-md-4 col-form-label text-md-right">{{ __("Prefijo [A-Z]") }}</label>
                            <div class="col-md-6">
                                <input id="prefix" type="text" pattern="[A-Z]{1}" class="form-control" name="prefix" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turn" class="col-md-4 col-form-label text-md-right">{{ __("Turno [0-99]") }}</label>
                            <div class="col-md-6">
                                <input id="turn" type="number" min="0" max="99" class="form-control" name="turn" required>
                            </div>
                        </div>

                        <div class="select" >
                            <label for="subsidiary_id" class="col-md-4 col-form-label text-md-right">{{ __("Selecione Sucursal") }}</label>
                            <select name="subsidiary_id" id="subsidiary_id">
                                @foreach(Auth::user()->company->subsidiaries as $subsidiary)
                                    <option value="{{$subsidiary->id}}">{{$subsidiary->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input id="creator_id" name="creator_id" type="hidden" value="{{ Auth::user()->id }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar turnera') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

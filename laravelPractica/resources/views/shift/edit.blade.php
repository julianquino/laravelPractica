@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar turnera') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ Route('shifts.update', ['shift'=>$shift->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('nombre de turnera') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $shift->name }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prefix" class="col-md-4 col-form-label text-md-right">{{ __("Prefijo [A-Z]") }}</label>

                            <div class="col-md-6">
                                <input id="prefix" pattern="[A-Z]{1}" type="text" class="form-control" name="prefix" value="{{ $shift->prefix }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turn" class="col-md-4 col-form-label text-md-right">{{ __("Turno [0-99]") }}</label>
                            <div class="col-md-6">
                                <input id="turn" type="number" min="0" max="99" class="form-control" name="turn" value="{{ $shift->turn }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
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

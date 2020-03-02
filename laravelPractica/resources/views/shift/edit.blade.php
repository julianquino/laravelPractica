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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $shift->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefix" class="col-md-4 col-form-label text-md-right">{{ __("Prefijo") }}</label>

                            <div class="col-md-6">
                                <input id="prefix" type="text" class="form-control @error('prefix') is-invalid @enderror" name="prefix" value="{{ $shift->prefix }}" required autocomplete="prefix" autofocus>
                                @error('prefix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="turn" class="col-md-4 col-form-label text-md-right">{{ __("Turno") }}</label>

                            <div class="col-md-6">
                                <input id="turn" type="text" class="form-control @error('turn') is-invalid @enderror" name="turn" value="{{ $shift->turn }}" required autocomplete="turn" autofocus>
                                @error('turn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

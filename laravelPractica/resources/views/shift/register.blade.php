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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="prefix" type="text" class="form-control @error('prefix') is-invalid @enderror" name="prefix" value="{{ old('prefix') }}" required autocomplete="prefix" autofocus>
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
                                <input id="turn" type="text" class="form-control @error('turn') is-invalid @enderror" name="turn" value="{{ old('turn') }}" required autocomplete="turn" autofocus>
                                @error('turn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="select" >
                            <label for="subsidiary_id" class="col-md-4 col-form-label text-md-right">{{ __("Selecione subsidiaria") }}</label>
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

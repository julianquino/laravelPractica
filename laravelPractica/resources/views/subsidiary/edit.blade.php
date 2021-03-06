@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Subsidiaria') }}</div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ Route('subsidiaries.update', ['subsidiary'=>$subsidiary->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Subsidiaria') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $subsidiary->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __("Subsidiaria direccion") }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $subsidiary->address }}" required>
                            </div>
                        </div>
                        <input id="company_id" name="company_id" type="hidden" value="{{ Auth::user()->company->id }}">
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

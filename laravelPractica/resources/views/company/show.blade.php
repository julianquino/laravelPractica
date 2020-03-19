@extends('layouts.app')

@section('content')
    <company-information-component :company="{{ $company }}">
    </company-information-component>
@endsection
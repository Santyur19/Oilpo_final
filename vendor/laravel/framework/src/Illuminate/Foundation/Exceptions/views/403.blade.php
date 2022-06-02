
@extends('errors::illustrated-layout')

@section('title', __('No autorizado'))
@section('code', '403')

@section('image')
<div class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __($exception->getMessage() ?: 'No autorizado'))

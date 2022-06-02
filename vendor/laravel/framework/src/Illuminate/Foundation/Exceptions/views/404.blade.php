@extends('errors::illustrated-layout')

@section('code', '404')

@section('title', __('Página no encontrada'))
@section('image')
<div style="background-image: url('https://thumbs.dreamstime.com/b/mec%C3%A1nico-de-perro-con-levas-un-coches-sostiene-los-relojes-autos-fondo-blanco-aislado-197439787.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">

</div>
@endsection

@section('message', __('Lo sentimos, no se ha podido encontrar la página que buscas.'))
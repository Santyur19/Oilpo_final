
@extends('errors::illustrated-layout')

@section('title', __('No autorizado'))
@section('code', '403')

@section('image')
<div class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    <img id="image" src="http://assets.stickpng.com/images/585f89e6cb11b227491c354c.png" alt="" srcset="">
</div>
<style>
    body{
        background-color: rgb(45, 143, 255);

    }
    #image{
        width: 80%;
        position: absolute;
    }

</style>
@endsection

@section('message', __($exception->getMessage() ?: 'No autorizado'))

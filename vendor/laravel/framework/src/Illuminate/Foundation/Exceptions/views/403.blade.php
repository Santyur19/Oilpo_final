@extends('errors::illustrated-layout')

@section('code', '403')
@section('image')

<div style="background-image: url('https://cdn.discordapp.com/attachments/881318396128526336/981636496467578960/perro_mec6.png');  width: 85%; background-position: 10% -90%;" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">

</div>
<style>
    body{
        background: #8e9eab;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #eef2f3, #8e9eab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
</style>
@endsection

@section('title', __('Forbidden'))
@section('message', __($exception->getMessage() ?: 'Forbidden'))

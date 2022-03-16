@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('OILPO') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Te has logeado!') }}
                    <a href="{{ url('admin')}}" class="text-sm text-gray-700 dark:text-gray-500 underline"data-placement="left">Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

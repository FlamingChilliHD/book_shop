@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="box">
                    <div class="card-header">{{ __('You have logged in') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

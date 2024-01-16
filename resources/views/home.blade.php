@extends('layouts.app')

<style>
    #box
    {
        background: wheat;
    }

    .shop
    {
        text-decoration: none;
        background: coral;
        padding: 10px;
        font-weight: bolder;
        font-size: 20px;
        color: royalblue;
        margin-right: 15px;
    }

    .add
    {
        text-decoration: none;
        background: coral;
        padding: 10px;
        font-weight: bolder;
        font-size: 20px;
        color: royalblue;
    }
</style>

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

                        @if(auth()->user()->Admin)
                            <a href="" class="shop">The shop</a>
                            <a href="{{ route('create') }}" class="add">Admin panel</a>
                            @else <a href="" class="shop">The shop</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

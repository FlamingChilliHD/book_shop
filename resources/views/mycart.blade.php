{{-- Use the layouts.all file --}}
@extends('layouts.all')
{{-- New title --}}
@section('title')
My Cart
@endsection

@section('content')
    {{-- <h1 class="book-info">All items in cart</h1><hr>
    <div class="list">
        @foreach ($cart as $cart)
            <h2 class="book-name"> {{ $cart->name }}</h2>
            <h2 class="book-price"> ${{ $cart->price }}</h2>
            <form action="">
                <div class="right">
                    <input type="text" value="{{ $cart->quantity }}">
                    <span class="book-amount">${{ $cart->amount }}.00</span>
                </div><br><hr>
            </form>
        @endforeach
    </div> --}}

    {{-- Attempt two below --}}
    <hr>
    @if (session('removed'))
    <div id="message" class="alert alert-success">
        {{ session('removed') }}
    </div><hr>
    @endif
    <div class="parent-container">
        <div class="container">
            @foreach ($cart as $cart)
                <div class="cart-item">
                    <div class="image">
                        <div class="right">
                            <div class="remove">
                                <form action="{{ route('remove', $cart->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="REMOVE">
                                </form>
                            </div>
                            <div class="item-details">
                                <span class="cart-quantity">{{ $cart->quantity }}</span>
                                <span class="book-amount">${{ $cart->amount }}.00</span>
                            </div>
                        </div>
                        <img class="new-upload" src="{{ asset('uploads/'. $cart->image) }}" alt="">
                        <div class="save-later">
                            <a href="">SAVE FOR LATER</a>
                        </div>
                    </div>
                    <div class="book-attributes">
                        <h2 class="book-name"> {{ $cart->name }}</h2>
                        <h2>Random description</h2>
                        <h2>Other junk...</h2>
                        <h2 class="book-price"> ${{ $cart->price }}</h2>
                    </div>
                </div>
        </div>
        <div class="horizontal-divider">
            <hr>
        </div>
        <div class="container">
            @endforeach
        </div>
    </div>

    {{-- Checkout --}}

    <div class="checkout">
        <div class="checkout-button">
            <a href="{{ route('checkout') }}">Checkout</a>
            <h4>OR</h4>
        </div>
        <div class="amazon">
            <a href="" class="amazon-logo"><ion-icon name="logo-amazon"></ion-icon></a>
            <h4>USE YOUR AMAZON ACCOUNT</h4>
            <h4>OR</h4>
        </div>
        <div class="paypal">
            <a href="" class="paypal-logo"><ion-icon name="logo-paypal"></ion-icon></a>
        </div><hr>
        <div class="order">
            <p>ORDER SUMMARY</p>
            <h3 class="subtotal">Subtotal</h3>
            <ul>
                <li>Shipping</li>
                <li>Tax</li>
            </ul>
            <hr>
            <h3 class="total-order">ORDER TOTAL</h3>
        </div>
    </div>
@endsection

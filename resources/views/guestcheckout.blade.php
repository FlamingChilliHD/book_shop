{{-- Use the layouts.all file --}}
@extends('layouts.all')
{{-- New title --}}
@section('title')
Guest Checkout
@endsection

@section('content')
@if (session("Order"))
    <div id="message">
        {{ session("Order") }}
    </div>
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
    <section class="purchase">
        <h2>Purchase items</h2>
        <form action="{{ route('purchase') }}" method="post">
            @csrf
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
            @error('first_name')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
            @error('last_name')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="address">Address:</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}">
            @error('address')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="town">Town:</label>
            <input type="text" name="town" id="town" value="{{ old('town') }}">
            @error('town')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="postcode">Postcode:</label>
            <input type="text" name="postcode" id="postcode" value="{{ old('postcode') }}">
            @error('postcode')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="country">Country:</label>
            <input type="text" name="country" id="country" value="{{ old('country') }}">
            @error('country')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="county">County:</label>
            <input type="text" name="county" id="county" value="{{ old('county') }}">
            @error('county')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="phone_number">Phone Number (optional):</label>
            <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
            @error('phone_number')
                <div class="error"> {{ $message }} </div>
            @enderror
            <hr><label for="free_shipping">Free Shipping</label>
            <input type="radio" name="shipping" id="free_shipping" value="Free" checked>
            <hr><label for="express_shipping">Express Shipping</label>
            <input type="radio" name="shipping" id="express_shipping" value="Express">
            <hr><input type="submit" value="Place Order" class="items-order">
        </form>
    </section>
</div>
@endsection

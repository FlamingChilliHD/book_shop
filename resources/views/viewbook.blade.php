{{-- Use the layouts.all file --}}
@extends('layouts.all')
{{-- New title --}}
@section('title')
View book
@endsection

{{-- New content --}}
@section('content')
    @if (session('added'))
    <div id="message" class="alert alert-success">
        {{ session('added') }}
    </div>
    @endif
    <div class="viewbook">
        <hr>
        <h1 class="book-info">Book Information</h1><hr>
        <h2>{{ $book->title }}</h2><hr>
        <h2>{{ $book->author }}</h2><hr>
        <h2>{{ $book->description }}</h2><hr>
        <h2 class="book-price">Price: ${{ $book->price }}</h2><hr>
        <h2 class="book-quantity">Stock: {{ $book->quantity }}</h2><hr>
        <img class="new-upload" src="{{ asset('uploads/'. $book->image) }}" alt="">
    </div><hr>
    <form action="{{ route('add', $book->id) }}" method="post">
        @csrf
        <label>Quantity: </label>
        <input type="number" name="quantity"><hr>
        <input class="add-to-cart" type="submit" value="Add to cart">
    </form>
@endsection

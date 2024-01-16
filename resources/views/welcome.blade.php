{{-- Use the layouts file --}}
@extends('layouts.all')
{{-- New title --}}
@section('title')
The book shop
@endsection

{{-- New content --}}
@section('content')
    <div class="all">
        <div class="slider">
            <img class="template_book" src="{{asset('assets/images/template.jpg')}}" alt="">
            <h2 class="novel">Abandoned Kingdom: Our weekly selected novel</h2>
            <div class="view">
                <a href="" class="more">VIEW MORE</a>
            </div>
        </div>
        <div class="updates">
            {{-- First Card --}}
            <div class="card">
                <h4>THE LATEST SALES</h4>
                <span>Get up to 75% off anything!</span>
            </div>
            {{-- Second Card --}}
            <div class="card">
                <h4>RECENTLY ADDED</h4>
                <span>Check out what's new</span>
            </div>
            {{-- Third Card --}}
            <div class="card">
                <h4>BLOG UPDATES</h4>
                <span>The latest news</span>
            </div>
        </div><br><hr>
        <div class="heading-bottom">
            <h1>Our top sellers</h1><br>
        </div>
    </div>
    <div class="card-books">
        <div class="book-group">
            @foreach ($books as $book)
                <div class="book">
                    <div class="image">
                        <img class="new-upload" src="{{ asset('uploads/'. $book->image) }}" alt="">
                    </div>
                    <div class="title">
                        <a class="book-title" href="{{ route('view', $book->id) }}">{{ $book->title }}</a>
                    </div>
                    <div class="author">
                        <span class="book-author">{{ $book->author }}</span>
                    </div>
                    <div class="attributes">
                        <a href="" class="book-attributes">
                        <span>${{ $book->price }}</span></a>
                        <a href="{{ route('add', $book->id) }}"><ion-icon name="bag-add-outline"></ion-icon></A>
                    </div>
                </div>
            @endforeach
        </div>
    </div><br><hr><br>
@endsection

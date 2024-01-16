<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/welcome.css')}}">
    {{-- Google Fonts - Lobster - Regular 400 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    {{-- Google Fonts - Varela Round - Regular 400 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    {{-- Google Fonts - Open Sans - Regular 400 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    {{-- Google Fonts - Poppins - Regular 400 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    {{-- Google Fonts - Noto Sans - Black 900 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@900&display=swap" rel="stylesheet">
    {{-- External CSS --}}
    <link rel="stylesheet" href="{{asset('assets/css/welcome.css')}}">
</head>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<body>
    <nav class="top-nav">
        <ul>
            <li>Store</li>
            <li class="phone">1-234-567-8970</li>
            <a href="{{ route('mycart') }}" class="see_cart"><ion-icon class="cart" name="cart-outline"></ion-icon></a>
        </ul>
    </nav>
    <header class="second">
        <ul>
            <li><a href="" class="search"><ion-icon name="search-outline"></ion-icon></a></li>
            <li class="book_shop"><a href="{{ route('welcome') }}">BookShop</a></li>
            <li class="items">Items</li>
        </ul>
    </header>
    <nav class="third">
        <ul>
            <li>Novels</li>
            <li class="audiobooks">Audiobooks</li>
            <li class="games">Games</li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>

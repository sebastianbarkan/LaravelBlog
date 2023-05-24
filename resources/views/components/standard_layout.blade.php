<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link href="{{ asset('css/standard_layout.css'); }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/index.css'); }}" rel="stylesheet" type="text/css">
    </head>
    <body class="wrapper">
        <header class="header">
            <a class="link-logo-wrap" href="/">
                <img src="{{asset('images/redditlogotext.png')}}" alt="reddit logo" class="img-logo">
            </a>
            <div class="navigation-dropdown-wrap">
                <span class="span-navigation-label">
                    <i class="fa-solid fa-house"></i>
                    <p class="text-navigation-label">Home</p>
                </span>
                <i class="fa-solid fa-angle-down"></i>
            </div>  
            <div class="search-input-wrap">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" class="input-search" placeholder="Search Reddit">
            </div>
            <a class="link-profile-wrap">
                <span class="span-profile-wrap">
                    <img src="{{asset('images/redditprofileimg.png')}}" alt="profile image" class="img-profile">
                    <p class="text-profile">UserName</p>
                </span>
                <i class="fa-solid fa-angle-down"></i>
            </a>    
        </header>
        <main class="main-wrap">
            {{$slot}}
        </main>
        <footer class="footer"></footer>
    </body>
</html>
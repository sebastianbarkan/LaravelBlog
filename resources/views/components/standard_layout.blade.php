<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Reddit</title>
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
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="{{ asset('css/standard_layout.css'); }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/index.css'); }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/create_post.css'); }}" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" ></script>
        <script src="{{asset('js/create-post-type.js');}}" defer></script>
        <script src="{{asset('js/community-dropdown.js');}}" defer></script>
    </head>
    <body class="wrapper">
        <header class="header">
            <a class="link-logo-wrap" href="/">
                <img src="{{asset('images/redditlogotext.png')}}" alt="reddit logo" class="img-logo">
            </a>
            @auth
            <div class="navigation-dropdown-wrap">
                <div class="navigation-dropdown-label-wrap" onclick="toggleNavigationDropdown()">
                    <span class="span-navigation-label">
                        <i class="fa-solid fa-house"></i>
                        <p class="text-navigation-label">Home</p>
                    </span>
                    <i class="fa-solid fa-angle-down"></i>
                </div>
                <div class="community-dropdown-container">
                <div class="community-dropdown-wrap" id="community-dropdown">
                        <input type="text" class="input-community-dropdown-filter" placeholder="Filter">
                        <p class="txt-community-dropdown-label">
                            YOUR COMMUNITIES
                        </p>
                        <button class="btn-create-community" onclick="showCreateCommunityCard()">
                            <i class="fa-solid fa-plus icon-create-create-community"></i>
                            <p class="txt-create-community-btn-label">Create Community</p>
                        </button>
                        <div class="community-dropdown-results-wrap">

                        </div>
                    </div>
                </div>
            </div>
            @else 
            <div class="navigation-dropdown-wrap"></div>
            @endauth  
            <div class="search-input-wrap">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" class="input-search" placeholder="Search Reddit">
            </div>
            @auth
            <a class="link-profile-wrap">
                <span class="span-profile-wrap">
                    <img src="{{asset('images/redditprofileimg.png')}}" alt="profile image" class="img-profile">
                    <p class="text-profile">{{auth()->user()->username}}</p>
                </span>
                <i class="fa-solid fa-angle-down"></i>
            </a>
            @else 
            <button class="btn-header-login" onclick="showLoginCard()">Log In</button>
            @endauth
        </header>

        <span class="login-background-blur" id="login-background-blur" onclick="closeLoginCard()"></span>
        <form class="login-card-wrap" id="login-card-wrap" method="POST" action="/users/authenticate">
            @csrf   
            <span class="span-login-card-header">
                <button class="btn-close-login-card" id="btn-close-login-card" onclick="closeLoginCard()">
                    <i class="fa-solid fa-xmark icon-close-login-card"></i>
                </button>
            </span>
            <div class="login-card-main-wrap">
                <p class="txt-login-card-label">Log In</p>
                <div class="login-card-inputs-wrap">
                    <input type="text" class="input-login-card" name="username" placeholder="Username">
                    @error("username")
                    <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                    @enderror
                    <input type="password" class="input-login-card" name="password" placeholder="Password">
                    @error("password")
                    <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn-login-card-submit" >Log In</button>
                <span class="span-login-card-signup">
                    <p class="txt-login-card-signup-label">New to Reddit?</p>
                    <span class="link-login-card-signup" onclick="goToSignup()">Sign Up</span>
                </span>
            </div>
        </form>
        <form class="signup-card-wrap" id="signup-card-wrap" method="POST" action="/users">
                @csrf   
                <span class="span-login-card-header">
                    <button class="btn-close-login-card" id="btn-close-signup-card" onclick="closeLoginCard()">
                        <i class="fa-solid fa-xmark icon-close-login-card"></i>
                    </button>
                </span>
                <div class="login-card-main-wrap">
                    <p class="txt-login-card-label">Sign Up</p>
                    <div class="login-card-inputs-wrap">
                        <input type="email" class="input-login-card" name="email" placeholder="Email">
                        @error("email")
                        <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                        @enderror
                        <input type="text" class="input-login-card" name="username" placeholder="Username">
                        @error("username")
                        <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                        @enderror
                        <input type="password" class="input-login-card" name="password" placeholder="Password">
                        @error("password")
                        <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                        @enderror
                        <input
                            type="password"
                            class="input-login-card"
                            placeholder="Confirm Password"
                            name="password_confirmation"
                            value="{{old('password_confirmation')}}"
                        />
                        @error("password_confirmation")
                        <p class="text-red-500 test-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="btn-login-card-submit">Create Account</button>
                    <span class="span-login-card-signup">
                        <p class="txt-login-card-signup-label">Already a redditor?</p>
                        <span class="link-login-card-signup" onclick="goToLogin()">Log In</span>
                    </span>
                </div>
            </form>

        <main class="main-wrap">
            <span class="background-blur" id="background-blur" onclick="closeCreateCommunityCard()"></span>
            <div class="create-community-card-wrap" id="create-community-card">
                <span class="span-create-community-header">
                    <p class="txt-create-community-label">Create Community</p>
                    <button class="btn-close-create-community-card" id="btn-create-community-card" onclick="closeCreateCommunityCard()">
                        <i class="fa-solid fa-xmark icon-create-community-card-close"></i>
                    </button>
                </span>
                <hr class="create-community-hr">
                <div class="create-community-card-name-wrap">
                    <span class="span-create-community-card-name-labels">
                        <p class="txt-create-community-card-name-label">Name</p>
                        <p class="txt-create-community-card-description">
                            Community names including capitalization cannot be changed.
                        </p>
                    </span>
                    <div class="create-community-card-name-input-wrap">
                        <input type="text" class="input-create-community-card-name">
                        <p class="txt-create-community-card-placeholder">r/</p>
                    </div>
                </div>
                <div class="create-community-card-type-wrap">
                    <p class="txt-create-community-card-type-label">Community Type</p>
                    <div class="create-community-card-select-type-wrap">
                        <span class="span-create-community-card-type-choice-wrap">
                            <input type="checkbox" class="input-create-community-card-choice">
                            <i class="fa-solid fa-user icon-create-community-card-choice"></i>
                            <span class="span-create-community-card-choice-labels">
                                <p class="txt-create-community-card-choice-label">Public</p>
                                <p class="txt-create-community-card-choice-description">Anyone can view, post, and comment to this community</p>
                            </span>
                        </span>
                        <span class="span-create-community-card-type-choice-wrap">
                            <input type="checkbox" class="input-create-community-card-choice">
                            <i class="fa-solid fa-eye icon-create-community-card-choice"></i>
                            <span class="span-create-community-card-choice-labels">
                                <p class="txt-create-community-card-choice-label">Restricted</p>
                                <p class="txt-create-community-card-choice-description">Anyone can view this community, but only approved users can post</p>
                            </span>
                        </span>
                        <span class="span-create-community-card-type-choice-wrap">
                            <input type="checkbox" class="input-create-community-card-choice">
                            <i class="fa-solid fa-lock icon-create-community-card-choice"></i>
                            <span class="span-create-community-card-choice-labels">
                                <p class="txt-create-community-card-choice-label">Private</p>
                                <p class="txt-create-community-card-choice-description">Only approved users can view and submit to this community</p>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="create-community-card-footer">
                    <button class="btn-create-community-card-cancel">Cancel</button>
                    <button class="btn-create-community-card-create">Create Community</button>
                </div>
            </div>  
            {{$slot}}
        </main>

    </body>
</html>
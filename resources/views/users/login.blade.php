<x-standard_layout>
        <a class="login-background-blur" id="login-background-blur" href="/"></a>
        <form class="login-card-wrap" id="login-card-wrap" method="POST" action="/users/authenticate">
            @csrf   
            <span class="span-login-card-header">
                <a class="btn-close-login-card" id="btn-close-login-card" href="/">
                    <i class="fa-solid fa-xmark icon-close-login-card"></i>
                </a>
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
                    <a class="link-login-card-signup" href="/register">Sign Up</a>
                </span>
            </div>
        </form>
        
        <div class="create-post-link-wrap">
            <a href="/create-post" class="link-create-post">
                <img src="{{asset('images/redditprofileimg.png')}}" alt="profile image" class="img-create-post-link">
            </a>
            <a href="/create-post" class="input-link-create-post">
                <input type="text" class="input-create-post-link" placeholder="Create Post">
            </a>
            <a href="/create-post" class="link-create-media-post">
                <i class="fa-regular fa-image icon-create-media-post" ></i>
            </a>
        </div>
</x-standard_layout>
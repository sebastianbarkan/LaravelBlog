<x-standard_layout>
    <span class="login-background-blur" id="login-background-blur" onclick="closeLoginCard()"></span>
    <form class="signup-card-wrap" id="signup-card-wrap" method="POST" action="/users">
        @csrf   
        <span class="span-login-card-header">
            <a class="btn-close-login-card" id="btn-close-signup-card" href="/">
                <i class="fa-solid fa-xmark icon-close-login-card"></i>
            </a>
        </span>
        <div class="login-card-main-wrap">
            <p class="txt-login-card-label">Sign Up</p>
            <div class="login-card-inputs-wrap">
                @error("email")
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                @error("username")
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                @error("password")
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                @error("password_confirmation")
                <p class="text-red-500 test-xs">{{$message}}</p>
                @enderror
                <input type="email" class="input-login-card" name="email" placeholder="Email" value="{{old('email')}}">
                <input type="text" class="input-login-card" name="username" placeholder="Username" value="{{old('username')}}">
                <input type="password" class="input-login-card" name="password" placeholder="Password" value="{{old('password')}}">
                <input
                    type="password"
                    class="input-login-card"
                    placeholder="Confirm Password"
                    name="password_confirmation"
                    value="{{old('password_confirmation')}}"
                />
            </div>
            <button class="btn-login-card-submit">Create Account</button>
            <span class="span-login-card-signup">
                <p class="txt-login-card-signup-label">Already a redditor?</p>
                <a class="link-login-card-signup" href="/login">Log In</a>
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
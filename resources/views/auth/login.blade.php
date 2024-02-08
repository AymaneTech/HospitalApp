<!DOCTYPE html>
<html>

<head>
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/authentication.css') }}">
</head>

<body>
    <div class="container" id="main">

        <div class="sign-in">
            <form action="/login" method="post" enctype="multipart/form-data">
                <h1 class="main-title">Log in</h1>
                @csrf
                <x-input type="email" name="email" />
                <x-input type="password" name="password" />

                <div class="checkbox-group ">
                    <input id="checkbox" type="checkbox" name="remember_me" id="remember_me">
                    <label for="checkbox">Remember Me</label>
                </div>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-right">
                    <h1>Hello, Friend</h1>
                    <p>Welcome back</p>
                    <a id="register-link" href="/register">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

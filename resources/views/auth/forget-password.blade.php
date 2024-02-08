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
        <form action="/forget-password" method="post" enctype="multipart/form-data">
            <h1 class="main-title">Log in</h1>
            @csrf
            <x-input type="email" name="email" />

            <button>Sign Up</button>
        </form>
    </div>
</div>
</body>

</html>

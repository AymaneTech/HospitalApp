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
        <div class="sign-up">
            <form action="/doctor-register" method="post" enctype="multipart/form-data">
                <h1 class="main-title">Create Account</h1>
                @csrf
                <x-input type="text" name="name" />
                <x-input type="email" name="email" />
                <x-input type="password" name="password" />
                <x-input type="password" name="password_confirmation" />
                <div class="input-group">
                    <input type="file" name="user_avatar" class="user-avatar-upload" accept="image/*">
                    @error('user_avatar')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <select name="speciality_id" id="speciality">
                    @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endforeach
                </select>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="sign-in">
            <form action="/patient-register" method="post" enctype="multipart/form-data">
                <h1 class="main-title">Create Account</h1>
                @csrf
                <x-input type="text" name="name" />
                <x-input type="email" name="email" />
                <x-input type="password" name="password" />
                <x-input type="password" name="password_confirmation" />

                <div class="input-group">
                    <input type="file" name="user_avatar" class="user-avatar-upload" accept="image/*">
                    @error('user_avatar')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <h1>Hello, Friend</h1>
                    <p>Create an account as patient </p>
                    <button id="signIn">I'm patient</button>
                </div>
                <div class="overlay-right">
                    <h1>Hello, Friend</h1>
                    <p>Create account as a doctor</p>
                    <button id="signUp">I'm doctor</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/authentication.js') }}"></script>
</body>

</html>

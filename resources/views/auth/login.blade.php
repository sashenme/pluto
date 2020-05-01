<!DOCTYPE html>
<html>
<head>
	<title>Eduaction Platform Login|Pluto</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="box-container">
        <img class="wave" src="img/login-wave.png">
        <div class="container">
            <div class="img">
                <img src="img/login-bg.svg">
            </div>
            <div class="login-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <img src="img/pluto-logo.svg">
                    <h2 class="title">Education Platform Login</h2>
                    <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                            <h5>Employee ID</h5>
                                <input id="employee_id" type="text" class="input @error('employee_id') is-invalid @enderror" name="employee_id" value="{{ old('employee_id') }}" required autocomplete="employee_id" autofocus>

                    </div>
                    </div>
                    <div class="input-div pass">
                    <div class="i">
                            <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                            <h5>Password</h5>
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    </div>
                    </div>
                    <a href="#">Forgot Password?</a>
                    <div class="div">
                        @error('employee_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror

                    </div>
                    <input type="submit" class="btn" value="{{ __('Login') }}">
                </form>
            </div>
        </div>
    </div>
        <script type="text/javascript" src="{{asset('js/login.js')}}"></script>
</body>
</html>

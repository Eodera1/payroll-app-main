<x-laravel-ui-adminlte::adminlte-layout>
    <head>
        <style>
            body {
                background: linear-gradient(135deg, #00bcd4, #ff6347);
                color: #333;
                font-family: 'Arial', sans-serif;
            }

            .register-box {
                width: 360px;
                margin: 7% auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 15px;
                box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            }

            .register-logo a {
                color: #ff6347;
                font-size: 2rem;
                font-weight: bold;
                text-align: center;
                display: block;
                text-decoration: none;
                margin-bottom: 30px;
            }

            .card {
                border: none;
                box-shadow: none;
            }

            .card-body {
                padding: 20px;
            }

            .login-box-msg {
                font-size: 1.2rem;
                font-weight: 600;
                color: #333;
                text-align: center;
                margin-bottom: 30px;
            }

            .input-group {
                margin-bottom: 1.5rem;
            }

            .input-group .form-control {
                border-radius: 50px;
                padding: 15px;
                font-size: 1rem;
                box-shadow: none;
            }

            .input-group-append .input-group-text {
                background-color: #ff6347;
                color: white;
                border-radius: 50px;
            }

            .btn-primary {
                background-color: #ff6347;
                border-radius: 50px;
                padding: 5px;
                font-size: 1.1rem;
                width: 100%;
                transition: background-color 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #ff4500;
            }

            .icheck-primary label {
                color: #333;
                font-size: 1rem;
            }

            .invalid-feedback {
                font-size: 0.9rem;
                color: #e74c3c;
            }

            .mb-1, .mb-0 {
                text-align: center;
                margin-top: 10px;
            }

            .mb-1 a, .mb-0 a {
                color: #ff6347;
                text-decoration: none;
                font-size: 1rem;
            }

            .mb-1 a:hover, .mb-0 a:hover {
                text-decoration: underline;
            }

            @media (max-width: 480px) {
                .register-box {
                    width: 100%;
                    padding: 15px;
                }

                .register-logo a {
                    font-size: 1.5rem;
                }
            }
        </style>
    </head>

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>

                    <form method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </form>

                    <p class="mb-0">
                        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>

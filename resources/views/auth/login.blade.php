@extends('layouts.auth-login');

@section('content')
    <div class="card shadow-lg">
        <div class="card-body p-4">
            <h1 class="fs-4 text-center fw-bold mb-4">Login</h1>
            <h1 class="fs-6 mb-3">Masukan email dan password</h1>
            <form method="POST" action="{{ route('login') }}" aria-label="rofi" data-id="rofi" class="needs-validation"
                novalidate="" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label class="mb-2 text-muted" for="email">E-Mail</label>
                    <div class="input-group input-group-join mb-3">
                        <input name="email" id="email" type="email" placeholder="Enter Email" class="form-control"
                            value="" required autofocus>
                        <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
                        <div class="invalid-feedback">
                            Email is invalid
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="mb-2 w-100">
                        <label class="text-muted" for="password">Password</label>
                        <a href="forgot.html" class="float-end">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="input-group input-group-join mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Your password" required>
                        <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i
                                class="fa fa-eye"></i>&nbsp</span>
                        <div class="invalid-feedback">
                            Password required
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary ms-auto">
                        Login
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer py-3 border-0">
            <div class="text-center">
                Belum punya akun? <a href="auth-register.html" class="text-dark">hubungi admin!</a>
            </div>
        </div>
    </div>
@endsection

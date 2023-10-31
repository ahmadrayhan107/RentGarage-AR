@extends('frontend.inner-page.layouts.main')

@section('title', 'Login')
@section('navLgn', 'active')

@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6" style="text-align: center">
                                <img src="{{ asset('img/bg/login-bg.jpeg') }}" width="700" style="float: right">
                            </div>
                            <div class="col-lg-6" style="background-color: white">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    <form class="user" method="post" action="/login">

                                        @csrf

                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Email Address" value="{{ old('email') }}" name="email"
                                                required>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user"
                                                placeholder="Password" name="password" required>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                    name="remember">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>

                                        @foreach ($errors->get('password') as $message)
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @endforeach

                                        @if (session()->has('warning'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('warning') }}
                                            </div>
                                        @endif

                                        @if (session()->has('pesan'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('pesan') }}
                                            </div>
                                        @endif

                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>

                                    </form>

                                    <hr color="black">
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

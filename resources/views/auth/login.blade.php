@extends('layouts.auth')

@section('style')
    <style>
        html,
        body {
            height: 100%;
        }
        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }
        .form-signin .form-floating:focus-within {
           z-index: 2;
        }
        .form-signin input[type='email'] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type='password'] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        
    </style>
@endsection

@section('content')

<main>
    <div class="container rounded shadow-lg" style="background-color: #f8f9fa; max-width: 500px; margin-top: 200px;">
        <div class="row justify-content-center">
            <div>
                <form class="form-signin w-100 m-auto" method="POST" action="{{route('login.post')}}" >
                    @csrf
                    <h1 class="h3 mb-3 text-center fs-1 fw-bold">Please sign in</h1>
        
                    <div class="form-floating" style="margin-bottom: 10px">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating" style="margin-bottom: 10px">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <button class="btn btn-success w-100 py-2 mb-3" type="submit">Sign in</button>

                    <div class="text-center">
                        <span>Don't have an account?</span>
                        <a class="btn btn-link p-0 text-decoration-none" href="{{route('register')}}">Register</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>

@endsection

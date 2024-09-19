<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <!-- Login form with laravel auth -->
    <div class="container my-1 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 mt-4">
                <h1>Login Form</h1>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div>
                        <label class="mt-3" for="email">Email</label>
                        <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror"
                            placeholder="Email" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mt-3" for="password">Password</label>
                        <input type="password"
                            class="form-control form-control-lg  @error('password') is-invalid @enderror"
                            placeholder="Password" id="password" name="password" value="{{old('password')}}">
                    </div>
                    @error('password')
                        <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                    <div class="mt-3 d-grid">
                        <button class="btn btn-lg btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
    <div class="container my-1">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                If you don't have an account, please <a href="{{route('signup')}}">register</a> here.
            </div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- Signup form with laravel auth -->
    <div class="container my-1 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 mt-4">
                <h1> Signup Form</h1>
                <form action="{{route('signup')}}" method="post">
                    @csrf
                    <div>
                        <label for="name" class="mt-3">Name</label>
                        <input type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror"
                            placeholder="Name" id="name" name="name" value="{{old('name')}}">
                        @error('email')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                        <label for="email" class="mt-3">Email</label>
                        <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror"
                            placeholder="Email" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="mt-3">Password</label>
                        <input type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Password" id="password" name="password" value="{{old('password')}}">
                    </div>
                    @error('password')
                        <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                    <div class="d-grid">
                        <button class="btn btn-lg btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
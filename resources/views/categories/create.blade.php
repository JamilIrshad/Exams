<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Category form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand text-primary h1" href="#">Exams CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('exams.list')}}">Exams<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{route('categories.list')}}">Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card borde-0 shadow-lg">
                    <div class="card-header bg-dark text-light text-center">
                        <h5>Add Category</h5>
                    </div>
                    <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Category Title</label>
                                <input type="text"
                                    class="form-control form-control-lg  @error('name') is-invalid @enderror"
                                    placeholder="Name" id="name" name="name" value="{{old('name')}}">
                                @error('name')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label h6">Description</label>
                                <textarea name="description"
                                    class="@error('description') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Description" id="description" rows="4">{{old('description')}}</textarea>
                                @error('description')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror

                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
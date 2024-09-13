<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Exam form</title>
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
                        <a class="nav-link text-light" href="{{route('exams.list')}}">Exams<span
                                class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{route('categories.list')}}">Categories</a>
                    </li>
                    <li class="nav-item justify-content-end">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Logout</button>
                        </form>
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
                        <h5>Add Exam</h5>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('exams.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="name" class="form-label h6">Exam Title</label>
                                <input type="text"
                                    class="form-control form-control-lg  @error('name') is-invalid @enderror"
                                    placeholder="Name" id="name" name="name" value="{{old('name')}}">
                                @error('name')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label h6">Description</label>
                                <textarea name="description"
                                    class="@error('description') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Description" id="description"
                                    rows="4">{{old('description')}}</textarea>
                                @error('description')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Exam Date</label>
                                <input type="date" class="form-control" name="exam_date" value="{{old('exam_date')}}">
                            </div>
                            @error('exam_date')
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                    <div>
                                        {{$message}}
                                    </div>
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Exam Category</label>
                                <select class="form-select" aria-label="Default select example" name="category">
                                    <option selected disabled hidden>Select</option>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if (old('category') == $category->name) selected
                                            @endif>{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('category')
                                <div class="alert alert-danger d-flex align-items-center" style="height: 16px" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                    <div>
                                        {{$message}}
                                    </div>
                                </div>
                            @enderror
                            <label for="price" class="form-label h6">Price</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)"
                                    placeholder="0.00" name="price" step="0.01" value="{{old('price')}}">
                            </div>
                            @error('price')
                                <div class="alert alert-danger d-flex align-items-center" style="height: 16px" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                    <div>
                                        {{$message}}
                                    </div>
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="" class="form-label h5">Image</label>
                                <input type="file" class="form-control form-control-lg" name="image">

                            </div>
                            @error('image')
                                <div class="alert alert-danger d-flex align-items-center" style="height: 16px" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                    <div>
                                        {{$message}}
                                    </div>
                                </div>
                            @enderror

                            <!-- submit button -->
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
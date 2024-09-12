<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Categories</title>
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-3">
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="row justify-content-center m-3">
                <div class="col-md-8 d-flex justify-content-end">
                    <a href="{{route('categories.create')}}" class="btn btn-warning border-black border-2">Add
                        Category</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card borde-0 shadow-lg">
                    <div class="card-header bg-dark text-light text-center">
                        <h5>Categories List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-outline-success my-1">Update</a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger my-1">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
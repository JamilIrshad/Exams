<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Exams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand text-primary h1 ml-auto" href="#">Exams CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @if (Auth::user()->is_admin == 1)
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('exams.list')}}">Exams<span
                                    class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-light" href="{{route('categories.list')}}">Categories</a>
                        </li>
                    @endif
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
    <div class="container my-1">
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <!-- Search bar
            <div class="col-md-4">
                <div class="card borde-0 shadow-lg">
                    <div class="card-header bg-dark text-light text-center">
                        <h5>Search</h5>
                    </div>
                </div>
            </div> -->
            @if (Auth::user()->is_admin == 1)
                <div class="row justify-content-center ms-1 mb-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{route('exams.create')}}" class="btn btn-warning border-black border-2">Add Exam</a>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card borde-0 shadow-lg">
                    <div class="card-header bg-dark text-light text-center">
                        <h5>Exams List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th align-middle text-center></th>
                                <th class="align-middle text-center text-center"></th> <!-- Image -->
                                <th align-middle text-center>Name</th>
                                <th align-middle text-center>Description</th>
                                <th align-middle text-center>Exam Date</th>
                                <th align-middle>Category</th>
                                <th></th>
                                <th align-middle text-center>Price</th>
                                <th></th>
                                @if (Auth::user()->is_admin == 1)
                                    <th align-middle text-center ms-3>Actions</th>
                                @endif
                            </tr>
                            @if ($exams->isNotEmpty())
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td class="align-middle text-center">{{$loop->iteration}}</td>
                                        @if ($exam->image_path != "")
                                            <td class="align-middle"><img src="{{asset($exam->image_path)}}" alt="" width="100"
                                                    height="100"></td>
                                        @endif
                                        <td class="align-middle">{{$exam->name}}</td>
                                        <td class="align-middle">{{$exam->description}}</td>
                                        <td class="align-middle">{{$exam->exam_date}}</td>
                                        <td class="align-middle text-center">{{$exam->category->name}}</td>
                                        <td></td>
                                        <td class="align-middle">${{$exam->price}}</td>
                                        <td></td>
                                        @if (Auth::user()->is_admin == 1)
                                            <td class="align-middle">
                                                <a href="{{ route('exams.edit', $exam->id) }}"
                                                    class="btn btn-outline-success my-1">Update</a>
                                                <form action="{{ route('exams.destroy', $exam) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger my-1">Delete</button>
                                                </form>
                                            </td>
                                        @endif

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
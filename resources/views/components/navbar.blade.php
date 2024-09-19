<!-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid d-flex justify-content-center">

        Branding
        <a class="navbar-brand text-primary h1 ml-auto" href="{{route('exams.list')}}">Exams CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (Auth::user()->is_admin == 1)

                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{route('categories.list')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('exams.list')}}">Exams<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{route('questions.list')}}">Questions</a>
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
</nav>  -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <!-- Brand on the left -->
        <a class="navbar-brand text-primary h1 ml-auto ms-5" href="{{route('exams.list')}}">Exams CRUD</a>

        <!-- Navbar toggle button for mobile view -->
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links in the middle and logout on the right -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto mr-auto">
                @if (Auth::user()->is_admin == 1)

                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{route('categories.list')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('exams.list')}}">Exams<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{route('questions.list')}}">Questions</a>
                    </li>
                @endif
            </ul>

            <!-- delete <button></button> -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>

                </li>
            </ul>
        </div>
    </div>
</nav>
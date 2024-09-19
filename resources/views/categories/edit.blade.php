<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Category form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <x-navbar />
    <div class="container my-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card borde-0 shadow-lg">
                    <div class="card-header bg-dark text-light text-center">
                        <h5>Edit Category</h5>
                    </div>
                    <form action="{{route('categories.update', $category->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Category Title</label>
                                <input type="text"
                                    class="form-control form-control-lg  @error('name') is-invalid @enderror"
                                    placeholder="Name" id="name" name="name" value="{{old('name', $category->name)}}">
                                @error('name')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label h6">Description</label>
                                <textarea name="description"
                                    class="@error('description') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Description" id="description" rows="4">{{old('description',$category->description)}}</textarea>
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
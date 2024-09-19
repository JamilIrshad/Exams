<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Question form</title>
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
                        <h5>Add Question</h5>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('questions.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="question" class="form-label h6">Question</label>
                                <textarea name="question"
                                    class="@error('question') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Question?" id="question" rows="3">{{old('question')}}</textarea>
                                @error('question')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Exam Name</label>
                                <select class="form-select" aria-label="Default select example" name="exam">
                                    <option selected disabled hidden>Select</option>
                                    @if ($exams->isNotEmpty())
                                        @foreach ($exams as $exam)
                                            <option value="{{$exam->id}}" @if (old('exam') == $exam->id) selected
                                            @endif>{{$exam->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('exam')
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
                                <label for="name" class="form-label h6">Option 1</label>
                                <input type="text"
                                    class="form-control form-control-lg  @error('option1') is-invalid @enderror"
                                    placeholder="Option 1" id="option1" name="option1" value="{{old('option1')}}">
                                @error('option1')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Option 2</label>
                                <input type="text"
                                    class="form-control form-control-lg  @error('option2') is-invalid @enderror"
                                    placeholder="Option 2" id="option2" name="option2" value="{{old('option2')}}">
                                @error('option2')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Option 3</label>
                                <input type="text"
                                    class="form-control form-control-lg  @error('option3') is-invalid @enderror"
                                    placeholder="Option 3" id="option3" name="option3" value="{{old('option3')}}">
                                @error('option2')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label h6">Option 4</label>
                                <input type="text"
                                    class="form-control form-control-lg  @error('option4') is-invalid @enderror"
                                    placeholder="Option 4" id="option4" name="option4" value="{{old('option4')}}">
                                @error('option2')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>



                            <!-- Correct Answers Checkboxes -->
                            <label for="name" class="form-label h6">Correct Options:</label>
                            <div class="my-3">

                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                        name="checkboxes[]" {{ (is_array(old('checkboxes')) and in_array(1, old('checkboxes'))) ? ' checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox1">Option 1</label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                        name="checkboxes[]" {{ (is_array(old('checkboxes')) and in_array(2, old('checkboxes'))) ? ' checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox2">Option 2</label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3"
                                        name="checkboxes[]" {{ (is_array(old('checkboxes')) and in_array(3, old('checkboxes'))) ? ' checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox3">Option 3</label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="4"
                                        name="checkboxes[]" {{ (is_array(old('checkboxes')) and in_array(4, old('checkboxes'))) ? ' checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox4">Option 4</label>
                                </div>
                            </div>
                            @error('checkboxes')
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
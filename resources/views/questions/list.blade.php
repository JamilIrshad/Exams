<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <x-navbar />
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

            <div class="col-md-12 d-flex justify-content-between my-3">
                <a href="#" class="btn btn-primary border-black border-2">Download Questions</a>
                @if (Auth::user()->is_admin == 1)
                        <a href="{{route('questions.create')}}" class="btn btn-warning border-black border-2">Add
                            Question</a>
                    </div>
                @endif

            <div class="col-md-12">
                <div class="card borde-0 shadow-lg">
                    <div class="card-header bg-dark text-light text-center">
                        <h5>Questions List</h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($questions as $question)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{$loop->index}}" aria-expanded="false"
                                            aria-controls="flush-collapse{{$loop->index}}">
                                            <h6>{{$loop->index + 1 . '. '}} {{$question->question}}</h6>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{$loop->index}}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="container">
                                                <h6>Options: </h6>
                                                <div class="row my-3">
                                                    <div class="col">
                                                        a) {{$question->option1}}
                                                    </div>
                                                    <div class="col">
                                                        b) {{$question->option2}}
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col">
                                                        c) {{$question->option3}}
                                                    </div>
                                                    <div class="col">
                                                        d) {{$question->option4}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container p-3  my-4 bg-light">
                                                <h6>
                                                    Correct Answers:
                                                    <br>

                                                    @foreach ($question->correct_answer as $answer)
                                                        @if ($answer == '1')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                a) <span></span> {{$question->option1}}
                                                            </div>
                                                        @endif
                                                        @if ($answer == '2')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                b) <span></span> {{$question->option2}}
                                                            </div>

                                                        @endif
                                                        @if ($answer == '3')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                c) <span></span> {{$question->option3}}
                                                            </div>

                                                        @endif
                                                        @if ($answer == '4')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                d) <span></span> {{$question->option4}}
                                                            </div>

                                                        @endif
                                                    @endforeach

                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--
                        <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                            @foreach ($questions as $question)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            <h6>{{$loop->index + 1 . '. '}} {{$question->question}}</h6>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <div class="container">
                                                <h6>Options: </h6>
                                                <div class="row my-3">
                                                    <div class="col">
                                                        a. {{$question->option1}}
                                                    </div>
                                                    <div class="col">
                                                        b. {{$question->option2}}
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col">
                                                        c. {{$question->option3}}
                                                    </div>
                                                    <div class="col">
                                                        d. {{$question->option4}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container p-3  my-4 bg-light">
                                                <h6>
                                                    Correct Answers:
                                                    <br>

                                                    @foreach ($question->correct_answer as $answer)
                                                        @if ($answer == '1')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                a) <span></span> {{$question->option1}}
                                                            </div>
                                                        @endif
                                                        @if ($answer == '2')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                b) <span></span> {{$question->option2}}
                                                            </div>

                                                        @endif
                                                        @if ($answer == '3')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                c) <span></span> {{$question->option3}}
                                                            </div>

                                                        @endif
                                                        @if ($answer == '4')
                                                            <div class="alert alert-success mt-3" role="alert">
                                                                d) <span></span> {{$question->option4}}
                                                            </div>

                                                        @endif
                                                    @endforeach

                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div> -->
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container d-flex">
        <div class="row mt-5">
            <div class="col-md-7">
                <form action="{{ route('payment.store', $order) }}" method="POST">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-primary">Authorize Payment</button>
                </form>
            </div>

            <div class="col-md-7 mt-5">


                <form action="{{ route('payment.declined') }}" method="POST">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-primary">Decline Payment</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>
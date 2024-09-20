<div class="container">
    <div class="row d-flex justify-content-center ms-1 mb-3">
        <form action="{{route('search')}}" method="post">
            @method('POST')
            @csrf
            <div class="input-group mt-3">
                <input type="text" class="form-control w-70" placeholder="Search Exam" aria-label="search_exam"
                    aria-describedby="button-addon2" name="search" id="search">
                <button class="btn btn-success w-30" type="button" id="button-addon2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg></button>
            </div>
        </form>
    </div>
</div>
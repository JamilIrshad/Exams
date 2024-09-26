<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Exams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css" class="stylesheet">

</head>
<x-navbar />
<div class="container my-1">
    <div class="row d-flex justify-content-center">
        <x-alerts />
        @if (Auth::user()->is_admin == 1)
            <div class="row justify-content-center ms-1">
                <div class="col-md-12 d-flex justify-content-end mt-3">
                    <a href="{{ route('exams.create') }}" class="btn btn-warning border-black border-2">Add Exam</a>
                </div>
            </div>
        @endif
        <div class="col-md-12 mt-3">
            <div class="card borde-0 shadow-lg">
                <div class="card-header bg-dark text-light text-center">
                    <h5>Exams List</h5>
                </div>
                <div class="card-body">
                    @if(Auth::user()->is_admin == 1)
                        <div class="container d-flex justify-content-end mb-3">
                            <a href="{{ route('exams.export') }}" class="btn btn-outline-success my-1">Export Exams</a>
                        </div>
                    @endif
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th class="align-middle text-center"></th>
                                <th></th> <!-- Image -->
                                <th class="align-middle">Name</th>
                                <th class="align-middle text-center">Description</th>
                                <th class="align-middle">ExamDate</th>
                                <th class="align-middle text-center">Category</th>
                                <th class="align-middle">Price</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

<script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
<script>
    var storageUrl = "{{ asset('exams') }}"; // Base URL for storage
    storageUrl = storageUrl.slice(0, -'/exams'.length);
</script>
<script>
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            initComplete: function () {
                //add div container at the end of div with class="row mt-2 justify-content-between"
                let div = document.createElement('div');
                div.className = 'container d-flex flex-row mt-4 justify-content-end flex-nonwrap';
                document.querySelector('.row.mt-2.justify-content-between').appendChild(div);

                //input group for category sort dropdown
                let input_group = document.createElement('div');
                input_group.className = 'input-group w-auto';
                div.appendChild(input_group);

                // Create label element
                let label = document.createElement('label');
                label.htmlFor = 'category';
                label.className = 'input-group-text';
                label.innerHTML = 'Category';
                input_group.appendChild(label);

                // Create select element
                let select = document.createElement('select');
                select.add(new Option(''));
                select.id = 'category';
                select.className = 'form-select order-3 w-auto';
                input_group.appendChild(select);


                //get select options from backend using ajax
                jQuery('#category').on('change', function () {
                    var category = jQuery(this).val();
                    table.ajax.url("{{url('getexams')}}?category=" + category).load();
                });

                // add options to select from categories table
                $.ajax({
                    url: "{{url('getcategories')}}",
                    type: 'GET',
                    success: function (data) {
                        data.forEach(function (category) {
                            var option = new Option(category.name, category.name);
                            select.add(option);
                        });
                    },

                    error: function (error) {
                        console.log(error);
                    }
                });

                //responsive design
                //add class input-group in dt-select class
                document.querySelector('.dt-search').classList.add('input-group');
                document.querySelector('label[for="dt-search-0"]').classList.add('input-group-text');

                document.querySelector('.dt-length').classList.add('input-group');
                document.querySelector('label[for="dt-length-0"]').classList.add('input-group-text');

                document.querySelector('select[name="datatable_length"]').classList.add('m-0');

            },

            processing: true,
            serverSide: true,
            searching: true,
            lengthMenu: [[10, 25, 50, 100, 200], ["10", "25", "50", "100", "200"]],
            "language": {
                "infoEmpty": "No exams available."
            },
            ajax: "{{url('getexams')}}",
            columns: [
                { "data": "id" },
                {
                    "data": "image_path",
                    "orderable": false,
                    "render": function (data, type, row) {
                        return "<img src='" + storageUrl + "/" + data + "' height='80' width='80'/>";
                    }
                },
                { "data": "name" },
                { "data": "description", orderable: false },
                { "data": "exam_date" },
                { "data": "category_name" },
                { "data": "price", render: $.fn.dataTable.render.number(',', '.', 2, '$') },
                {
                    "data": "buttons",
                    "orderable": false,
                    "searchable": false
                }
            ]
        });
    });
</script>

</body>

</html>
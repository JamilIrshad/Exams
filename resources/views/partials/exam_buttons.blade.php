@if(Auth::user()->is_admin == 1)
    <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-outline-success my-1">Update</a>
    <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger my-1">Delete</button>
    </form>
@endif
@php
    $order = Auth::user()->orders()->whereHas('orderitems', function ($query) use ($exam) {
        $query->where('exam_id', $exam->id);
    })->first();
@endphp
@if (Auth::user()->is_admin != 1)
    @if ($order && $order->hasPayment())
        <form action="{{ route('examquestion.list', $exam->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('post')
            <button type="submit" class="btn btn-info my-1">View</button>
        </form>
        <form action="{{ route('questions.downloadPDF', $exam->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('post')
            <button type="submit" class="btn btn-primary">Download</button>
        </form>
    @else
        <form action="{{ route('order.store', $exam->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('post')
            <button type="submit" class="btn btn-success">Buy</button>
        </form>
    @endif
@else
    <form action="{{ route('examquestion.list', $exam->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-info my-1">View</button>
    </form>
    <form action="{{ route('questions.downloadPDF', $exam->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-primary">Download</button>
    </form>
@endif
@if(Auth::user()->is_admin == 1)
    <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-outline-success my-1" style="width: 98px; height: 38px;">Update</a>
    <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger my-1" style="width: 98px; height: 38px;">Delete</button>
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
            <button type="submit" class="btn btn-info my-1" style="width: 98px; height: 38px;">View</button>
        </form>
        <form action="{{ route('questions.downloadPDF', $exam->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('post')
            <button type="submit" class="btn btn-primary" style="width: 98px; height: 38px;">Download</button>
        </form>
    @else
        <form action="{{ route('order.store', $exam->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('post')
            <button type="submit" class="btn btn-success align-middle" style="width: 98px; height: 38px;">Buy</button>
        </form>
    @endif
@else
    <form action="{{ route('examquestion.list', $exam->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-info my-1" style="width: 98px; height: 38px;">View</button>
    </form>
    <form action="{{ route('questions.downloadPDF', $exam->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-primary" style="width: 98px; height: 38px;">Download</button>
    </form>
@endif
@if(!$data->isEmpty())
    <ul>
        @foreach($data as $row)
        <li>{{$row->judul}}</li>
        @endforeach
    </ul>

    <div class="load-more-button">
        <button>load more</button>
    </div>
@else
    <h1>test</h1>
@endif
@if(!$data->isEmpty())
    <ul>
        @foreach($data as $row)
        <li>{{$row->judul}}</li>
        
        @php($LastId = $row->id)
        @endforeach

    </ul>

    <div class="load-more-button">
        <button class="btn btn-info" data-id="{{$LastId}}">load more</button>
    </div>
@else
    <h1>test</h1>
@endif
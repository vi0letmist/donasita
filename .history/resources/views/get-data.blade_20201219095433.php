@if(!$data->isEmpty())
    <ul>
        @php($i=0)
        @foreach($data as $row)
            <li>{{$row->judul}}</li>
            
            @php($LastId = $row->id)
            @php($i++)
        @endforeach

    </ul>
    @if($i>2)
    <div class="load-more-button">
        <button class="btn btn-info" data-id="{{$LastId}}" id="LoadMoreButton">load more</button>
    </div>
    @endif
@else
    <h1>test</h1>
@endif
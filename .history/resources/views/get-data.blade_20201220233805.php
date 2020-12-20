@if(!$data->isEmpty())
    <ul>
        @php($i=0)
        @foreach($data as $row)
            <li>{{$row->nama}}</li>
            
            @php($LastId = $row->id)
            @php($i++)
        @endforeach

    </ul>
    @if($i>3)
    <div class="load-more-button">
        <button class="btn btn-info" data-id="{{$LastId}}" id="LoadMoreButton">load more</button>
    </div>
    @endif
@else
    <h1>no more data</h1>
@endif
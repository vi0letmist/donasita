@if(!$data->isEmpty())
    <ul>
        @foreach($data as $row)
        <li>{{$row->judul}}</li>
        @endforeach
    </ul>
@else
    <h1>test</h1>
@endif
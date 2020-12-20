@if($data->isEmpty())
    <h1>test</h1>
@else
<ul>
    @foreach($data as $row)
    <li>{{$row-judul}}</li>
    @endforeach
</ul>
@endif
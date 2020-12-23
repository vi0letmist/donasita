@if(!$data->isEmpty())
    <ul>
        @php($i=0)
        @foreach($data as $row)
            @if($row->komen != null)
                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20 border-bottom-20">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                            <p>{{$row->nama}} donasi <b>Rp. {{$row->nominal}}</b></p>
                            <p>{{$row->komen}}</p>
                            <br>
                            <p class="lastdonate">1 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            @endif
            
            @php($LastId = $row->id)
            @php($i++)
        @endforeach

    </ul>
    @if($i>4)
    <div class="load-more-button">
        <button class="btn seeall-button" data-id="{{$LastId}}" id="LoadMoreButton">load more</button>
    </div>
    @endif
@else
    <h1>no more data</h1>
@endif
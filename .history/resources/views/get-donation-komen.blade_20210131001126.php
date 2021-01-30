@if(!$data->isEmpty())
    <ul>
        @php($i=0)
        @foreach($data as $row)
            @if($row->komen != null)
                <div class="col-lg-12 col-md-12 col-sm-12 margin-top-20 padding-top-20 padding-left-0 border-top-20">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                            <p>{{$row->nama}} donasi <b>@currency($row->nominal) ui</b></p>
                            <p>{{$row->komen}}</p>
                            <br>
                            <p class="lastdonate">{{\Carbon\Carbon::createFromTimeStamp(strtotime($row->created_at))->locale('id')->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            @endif
            
            @php($LastId = $row->id)
            @php($i++)
        @endforeach

    </ul>
    @if($i>4)
    <div class="load-more-button padding-top-20">
        <button class="btn seeall-button" data-id="{{$LastId}}" id="LoadMoreButton">Lihat Komentar Lainnya</button>
    </div>
    @endif
@else
    <div class="no-more-data">
        
    </div>
@endif
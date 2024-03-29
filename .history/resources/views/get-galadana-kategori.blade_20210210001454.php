@if(!$data->isEmpty())
    @php($i=0)
    @foreach($data as $row)
        <!-- ***** Features Small Item Start ***** -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/g/{{$row->slug}}';" style="cursor: pointer;">
            <div class="features-populer-item">
                <div class="populer" style="background-image: url(../images/{{$row->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">
                            
                </div>
                <h5 class="features-title"><b>{{$row->judul}}</b></h5>
                <p>{!! html_entity_decode(\Illuminate\Support\Str::limit($row->cerita, $limit = 80, $end = '...')) !!}</p>
                <p class="lastdonate">donasi terakhir {{\Carbon\Carbon::createFromTimeStamp(strtotime($row->created_at))->locale('id')->diffForHumans()}}</p>
                <div class="bar">
                    <div class="progress-bar-xs progress">
                    </div>
                </div>
                <div class="donateprog">
                    <p><b>@currency($row->progres_capaian)</b> dari @currency($row->target_capaian)</p>
                </div>
            </div>
        </div>
        <!-- ***** Features Small Item End ***** -->
        @php($LastId = $row->id)
        @php($i++)
    @endforeach

    @if($i>5)
    <div class="load-more-button padding-top-20">
        <button class="btn seeall-button" data-id="{{$LastId}}" id="LoadMoreButton">Lihat Unggahan Lainnya</button>
    </div>
    @endif
@else
    <div class="col-lg-12 col-md-12 col-sm-12">
    
    </div>
@endif
 
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
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $row->progres_capaian / $row->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$row->progres_capaian / $row->target_capaian * 100}}%"></div>
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
                            @if($row->anonim == TRUE)
                            <p>Anonim donasi <b>@currency($row->nominal)</b></p>
                            @else
                            <p>{{$row->nama}} donasi <b>@currency($row->nominal)</b></p>
                            @endif
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
    <div class="col-lg-12 col-md-12 col-sm-12 margin-top-20 padding-top-20 padding-left-0 border-top-20">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <p><strong>Donasi dan bagikan kata-kata penyemangat</strong></p>  
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 right-text" style="display:flex;align-items:center;">
                <a href="/g/{{$galadana->slug}}/donasi" class="main-button">Selanjutnya</a>
            </div>
        </div>
    </div>
@endif
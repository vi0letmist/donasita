@if(!$data->isEmpty())
    <div class="row">
        @php($i=0)
        @foreach($data as $row)
            <!-- ***** Features Small Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/g/{{$row->slug}}';" style="cursor: pointer;">
                <div class="features-populer-item">
                    <div class="populer" style="background-image: url(../images/{{$row->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">

                    </div>
                    <h5 class="features-title"><b>{{$row->judul}}</b></h5>
                    <div class="desc-ngitem">
                        {!! html_entity_decode(\Illuminate\Support\Str::limit($row->cerita, $limit = 80, $end = '...')) !!}
                    </div>
                    @if(!$donasi->isEmpty())
                    @foreach($donasi as $d)
                    @if($row->id == $d->galadana_id)
                    <p class="lastdonate">donasi terakhir {{\Carbon\Carbon::createFromTimeStamp(strtotime($d->updated_at))->locale('id')->diffForHumans()}}</p>
                    @endif
                    @endforeach
                    @endif
                    <div class="bar">
                        <div class="progress-bar-xs progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $row->progres_capaian / $row->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$row->progres_capaian / $row->target_capaian * 100}}%"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12 donateprog">
                            <p><b>@currency($row->progres_capaian)</b><br>
                            dari <b>@currency($row->target_capaian)</b>
                            </p>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 donateprog right-all">
                            <p><strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($row->batas_waktu))->locale('id')->diffInDays()}}</strong> hari lagi</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Features Small Item End ***** -->
            @php($LastId = $row->id)
            @php($i++)
        @endforeach
    </div>
    @if($i>5)
    <div class="col-lg-12 col-md-12 col-sm-12 center-all">
        <button type="button" class="btn seeall-gal-button" data-id="{{$LastId}}" id="LoadMoreButton">
            Lihat Semua
        </button>
    </div>
    @endif
@else
    <div class="col-lg-12 col-md-12 col-sm-12 center-all">
        <img src="{{ asset('assets') }}/images/inbox-empty-icon.png" width="200px">
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 center-all">
        <h2 style="color:#dee2e6">Tidak ada data</h2>
    </div>
@endif

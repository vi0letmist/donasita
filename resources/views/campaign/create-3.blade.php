@extends('layouts.navbar-nonfooter', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-3 col-lg-6 col-md-6 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item padding-left-1 padding-right-1 text-align-center">
                    <i class="fas fa-heart icon-gradient bg-warm-flame" style="font-size:8rem;"></i>
                    <h5 class="padding-top-20">Terimakasih telah melakukan penggalangan dana menggunakan *namaapp*
                        penggalangan dana anda akan ditinjau terlebih dahulu
                    </h5>
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20">
                        <a href="#" class="contact-button">Kembali ke halaman utama</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-sm-12 padding-left-0 padding-right-4">
                <div class="create-item">
                    <div class="create-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <h6>Tips</h6>
                    </div>
                    <div class="create-sidebar-body padding-top-10">
                        <p>Anda selalu dapat mengubah jumlah nominal penggalangan dana nanti. Jika 
                            anda tidak yakin harus mulai dari mana, sebagian besar penggalangan dana 
                            memiliki sasaran/target Rp. 10.000.000</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
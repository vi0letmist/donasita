@extends('layouts.navbar-nonfooter', [
    'namePage' => 'campaign',
    'activePage' => 'campaign',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item padding-left-1 padding-right-1">
                    <h4>Ceritakan Kisah Anda</h4>
                    <div class="create2-form padding-top-20">
                        <form id="create" action="" method="post">
                            <fieldset>
                                <textarea name="cerita" rows="6" class="form-control" id="cerita" placeholder="Your Message" required=""></textarea>
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 center-all padding-top-20">
                        <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Mulai Penggalangan Dana</button>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item">
                    <div class="create-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <h6>Tips</h6>
                    </div>
                    <div class="create-sidebar-body tick padding-top-10">
                        <h6>Untuk mendapatkan dana yang anda inginkan, pastikan anda:</h6>
                        <ul>
                            <li>Jelaskan apa yang terjadi</li>
                            <li>Jelaskan seberapa butuh/cepat anda membutuhkan dana tersebut</li>
                            <li>Jelaskan bagaimana dana ini akan membantu anda atau orang yang anda cintai</li>
                            <li>Jelaskan jika anda ada cara lain untuk membantu anda</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
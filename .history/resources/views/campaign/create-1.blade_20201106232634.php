@extends('layouts.navbar-nonfooter', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 padding-left-0 padding-right-0">
                <div class="create-cam">
                    <div class="col-lg-12 col-md-12 col-sm-12 center-all padding-left-0 padding-right-0">
                        <form id="regForm" method="POST" action="{{ route('galadana.store') }}" enctype="multipart/form-data">
                        @csrf
                            <h1>Buat Penggalangan Dana</h1><br>
                            <!-- Circles which indicates the steps of the form: -->
                            <div class="row">
                                <div class="col-lg-12 titik">
                                    <ul id="probar">
                                        <li class="step" id="prolog"><strong>Umum</strong></li>
                                        <li class="step" id="cimage"><strong>Gambar</strong></li>
                                        <li class="step" id="mbuhla"><strong>Cerita</strong></li>
                                        <li class="step" id="confirm"><strong>Selesai</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <div class="col-lg-12 col-md-12 col-sm-12 price padding-left-0 padding-right-0">
                                    <div class="form-group mb-3 {{ $errors->has('target_capaian') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                                <fieldset>
                                                    <input oninput="this.className = ''" name="target_capaian" value="{{ old('target_capaian') }}" type="text" class="form-control{{ $errors->has('target_capaian') ? ' is-invalid' : '' }}" id="target_capaian" placeholder="10.000.000" required="" autofocus>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'target'])
                                </div>
                                <div class="fit">
                                    <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-judul">{{ __('Book Name *  ') }}</label>
                                        <fieldset>
                                            <input oninput="this.className = ''" name="judul" value="{{ old('judul') }}" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" id="judul" placeholder="{{ __('Judul Penggalangan Dana') }}" required="">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'judul'])
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="fit">
                                    <h5 class="padding-top-20">
                                    </h5>
                                    <div class="file-upload">
                                        <input style="padding-top: 10px;" type="file" class="form-control btn btn-sm" name="gambar" value="{{old('gambar')}}" onchange="readURL(this);" accept="image/*">
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="fit">
                                    <div class="form-group{{ $errors->has('cerita') ? ' has-danger' : '' }}">
                                        <fieldset>
                                            <textarea oninput="this.className = ''" name="cerita" value="{{ old('cerita') }}" rows="6" class="form-control{{ $errors->has('cerita') ? ' is-invalid' : '' }} cerita" id="cerita" placeholder="Your Message" required=""></textarea>
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'cerita'])
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="fit">
                                    <i class="fas fa-heart icon-gradient bg-warm-flame" style="font-size:8rem;"></i>
                                    <h5 class="padding-top-20">Terimakasih telah melakukan penggalangan dana menggunakan *namaapp*
                                        penggalangan dana anda akan ditinjau terlebih dahulu
                                    </h5>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20">
                                        <a href="#" class="contact-button">Kembali ke halaman utama</a>
                                    </div>
                                </div>
                            </div>
                            <div style="overflow:auto;">
                                <div style="float:right;padding-right:13%;">
                                <button type="button" class="prev-button" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
                                <button type="button" class="main-button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 padding-left-1 padding-right-1">
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
                </div>
            </div>
    </div>
</div>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Kirim";
  } else {
    document.getElementById("nextBtn").innerHTML = "Selanjutnya";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
@endsection
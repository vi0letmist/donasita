@extends('layouts.navbar-nonfooter', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item padding-left-0 padding-right-0">
                    <h4>Masukkan Nominal target penggalangan dana</h4>
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-12 col-md-12 col-sm-12 center-all padding-top-20 padding-left-0 padding-right-0">
                        <div class="create-form">
                            <form id="create" action="" method="get">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 price">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                    <fieldset>
                                                        <input name="target" type="text" class="form-control" id="target" placeholder="10.000.000" required="" autofocus>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4">
                                        <fieldset>
                                            <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Penggalangan Dana" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4">
                                        <fieldset>
                                            <input name="penerima" type="email" class="form-control" id="penerima" placeholder="Untuk siapa kamu mengumpulkan dana?" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4">
                                        <fieldset>
                                            <input name="kodepos" type="email" class="form-control" id="kodepos" placeholder="Kode Pos" required="">
                                        </fieldset>
                                    </div>
                                        <div class="file-upload padding-left-3 padding-right-3">
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                                <div class="drag-text">
                                                <h3>Drag and drop a file or select add Image</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-lg-12 center-all padding-top-10">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Lanjutkan</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Contact Form End ***** -->
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
            <div class="col-lg-12">
                <div class="create-item">
                    <form id="regForm" action="/action_page.php">
                        <h1>Register:</h1>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">Name:
                            <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
                            <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
                        </div>
                        <div class="tab">Contact Info:
                            <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
                            <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
                        </div>
                        <div class="tab">Birthday:
                            <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                            <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                            <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
                        </div>
                        <div class="tab">Login Info:
                            <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                            <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
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
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
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
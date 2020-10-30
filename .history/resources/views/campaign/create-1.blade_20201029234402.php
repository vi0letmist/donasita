@extends('layouts.navbar-nonfooter', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12">
                <div class="create-cam">
                    <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                        <div class="create-form">
                            <form id="regForm" action="/action_page.php">
                                <h1>Buat Penggalangan Dana</h1><br>
                                <!-- Circles which indicates the steps of the form: -->
                                <div class="row">
                                    <div class="col-lg-12 titik">
                                        <ul id="probar">
                                            <li class="step" id="prolog"><strong>Account</strong></li>
                                            <li class="step" id="mbuhla"><strong>Personal</strong></li>
                                            <li class="step" id="confirm"><strong>Selesai</strong></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- One "tab" for each step in the form: -->
                                <div class="tab">
                                    <fieldset>
                                        <input oninput="this.className = ''" name="target" type="text" class="form-control" id="target" placeholder="10.000.000" required="" autofocus>
                                    </fieldset>
                                    <fieldset>
                                        <input oninput="this.className = ''" name="judul" type="text" class="form-control" id="judul" placeholder="Judul Penggalangan Dana" required="">
                                    </fieldset>
                                    <fieldset>
                                        <input oninput="this.className = ''" name="penerima" type="email" class="form-control" id="penerima" placeholder="Untuk siapa kamu mengumpulkan dana?" required="">
                                    </fieldset>
                                    <fieldset>
                                        <input oninput="this.className = ''" name="kodepos" type="email" class="form-control" id="kodepos" placeholder="Kode Pos" required="">
                                    </fieldset>
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                                        <div class="image-upload-wrap">
                                            <input oninput="this.className = ''" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
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
                                </div>
                                <div class="tab">
                                    <fieldset>
                                        <textarea oninput="this.className = ''" name="cerita" rows="6" class="form-control" id="cerita" placeholder="Your Message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="tab">
                                    <i class="fas fa-heart icon-gradient bg-warm-flame" style="font-size:8rem;"></i>
                                    <h5 class="padding-top-20">Terimakasih telah melakukan penggalangan dana menggunakan *namaapp*
                                        penggalangan dana anda akan ditinjau terlebih dahulu
                                    </h5>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20">
                                        <a href="#" class="contact-button">Kembali ke halaman utama</a>
                                    </div>
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    </div>
                                </div>
                                
                                <!-- <div style="text-align:center;margin-top:40px;">
                                    <span class="step">1</span>
                                    <span class="step">2</span>
                                    <span class="step">3</span>
                                    <span class="step">4</span>
                                </div>
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step">1</span>
                                    <span class="step">2</span>
                                    <span class="step">3</span>
                                    <span class="step">4</span>
                                </div>
                                <ul id="progressbar">
                                    <li class="step" id="account"><strong>Account</strong></li>
                                    <li class="step" id="personal"><strong>Personal</strong></li>
                                    <li class="step" id="payment"><strong>Payment</strong></li>
                                    <li class="step" id="confirm"><strong>Finish</strong></li>
                                </ul> -->
                            </form>
                        </div>
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
    $(document).ready(function(){

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 600
        });
        });

        $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    });

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$(".submit").click(function(){
return false;
})

});
</script>
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
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
                <form id="msform">
                <ul id="progressbar">
                    <li class="active" id="account"><strong>Account</strong></li>
                    <li id="personal"><strong>Personal</strong></li>
                    <li id="payment"><strong>Payment</strong></li>
                    <li id="confirm"><strong>Finish</strong></li>
                </ul>
                <fieldset>
                        <div class="form-card">
                            <h2 class="fs-title">Account Information</h2> <input type="email" name="email" placeholder="Email Id" /> <input type="text" name="uname" placeholder="UserName" /> <input type="password" name="pwd" placeholder="Password" /> <input type="password" name="cpwd" placeholder="Confirm Password" />
                        </div> <input type="button" name="next" class="next action-button" value="Next Step" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <h2 class="fs-title">Personal Information</h2> <input type="text" name="fname" placeholder="First Name" /> <input type="text" name="lname" placeholder="Last Name" /> <input type="text" name="phno" placeholder="Contact No." /> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                        </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <h2 class="fs-title">Payment Information</h2>
                            <div class="radio-group">
                                <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>
                            </div> <label class="pay">Card Holder Name*</label> <input type="text" name="holdername" placeholder="" />
                            <div class="row">
                                <div class="col-9"> <label class="pay">Card Number*</label> <input type="text" name="cardno" placeholder="" /> </div>
                                <div class="col-3"> <label class="pay">CVC*</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>
                            </div>
                            <div class="row">
                                <div class="col-3"> <label class="pay">Expiry Date*</label> </div>
                                <div class="col-9"> <select class="list-dt" id="month" name="expmonth">
                                        <option selected>Month</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select> <select class="list-dt" id="year" name="expyear">
                                        <option selected>Year</option>
                                    </select> </div>
                            </div>
                        </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <h2 class="fs-title text-center">Success !</h2> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5>You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item padding-left-0 padding-right-0">
            <div class="col-lg-12 col-md-12 col-sm-12 center-all padding-top-20 padding-left-0 padding-right-0">
                <div class="create-form">
                    <form id="regForm" action="/action_page.php">
                        <h1>Register:</h1>
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
                        <ul id="probar">
                            <li class="step" id="prolog"></li>
                            <li class="step" id="personal"></li>

                        </ul>
                        <div style="text-align:center;margin-top:40px;">
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
                        </ul>
                    </form>
                </div>
            </div>
        </div></div>
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
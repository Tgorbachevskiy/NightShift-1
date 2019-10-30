//Initialize select
$(document).ready(function () {
  $('select').formSelect();
});
//Initialize collapsible for references
$(document).ready(function(){
  $('.collapsible').collapsible();
});

/*
    add a mouse over for pulsate on the submit button,
    remove it on mouse out
 */
$("#submit").mouseover(function () {
  $("button").addClass("pulse");
});
$("#submit").mouseout(function () {
  $("button").removeClass("pulse");
});

//Show/Hide functions
$("#noExperience").click(function(){
  $("#prevExperience").toggle();
});
$("#noPref").click(function(){
  $("#rolePref").toggle();
});




$(document).ready(function () {
  $('.datepicker').datepicker();
});


// function to display message if user selects no from the
// consent radio buttons
function func() {
  var conN = document.getElementById("no").checked;
  var con = document.getElementById("consent");
  if(conN == true) {
    con.style.display = "block";
  } else {
    con.style.display = "none";
  }
}

// toggles the hours that pop up for availability if weekend is selected
function time() {
  var chb = document.getElementById("weekends");
  if(chb.checked) {
    document.getElementById("availability").style.display = "block";
  } else {
    document.getElementById("availability").style.display = "none";
  }
}

/*Show or Hide other textarea function
* for how did you hear about us
 */
$(function () {
    $("#other-block").hide();
    $("#howdidyouhear").change(function () {
        var heardAbout = $(this).val();
        if(heardAbout === "other") {
            $("#other-block").show();
        }
        else {
            $("#other-block").hide();
        }

    });
});

/*Show or Hide other textarea function
* for interests
 */
$("#other-interest").hide();
$("#other-interests").change(function () {
    if ($("#other-interests").is(":checked")) {
        $("#other-interest").show();
    }
    else {
        $("#other-interest").hide();
    }
});


// on submit the form checks validation on certain criteria
document.getElementById("volunteer-form").onsubmit = validate;

function validate() {

  var Valid = true;

  var errors = document.getElementsByClassName("err");
  for(var i = 0; i < errors.length; i++) {
    errors[i].style.visibility = "hidden";
  }

  // validates if a consent option was selected
  var Y = document.getElementById("yes").checked;
  var N = document.getElementById("no").checked;
  if (Y == false && N == false) {
    var errConsent = document.getElementById("err-consent");
    errConsent.style.visibility = "visible";
    Valid = false;
  }

  // validates that the address is not blank
  var address = document.getElementById("address").value;
  if (address == "") {
    var errAddress = document.getElementById("err-address");
    errAddress.style.visibility = "visible";
    Valid = false;
  }

  // validates that the city is not blank
  var city = document.getElementById("city").value;
  if (city == "") {
    var errCity = document.getElementById("err-city");
    errCity.style.visibility = "visible";
    Valid = false;
  }

  // validates that the zip code is not blank
  var zip = document.getElementById("zip").value;
  if (zip == "") {
    var errZip = document.getElementById("err-zip");
    errZip.style.visibility = "visible";
    Valid = false;
  }

  return Valid;
}
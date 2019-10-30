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
/*
    add a mouse over for pulsate on the youth submit
    button, remove it on mouse out
 */
$("#youth_submit").mouseover(function () {
    $("button").addClass("pulse");
});
$("#youth_submit").mouseout(function () {
    $("button").removeClass("pulse");
});

//Show/Hide functions
$("#noExperience").click(function(){
  $("#prevExperience").toggle();
});
$("#noPref").click(function(){
  $("#rolePref").toggle();
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


/*
    date picker birthday for the youth form
 */
$(document).ready(function(){
    $('.datepicker').datepicker();
});

/*
    forces the user to select weather they are a youth or other
    show respective forms
 */

$(function () {
    $("#volunteer-form").hide();
    $("#youth-volunteer-form").hide();
    $("#person").on('change',function() {
        if(this.value == "student"){
            $("#youth-volunteer-form").show();
            $("#volunteer-form").hide();
        }else if(this.value == "parent" || this.value == "other"){
            $("#volunteer-form").show();
            $("#youth-volunteer-form").hide();
        }else{
            $("#volunteer-form").hide();
            $("#youth-volunteer-form").hide();
        }
    });
});

/*
    youth form validation
 */

function validate() {
    let Valid = true;
    let errors = document.getElementsByClassName("err");
    for(let i = 0; i < errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }
    //first name validation
    let fname = document.getElementById("youth_first_name").value;
    if (fname == "") {
        let err_youth_fname = document.getElementById("err-youth-fname");
        err_youth_fname.style.visibility = "visible";
        Valid = false;
    }
    //last name validation
    let lname = document.getElementById("youth_last_name").value;
    if(lname == ""){
        let err_youth_lname = document.getElementById("err-youth-lname");
        err_youth_lname.style.visibility = "visible";
        Valid = false;
    }
    //email validation

    //phone number validation
    let phoneNum = document.getElementById("youth_phone").value;
    if(isNaN(phoneNum) || phoneNum == ""){
        let err_youth_phone = document.getElementById("err-youth-phone");
        err_youth_phone.style.visibility = "visible";
        Valid = false;
    }
    //graduation validation
    let gradYear = document.getElementById("graduation_year").value;
    if(gradYear == "none"){
        let err_grad = document.getElementById("err-youth-grad");
        err_grad.style.visibility = "visible";
        Valid = false;
    }
    //birthday validation

    //gender validation
    let gender = document.getElementById("gender").value;
    if(gender == "none"){
        let err_gender = document.getElementById("err-youth-gender");
        err_gender.style.visibility = "visible";
        Valid = false;
    }
    //ethnicity validation
    let ethnicity = document.getElementById("ethnicity").value;
    if(ethnicity == "none"){
        let err_ethnic = document.getElementById("err-youth-ethnicity");
        err_ethnic.style.visibility = "visible";
        Valid = false;
    }

    // validates if a consent option was selected
    let Y = document.getElementById("yes").checked;
    let N = document.getElementById("no").checked;
    if (Y == false && N == false) {
        let errConsent = document.getElementById("err-consent");
        errConsent.style.visibility = "visible";
        Valid = false;
    }

    return Valid;
}
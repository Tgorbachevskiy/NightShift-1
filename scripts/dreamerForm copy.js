//Initialize some stuff
$(document).ready(function () {
    $('select').formSelect();
    $('.collapsible').collapsible();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        yearRange: 20
    });
  });

//Func to add other field
  function Other(val) {
    var Other = document.getElementById("E-other");
    if (val == "other") {
        Other.style.display = "block";
    } else {
        Other.style.display = "none";
    }
}
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


/*
    youth form validation
 */

function youthValidate() {
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
document.getElementById("youth-volunteer-form").onsubmit = youthValidate;

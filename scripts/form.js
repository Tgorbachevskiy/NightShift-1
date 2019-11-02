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

    // validates that T-shirt size is selected
    var size = document.getElementById("size").value;
    if (size == "") {
        var errSize = document.getElementById("err-size");
        errSize.style.visibility = "visible";
        Valid = false;
    }

    // validates first name is entered
    var fname = document.getElementById("first_name").value;
    if (fname == "") {
        var errfname = document.getElementById("err-fname");
        errfname.style.visibility = "visible";
        Valid = false;
    }

    // validates last name is entered
    var lname = document.getElementById("last_name").value;
    if (lname == "") {
        var errlname = document.getElementById("err-lname");
        errlname.style.visibility = "visible";
        Valid = false;
    }

    //phone number validation
    var phoneNum = document.getElementById("phone").value;
    if(isNaN(phoneNum) || phoneNum == ""){
        var err_phone = document.getElementById("err-phone");
        err_phone.style.visibility = "visible";
        Valid = false;
    }

    // validates that email is not empty
    var email = document.getElementById("email").value;
    if (email == "") {
        var errEmail = document.getElementById("err-email");
        errEmail.style.visibility = "visible";
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

    // validates that three references were supplied
    var refN1 = document.getElementById("refFirstName1").value;
    var refL1 = document.getElementById("refLastName1").value;
    var refP1 = document.getElementById("refPhone1").value;
    var refE1 = document.getElementById("refEmail1").value;
    var refR1 = document.getElementById("refRelation1").value;

    if(refN1 == "" || refL1 == "" || refP1 == "" || refE1 == "" || refR1 == "") {
        var errRef1 = document.getElementById("err-ref1");
        errRef1.style.visibility = "visible";
        Valid = false;
    }

    var refN2 = document.getElementById("refFirstName2").value;
    var refL2 = document.getElementById("refLastName2").value;
    var refP2 = document.getElementById("refPhone2").value;
    var refE2 = document.getElementById("refEmail2").value;
    var refR2 = document.getElementById("refRelation2").value;

    if(refN2 == "" || refL2 == "" || refP2 == "" || refE2 == "" || refR2 == "") {
        var errRef2 = document.getElementById("err-ref2");
        errRef2.style.visibility = "visible";
        Valid = false;
    }

    var refN3 = document.getElementById("refFirstName3").value;
    var refL3 = document.getElementById("refLastName3").value;
    var refP3 = document.getElementById("refPhone3").value;
    var refE3 = document.getElementById("refEmail3").value;
    var refR3 = document.getElementById("refRelation3").value;

    if(refN3 == "" || refL3 == "" || refP3 == "" || refE3 == "" || refR3 == "") {
        var errRef3 = document.getElementById("err-ref3");
        errRef3.style.visibility = "visible";
        Valid = false;
    }

    return Valid;

}
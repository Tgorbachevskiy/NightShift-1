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

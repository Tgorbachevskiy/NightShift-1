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

$(document).ready(function () {
  $('.datepicker').datepicker();
});
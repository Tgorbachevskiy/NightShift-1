//Add a new reference
let referenceForm = '<div class="divider"></div><div class="section"><div class="ref"><div class="input-field col s6"><label for="refFirstName">Reference First Name</label><input type="text" class="form-control" id="refFirstName"></div><div class="input-field col s6"><label for="refLastName">Reference Last Name</label><input type="text" class="form-control" id="refLastName"></div><div class="input-field col s12"><label for="refphone">Phone #</label><input type="number" class="form-control" id="refphone"></div><div class="input-field col s12"><label for="email">E-mail</label><input type="text" class="form-control" id="email"></div><div class="input-field col s12"><label for="relation">Relation</label><input type="text" class="form-control" id="relation"></div></div><br></div>';

$("#newref").click(function () {
  $(referenceForm).insertAfter("#referenceLegend");
});

//Delete reference
var refCount = 3
$("#delref").click(function () {
  if (refCount<=3) {
    return;
  }
  let refRow = document.getElementById("refRow");
  let lastField = refRow.lastElementChild;
  lastField.removeChild();
});

var refRow = document.getElementById("refRow");
var lastChild = refRow.lastChild;


//Initialize select
$(document).ready(function () {
  $('select').formSelect();
});


/*
  add a mouse over for pulsate on the add
  references button, remove it on mouse out
*/
$("#newref").mouseover(function () {
  $("a").addClass("pulse");
});
$("#newref").mouseout(function () {
  $("a").removeClass("pulse");
});
$("#delref").mouseover(function () {
  $("a").addClass("pulse");
});
$("#delref").mouseout(function () {
  $("a").removeClass("pulse");
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
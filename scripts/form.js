//Add a new reference
let referenceForm = '<div class="ref"><div class="input-field col s6"><label for="refFirstName">Reference First Name</label><input type="text" class="form-control" id="refFirstName"></div><div class="input-field col s6"><label for="refLastName">Reference Last Name</label><input type="text" class="form-control" id="refLastName"></div><div class="input-field col s12"><label for="refphone1">Phone #</label><input type="number" class="form-control" id="refphone1"></div><div class="input-field col s12"><label for="relation1">Relation</label><input type="text" class="form-control" id="relation1"></div></div><br>';
$("#newref").click(function(){
  $(referenceForm).insertAfter("#referenceLegend");
});

  $(document).ready(function(){
    $('select').formSelect();
  });


  /*
    add a mouse over for pulsate on the add
    references button, remove it on mouse out
 */
$("#newref").mouseover(function() {
    $("a").addClass("pulse");
});
$("#newref").mouseout(function(){
    $("a").removeClass("pulse");
});
/*
    add a mouse over for pulsate on the submit button,
    remove it on mouse out
 */
$("#submit").mouseover(function(){
    $("button").addClass("pulse");
});
$("#submit").mouseout(function(){
    $("button").removeClass("pulse");
});
        
$(document).ready(function(){
  $('.datepicker').datepicker();
});


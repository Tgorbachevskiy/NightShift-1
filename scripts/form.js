//Add a new reference
let referenceForm = '<ul><div class="form-group"><label for="refName">Reference Full Name</label><input type="text" class="form-control" id="refName"></input></div><div class="form-group"><label for="refphone">Phone #</label><input type="number" class="form-control" id="refphone1"></input></div><div class="form-group"><label for="relation">Relation</label><input type="text" class="form-control" id="relation1"></input></div></ul><br>';
$("#newref").click(function(){
  $(referenceForm).insertBefore(".ref");
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
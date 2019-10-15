//Add a new reference
let referenceForm = '<div class="ref"><div class="input-field col s6"><label for="refName">Reference First Name</label><input type="text" class="form-control" id="refFirstName"></div><div class="input-field col s6"><label for="refName">Reference Last Name</label><input type="text" class="form-control" id="refLastName"></div><div class="input-field col s12"><label for="refphone">Phone #</label><input type="number" class="form-control" id="refphone1"></div><div class="input-field col s12"><label for="relation">Relation</label><input type="text" class="form-control" id="relation1"></div></div><br>';
$("#newref").click(function(){
  $(referenceForm).insertAfter("h6");
});

  $(document).ready(function(){
    $('select').formSelect();
  });
        
  $(document).ready(function(){
    $('.datepicker').datepicker();
  });
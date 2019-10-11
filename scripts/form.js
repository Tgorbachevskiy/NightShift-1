//Add a new reference
let referenceForm = '<ul><div class="form-group"><label for="refName">Reference Full Name</label><input type="text" class="form-control" id="refName"></input></div><div class="form-group"><label for="refphone">Phone #</label><input type="number" class="form-control" id="refphone1"></input></div><div class="form-group"><label for="relation">Relation</label><input type="text" class="form-control" id="relation1"></input></div></ul><br>';
$("#newref").click(function(){
  $(referenceForm).insertBefore(".ref");
});

  $(document).ready(function(){
    $('select').formSelect();
  });
        
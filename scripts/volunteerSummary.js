$('.status').on('change', function() {
    var status = $(this).val();
    var id = $(this).attr('data-id');

    alert("status: " + status);

    $.post('updateVolunteer.php', {volunteerId:id, status:status});
})

$('#volunteer-table').DataTable( {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal( {
                header: function ( row ) {
                    var data = row.data();
                    // return 'Details for '+data[0]+' '+data[1];
                    return 'Details for '+data[0];
                }
            } ),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                tableClass: 'table'
            } )
        }
    }
} );

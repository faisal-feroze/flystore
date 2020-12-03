
$(document).ready(function() {
  // $('#dataTable').DataTable();


  $('#dataTable').dataTable({
    "pageLength": 20
  });

  //   $('#dataCheck').DataTable( {
  //     "pageLength": 50,
  //     initComplete: function () {
  //         this.api().columns().every( function () {
  //             var column = this;
  //             if (column.index() == 6) {
  //             var select = $('<select><option value="">Status</option></select>')
  //                 .appendTo( $(column.header()).empty() )
  //                 .on( 'change', function () {
  //                     var val = $.fn.dataTable.util.escapeRegex(
  //                         $(this).val()
  //                     );
  //
  //                     column
  //                         .search( val ? '^'+val+'$' : '', true, false )
  //                         .draw();
  //                 } );
  //
  //             column.data().unique().sort().each( function ( d, j ) {
  //                 select.append( '<option value="'+d+'">'+d+'</option>' )
  //             } );
  //           }
  //         } );
  //     }
  // } );


});

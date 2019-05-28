$(document).ready(function() {
	   let tables = ['#admin-activity-table','#admin-deals-table','#admin-auctions-table','#transactions-table','#invoices-table'];
	   for(var i=0; i<tables.length;i++){
          $(tables[i]).DataTable();
        }
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

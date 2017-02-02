$(document).ready (function(){
 	$('#cmodeltable').DataTable({	                   
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
	}); 
        $('#cshifttable').DataTable({                      
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false 
        });                     

        $('#cboundarytable').DataTable({                           
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        });                     

        $('#cdrivertable').DataTable({                     
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        });    

        $('#cfctable').DataTable({                         
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        });        
        
          $('#cacctable').DataTable({                         
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        });     

        $('#cbrandtable').DataTable({                      
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        });        

        // $('#bbreakdowntable').DataTable({                      
        //         "filter":true,
        //         "lengthChange":false,
        //         "AutoWidth":true,
        //         "ordering":true,
        //         "info":false,
        //         responsive:true,
        //         scrollY:        '40vh',
        //         scrollCollapse: true,
        //         paging:         false,
                
        // });     

        $('#bshifttable').DataTable({                      
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        });          
        
        $('#cbrandtableact').DataTable({                      
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        }); 

        $('#taximodeltableact').DataTable({                      
                "filter":true,
                "lengthChange":false,
                "AutoWidth":true,
                "ordering":true,
                "info":false,
                responsive:true,
                scrollY:        '40vh',
                scrollCollapse: true,
                paging:         false
        }); 
});
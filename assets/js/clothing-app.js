$(document).ready(function() {        
        $(".tablesorter").find("tr:even").addClass("even");
        $(".tablesorter")
            .tablesorter({
                headers: {
                    0:{sorter:false},
                    1:{sorter:'datetime'},
                    7:{sorter:false}
                }
            })
            .tablesorterPager({
                container: $(".table-pager"),
                positionFixed: false,
                size:20
            });
        $(".tablesorter").on('sortEnd', function(){
	    //set striping color
	    $(".tablesorter").find('tr').removeClass('even');
	    $(".tablesorter").find("tr:even").addClass("even");
        });
    } 
); 
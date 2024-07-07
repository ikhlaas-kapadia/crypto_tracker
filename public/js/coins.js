$(document).ready(function() {
    $('#coins-table').DataTable({
        columnDefs: [
            { "width": "5%", "targets": 0 },
            { "width": "5%", "targets": 1 },
            { "width": "10%", "targets": 2 },
            { "width": "10%", "targets": 3 },
            { "width": "20%", "targets": 4 },
            { "width": "10%", "targets": 5 },
            { "width": "10%", "targets": 6 },
            { "width": "10%", "targets": 7 }
        ],
        responsive: true,
        scroller: true,
        scrollY: 400
        
    });

    $('i.star').on('click', function(){
        console.log('clicked');
        if($(this).hasClass('far')){
            $(this).removeClass('far').addClass('fas');
            $(this).css('color', 'orange');
        } else {
            $(this).removeClass('fas').addClass('far');
            $(this).css('color', 'black');
        }
        // fa fa-star fa-lg"
    });
});

$(document).ready(function() {
    console.log('hello');
    $('#portfolio-table').DataTable({
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

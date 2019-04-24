// progress bar on view home
function rateProgress(rate) {
    $('.block-progress').removeClass('bg-primary');

    // add class for blocks progress
    for (let i = 10; i <= rate; i+=10) {
        if ($('.block-progress').data('rate') <= rate) {
            $('#rate-' + i).addClass('bg-primary');  
        }
    }
}

// if value from table 
if ($('#rate_home_cleanlines').val() > 0) {
    rateProgress($('#rate_home_cleanlines').val());
}

// change rate
$('.block-progress').on('click', function(e) {
    $('.block-progress').removeClass('bg-primary');

    rateProgress($(this).data("rate"));

    $('#rate_home_cleanlines').val($(this).data("rate"));
});
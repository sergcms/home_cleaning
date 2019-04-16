$('.block-progress').on('click', function(e) {
    $('.block-progress').removeClass('bg-primary');

    for (let i = 10; i <= $(this).data("rate"); i+=10) {
        if ($('.block-progress').data('rate') <= $(this).data("rate")) {
            $('#rate-' + i).addClass('bg-primary');  
        }
    }
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img-home').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

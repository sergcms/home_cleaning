$('.block-progress').on('click', function(e) {
    $('.block-progress').removeClass('bg-primary');

    for (let i = 10; i <= $(this).data("rate"); i+=10) {
        if ($('.block-progress').data('rate') <= $(this).data("rate")) {
            $('#rate-' + i).addClass('bg-primary');  
        }
    }

    $('#rate_home_cleanlines').val($(this).data("rate"));
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

$('#extras').on('click', function(e) {

    $(e.target).toggleClass('active');

    let price = $(e.target).data('price');
    let name = $(e.target).data('name');

    console.log($('.list-group-item').data('name'));
    
    if ($('#list-services .list-group-item').data('name') == name) {
        console.log($(e.target).data('name'));
        // $(e.target).data('name').remove();
    } else {
        $('#list-services').append( "<li class='list-group-item' data-name='" + name + "'>" + name + " - $" + price + "</li>" );
    }

    // console.log(e.target.className);
        // if ($('.block-progress').data('rate') <= $(this).data("rate")) {
        //     $('#rate-' + i).addClass('bg-primary');  
        // }

    // $('#rate_home_cleanlines').val($(this).data("rate"));
});

// $('#').on('change', function() {

// });

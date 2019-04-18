// progress bar on view home
$('.block-progress').on('click', function(e) {
    $('.block-progress').removeClass('bg-primary');

    for (let i = 10; i <= $(this).data("rate"); i+=10) {
        if ($('.block-progress').data('rate') <= $(this).data("rate")) {
            $('#rate-' + i).addClass('bg-primary');  
        }
    }

    $('#rate_home_cleanlines').val($(this).data("rate"));
});

// display preview image on view home 
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img-home').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// diaplay extra services on view extras
$('#extras').on('click', function(e) {

    $(e.target).toggleClass('active');

    let price = $(e.target).data('price');
    let name = $(e.target).data('name');
    let item_id = $(e.target).data('id');

    if (item_id == $('#'+item_id).attr('id')) {
        
        axios.get('/extras').then((response) => {
            console.log(response);
        }).catch((error) => { console.log(error); });

        $('#'+item_id).remove();
    } else {

        axios.get('/extras').then((response) => {
            console.log(response);
        }).catch((error) => { console.log(error); });

        $('#list-services').append( "<li class='list-group-item' id='" + item_id + "'>" + name + " - $" + price + "</li>" );
    }

});


// $('#').on('change', function() {

// });

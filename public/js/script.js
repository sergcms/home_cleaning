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

// if value of table 
if ($('#rate_home_cleanlines').val() > 0) {
    rateProgress($('#rate_home_cleanlines').val());
}

// click 
$('.block-progress').on('click', function(e) {
    $('.block-progress').removeClass('bg-primary');

    rateProgress($(this).data("rate"));

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

// check extra services on view extras
$('#extras').on('click', function(e) {

    $(e.target).toggleClass('active');

    let price = $(e.target).data('price');
    let name = $(e.target).data('name');
    let item_id = $(e.target).data('id');

    console.log(item_id);




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

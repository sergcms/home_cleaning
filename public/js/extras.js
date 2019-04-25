let extras = {
    'inside_fridge'      : 0,
    'inside_oven'        : 0,
    'garage_swept'       : 0,
    'inside_cabinets'    : 0,
    'laundry_wash_dry'   : 0,
    'bed_sheet_change'   : 0,
    'blinds_cleaning'    : 0,
    'on_weekend'         : 0,
    'carpet_cleaned'     : 0,
    'on_weekend'         : 0,
    'carpet_cleaned'     : 0,
    'cleaning_frequency' : '',  
}

// send data
function send(extras) {
    extras['cleaning_frequency'] = $('.cleaning_frequency:checked').val();
    
    $.each(extras, function (key, value) { 
        if ($('*').is('#'+key)) {
            extras[key] = 1;
        }
    });

    axios.post('/order/calc-extras', extras)
        .then((response) => {
            $.each(response.data, function (key, value) { 
                $('#'+key).text("$"+value); 
            });

            $('#total-price').text("today's total $"+response.data.total_sum);
        })
        .catch((error) => { 
            console.log(error); 
        });
}

// check extra services on view extras
$('#extras').on('click', function(e) {
    // toggle class active
    $(e.target).toggleClass('active');
    // get price element
    let price = $(e.target).data('price');
    // get name element
    let name = $(e.target).data('name');
    // get id element
    let item_id = $(e.target).data('id');

    if (item_id == $('#'+item_id).attr('id')) {
        extras[item_id] = 0;
        // remove element with form
        $('#'+item_id).remove();
        // send data
        send(extras);
    } else {
        extras[item_id] = 1;
        // send data
        send(extras);
        // create element
        $('#list-services').append( "<li class='list-group-item extra' id='" + item_id + "'>" + name + " - $" + price + "</li>" );
    }
});

// change element on form extras
$('#form-extras').on('change', function(e) {
    // get element for his attribut name 
    let el_name = $(e.target).attr('name');
    // get price element
    let price = $(e.target).data('price');
    // get data name
    let data_name = $(e.target).data('name');
    // get value is class checked
    extras[el_name] = $('.'+el_name+':checked').val();

    if (extras[el_name] == 0) {
        $('#'+el_name).remove();
    } else {
        if (el_name != 'cleaning_frequency') {
            $('#list-services').append( "<li class='list-group-item extra' id='" + el_name + "'>" + data_name + " - $" + price + "</li>" );
        }
    }

    // send data
    send(extras);
});

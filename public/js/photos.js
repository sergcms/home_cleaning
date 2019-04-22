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
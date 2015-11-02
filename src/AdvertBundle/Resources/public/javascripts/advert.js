$(document).ready(function(){
    var makeID = $('#advert_bundle_advert_type_make').val();
    updateModelsSelect(makeID);

    $('#advert_bundle_advert_type_make').on('change', function () {
        var makeID = $(this).val();
        updateModelsSelect(makeID);
    });

    function updateModelsSelect($makeID){
        $.post('/make/models', {make: $makeID}, function(answ){
            $('#advert_bundle_advert_type_model').html(answ);
        });
    }
});
$(document).ready(function(){
    var makeID = $('#advert_bundle_advert_type_make').val();
    var modelID;

    if($('#edit').val()){
        modelID = $('#advert_bundle_advert_type_model').val()
    }

    updateModelsSelect(makeID, modelID);

    $('#advert_bundle_advert_type_make').on('change', function () {
        var makeID = $(this).val();
        updateModelsSelect(makeID);
    });

    function updateModelsSelect(makeID, modelID){
        $.post('/make/models', {make: makeID, model: modelID}, function(answ){
            $('#advert_bundle_advert_type_model').html(answ);
        });
    }
});
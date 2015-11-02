$(document).ready(function () {
    updateAdverts();

    $('#app_bundle_advert_save').on('click', function (event) {
        event.preventDefault();
        var params = $("form").serializeArray();
        updateAdverts(params);
    });

    $('#search_bundle_search_make').on('change', function () {
        var makeID = $(this).val();
        updateModelsSelect(makeID);
    });

    function updateAdverts(params) {
        $.post('/search/adverts', params, function (answ) {
            $("#adverts").html(answ);
        });
    }

    function updateModelsSelect($makeID) {
        $.post('/make/models', {make: $makeID}, function (answ) {
            var select = $("#search_bundle_search_model");
            clearSelect(select);
            select.append(answ);

        });
    }

    function clearSelect(select) { //Remove all options except .unremovable
        select.children('.option').remove();
    }
});
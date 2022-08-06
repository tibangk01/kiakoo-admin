$(function () {

    $('.select2').select2();

    $(".deselect-all").click(function() {
        $(".select2-select").each(function() {
            $(this).select2().val(null).trigger("change")
        });
    });

    $(".select-all").click(function() {
        $(".select2-select").each(function() {
            $(this).select2().find('option').prop('selected', 'selected').trigger("change")
        });
    });

    $(".deselect-all-bis").click(function() {
        $(".select2-select-bis").each(function() {
            $(this).select2().val(null).trigger("change")
        });
    });

    $(".select-all-bis").click(function() {
        $(".select2-select-bis").each(function() {
            $(this).select2().find('option').prop('selected', 'selected').trigger("change")
        });
    });

});



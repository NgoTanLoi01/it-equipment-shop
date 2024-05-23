$(function(){
    $(".checkbox_wrapper").on("click", function () {
        $(this)
            .closest(".card")
            .find(".checkbox_childrent")
            .prop("checked", $(this).prop("checked"));
    });
    
    $('.checkall').on('click', function(){
        $(this).closest('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        $(this).closest('.card').find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
    })
});

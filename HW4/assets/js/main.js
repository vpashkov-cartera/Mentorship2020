$('document').ready(function () {
    $('.order_by input[type=radio]').on('change', function () {
        $(this).closest('form').submit();
    });
});

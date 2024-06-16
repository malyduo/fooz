jQuery(document).ready(function ($) {
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'get_books_list'
        },
        success: function (response) {
            if (response.length) {
                console.log(response)
            }
        }
    });
});

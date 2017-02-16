$(function () {

    $(".delete_me").click(function () {
        var manateghId = $(this).attr("id");
        var parent = $(this).parent();
        var item = parent.closest('tr'); item.slideUp('slow', function () {
            $(this).remove();
        });
        $.ajax({
            type: "post",
            url: window.location.origin+"/rahiyan_noor/admin/manategh/delete_manategh_id",
            cache: false,
            data: 'manategh_id=' + manateghId,
            success: function (response) {console.log(response);
                try {
                    if (response == 'true') {
                        item.slideUp('slow', function () {
                            $(this).remove();
                        });
                    }

                } catch (e) {
                    alert('Exception while request..');
                }
            },
            error: function () {
                alert('Error while request..');
            }
        });
    })
})
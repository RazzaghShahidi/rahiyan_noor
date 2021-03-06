/**
 * Created by Sarwin on 02/12/2017.
 */

/**@
 * @param select
 * @description
 */
function selectIngredient(select) {

    var option = select.options[select.selectedIndex];
    var ul = select.parentNode.getElementsByTagName('ul')[0];
    var choices = ul.getElementsByTagName('input');

    var li = document.createElement('li');
    var input = document.createElement('input');
    var text = document.createTextNode(option.firstChild.data);


    for (var i = 0; i < choices.length; i++) {
        if (choices[i].value == option.value) {
            return;
        }
    }

    input.type = 'hidden';
    input.name = 'ingredients[]';
    input.value = option.value;

    li.appendChild(input);
    li.appendChild(text);
    li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
    ul.appendChild(li);
}



/**@
 * @description ajax delete ammaliyat
 */
$(function () {

    $(".delete_me").click(function () {

        //Get ammaliyat id to delete
        var ammaliyatId = $(this).attr("id");

        var parent = $(this).parent();
        var item = parent.closest('tr');

        item.slideUp('slow', function () {
            $(this).remove();
        });
        $.ajax({
            type: "post",
            url: window.location.origin + "/rahiyan_noor/admin/ammaliyat/delete_ammaliyat_id",
            cache: false,
            data: 'ammaliyat_id=' + ammaliyatId,
            success: function (response) {
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
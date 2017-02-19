/**
 * Created by Shahidi on 02/12/2017.
 */

/**
 *
 * @param select
 * @DESCRIPTION
 */
function selectIngredient(select)
{
    var option = select.options[select.selectedIndex];
    var ul = select.parentNode.getElementsByTagName('ul')[0];
    var choices = ul.getElementsByTagName('input');

    var li = document.createElement('li');
    var input = document.createElement('input');
    var text = document.createTextNode(option.firstChild.data);

    for (var i = 0; i < choices.length; i++){
        if (choices[i].value == option.value){
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


/**
 *
 * @param mantaghe_id
 *
 */
function selectState(mantaghe_id) {
    if (mantaghe_id != "-1") {
        loadData('ammaliyat', mantaghe_id);

    } else {
        $("#ammaliyat_dropdown").html("<option value='-1'>انتخاب عملیات</option>");

    }
}


/**@
 *
 * @param loadType
 * @param loadId
 */
function loadData(loadType, loadId) {
    var dataString = 'loadType=' + loadType + '&loadId=' + loadId;
    $("#" + loadType + "_loader").show();
    $("#" + loadType + "_loader").fadeIn(400).html('لطفا صبر کنید... ');
    $.ajax({
        type: "POST",
        url: window.location.origin+"/rahiyan_noor/admin/shahidan/get_all_depend_ammaliyat",
        data: dataString,
        cache: false,
        success: function (result) {
            $("#" + loadType + "_loader").hide();
            $("#" + loadType + "_dropdown").html("<option value='-1'>انتخاب عملیات</option>");
            $("#" + loadType + "_dropdown").append(result);
        }
    });
}


/**
 *@decription ajax delete shahidan with ajax
 */
$(function () {

    $(".delete_me").click(function () {
        var shahidanId = $(this).attr("id");
        var parent = $(this).parent();
        var item = parent.closest('tr'); item.slideUp('slow', function () {
            $(this).remove();
        });
        $.ajax({
            type: "post",
            url: window.location.origin + "/rahiyan_noor/admin/shahidan/delete_shahidan_id",
            cache: false,
            data: 'shahidan_id=' + shahidanId,
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